<?php

namespace App\Http\Controllers;

use App\Models\BranchGallery;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Http\Requests\BranchGalleryRequest;
use Illuminate\Support\Facades\Auth;

class BranchGalleryController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BranchGalleryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchGalleryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BranchGallery  $branchGallery
     * @return \Illuminate\Http\Response
     */
    public function show(BranchGallery $branchGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BranchGallery  $branchGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(BranchGallery $branchGallery)
    {
        return view('admin.branches.edit-gallery',compact('branchGallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBranchGalleryRequest  $request
     * @param  \App\Models\BranchGallery  $branchGallery
     * @return \Illuminate\Http\Response
     */
    public function update(BranchGalleryRequest $request, BranchGallery $branchGallery)
    {
        if($request->hasFile('gallery'))
        {
            $file = $request->file('gallery');

            $filename = $file->getClientOriginalName();

            $path  = $file->storeAs('branches',$filename,'galleries');

            $branchGallery->update([
                'photo'         => $path,
                'updated_by'    =>Auth::user()->id
            ]);
        }
        return redirect(route('branch.details',$branchGallery->branch_id))->with('msg',__('site.updatedMessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BranchGallery  $branchGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(BranchGallery $branchGallery)
    {
        $branchGallery->delete();
        return redirect()->back()->withInput()->with('msg',__('site.deletedMessage'));
    }
}
