<?php

namespace App\Traits;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;


trait UploadProjectPhoto
{
    public function UploadProjectPhoto(ProjectRequest $request,$folderName)
    {
    	$photo = $request->file('photo')->getClientOriginalName();

        $path  = $request->file('photo')->storeAs($folderName,$photo,'galleries');

        return $path;
    } 
}

