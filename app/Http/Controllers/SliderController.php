<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\SliderRequest;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:sliders', ['only' => ['index']]);
        $this->middleware('permission:add_sliders', ['only' => ['create','store']]);
        $this->middleware('permission:edit_sliders', ['only' => ['edit','update']]);
        $this->middleware('permission:delete_sliders', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('admin.sliders.slider-show',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.slider-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        try {
            $columns = $request->validated();
            if($request->hasFile('photo')){
                $photo = storePhoto($request, 'photo', 'sliders');
                $columns['photo'] = $photo;
            }

            Slider::create($columns);

        }catch (\Exception $e){
            return back()->withErrors(__('site.someError'))->withInput();
        }

        return redirect(route('sliders.index'))->with('msg',__('site.addedMessage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.slider-edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, Slider $slider)
    {
        try {
            $columns = $request->validated();
            if($request->hasFile('photo')){
                deletePhoto($slider->photo);
                $photo = storePhoto($request, 'photo', 'sliders');
                $columns['photo'] = $photo;
            }
            else{
                unset($columns['photo']);
            }

            $slider->update($columns);

        }catch (\Exception $e){
            return back()->withErrors(__('site.someError'))->withInput();
        }

        return redirect(route('sliders.index'))->with('msg',__('site.updatedMessage'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        deletePhoto($slider->photo);
        $slider->delete();

        return redirect(route('sliders.index'))->with('msg',__('site.deletedMessage'));
    }
}
