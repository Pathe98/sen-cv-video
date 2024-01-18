<?php

namespace Database\Seeders;

use App\Models\Like;
use App\Models\post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        factory (User::class, 5)->create();
        factory(post::class, 20)->create();

        for($i=0; $i < 30; $i++){
            $like = new Like();

            $like->user_id= User::all()->random(1)->first()->id;
            $like->post_id =post::all()->random(1)->first()->id;

            $like->save();
        }

    }

}
