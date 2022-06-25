<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['Día del padre', 'San Valentín', 'Rosas', 'Arreglos florales', 'Chocolates', 'Peluches', 'Globos'];

        for ($i = 0; $i <= 6; $i++){
            Category::factory()->create([
                "name" => $names[$i],
                "scope" => $i <= 3 ? 'products' : 'complements'
            ]);
        }
    }
}
