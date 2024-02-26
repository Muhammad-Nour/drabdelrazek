<?php

namespace App\Http\Controllers;
use App\Models\State;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Requests\StateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StateController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:states', ['only' => ['index']]);
        $this->middleware('permission:add_states', ['only' => ['create','store']]);
        $this->middleware('permission:edit_states', ['only' => ['edit','update']]);
        $this->middleware('permission:delete_states', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();

        $states = State::paginate(10);

        $paginate = true ;

        return view('admin.states.state-show',compact('states','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();

        return view('admin.states.state-add',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StateRequest $request)
    {
        DB::beginTransaction();

        $request->validated();

        State::create([
            'name_ar'   =>$request->name_ar,
            'name_en'   =>$request->name_en,
            'state_code'=>$request->state_code,
            'code'      =>$request->code,
            'country_id'=>$request->country_id,
            'admin_id'  => Auth::user()->id,
        ]);

        DB::commit();

        return redirect(route('states.create'))->with('msg',__('site.addedMessage'));
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
    public function edit(State $state)
    {
        $countries = Country::all();

        return view('admin.states.state-edit',compact('state','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StateRequest $request, State $state)
    {
            $request->validated();
            $state->update([
                'name_ar'=>$request->name_ar,
                'name_en'=>$request->name_en,
                'state_code'=>$request->state_code,
                'country_id'=>$request->country_id,
                'code'=>$request->code,
                'admin_id' => Auth::user()->id,
            ]);
        

        return redirect(route('states.index'))->with('msg',__('site.updatedMessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();

        return redirect(route('states.index'))->with('msg',__('site.deletedMessage'));
    }
}
