<?php

namespace App\Traits;
use Illuminate\Http\Request;
use App\Http\Requests\BranchRequest;


trait UploadBranchGallery
{
    public function UploadBranchGallery(ProjectRequest $request,$folderName)
    {
        $Gallery = $request->file('gallery')->getClientOriginalName();

        $GalleryPath  = $request->file('gallery')->storeAs($folderName,$Gallery,'galleries');

        return $GalleryPath;
    } 
}

