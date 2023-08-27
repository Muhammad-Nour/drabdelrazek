<?php

namespace App\Traits;
use Illuminate\Http\Request;
use App\Http\Requests\CustomRequest;


trait UploadPhotoCustom
{
    public function UploadPhotoCustom(Request $request,$folderName)
    {
    	$photo = $request->file('photo')->getClientOriginalName();

        $path  = $request->file('photo')->storeAs($folderName,$photo,'galleries');

        return $path;
    } 
}

