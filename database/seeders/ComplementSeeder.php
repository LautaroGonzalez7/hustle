<?php

namespace Database\Seeders;

use App\Models\Complement;
use Illuminate\Database\Seeder;

class ComplementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Bombones de chocolate x12', 'Peluche mediano Oso', 'Globo Te Amo', 'Chocolates x24'];
        $prices = [10.50, 27, 5, 45];
        $content = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
        $images = [
            ["0443c8b044ae37ca1aa88e7e4a346713bb2ff135.jpg"],
            ["62d5a439a36485da268d070d137571c228843042.jpg"],
            ["ca2e3c2d8a8ecacc4e3c0c7d54e9e4cd3a01475a.jpg"],
            ["0443c8b044ae37ca1aa88e7e4a346713bb2ff135.jpg"]
        ];
        $categoryIds = [5, 6, 7, 5];

        for ($i = 0; $i <= 3; $i++) {
            Complement::factory()->create([
                'name' => $names[$i],
                'price' => $prices[$i],
                'content' => $content,
                "images" => json_encode($images[$i]),
                'category_id' => $categoryIds[$i],
            ]);
        }
    }
}
