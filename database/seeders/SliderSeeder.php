<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ['Regalos', 'Nuevos', 'Hot sale!'];
        $subtitles = ['Encuentra el regalo perfecto', 'Diseños', 'Hasta 40% Off'];
        $images = [
            ["2f94b0b38dd0911cce80b9fea2e6f98a31f7fc5a.png"],
            ["080f53f5a8adae0457bd13a24fd961a527485be8.jpg"],
            ["3ec41363e9a751828ef6a7c69d575a546ae7f34a.jpg"]
        ];

        for ($i = 0; $i <= 2; $i++){
            Slider::factory()->create([
                "title" => $titles[$i],
                "subtitle" => $subtitles[$i],
                "link" => "/products",
                "active" => true,
                "images" => json_encode($images[$i]),
            ]);
        }
    }
}
