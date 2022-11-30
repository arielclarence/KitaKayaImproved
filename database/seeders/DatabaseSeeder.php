<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Seeder;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //user
        $user = new User();
        $user->email = "email1";
        $user->password = "email1";
        $user->nama = "email1";
        $user->umur = 22;
        $user->role = 1;
        $user->status = 1;
        $user->save();

        $user = new User();
        $user->email = "email2";
        $user->password = "email2";
        $user->nama = "email2";
        $user->umur = 22;
        $user->role = 1;
        $user->status = 1;
        $user->save();

        $user = new User();
        $user->email = "email3";
        $user->password = "email3";
        $user->nama = "email3";
        $user->umur = 22;
        $user->role = 1;
        $user->status = 1;
        $user->save();


    }
}
