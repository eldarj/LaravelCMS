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
        $uploaded = [];
        if ($request->avatar) {
            $uploaded = [
                'field' => 'avatar', 
                'dest' => 'images/users/profiles/upload/icon', 
                'file' => $request->avatar
            ];
        }
        if ($request->cover_photo) {
            $uploaded = [
                'field' => 'cover_photo', 
                'dest' => 'images/users/profiles/upload/covers', 
                'file' => $request->cover_photo
            ];
        }
        if ($uploaded) {
            // Generate paths
            // $generateFileName = $request->user_id . md5_file($uploaded['file']) . now()->format('his') . 
            //             "." . $uploaded['file']->getClientOriginalExtension();
            $generateFileName = $request->user_id . 
                        "." . $uploaded['file']->getClientOriginalExtension();

            // Upload file
            $uploaded['file']->move($uploaded['dest'], $generateFileName);
            
            // Store path in db
            $chatUser->{$uploaded["field"]} = '/' . $uploaded['dest'] . '/' . $generateFileName;
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
