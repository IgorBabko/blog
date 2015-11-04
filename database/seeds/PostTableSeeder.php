<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog\Post::truncate();

        factory(Blog\Post::class, 20)->create();
    }
}
