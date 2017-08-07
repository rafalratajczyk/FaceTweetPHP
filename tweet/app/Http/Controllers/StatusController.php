<?php

namespace Tweet\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Tweet\Models\Status;
use Tweet\Models\User;

class StatusController extends Controller
{
    public function postStatus(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|max:800',
        ]);

        Auth::user()->statuses()->create([
            'body' => $request->input('status'),
        ]);

        return redirect()
            ->route('welcome')
            ->with('info', 'Status posted already');
    }

    public function postReply(Request $request, $statusId)
    {
        $this->validate($request, [
            "reply-{$statusId}" => 'required|max:800',
        ], [
            'required' => 'The reply is required.'
        ]);

        $status = Status::notReply()->find($statusId);

        if (!$status) {
            return redirect()->route('welcome');
        }

        if (!Auth::user()->isFriendsWith($status->user) && Auth::user()->id !== $status->user->id) {
            return redirect()->route('welcome');
        }

        $reply = Status::create([
            'body' => $request->input("reply-{$statusId}"),
        ])->user()->associate(Auth::user());

        $status->replies()->save($reply);

        return redirect()->back();
    }

    public function getLike($statusId)
    {
        $status = Status::find($statusId);

        if (!$status) {
            return redirect()->route('welcome');
        }

        if (!Auth::user()->isFriendsWith($status->user)) {
            return redirect()->route('welcome');
        }

        if (Auth::user()->hasLikedStatus($status)) {
            return redirect()->back();
        }

        $like = $status->likes()->create([]);

        Auth::user()->likes()->save($like);

        return redirect()->back();
    }
}