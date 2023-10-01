<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Branch;
use App\Models\Custom;
use App\Models\Why_us;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Project;
use App\Models\Meetting;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Contact;
use App\Models\Blog;
use App\Models\Testimonial;
use App\Http\Requests\AppointmentRequest;
use App\Http\Requests\ContactRequest;
use App\Models\Appointment;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $sliders = Slider::select('id','photo', 'title_'.app()->getLocale().' as name','description_'.app()->getLocale().' as description')->get();

        $services = Service::select('id','photo', 'title_'.app()->getLocale().' as name','description_'.app()->getLocale().' as description')->get();

        $testimonials = Testimonial::select('id','photo','name',
            'description_'.app()->getLocale().' as description','position_'.app()->getLocale().' as position')->get();

        $meettings = Meetting::select('id','photo','video', 'title_'.app()->getLocale().' as title','description_'.app()->getLocale().' as description')->get(); //muhammad

        $about = Custom::select('id','photo', 'description_'.app()->getLocale().' as description')->where('code', 'about')->first();
        $address = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'address')->first();
        $secret1 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secret1')->first();
        $secret2 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secret2')->first();
        $secret3 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secret3')->first();
        $secrets_video = Custom::select('id', 'description_'.app()->getLocale().' as description','photo')->where('code', 'secrets_video')->first(); //muhammad
        $secrets_photo = Custom::select('id','photo')->where('code', 'secrets_photo')->first();

        $projects = Project::select('id','photo', 'name_'.app()->getLocale().' as name','description_'.app()->getLocale().' as description')->get();

        $blogs = Blog::select('id','photo','description_'.app()->getLocale().' as description','title_'.app()->getLocale().' as title')->get();

        $questions = Why_us::select('id','description_'.app()->getLocale().' as description')->get();

        $branches = Branch::select('id', 'description_'.app()->getLocale().' as description',
            'name_'.app()->getLocale().' as name','address_'.app()->getLocale().' as address')->get();


        $phone = Setting::where('code', 'phone')->first();
        $phone2 = Setting::where('code', 'phone2')->first();
        $facebook = Setting::where('code', 'facebook')->first();
        $instgram = Setting::where('code', 'instgram')->first();
        $WhatsApp = Setting::where('code', 'WhatsApp')->first();
        $dr_name = Custom::where('code', 'dr_name')->first();
        $bio = Custom::where('code', 'bio')->first();

        

        return view('site.home-page.home-page', 
            compact('sliders','services','testimonials','about','address','phone','phone2','facebook','instgram','WhatsApp','secret1','secret2','secret3','secrets_video','projects','secrets_photo','blogs','bio','dr_name','questions','branches','meettings'));
    }

    public function about()
    {
        return view('site.about');
    }

    public function blog()
    {
        $blogs = Blog::select('id','title_'.app()->getLocale().' as title','photo','description_'.app()->getLocale().' as description','date')->get();

        return view('site.blog',compact('blogs'));
    }

    public function blogDetails(Blog $blog) //muhammad
    {
        $blog = Blog::where('id',$blog->id)->first();

        return view('site.blog-details',compact('blog'));
    }

    public function contact(Branch $branch)
    {
        $phone = Setting::where('code', 'phone')->first();
        $phone2 = Setting::where('code', 'phone2')->first();
        $email = Setting::where('code', 'email')->first();


        $branch = Branch::where('id',$branch->id)->first();

        return view('site.contact',compact('phone','phone2','email','branch'));
    }

    public function message(ContactRequest $request)
    {
        $request->validated();

        Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'message'=>$request->message
        ]);

        return redirect(route('home'));
    }

    public function appointment(AppointmentRequest $request)
    {
        $request->validated();

        Appointment::create($request->validated());

        return redirect(route('home'));

    }

    public function BookAppointment()
    {
        $questions = Why_us::select('id','description_'.app()->getLocale().' as description')->get();

        return view('site.BookAppointment',compact('questions'));
    }

    public function projects()
    {
        $projects = Project::all();

        return view('site.projects',compact('projects'));
    }

    public function meettings()
    {
        $meettings = Meetting::select('id','photo','video', 'title_'.app()->getLocale().' as title','description_'.app()->getLocale().' as description')->get();

        return view('site.meettings',compact('meettings'));
    }

}
