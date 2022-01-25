<?php

use App\Post;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $newValue = new Post();

            $newValue->title = "Prova con seeder";
            $newValue->content = "Content con seeder";
            $newValue->user_id = 2;
            $newValue->category_id = 1;

            $newValue->save();
        }
    }
}
