<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Enums\OrderStates;
use App\Models\Enums\PaymentType;
use App\Models\Order;
use App\Models\Product;
use App\Models\Complement;
use Illuminate\Http\Request;
use \Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    public function addOrder(Request $request)
    {
        $productId = $request->session()->get('buy.productId');
        $product   = Product::where('id', $productId)->first();

        $formattedProduct = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'content' => $product->content,
        ];

        $payment  = [
            'type' => 1
        ];

        $shipment = $request->session()->get('buy.shipment');

        $complements = $request->session()->get('buy.complements');

        $complementsFromDB = Complement::whereIn('id', $complements)->get()->all();

        $productPrice = $product->price;
        $complementsPrice = 0;
        foreach ($complementsFromDB as $c){
            $complementsPrice += $c->price;
        }
        $totalPrice = $productPrice + $complementsPrice;

        $userId = 1;

        $order = Order::create(
            $formattedProduct,
            $payment,
            $shipment,
            $complements,
            OrderStates::PENDING,
            $userId,
        );
        $order->save();

        return view('payments.bank-transfer', ["totalPrice" => $totalPrice]);
    }

    public function addYapeOrder(Request $request)
    {
        $productId = $request->session()->get('buy.productId');
        $product   = Product::where('id', $productId)->first();

        $formattedProduct = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'content' => $product->content,
        ];

        $payment  = [
            'type' => 3
        ];

        $shipment = $request->session()->get('buy.shipment');

        $complements = $request->session()->get('buy.complements');

        $complementsFromDB = Complement::whereIn('id', $complements)->get()->all();

        $productPrice = $product->price;
        $complementsPrice = 0;
        foreach ($complementsFromDB as $c){
            $complementsPrice += $c->price;
        }
        $totalPrice = $productPrice + $complementsPrice;

        $userId = 1;

        $order = Order::create(
            $formattedProduct,
            $payment,
            $shipment,
            $complements,
            OrderStates::PENDING,
            $userId,
        );
        $order->save();

        return view('payments.yape', ["totalPrice" => $totalPrice]);
    }

    public function addStripeOrder(Request $request)
    {
        $productId = $request->session()->get('buy.productId');
        $product   = Product::where('id', $productId)->first();

        $formattedProduct = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'content' => $product->content,
        ];

        $payment  = [
            'type' => 2
        ];

        $shipment = $request->session()->get('buy.shipment');

        $complements = $request->session()->get('buy.complements');

        $complementsFromDB = Complement::whereIn('id', $complements)->get()->all();

        $productPrice = $product->price;
        $complementsPrice = 0;
        foreach ($complementsFromDB as $c){
            $complementsPrice += $c->price;
        }
        $totalPrice = $productPrice + $complementsPrice;

        $userId = 1;

        $order = Order::create(
            $formattedProduct,
            $payment,
            $shipment,
            $complements,
            OrderStates::PENDING,
            $userId,
        );
        $order->save();

        return view('payments.stripe', ["totalPrice" => $totalPrice]);
    }

    public function getAll(Request $request)
    {
        $userId = 1;

        $orders = Order::where('user_id', $userId)->get()->all();

        return view('account.my-orders', ["orders" => $orders]);
    }
}
