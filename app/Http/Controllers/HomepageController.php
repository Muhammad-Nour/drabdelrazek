<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $sliders = Slider::get();
        return view('site.home-page.home-page', compact('sliders'));
    }
}
