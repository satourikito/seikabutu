<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Like;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->get()]);  
    }
    
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
     public function login()
    {
        return view('auth.register');
    }
    
    public function create(Category $category)
    {
        return view('posts.create')->with(['categories' => $category->get()]);
    }
   public function store(PostRequest $request,Post $post)
  {
      $post->user_id = \Auth::id();
      $input = $request['post'];
      $post->fill($input)->save();
      //return redirect('/');
      return redirect('/posts/' . $post->id);
  }
}
?>