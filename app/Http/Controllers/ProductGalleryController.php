<?php

namespace App\Http\Controllers;

use App\Models\ProductGallery;
use App\Models\Product;
use Illuminate\Http\Request;

use App\Http\Requests\ProductGalleryRequest;

class ProductGalleryController extends Controller
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
     * @param  \App\Http\Requests\ProductGalleryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGalleryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductGallery  $productGallery
     * @return \Illuminate\Http\Response
     */
    public function show(ProductGallery $productGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductGallery  $productGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductGallery $gallery)
    {

        return view('admin.products.product-edit-gallery-image',
            compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ProductGalleryRequest  $request
     * @param  \App\Models\ProductGallery  $productGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductGallery $gallery)
    {
        if($request->hasFile('gallery'))
        {
            $file = $request->file('gallery');

            $filename = $file->getClientOriginalName();

            $path  = $file->storeAs('admin',$filename,'galleries');

            $gallery->update([
                'photo' => $path,
            ]);
        }
        
        return redirect(route('product.details',$gallery->product_id))->with('msg',__('site.updatedMessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductGallery  $productGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductGallery $gallery)
    {
        $gallery->delete();

        return redirect()->back()->withInput()->with('msg',__('site.deletedMessage'));


    }
}
