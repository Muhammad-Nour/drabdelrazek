<?php

namespace App\Traits;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectRequest;


trait UploadProjectGallery
{
    public function UploadProjectGallery(ProjectRequest $request,$folderName)
    {
        $Gallery = $request->file('gallery')->getClientOriginalName();

        $GalleryPath  = $request->file('gallery')->storeAs($folderName,$Gallery,'galleries');

        return $GalleryPath;
    } 
}

