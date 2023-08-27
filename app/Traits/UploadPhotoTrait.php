<?php

namespace App\Traits;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;


trait UploadPhotoTrait
{
    public function UploadPhotoTrait(Request $request,$folderName)
    {
    	$photo = $request->file('photo')->getClientOriginalName();

        $path  = $request->file('photo')->storeAs($folderName,$photo,'galleries');

        return $path;
    } 
}

