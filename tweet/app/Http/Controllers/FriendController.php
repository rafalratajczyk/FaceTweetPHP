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

        return view('friends.index')
            ->with('friends', $friends);
    }
}