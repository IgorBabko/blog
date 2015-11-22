<?php

use Illuminate\Database\Seeder;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog\Answer::truncate();

        factory(Blog\Answer::class, 40)->create();
    }
}
