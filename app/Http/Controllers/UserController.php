<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
   public function show(User $user)
     {

        return view('profile.user')->with(['user'=>$user]);


        $followingsCount = $user->followings->count();
        $followersCount = $user->followers->count();
     }
}
