<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FollowController extends Controller
{

    public function follow(Request $request)
    {
        $userToFollow = User::find($request->input('user_id'));
    
        if (!$userToFollow) {
            return response()->json(['error' => 'User not found'], 404);
         }
    
        // フォローのロジックを実装
        Auth::user()->follow($userToFollow);
    
        return response()->json(['message' => 'Followed successfully']);
    }
    
    public function unfollow(Request $request)
    {
        $userToUnfollow = User::find($request->input('user_id'));
    
        if (!$userToUnfollow) {
            return response()->json(['error' => 'User not found'], 404);
            
        }    
        Auth::user()->unfollow($userToUnfollow);

        return response()->json(['message' => 'Unfollowed successfully']);
    
    }
    
 
}
