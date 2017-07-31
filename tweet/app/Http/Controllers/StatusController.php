<?php

namespace Tweet\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
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
}