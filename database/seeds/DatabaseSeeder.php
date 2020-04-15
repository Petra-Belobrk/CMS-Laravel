<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('posts')->truncate();
        // $this->call(UsersTableSeeder::class);
       factory(App\User::class, 50)->create()->each(function($user) {

           $user->posts()->save( factory(App\Post::class)->make());

       });

    }
}
