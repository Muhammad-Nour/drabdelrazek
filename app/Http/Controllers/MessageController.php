<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\MessageRequest;

class MessageController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:messages', ['only' => ['index']]);
        $this->middleware('permission:add_messages', ['only' => ['create','store']]);
        $this->middleware('permission:edit_messages', ['only' => ['edit','update']]);
        $this->middleware('permission:delete_messages', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Message::paginate(20);

        $paginate = true;

        return view('admin.messages.messages-show',compact('messages','paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.messages.messages-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request)
    {
        Message::create($request->validated());

        return redirect(route('messages.create'))->with('msg',__('site.addedMessage'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $Contact
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $Contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        return view('admin.messages.messages-edit',compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $Contact
     * @return \Illuminate\Http\Response
     */
    public function update(MessageRequest $request, Message $message)
    {
        $message->update($request->validated());

        return redirect(route('messages.index'))->with('msg',__('site.updatedMessage'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $Contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $message->delete();

        return redirect(route('messages.index'))->with('msg',__('site.deletedMessage'));
    }
}
