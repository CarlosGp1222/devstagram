<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    // store
    public function store(User $user,Request $request) {
        $user->followers()->attach(auth()->user()->id);
        return back();
    }

    // destroy
    public function destroy(User $user,Request $request) {
        $user->followers()->detach(auth()->user()->id);
        return back();
    }
}
