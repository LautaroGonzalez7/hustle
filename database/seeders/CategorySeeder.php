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
        $names = ['Día del padre', 'San Valentín', 'Rosas', 'Arreglos florales'];

        for ($i = 0; $i <= 3; $i++){
            Category::factory()->create([
                "name" => $names[$i],
                "scope" => "scope"
            ]);
        }
    }
}
