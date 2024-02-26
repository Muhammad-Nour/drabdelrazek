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
    public function create(Service $service)
    {
        return view('admin.services_insta.serviceInsta-add', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceInstructionRequest $request, Service $service)
    {
        $columns = $request->validated();
        $columns['service_id'] = $service->id;
        Service_instruction::create($columns);
        return redirect(route('servicesIsnta.create',$service->id))->with('msg',__('site.addedMessage'));
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
    public function edit($id)
    {
        $serviceInsta = Service_instruction::findOrFail($id);
        return view('admin.services_insta.serviceInsta-edit',compact('serviceInsta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceInstructions  $serviceInstructions
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceInstructionRequest $request, $id)
    {
        $service = Service_instruction::findOrFail($id);
        $service->update($request->validated());

        return redirect(route('servicesIsnta.show',$service->service_id))->with('msg', __('site.updatedMessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceInstructions  $serviceInstructions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service_instruction::findOrFail($id);
        $service->delete();
        return redirect(route('servicesIsnta.show',$service->service_id))->with('msg',__('site.deletedMessage'));
    }
}
