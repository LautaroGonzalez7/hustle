<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use App\Models\Complement;
use App\Models\Product;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripeController extends Controller
{

    public function checkout(Request $request)
    {
        Stripe::setApiKey('sk_test_4eC39HqLyjWDarjtT1zdp7dc');

        $productId = $request->session()->get('buy.productId');
        $product = Product::where('id', '=', $productId)->get()->first();

        $session = Session::create(
            [
                'payment_method_types' => ['card'],
                'line_items'           => [
                    [
                        'price_data' => [
                            'currency'     => 'usd',
                            'product_data' => [
                                'name' => $product->name,
                            ],
                            'unit_amount'  => $product->price,
                        ],
                        'quantity'   => 1,
                    ],
                ],
                'mode'                 => 'payment',
                'success_url'          => 'http://localhost:8000/order-stripe',
                'cancel_url'           => 'http://localhost:8000/steph-three',
            ]
        );

        return response([ 'id' => $session->id ]);
    }

}
