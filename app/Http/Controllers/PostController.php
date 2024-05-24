<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    function index()
    {
       $post = Post::all();
       return view('posts.index', ['post' => $post]);
    }

    function create()
    {
        return view('posts.create');
    }

    function store(Request $request)
    {
         $post = new Post;
         $post -> title = $request->title;
         $post -> body = $request->body;
        //  $post -> img = $request->img;
         $post -> user_id = Auth::id();

         $post -> save();
         return redirect()->route('posts.index');
    }
}