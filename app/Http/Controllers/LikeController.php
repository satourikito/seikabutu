<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;


class LikeController extends Controller
{
    public function like(Request $request)
    {
        $user_id = Auth::id();
        $post_id = $request->post_id;
        $already_liked = Like::where('user_id', $user_id)->where('post_id', $post_id)->first();
    
        if (!$already_liked) {
            $like = new Like;
            $like->post_id = $post_id;
            $like->user_id = $user_id;
            $like->save();
        } else {
            Like::where('post_id', $post_id)->where('user_id', $user_id)->delete();
        }
        
        $post = Post::where('id', $post_id)->first();
        $post_likes_count = $post->likes->count();
        $param = [
            'likes_count' => $post_likes_count,
        ];
        return response()->json($param);
       //return redirect('/posts/' . $post->id);
       
    }
    
    public function __construct()
    {
        // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }
    
    
   
}
