<?php

namespace App\Http\Controllers;

use App\Friends;
use App\ChatUser;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->chatUser->id;
        $invited = Friends::where('chat_user_id', $id)
                            ->get();
        $received = Friends::where('receiving_user_id', $id)
                            ->get();

        return view('friends.index', compact('invited', 'received'));
    }

    public function find()
    {
        return view('friends.find');
    }

    public function add(ChatUser $chatUser)
    {
        auth()->user()->chatUser->addFriend([
            'receiving_user_id' => $chatUser->id
        ]);
    }

    public function friendship_settings(ChatUser $chatUser1, ChatUser $chatUser2)
    {
        if ($chatUser1->id == $chatUser2->id) {
            $chatUser = $chatUser1;
            return view('friends.settings.myself', compact('chatUser'));

        }
        $chatUser = $chatUser1;
        if ($friends = $chatUser1->are_friends($chatUser2)) {
            if ($friends->confirmed) {
                // friends
                $view = 'friends.settings.friends';
            } else {
                if ($friends->receiving_user_id == $chatUser1->id && $friends->chat_user_id == $chatUser2->id) {
                    // 2nd sent to 1st
                    $chatUser->friend_relation = $friends;
                    $view = 'friends.settings.requested';
                } 
                if ($friends->receiving_user_id == $chatUser2->id && $friends->chat_user_id == $chatUser1->id) {
                    // 1st sent to 2nd
                    $chatUser->friend_relation = $friends;
                    $view = 'friends.settings.requested';
                }
            }
        } else {
            // no friends
           $view = 'friends.settings.nofriends';
        }
        return view("{$view}", compact('chatUser'));
    }

    public function requests()
    {
        $friends = auth()->user()->chatuser->friendships_received->where('confirmed', 0);
        return view('friends.requests', compact('friends'));
    }

    public function confirm($giving_id, $route = null)
    {
        if (null === $route) {
            $route = 'friends.requests';
        }
        $friend_request = auth()->user()->chatUser->friendships_received->where('chat_user_id', $giving_id)->first();
        $friend_request->confirmed = 1;
        $friend_request->touch();
        $friend_request->save();
        return redirect()->route("{$route}");
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Friends  $friends
     * @return \Illuminate\Http\Response
     */
    public function show(Friends $friends)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Friends  $friends
     * @return \Illuminate\Http\Response
     */
    public function edit(Friends $friends)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Friends  $friends
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Friends $friends)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Friends  $friends
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friends $friends)
    {
        //
    }
}
