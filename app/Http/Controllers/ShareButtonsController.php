<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShareButtonsController extends Controller
{
    public function Share(){

        $data=[
            'id' => 1,
            'title' => 'The first title',
            'description' => 'premier ....',
            'image' => 'd.JPG'
        ];

        $shareButtons=\Share::page(
            url('/posts'),
            'here is the text',
        )
        
        -> facebook()
        -> twitter()
        -> reddit()
        -> telegram()
        -> linkedin()
        -> whatsapp()
        -> pinterest();

        
            
        return view('posts', compact('data', 'shareButtons'));
        // return view('posts', ['shareButtons' => $shareButtons, 'posts' => $posts]);

    }
}
