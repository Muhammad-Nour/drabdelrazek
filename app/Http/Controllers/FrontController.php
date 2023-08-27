<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Custom;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Project;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Blog;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $sliders = Slider::select('id','photo', 'title_'.app()->getLocale().' as name','description_'.app()->getLocale().' as description')->get();

        $services = Service::select('id','photo', 'title_'.app()->getLocale().' as name','description_'.app()->getLocale().' as description')->get();

        $testimonials = Testimonial::select('id','photo','name',
            'description_'.app()->getLocale().' as description','position_'.app()->getLocale().' as position')->get();

        $about = Custom::select('id','photo', 'description_'.app()->getLocale().' as description')->where('code', 'about')->first();
        $address = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'address')->first();
        $secret1 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secret1')->first();
        $secret2 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secret2')->first();
        $secret3 = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secret3')->first();
        $secrets_video = Custom::select('id', 'description_'.app()->getLocale().' as description')->where('code', 'secrets_video')->first();
        $secrets_photo = Custom::select('id','photo')->where('code', 'secrets_photo')->first();

        $projects = Project::select('id','photo', 'name_'.app()->getLocale().' as name','description_'.app()->getLocale().' as description')->get();

        $blogs = Blog::select('id','photo','description_'.app()->getLocale().' as description')->get();


        $phone = Setting::where('code', 'phone')->first();
        $facebook = Setting::where('code', 'facebook')->first();
        $LinkedIn = Setting::where('code', 'LinkedIn')->first();
        $WhatsApp = Setting::where('code', 'WhatsApp')->first();

        

        return view('site.home-page.home-page', 
            compact('sliders','services','testimonials','about','address','phone','facebook','LinkedIn','WhatsApp','secret1','secret2','secret3','secrets_video','projects','secrets_photo','blogs'));
    }

    public function about()
    {
        return view('site.about');
    }

    public function contact()
    {
        $phone = Setting::where('code', 'phone')->first();
        $phone2 = Setting::where('code', 'phone2')->first();
        $email = Setting::where('code', 'email')->first();

        return view('site.contact',compact('phone','phone2','email'));
    }

}