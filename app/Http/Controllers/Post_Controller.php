<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class Post_Controller extends Controller
{

    public function index()
    {
        $posts=Post::with('author')->get();
        return view('posts', ['posts'=>$posts]);
    }
    public function like():JsonResponse
    {
        $post=post::find(request()->id);

        if ($post->isLikedByLoggedInUser()){
            $res = Like::where([
                'user_id' => auth()->user()->id,
                'post_id' =>request()->id
            ])->delete();

            if ($res) {
                return response()->json([
                    'count' =>post::find(request()->id)->likes->count()
                ]);

            }

        }else {
            $like = new Like();

            $like ->user_id =auth()->user()->id;
            $like->post_id = request()->id;
            $like->save();

            return response()->json([
                'count' =>post::find(request()->id)->likes->count()
            ]);

        }

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
