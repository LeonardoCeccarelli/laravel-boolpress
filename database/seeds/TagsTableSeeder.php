<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "Rock",
            "Pop",
            "Metal",
            "Jazz",
            "Calcio",
            "Tennis",
            "Basket",
            "Rugby",
            "Computer",
            "Mobile",
            "XBox",
            "Playstation",
            "Carne",
            "Pesce",
            "Vegano",
            "Vegetariano",
            "Palestra",
            "Fai da te",
            "Shopping",
            "Aereo",
            "Treno",
            "Hotel",
            "Città",
            "Ferrari",
            "Audi",
            "Porsche",
            "Mercedes"
        ];

        foreach ($data as $value) {
            $newValue = new Tag();
            $newValue->name = $value;
            $newValue->save();
        }
    }
}
