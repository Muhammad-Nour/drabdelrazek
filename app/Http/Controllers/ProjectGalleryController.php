<?php

namespace App\Http\Controllers;

use App\Models\ProjectGallery;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\ProjectGalleryRequest;
use App\Traits\UploadProjectGallery;
use App\Traits\UploadProjectPhoto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProjectGalleryController extends Controller
{
    use UploadProjectGallery;
    use UploadProjectPhoto;
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


    public function store(ProjectGalleryRequest $request, Project $project)
    {
        try {
            DB::beginTransaction();

            if($request->hasFile('photo'))
            {
                $files = $request->file('photo');
                foreach($files as $file){
                    $photo = $file->store('projects', 'images');
                    ProjectGallery::create([
                        'project_id' => $project->id,
                        'photo' => $photo,
                        'admin_id' => Auth::user()->id
                    ]);
                }
            }

            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            return back()->withErrors(__('site.someError'))->withInput();
        }

        return redirect(route('project.details',$project->id))->with('msg',__('site.addedMessage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectGallery  $projectGallery
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectGallery $projectGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectGallery  $projectGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectGallery $gallery)
    {
        return view('admin.projects.projects-edit-gallery',compact('gallery'));
    }



    public function update(ProjectGalleryRequest $request, ProjectGallery $gallery)
    {
        try {
            if($request->hasFile('photo')){
                deletePhoto($gallery->photo);
                $photo = storePhoto($request, 'photo', 'projects');
                $gallery->update([
                    'photo' => $photo,
                    'updated_by' => Auth::user()->id
                ]);

            }

        }catch (\Exception $e){
            return back()->withErrors(__('site.someError'))->withInput();
        }

        return redirect(route('project.details',$gallery->project_id))->with('msg',__('site.updatedMessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectGallery  $projectGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectGallery $gallery)
    {
        deletePhoto($gallery->photo);
        $gallery->delete();

        return redirect(route('project.details',$gallery->project_id))->with('msg',__('site.deletedMessage'));
    }
}
