<?php

namespace App\Http\Controllers;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Requests\CountryRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware('permission:countries', ['only' => ['index']]);
        $this->middleware('permission:add_countries', ['only' => ['create','store']]);
        $this->middleware('permission:edit_countries', ['only' => ['edit','update']]);
        $this->middleware('permission:delete_countries', ['only' => ['destroy']]);
    }
    public function index()
    {
        $countries = Country::paginate(10);

        $paginate = true ;

        return view('admin.countries.country-show',compact('countries'));
    }

    public function state(Request $request)
    {
        $country = Country::findOrFail($request->country_id);
        $states = $country->state;
        return view('site._country-state', compact('states'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.country-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {
        DB::beginTransaction();

        $request->validated();

        Country::create([
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
            'country_code'=>$request->country_code,
            'code'=>$request->code,
            'admin_id' => Auth::user()->id,
        ]);

        DB::commit();

        return redirect(route('countries.create'))->with('msg',__('site.addedMessage'));
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
    public function edit(Country $country)
    {
        return view('admin.countries.country-edit',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, Country $country)
    {
            $request->validated();
            $country->update([
                'name_ar'=>$request->name_ar,
                'name_en'=>$request->name_en,
                'country_code'=>$request->country_code,
                'code'=>$request->code,
                'admin_id' => Auth::user()->id,
            ]);
        

        return redirect(route('countries.index'))->with('msg',__('site.updatedMessage'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();

        return redirect(route('countries.index'))->with('msg',__('site.deletedMessage'));
    }
}
