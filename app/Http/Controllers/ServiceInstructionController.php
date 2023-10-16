<?php

namespace App\Http\Controllers;

use App\Models\Service_instruction;
use App\Models\Service;
use App\Http\Requests\ServiceInstructionRequest;
use Illuminate\Http\Request;

class ServiceInstructionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services_insta.serviceInsta-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceInstructionRequest $request)
    {        
        // Service_instruction::create($request->validated());
        // return redirect()->back()->withInput()->with('msg',__('addedMessage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceInstructions  $serviceInstructions
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serviceInsta = Service_instruction::where('service_id',$id)->get();

        $service = Service::where('id',$id)->first();

        return view('admin.services_insta.serviceInsta-show',compact('serviceInsta','service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceInstructions  $serviceInstructions
     * @return \Illuminate\Http\Response
     */
    public function edit(Service_instruction $service)
    {
        return view('admin.services_insta.serviceInsta-edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceInstructions  $serviceInstructions
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceInstructionRequest $request, Service_instruction $service)
    {
        $service->update($request->validated());

        return redirect()->back()->withInput()->with('msg', __('site.updatedMessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceInstructions  $serviceInstructions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service_instruction $service)
    {
        $service->delete();
        return redirect()->back()->withInput()->with('msg',__('site.deletedMessage'));
    }
}
