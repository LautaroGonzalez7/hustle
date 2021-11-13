<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
         industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
          scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
           electronic typesetting, remaining essentially unchanged.";
        $products = [
            ["id" => 1, "name" => "Balde con 12 rosas", "price" => 20.90, "content" => $content],
            ["id" => 2, "name" => "Puro amor", "price" => 50, "content" => $content],
            ["id" => 3, "name" => "Cupido", "price" => 150, "content" => $content],
            ["id" => 4, "name" => "Eterno amor", "price" => 76.90, "content" => $content]
        ];
        $payments = [["type" => 1], ["type" => 1], ["type" => 2], ["type" => 2]];
        $shipments = [
            ["date" => "2021-10-21", "hour" => "10:00-12:00", "name" => "Lautaro Nahuel Gonzalez", "district" => "aaa", "address" => "Lopez y Planes 2060", "phone" => "12313"],
            ["date" => "2021-10-21", "hour" => "08:00-10:00", "name" => "Lautaro Nahuel Gonzalez", "district" => "aaa", "address" => "Lopez y Planes 2060", "phone" => "12313"],
            ["date" => "2021-10-21", "hour" => "10:00-12:00", "name" => "Lautaro Nahuel Gonzalez", "district" => "aaa", "address" => "Lopez y Planes 2060", "phone" => "12313"],
            ["date" => "2021-10-21", "hour" => "08:00-10:00", "name" => "Lautaro Nahuel Gonzalez", "district" => "aaa", "address" => "Lopez y Planes 2060", "phone" => "12313"],
        ];
        $states = ["pending", "pending", "pending", "pending"];
        $userIds = 1;
        $complements = [[1, 2], [1, 2], [2, 3], [3]];

        for ($i = 0; $i <= 3; $i++) {
            Order::factory()->create([
                'product' => json_encode($products[$i]),
                'payment' => json_encode($payments[$i]),
                'shipment' => json_encode($shipments[$i]),
                'state' => $states[$i],
                "user_id" => $userIds,
                'complements' => json_encode($complements[$i]),
            ]);
        }
    }
}
