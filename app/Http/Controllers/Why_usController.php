<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Why_us;
use App\Http\Requests\Why_usRequest;

class Why_usController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:why_us', ['only' => ['index']]);
        $this->middleware('permission:add_why_us', ['only' => ['create','store']]);
        $this->middleware('permission:edit_why_us', ['only' => ['edit','update']]);
        $this->middleware('permission:delete_why_us', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $why_us = Why_us::paginate(20);
        $paginate = true ;
        return view('admin.why_us.why-show',compact('why_us','paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.why_us.why-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Why_usRequest $request)
    {
        Why_us::create($request->validated());
        return redirect()->back()->withinput()->with('msg',__('site.addedMessage'));
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
    public function edit(Why_us $why)
    {
        return view('admin.why_us.why-edit',compact('why'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Why_usRequest $request , Why_us $why)
    {
        $why->update($request->validated());
        return redirect()->route('whys.index')->withInput()->with('msg',__('site.updatedMessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Why_us $why)
    {
        $why->delete();
        return redirect()->back()->withInput()->with('msg',__('site.deletedMessage'));   
    }
}
