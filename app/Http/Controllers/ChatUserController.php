<?php

namespace App\Http\Controllers;

use App\User;
use App\ChatUser;
use App\Tag;

use Illuminate\Http\Request;

class ChatUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ChatUser $chatUser)
    {
        return view ('chat.profile', compact('chatUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()) {
            return redirect()->route('register');
        }
        if ($chatUser = auth()->user()->chatUser) {
            return redirect()->route('profile', compact('chatUser'));
        }
        return view('chat.signup');
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
            'name' => 'required|min:3|max:25',
        ]);
        $newChatUser = new ChatUser(request(['name']));
        auth()->user()->registerOnChat($newChatUser);

        // redirect to index view
        return redirect()->route('profile', ['chatUser' => $newChatUser]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChatUser  $chatUser
     * @return \Illuminate\Http\Response
     */
    public function show(ChatUser $chatUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChatUser  $chatUser
     * @return \Illuminate\Http\Response
     */
    public function edit(ChatUser $chatUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ChatUser  $chatUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Update all data
        $chatUser = ChatUser::find(request('user_id'));
        $chatUser->update(request()->all());

        // Check for uploaded files
        if ($request->avatar) {
            $generateFileName = $request->user_id . 
                        "." . $request->avatar->getClientOriginalExtension();
            // Upload file
            $request->avatar->move('images/users/profiles/upload/icon', $generateFileName);
            // Store path in db
            $chatUser->avatar = '/' . 'images/users/profiles/upload/icon' . '/' . $generateFileName;
        }
        if ($request->cover_photo) {
            $generateFileName = $request->user_id . 
                        "." . $request->cover_photo->getClientOriginalExtension();
            // Upload file
            $request->cover_photo->move('images/users/profiles/upload/covers', $generateFileName);
            // Store path in db
            $chatUser->cover_photo = '/' . 'images/users/profiles/upload/covers' . '/' . $generateFileName;
        }
        if ($request->avatar || $request->cover_photo) {
            $chatUser->save();
        }
        return redirect()->route('profile', compact('chatUser'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChatUser  $chatUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChatUser $chatUser)
    {
        //
    }
}
