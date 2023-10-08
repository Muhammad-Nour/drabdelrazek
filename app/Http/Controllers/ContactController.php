<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\ContactMessageRequest;

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
        $contacts = Message::paginate(20);

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
    public function store(ContactMessageRequest $request)
    {
        Message::create($request->validated());

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
    public function edit(Message $contact)
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
    public function update(ContactMessageRequest $request, Message $contact)
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
    public function destroy(Message $contact)
    {
        $contact->delete();

        return redirect(route('contacts.index'))->with('msg',__('site.deletedMessage'));
    }
}
