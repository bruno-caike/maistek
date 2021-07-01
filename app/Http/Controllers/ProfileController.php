<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        return view('profile.showProfile', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
}
