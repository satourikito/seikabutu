<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserController extends Controller
{
   public function show(User $user)
     {

        return view('profile.user')->with(['user'=>$user]);


        $followingsCount = $user->followings->count();
        $followersCount = $user->followers->count();
     }
}
