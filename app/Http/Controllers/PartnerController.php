<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Http\Requests\PartnerRequest;

class PartnerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:partners', ['only' => ['index']]);
        $this->middleware('permission:add_partners', ['only' => ['create','store']]);
        $this->middleware('permission:edit_partners', ['only' => ['edit','update']]);
        $this->middleware('permission:delete_partners', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners = Partner::paginate(20);

        $paginate = true;

        return view('admin.partners.partners-show',compact('partners','paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.partners.partners-add');
    }


    public function store(PartnerRequest $request)
    {
        $columns = $request->validated();
        if($request->hasFile('photo')){
            $photo = storePhoto($request, 'photo', 'partners');
            $columns['photo'] = $photo;
        }

        Partner::create($columns);

        return redirect(route('partners.create'))->with('msg',__('site.addedMessage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.partners-edit',compact('partner'));
    }


    public function update(PartnerRequest $request, Partner $partner)
    {
        try {
            $columns = $request->validated();
            if($request->hasFile('photo')){
                deletePhoto($partner->photo);
                $photo = storePhoto($request, 'photo', 'partners');
                $columns['photo'] = $photo;
            }
            else{
                unset($columns['photo']);
            }

            $partner->update($columns);
            
        }catch (\Exception $e){
            return back()->withErrors(__('site.someError'))->withInput();
        }

        return redirect(route('partners.index'))->with('msg',__('site.updatedMessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        deletePhoto($partner->photo);
        $partner->delete();

        return redirect(route('partners.index'))->with('msg',__('site.deletedMessage'));
    }
}
