<?php
//storeImage

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

function storePhoto(Request $request, $inputName, $folderName)
{
    $photo = $request->file($inputName)->store($folderName, 'images');
    return $photo;
}

function deletePhoto($photo)
{
    if(Storage::disk('images')->exists($photo)){
        Storage::disk('images')->delete($photo);
    }
}
