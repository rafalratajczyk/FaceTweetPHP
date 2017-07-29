<?php

namespace Tweet\Http\Controllers;

use Auth;
use Tweet\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function getIndex()
    {
        $friends = Auth::user()->friends();
        $requests = Auth::user()->friendRequests();

        return view('friends.index')
            ->with('friends', $friends)
            ->with('requests', $requests);
    }

    public function getAdd($username)
    {
        $user = User::where('username', $username)->first();

        if (!$user) {
            return redirect()
                ->route('welcome')
                ->with('info', 'User not found');
        }

        if (Auth::user()->hasFriendRequestPending($user) || $user->hasFriendRequestPending(Auth::user())) {
            return redirect()
                ->route('profile.index', ['username' => $user->username])
                ->with('info', 'Friend request already pending.');
        }

        if (Auth::user()->isFriendsWith($user)) {
            return redirect()
                ->route('profile.index', ['username' => $user->username])
                ->with('info', 'You already are friends.');
        }

        Auth::user()->addFriend($user);

        return redirect()
            ->route('profile.index', ['username' => $username])
            ->with('info', 'Friend request sent.');
    }
}