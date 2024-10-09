<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profile;
use App\Models\Post;
use App\Models\Role;
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

        $roles = [
            ["name" => "admin", "description" =>null, "created_at" => now(), "updated_at" => now()],
            ["name" => "edit", "description" => null ,"created_at" => now(), "updated_at" => now()],
        ];

        Role::insert($roles);
        
        // \App\Models\User::factory(10)->create();
        Profile::factory(10)->create()->each(function ($profile){
            $user = User::factory()->create([
                "profile_id" => $profile
            ]);

            Post::factory(2)->create([
                "user_id" => $user->id
            ]);

            $roles = Role::whereIn("name",["admin","edit"])->get();
            $user->roles()->attach($roles->random(1),[
                'created_at' => now(),
                'updated_at' => now(),
            ]); // Asignar un rol aleatorio al usuario


        });

    }
}
