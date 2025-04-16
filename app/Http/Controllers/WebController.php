<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Mail\RfqNotification;
use App\Models\Client;
use App\Models\Post;
use App\Models\ServiceList;
use App\Models\Testimonial;
use App\Validations\TestimonialValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    public function index(){
        $services = ServiceList::with('image')->limit(4)->get();
        $rentals =  Post::has('rental')->with('rental')->orderBy('id', 'desc')->where('status', true)->get();
        $testimonials = Testimonial::with('client')->inRandomOrder()->limit(3)->get();
        $projects = Post::doesnthave('rental')->inRandomOrder()->limit(3)->where('status', true)->get();

        return view('welcome', compact('services', 'rentals', 'testimonials', 'projects'));
    }

    public function about(){
        return view('web.about');
    }

    public function rental(){
        $rentals =  Post::has('rental')->with('rental')->orderBy('id', 'desc')->where('status', true)->paginate(12);
        return view('web.rental', compact('rentals'));
    }

    public function rentalPreview($uuid){
        $rental =  Post::has('rental')->with('rental')->orderBy('id', 'desc')->where('uuid', $uuid)->first();
        // dd(json_decode($rental->rental->meta_data));
        return view('web.rentalPreview', compact('rental'));
    }

    public function rentalView(){
        return view('web.rentalPreview');
    }

    public function reno(){
        $services = ServiceList::with('image')->paginate(12);
        return view('web.renovation', compact('services'));
    }

    public function project(){
        $projects = Post::doesnthave('rental')->with('rental')->orderBy('id', 'desc')->where('status', true)->paginate(12);
        return view('web.project',  compact('projects'));
    }

    public function projectPreview($uuid){
        $project =  Post::doesnthave('rental')->with('rental')->orderBy('id', 'desc')->where('uuid', $uuid)->first();
        return view('web.projectPreview', compact('project'));
    }

    public function contact(){
        return view('web.contact');
    }

    public function quote(){
        return view('web.rfq');
    }

    public function faq(){
        return view('web.faq');
    }
    public function terms(){
        return view('web.terms');
    }
    public function privacy(){
        return view('web.privacy');
    }

    public function contactMail(Request $request){

        $mailData = [
            'title' => 'New Contact Request Submitted',
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        $email = "firstvisionconsulting@gmail.com";
        Mail::to($email)->send(new ContactMail($mailData));
        notyf()->success("Submission successful. We'll get back to you as soon as possible.");
        return redirect()->back();
    }

    public function testimonial($uuid){
        $client = Client::where('uuid', $uuid)->first();
        if(!$client){
            notyf()->error('Client not found');
            return redirect()->back();
        }
        return view('web.testimonial', compact('client'));
    }

    public function storeTestimonial(Request $request, TestimonialValidation $rule){
        $validated = $rule->validationRules($request, 'create');

        if ($validated->fails()) {
            notyf()->error($validated->errors()->first());
            return redirect()->back()->withInput($request->all());
        }

       try {
            DB::beginTransaction();
            $testimonial = new Testimonial();
            $testimonial->client_id = $request->client_id;
            $testimonial->message = $request->message;
            $testimonial->save();
            DB::commit();

            $mailData = [
                'title' => 'New Feedback Notification',
                'name' => 'Justice',
                'body' => 'A new feedback has just been submitted on your platform. Please log in to the admin dashboard to review the details.',
            ];

            $email = "firstvisioncontracting@gmail.com";


            Mail::to($email)->send(new RfqNotification($mailData));

            notyf()->success('Testimonial submitted successfully!');
            return redirect()->back();
       } catch (\Throwable $th) {
        //throw $th
            DB::rollBack();
            notyf()->error('Testimonial submission failed!');
            return redirect()->back()->withInput($request->all());
       }
    }

}