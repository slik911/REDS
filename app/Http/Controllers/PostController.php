<?php

namespace App\Http\Controllers;

use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostUpload;
use App\Models\Upload;
use Illuminate\Http\Request;
use App\Validations\PostValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index(){
        $posts = Category::where('name', 'renovations')->first()?->posts ?? collect();
        return view('admin.renovation.index', compact('posts'));
    }

    public function create(){
        return view('admin.renovation.create');
    }

    public function store(Request $request, PostValidation $rule){

        $validated = $rule->validationRules($request, 'create');

        if ($validated->fails()) {
            notyf()->error($validated->errors()->first());
            return redirect()->back()->withInput($request->all());
        }

        try {

            DB::beginTransaction();

            //make sure category renovations  category e
            if(!Category::where('name', 'renovations')->exists()) {
                Category::create([
                    'uuid'=> Str::uuid(),
                    'name' => 'renovations',
                    'slug' => Str::slug('renovations', '_'),
                ]);
            }

            $post = Post::create([
                'user_id'=> Auth::user()->uuid,
                'category_id' => Category::where('name', 'renovations')->first()->uuid,
                'title' => $request->title,
                'slug' => Str::slug($request->title, '_'),
                'description' => $request->description,
            ]);
            //upload image
            $urls = Functions::uploadMultipleImages($request->images, 'renovation');
            foreach ($urls as $url) {

                $upload = Upload::create([
                    'url' => $url
                ]);

                PostUpload::create([
                    'post_id' => $post->uuid,
                    'upload_id' => $upload->uuid
                ]);
            }
            DB::commit();
            notyf()->success('Post created successfully');
            return redirect()->route('admin.renovation');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            notyf()->error('An error occurred while creating post');
            return redirect()->back();
        }
    }

    public function updateStatus($post_id){
        $post = Post::where('uuid', $post_id)->first();
        $post->status = !$post->status;
        $post->save();

        notyf()->success('Post status updated successfully');
        return redirect()->back();
    }

    public function edit($post_id){
        $post = Post::with('uploads')->where('uuid', $post_id)->first();

        return view('admin.renovation.edit', compact('post'));
    }

    public function deleteImage(Request $request){

        $url = $request->input('url');
        try {
            DB::beginTransaction();

            //find postupload connection
            $post = PostUpload::where('post_id', $request->post_id)->get();

            $upload = Upload::whereIn('uuid', $post->pluck('upload_id'))->where('url', $url)->first();

            //delete postupload connection
            PostUpload::where('upload_id', $upload->uuid)->delete();

            //delete upload
            $upload->delete();

            //delete image from cloudinary
            $function = new Functions();
            $result = $function->deleteImageByUrl($url);


            if ($result) {
                DB::commit();
                return response()->json(['success' => true, 'message' => 'Image deleted successfully']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return response()->json(['error' => 'Failed to delete image', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, PostValidation $rule){
        $validated = $rule->validationRules($request, 'update');

        if ($validated->fails()) {
            notyf()->error($validated->errors()->first());
            return redirect()->back();
        }

        try {
            DB::beginTransaction();

            if(!PostUpload::where('post_id', $request->post_id)->exists()){
                notyf()->error('Upload at least one image');
                return redirect()->back();
            }

            $post = Post::where('uuid', $request->post_id)->first();
            $post->title = $request->title;
            $post->slug = Str::slug($request->title, '_');
            $post->description = $request->description;
            $post->status = false;
            $post->save();

            //upload image
            if ($request->has('images')) {
                $urls = Functions::uploadMultipleImages($request->images, 'renovation');
                foreach ($urls as $url) {

                    $upload = Upload::create([
                        'url' => $url
                    ]);

                    PostUpload::create([
                        'post_id' => $post->uuid,
                        'upload_id' => $upload->uuid
                    ]);
                }
            }
            DB::commit();
            notyf()->success('Post updated successfully');
            return redirect()->route('admin.renovation');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            notyf()->error('An error occurred while updating post');
            return redirect()->back();
        }

    }

    public function delete(Request $request){

        try {
            DB::beginTransaction();
            $post = Post::where('uuid', $request->uuid)->first();
            //find postupload connection
            $postupload = PostUpload::where('post_id', $request->uuid)->get();

            foreach ($postupload as $p) {
                $upload = Upload::where('uuid', $p->upload_id)->first();

                //delete from cloudinary
                $function = new Functions();
                $function->deleteImageByUrl($upload->url);

                //delet post upload connection
                PostUpload::where('id', $p->id)->delete();

                //delete upload
                $upload->delete();
            }
            $post->delete();
            DB::commit();
            notyf()->success('Post deleted successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th->getMessage());
            notyf()->error('An error occurred while deleting post');
            return redirect()->back();
        }
    }
}
