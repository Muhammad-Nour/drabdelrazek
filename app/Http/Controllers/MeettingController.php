<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\MeettingRequest;

use App\Models\Meetting;

class MeettingController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:meettings', ['only' => ['index']]);
        $this->middleware('permission:add_meetting', ['only' => ['create','store']]);
        $this->middleware('permission:edit_meetting', ['only' => ['edit','update']]);
        $this->middleware('permission:delete_meetting', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meettings = Meetting::paginate(20);

        return view('admin.meettings.meetting-show',compact('meettings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.meettings.meetting-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeettingRequest $request)
    {
        $columns = $request->validated();
        if($request->hasFile('photo')){
            $photo = storePhoto($request, 'photo', 'meettings');
            $columns['photo'] = $photo;
        }

        Meetting::create($columns);

        return redirect()->back()->withInput()->with('msg',__('site.addedMessage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Meetting $meetting)
    {
        $meetting = Meetting::where('id',$meetting->id)->first();
        return view('admin.meettings.meetting-edit',compact('meetting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MeettingRequest $request, Meetting $meetting)
    {
        $columns = $request->validated();
        if($request->hasFile('photo')){
            deletePhoto($meetting->photo);
            $photo = storePhoto($request, 'photo', 'meettings');
            $columns['photo'] = $photo;
        }
        else{
            unset($columns['photo']);
        }

        $meetting->update($columns);
        return redirect()->back()->withInput()->with('msg',__('site.updatedMessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meetting $meetting)
    {
        $meetting->delete();
        return redirect()->back()->withInput()->with('msg',__('site.deletedMessage'));
    }
}
