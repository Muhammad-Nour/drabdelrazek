<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\BranchGallery;

use App\Http\Requests\BranchRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:branches', ['only' => ['index']]);
        $this->middleware('permission:add_branches', ['only' => ['create','store']]);
        $this->middleware('permission:edit_branches', ['only' => ['edit','update']]);
        $this->middleware('permission:delete_branches', ['only' => ['destroy']]);
        $this->middleware('permission:details_branches', ['only' => ['getDetails']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::paginate(10);

        $paginate = true ;

        return view('admin.branches.branches-show',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.branches.branches-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBranchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BranchRequest $request)
    {
        DB::beginTransaction();

        $request->validated();

        Branch::create([
            'name_ar'=>$request->name_ar,
            'address_ar'=>$request->address_ar,
            'description_ar'=>$request->description_ar,
            'map'=>$request->map,
            'admin_id' => Auth::user()->id,
        ]);

        DB::commit();

        return redirect(route('branches.create'))->with('msg',__('site.addedMessage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $Branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $Branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        return view('admin.branches.branches-edit',compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBranchRequest  $request
     * @param  \App\Models\Branch  $Branch
     * @return \Illuminate\Http\Response
     */
    public function update(BranchRequest $request, Branch $branch)
    {
            $request->validated();
            $branch->update([
                'name_ar'=>$request->name_ar,
                'address_ar'=>$request->address_ar,
                'description_ar'=>$request->description_ar,
                'map'=>$request->map,
                'updated_by' => Auth::user()->id,
            ]);
        

        return redirect(route('branches.index'))->with('msg',__('site.updatedMessage'));

    }

    public function getDetails(Branch $branch)
    {
        $galleries = BranchGallery::where('branch_id',$branch->id)->get();

        $branches = Branch::where('id',$branch->id)->get();

        return view('admin.branches.branches-details',
            compact('galleries','branch','branches'));
    }

    // public function addImage(Branch $branch , Request $request)
    // {
    //     if($request->hasFile('gallery'))
    //     {
    //         $files = $request->file('gallery');

    //         foreach($files as $file){

    //             $filename = $file->getClientOriginalName();

    //             $path  = $file->storeAs('branches',$filename,'galleries');

    //             BranchGallery::create([
    //                 'branch_id' => $request->branch_id,
    //                 'photo' => $path,
    //                 'admin_id' => Auth::user()->id,
    //             ]);
    //         }
    //     }
    //     return redirect()->back()->withInput()->with('msg',__('site.addedMessage'));
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $Branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();

        return redirect(route('branches.index'))->with('msg',__('site.deletedMessage'));
    }
}
