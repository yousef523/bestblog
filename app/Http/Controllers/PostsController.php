<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id','desc')->paginate(6);
        $count = Post::count();

        return view('posts.index',compact('posts','count'));
    }
    public function show($id)
    {
        // dd($id);
        $post = Post::find($id);
        return view('posts.show',compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(REQUEST $request)
    {
        // dd($request);
        $request->validate([
        'title'=>'required|max:200',
        'body'=>'required|max:500'
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();

        return redirect('/posts')->with('status','post was created!');

    }

    public function edit($id){
        $post = Post::find($id);
        return view('posts.edit',compact('post'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required|max:200',
            'body'=>'required|max:500'
        ]);
        

        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();
        return redirect('/posts')->with('status','post was updated!');


    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('status','post was Deleted!');
    }
}
