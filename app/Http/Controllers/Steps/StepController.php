<?php

namespace App\Http\Controllers\Steps;

use App\Http\Controllers\Controller;
use App\Models\Complement;
use App\Models\Product;
use Illuminate\Http\Request;

class StepController extends Controller
{

    public function stepOne(Request $request)
    {
        $message = $request->session()->get('buy.message');

        return view('steps.step-one', ["message" => $message]);
    }

    public function stepTwo(Request $request)
    {
        $shipment = $request->session()->get('buy.shipment');

        return view('steps.step-two', ["shipment" => $shipment]);
    }

    public function stepThree(Request $request)
    {
        $productId = $request->session()->get('buy.productId');
        $product = Product::where('id', $productId)->first();

        $complements = $request->session()->get('buy.complements');
        $complementsFromDB = Complement::whereIn('id', $complements)->get()->all();

        $productPrice = $product->price;
        $complementsPrice = 0;
        foreach ($complementsFromDB as $c) {
            $complementsPrice += $c->price;
        }
        $totalPrice = $productPrice + $complementsPrice;

        return view('steps.step-three', ["totalPrice" => $totalPrice]);
    }

}
