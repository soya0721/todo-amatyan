<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function index()
    {
       $posts = Post::all();
       return view('posts.index', ['posts' => $posts]);
    }

    function create()
    {
        return view('posts.create');
    }

    function store(Request $request)
    {
         $post = new Post;
         $post -> title = $request->title;
         $post -> contents = $request->body;
         $post -> image_at = $request->image;
         $post -> user_id = Auth::id();

         $post -> save();
         return redirect()->route('posts.index');
    }
}