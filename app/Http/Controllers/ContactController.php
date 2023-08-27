<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:contacts', ['only' => ['index']]);
        $this->middleware('permission:add_contacts', ['only' => ['create','store']]);
        $this->middleware('permission:edit_contacts', ['only' => ['edit','update']]);
        $this->middleware('permission:delete_contacts', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::paginate(20);

        $paginate = true;

        return view('admin.contacts.contacts-show',compact('contacts','paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contacts.contacts-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        Contact::create($request->validated());

        return redirect(route('contacts.create'))->with('msg',__('site.addedMessage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $Contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $Contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('admin.contacts.contacts-edit',compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $Contact
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $contact->update($request->validated());

        return redirect(route('contacts.index'))->with('msg',__('site.updatedMessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $Contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect(route('contacts.index'))->with('msg',__('site.deletedMessage'));
    }
}
