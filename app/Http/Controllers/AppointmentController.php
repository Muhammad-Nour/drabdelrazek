<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Country;
use App\Models\State;
use App\Http\Requests\AppointmentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:appointments', ['only' => ['index']]);
        $this->middleware('permission:add_appointment', ['only' => ['create','store']]);
        $this->middleware('permission:edit_appointment', ['only' => ['edit','update']]);
        $this->middleware('permission:delete_appointment', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointment::paginate(20);

        $countries = Country::all();

        $paginate = true ;

        return view('admin.appointments.appointment-show',compact('appointments','countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $countries = Country::all();

        return view('admin.appointments.appointment-add',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\appointmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {

        Appointment::create($request->validated());

        return redirect(route('appointments.create'))->with('msg',__('site.AppointmentBooked'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\appointments  $appointments
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\appointments  $appointments
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $countries = Country::all();
        $states = State::all();

        return view('admin.appointments.appointment-edit',compact('appointment','states','countries'));
    }


    public function update(AppointmentRequest $request, Appointment $appointment)
    {

        $appointment->update($request->validated());

        return redirect(route('appointments.index'))->with('msg',__('site.updatedMessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\appointments  $appointments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect(route('appointments.index'))->with('msg',__('site.deletedMessage'));
    }
}
