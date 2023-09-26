<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow(Request $request)
    {
         // Controllerでの記述例
        $followings = Auth::user()->followings()->get(); // 自分がフォローしているユーザーを取得
        $followers = Auth::user()->followers()->get(); // 自分のフォロワーを取得
    }
    
    public function unfollow(Request $request)
    {
        // アンフォローのロジックを実装
    }
 
}
