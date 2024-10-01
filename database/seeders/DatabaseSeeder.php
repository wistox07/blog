<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Post;
use Symfony\Component\HttpKernel\EventListener\ProfilerListener;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Profile::factory(10)->create()->each(function ($profile){
            $user = User::factory()->create([
                "profile_id" => $profile
            ]);

            Post::factory(2)->create([
                "user_id" => $user->id
            ]);

        });

    }
}
