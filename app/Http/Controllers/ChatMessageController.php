<?php

namespace App\Http\Controllers;

use App\ChatMessage;
use App\ChatUser;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ChatMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = ChatMessage::all();
        for ($i = 1; $i < count($messages); $i++) {
                if ($messages[$i - 1]->user->chatUser->avatar === $messages[$i]->user->chatUser->avatar) {
                    $messages[$i]->hideimg = true;
                    if ($messages[$i - 1]->created_at->toDateString() === $messages[$i]->created_at->toDateString()) {
                        $messages[$i - 1]->hidetimestamp = true;
                    }
                }
        }
        return view('chat.index', compact('messages'));
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
    public function store()
    {
        $this->validate(request(), [
            'message_text' => 'required|min:2|max:150'
        ]);

        ChatMessage::create([
            'message_text' => request('message_text'),
            'user_id' => auth()->user()->id
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChatMessage  $chatMessage
     * @return \Illuminate\Http\Response
     */
    public function show(ChatMessage $chatMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChatMessage  $chatMessage
     * @return \Illuminate\Http\Response
     */
    public function edit(ChatMessage $chatMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ChatMessage  $chatMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChatMessage $chatMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChatMessage  $chatMessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChatMessage $chatMessage)
    {
        //
    }
}
