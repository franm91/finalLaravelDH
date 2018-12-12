<?php

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
        $users = factory(App\User::class)->times(20)->create();
        $posts = factory(App\Post::class)->times(50)->create();


        // $this->call(UsersTableSeeder::class);
    }
}
