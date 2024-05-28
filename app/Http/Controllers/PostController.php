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

        $request->validate([
            'title' => 'required|string|max:30',    // 'title' フィールドは必須で、文字列かつ最大30文字
            'body' => 'required|string|max:140',    // 'body' フィールドは必須で、文字列かつ最大140文字
        ], [
            'title.required' => 'タスク名を入力してください。',         // 'title' フィールドが入力されていない場合に表示するエラーメッセージ
            'title.max' => 'タスク名は30文字以内にしてください。',   // 'title' フィールドが30文字を超えている場合に表示するエラーメッセージ
            'body.required' => 'タスク内容を入力してください。',         // 'body' フィールドが入力されていない場合に表示するエラーメッセージ
            'body.max' => 'タスク内容は140文字以内にしてください。'   // 'body' フィールドが140文字を超えている場合に表示するエラーメッセージ
        ]);
        


        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalName();
            $imagePath = $request->file('image')
            ->storeAs('public/images', $filename);
        }


        $post = new Post;
        $post->title = $request->title;
        $post->contents = $request->body;
        $post->image_at = $imagePath;
        $post->user_id = Auth::id();

        $post->save();
        return redirect()->route('posts.index'); 
      }

      function show($id)
      {
        $post = Post::find($id);

        
        return view('posts.show',['post'=>$post]);
      }

      function edit($id)
      {
        $post = Post::find($id);

        return view('posts.edit',['post'=>$post]);
      }

      function update(Request $request, $id)
      {

        if($request->hasFile('image')){
          $filename = $request->file('image')->getClientOriginalName();
          $imagePath = $request->file('image')
          ->storeAs('public/images', $filename);
        }


        $post = Post::find($id);
        $post -> title = $request -> title;
        $post ->contents = $request -> body;
        $post -> image_at = $imagePath;
        $post -> save();

        return redirect()->route('posts.index');
      }

      function destroy($id)
      {
        $post = Post::find($id);
        $post -> delete();

        return redirect()->route('posts.index');


      }

}