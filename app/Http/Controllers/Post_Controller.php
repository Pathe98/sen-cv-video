<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;

class Post_Controller extends Controller
{

    public function index()
    {
        $posts=Post::with('author')->get();
        return view('posts', ['posts'=>$posts]);
    }
    
    public function store(Request $request)
    {   
        $request->validate([
            'content'=>'required',
            'video'=>'nullable|mimes:mp4,ogv,webm,mp3|max:20000',
          ]);

        $post=new Post();
        $post->content=$request->input('content');
        if (auth()->check()) {
            $post->user_id = auth()->user()->id;
        };

        if($request->hasFile('video'))
        {
            $video=$request->file('video');
            $videoPath=$video->store('videos','public');
            $post->video=$videoPath;
        }
        $post->save();
        return redirect('posts')->with('success','Post créé avec succès!');
    }

    

}
