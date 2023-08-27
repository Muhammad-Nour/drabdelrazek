<?php

namespace App\Traits;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;


trait UploadSmallImage
{
    public function UploadSmallImage(Request $request,$folderName)
    {
        $smallphoto = $request->file('smallPhoto')->getClientOriginalName();

        $smallImagePath  = $request->file('smallPhoto')->storeAs($folderName,$smallphoto,'galleries');

        return $smallImagePath;
    } 
}

