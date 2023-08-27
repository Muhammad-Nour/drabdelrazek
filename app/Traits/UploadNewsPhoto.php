<?php

namespace App\Traits;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;


trait UploadNewsPhoto
{
    public function UploadNewsPhoto(NewsRequest $request,$folderName)
    {
    	$photo = $request->file('photo')->getClientOriginalName();

        $path  = $request->file('photo')->storeAs($folderName,$photo,'galleries');

        return $path;
    } 
}

