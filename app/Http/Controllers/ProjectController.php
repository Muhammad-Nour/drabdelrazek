<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectGallery;

use App\Http\Requests\ProjectRequest;
use App\Http\Requests\ProjectGalleryRequest;

use App\Traits\UploadProjectGallery;
use App\Traits\UploadProjectPhoto;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{

    use UploadProjectGallery;
    use UploadProjectPhoto;

    function __construct()
    {
        $this->middleware('permission:projects', ['only' => ['index']]);
        $this->middleware('permission:add_projects', ['only' => ['create','store']]);
        $this->middleware('permission:edit_projects', ['only' => ['edit','update']]);
        $this->middleware('permission:delete_projects', ['only' => ['destroy']]);
        $this->middleware('permission:details_projects', ['only' => ['getDetails']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = project::paginate(20);

        $paginate = true;

        return view('admin.projects.projects-show',compact('projects','paginate'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.projects-add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {

        try {
            DB::beginTransaction();

            $columns = $request->validated();
            if($request->hasFile('photo')){
                $photo = storePhoto($request, 'photo', 'projects');
                $columns['photo'] = $photo;
            }

            $project = Project::create($columns);

            if($request->hasFile('gallery'))
            {
                $files = $request->file('gallery');
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

        return redirect(route('projects.create'))->with('msg',__('site.addedMessage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.projects-edit',compact('project'));
    }


    public function update(ProjectRequest $request, Project $project)
    {
        try {
            $columns = $request->validated();
            if($request->hasFile('photo')){
                deletePhoto($project->photo);
                $photo = storePhoto($request, 'photo', 'projects');
                $columns['photo'] = $photo;
            }
            else{
                unset($columns['photo']);
            }

            $project->update($columns);

        }catch (\Exception $e){
            return back()->withErrors(__('site.someError'))->withInput();
        }

        return redirect(route('projects.index'))->with('msg',__('site.updatedMessage'));
    }

    public function getDetails(Project $project)
    {
        $galleries = $project->galleries;

        return view('admin.projects.projects-details', compact('galleries','project'));

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $galleries = $project->galleries;
        foreach($galleries as $gallery){
            deletePhoto($gallery->photo);
            $gallery->delete();
        }
        deletePhoto($project->photo);
        $project->delete();

        return redirect(route('projects.index'))->with('msg',__('site.deletedMessage'));
    }
}
