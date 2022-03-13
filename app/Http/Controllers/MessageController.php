<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Have to paginate sorted collection
        /*
        $msg = Message::paginate(2);
        $messages = $msg->sortByDesc('created_at', SORT_DESC);
        */
        /*
        $msg = Message::all()->sortByDesc('created_at', SORT_DESC);
        $messages = $msg->paginate(perPage: 10);
        */
        $messages = Message::paginate(10);

        return view('admin.messages.messages', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $msg = new Message();
        $msg->user_id = Auth::user()->id;
        $msg->email = $request->email;
        $msg->object = $request->object;
        $msg->message = $request->message;
        $msg->save();

        //envoi un message de confirmation au server --- broadcast de l'event en temps reel
        return redirect()->back()->with('message', 'Message sent successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        $msg = Message::find($message)->first();
        return view('admin.messages.messageShow')->with('msg', $msg);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
