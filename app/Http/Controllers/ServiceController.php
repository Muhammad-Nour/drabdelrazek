<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Category;
use App\Http\Requests\ServiceRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::paginate(20);
        $paginate = true;
        return view('admin.services.service-show',compact('paginate','services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.services.service-add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $columns = $request->validated();
        if($request->hasFile('photo')){
            $photo = storePhoto($request, 'photo', 'services');
            $columns['photo'] = $photo;
        }

        Service::create($columns);

        return redirect(route('services.create'))->with('msg',__('site.addedMessage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $categories = Category::all();
        return view('admin.services.service-edit',compact('service' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $columns = $request->validated();
        if($request->hasFile('photo')){
            deletePhoto($service->photo);
            $photo = storePhoto($request, 'photo', 'services');
            $columns['photo'] = $photo;
        }
        else{
            unset($columns['photo']);
        }

        $service->update($columns);

        return redirect(route('services.index'))->with('msg',__('site.updatedMessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect(route('services.index'))->with('msg',__('site.deletedMessage'));
    }
}
