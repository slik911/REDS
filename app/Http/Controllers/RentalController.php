<?php

namespace App\Http\Controllers;

use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostUpload;
use App\Models\Rental;
use App\Models\Upload;
use App\Validations\RentalValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RentalController extends Controller
{
    public function index(){
        $posts = Category::where('name', 'rentals')->first()?->posts ?? collect();
        return view('admin.rentals.index', compact('posts'));
    }

    public function create(){
        return view('admin.rentals.create');
    }

    public function store(Request $request, RentalValidation $rule){
        
        //merge features and feature_descriptions
        $merged_features = array_combine($request->features, $request->feature_descriptions);

        $validated = $rule->validationRules($request, 'create');

        if ($validated->fails()) {
            notyf()->error($validated->errors()->first());
            return redirect()->back()->withInput($request->all());
        }
        
        try {

           

            DB::beginTransaction();
            $post = Post::create([
                'user_id'=> Auth::user()->uuid,
                'category_id' => Category::where('name', 'rentals')->first()->uuid,
                'title' => $request->title,
                'slug' => Str::slug($request->title, '_'),
                'description' => $request->description,

            ]);

            $rental = Rental::create([
                'post_id' => $post->uuid,
                'province' => $request->province,
                'city' => $request->city,
                'postal_code' => $request->postal_code,
                'price' => $request->price,
                'meta_data' => json_encode($merged_features)
            ]);
            //upload image
            $urls = Functions::uploadMultipleImages($request->images, 'rental');
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
            notyf()->success('Rentals created successfully');
            return redirect()->route('admin.rentals');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            notyf()->error('An error occurred while creating the rentals');
            return redirect()->back()->withInput($request->all());
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
        $post = Post::with('uploads', 'rental')->where('uuid', $post_id)->first();

        return view('admin.rentals.edit', compact('post'));
    }
    
    public function update(Request $request, RentalValidation $rule){
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

            //merge features and feature_descriptions
            $merged_features = array_combine($request->features, $request->feature_descriptions);

            //update rental
            $rental = Rental::where('post_id', $request->post_id)->first();
            $rental->province = $request->province;
            $rental->city = $request->city;
            $rental->postal_code = $request->postal_code;
            $rental->price = $request->price;
            $rental->meta_data = json_encode($merged_features);
            $rental->save();

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
            notyf()->success('Rentals updated successfully');
            return redirect()->route('admin.rentals');
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
