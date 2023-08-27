<?php

namespace App\Traits;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;


trait UploadGallery
{
    public function UploadGallery(ProductRequest $request,$folderName)
    {
        $Gallery = $request->file('gallery')->getClientOriginalName();

        $GalleryPath  = $request->file('gallery')->storeAs($folderName,$Gallery,'galleries');

        return $GalleryPath;
    } 
}

