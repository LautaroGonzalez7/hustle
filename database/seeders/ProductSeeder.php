<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Balde con 12 rosas', 'Puro amor', 'Cupido', 'Eterno amor'];
        $codes = ['A01', 'A02', 'A03', 'A04'];
        $prices = [20.90, 50, 150, 76.90];
        $oldPrices = [30.90, 70, 180, 80];
        $content = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
         industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
          scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
           electronic typesetting, remaining essentially unchanged.";
        $images = [
            ["c87521e8aa76663bb70049cf0e7c29ccca115022.jpg", "675f25ceeefcc857c045c638fdde1c7a553c4fe6.jpg"]
        ];

        for ($i = 0; $i <= 3; $i++) {
            Product::factory()->create([
                'name' => $names[$i],
                'price' => $prices[$i],
                'old_price' => $oldPrices[$i],
                'code' => $codes[$i],
                'content' => $content,
                "images" => json_encode($images[0]),
                'position' => $i,
            ]);
        }
    }
}
