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
use App\Models\Contact;
use App\Models\Testimonial;
use App\Models\Branch;
use App\Models\Why_us;
use App\Http\Requests\AppointmentRequest; //muhammad
use App\Http\Requests\MessageRequest;
use App\Models\Appointment; //muhammad
use App\Http\Requests\ContactRequest;
use App\Models\Meetting;
use App\Models\Message;
use App\Models\Country;
use App\Models\State;
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
        $about_video = Custom::select('id', 'description_'.app()->getLocale().' as description','photo')->where('code', 'about_video')->first(); //muhammad

        $projects = Project::select('id','photo', 'name_'.app()->getLocale().' as name','description_'.app()->getLocale().' as description')->get();

        $blogs = Blog::select('id','photo','description_'.app()->getLocale().' as description','title_'.app()->getLocale().' as title')->get();
        $questions = Why_us::select('id','description_'.app()->getLocale().' as description')->get();

        $branches = Branch::select('id', 'description_'.app()->getLocale().' as description',
            'name_'.app()->getLocale().' as name','address_'.app()->getLocale().' as address')->get();

        $countries = Country::all();

        $phone = Setting::where('code', 'phone')->first();
        $phone2 = Setting::where('code', 'phone2')->first();
        $facebook = Setting::where('code', 'facebook')->first();
        $instgram = Setting::where('code', 'instgram')->first();
        $LinkedIn = Setting::where('code', 'LinkedIn')->first();
        $WhatsApp = Setting::where('code', 'WhatsApp')->first();
        $dr_name = Custom::where('code', 'dr_name')->first();
        $bio = Custom::where('code', 'bio')->first();


        return view('site.home-page.home-page',
            compact('sliders','services','testimonials','about','address','phone','phone2','facebook','instgram','WhatsApp',
                'about_video','projects','blogs','bio','dr_name','questions','branches','meettings','countries'));

    }

    public function about()
    {
        $questions = Why_us::select('id','description_'.app()->getLocale().' as description')->get();
        $about_video = Custom::select('id', 'description_'.app()->getLocale().' as description','photo')
        ->where('code', 'about_video')->first();
        $about       = Custom::select('id','photo', 'description_'.app()->getLocale().' as description')
        ->where('code', 'about')->first();
        $dr_name     = Custom::where('code', 'dr_name')->first();
        $testimonials = Testimonial::select('id','photo','name','description_'.app()->getLocale().' as description',
            'position_'.app()->getLocale().' as position')->get();
        $blogs = Blog::select('id','photo','description_'.app()->getLocale().' as description','title_'.app()
            ->getLocale().' as title')->get();
        $phone      = Setting::where('code', 'phone')->first();
        $phone2     = Setting::where('code', 'phone2')->first();
        return view('site.about',compact('questions','about_video','about','dr_name','testimonials','blogs','phone','phone2'));
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

    public function message(MessageRequest $request)
    {
        $request->validated();

        Message::create($request->validated());

        return redirect()->back()->withInput()->with('msg',__('site.MessageSent'));

    }
    //muhammad

    public function appointment(AppointmentRequest $request)
    {
        Appointment::create($request->validated());

        $data = [
            "login"=> "other",
            "password"=> "123"
        ];
        $json_data = json_encode($data);
        $url = "http://207.180.235.35:6027/api/http/login";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER,
            array(
                'Content-Type: text/plain',
            )
        );
        $response = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($response, true);
        
        if ($response['code'] == 200){
            $data = [
                "name"=> "حجز",
                "contact_name"=> $request->name,
                "phone"=> $request->phone,
                "country_id"=> $request->country_id,
                "state_id"=> $request->state_id,
                "city"=> $request->city,
                "height"=> $request->height,
                "weight"=> $request->weight,
            ];
            $json_data = json_encode($data);
            $url = "http://207.180.235.35:6027/api/http/create_crm_lead_from_api";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER,
                array(
                    'Content-Type: text/plain',
                    'Authorization: Bearer ' . $response["data"]["token"],
                )
            );
            $response = curl_exec($ch);
            curl_close($ch);
        }

        return redirect(route('front.BookAppointment'))->withInput()->with('msg',__('site.AppointmentBooked'));

    }

    public function BookAppointment()
    {
        $questions = Why_us::select('id','description_'.app()->getLocale().' as description')->get();

        $states = State::all();

        $countries = Country::all();

        return view('site.BookAppointment',compact('questions','countries','states'));
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

//ahmed
    public function service(Category $category)
    {
        $services = $category->services()->select('id','photo', 'title_'.app()->getLocale().' as name','description_'.app()->getLocale().' as description')->get();
        return view('site.services', compact('services','category'));
    }

    public function serviceDetails(Service $service)
    {
        $instructions = $service->serviceinsta;
        return view('site.service-details', compact('service', 'instructions'));
    }

}
