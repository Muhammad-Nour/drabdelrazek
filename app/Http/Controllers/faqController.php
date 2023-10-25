<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Http\Requests\FaqRequest;
use Illuminate\Http\Request;

class faqController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:faqs', ['only' => ['index']]);
        $this->middleware('permission:add_faq', ['only' => ['create','store']]);
        $this->middleware('permission:edit_faq', ['only' => ['edit','update']]);
        $this->middleware('permission:delete_faq', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::paginate(10);
        $paginate = true ;
        return view('admin.faqs.faq-show',compact('faqs','paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqs.faq-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FaqRequest $request)
    {
        Faq::create($request->validated());
        return redirect()->back()->withInput()->with('msg',__('site.addedMessage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        $faq = Faq::where('id',$faq->id)->first();
        return view('admin.faqs.faq-edit',compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(FaqRequest $request, Faq $faq)
    {
        $faq->update($request->validated());
        return redirect()->back()->withInput()->with('msg',__('site.updatedMessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $Faq)
    {
        $Faq->delete();
        return redirect()->back()->withInput()->with('msg',__('site.deletedMessage'));
    }
}