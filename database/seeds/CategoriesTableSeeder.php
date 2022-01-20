<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ["Musica", "Sport", "Tech", "Cucina", "Tempo Libero", "Viaggi", "Automobili"];

        foreach ($data as $value) {
            $newValue = new Category;
            $newValue->name = $value;
            $newValue->save();
        }
    }
}
