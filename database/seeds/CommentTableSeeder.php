<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog\Comment::truncate();

        factory(Blog\Comment::class, 40)->create();
    }
}
