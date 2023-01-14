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
        $product = Product::where('id', $productId)->first();

        $formattedProduct = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'content' => $product->content,
        ];

        $payment = [
            'type' => 1
        ];

        $shipment = $request->session()->get('buy.shipment');

        $complements = $request->session()->get('buy.complements');

        $complementsFromDB = Complement::whereIn('id', $complements)->get()->all();

        $formattedComplements = [];
        foreach ($complementsFromDB as $complementFromDB){
            $formattedComplements[] = [
                'id' => $complementFromDB->id,
                'name' => $complementFromDB->name,
                'price' => $complementFromDB->price,
                'content' => $complementFromDB->content,
            ];
        }

        $productPrice = $product->price;
        $complementsPrice = 0;
        foreach ($complementsFromDB as $c) {
            $complementsPrice += $c->price;
        }
        $totalPrice = $productPrice + $complementsPrice;

        $userId = 1;

        $order = Order::create(
            $formattedProduct,
            $payment,
            $shipment,
            $formattedComplements,
            OrderStates::PENDING,
            $userId,
            $formattedProduct["id"],
            $totalPrice
        );
        $order->save();

        return view('payments.bank-transfer', ["totalPrice" => $totalPrice]);
    }

    public function addYapeOrder(Request $request)
    {
        $productId = $request->session()->get('buy.productId');
        $product = Product::where('id', $productId)->first();

        $formattedProduct = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'content' => $product->content,
        ];

        $payment = [
            'type' => 3
        ];

        $shipment = $request->session()->get('buy.shipment');

        $complements = $request->session()->get('buy.complements');

        $complementsFromDB = Complement::whereIn('id', $complements)->get()->all();

        $formattedComplements = [];
        foreach ($complementsFromDB as $complementFromDB){
            $formattedComplements[] = [
                'id' => $complementFromDB->id,
                'name' => $complementFromDB->name,
                'price' => $complementFromDB->price,
                'content' => $complementFromDB->content,
            ];
        }

        $productPrice = $product->price;
        $complementsPrice = 0;
        foreach ($complementsFromDB as $c) {
            $complementsPrice += $c->price;
        }
        $totalPrice = $productPrice + $complementsPrice;

        $userId = 1;

        $order = Order::create(
            $formattedProduct,
            $payment,
            $shipment,
            $formattedComplements,
            OrderStates::PENDING,
            $userId,
            $formattedProduct["id"],
            $totalPrice
        );
        $order->save();

        return view('payments.yape', ["totalPrice" => $totalPrice]);
    }

    public function addPaypalOrder(Request $request)
    {
        $productId = $request->session()->get('buy.productId');
        $product = Product::where('id', $productId)->first();

        $formattedProduct = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'content' => $product->content,
        ];

        $payment = [
            'type' => 5
        ];

        $shipment = $request->session()->get('buy.shipment');

        $complements = $request->session()->get('buy.complements');

        $complementsFromDB = Complement::whereIn('id', $complements)->get()->all();

        $formattedComplements = [];
        foreach ($complementsFromDB as $complementFromDB){
            $formattedComplements[] = [
                'id' => $complementFromDB->id,
                'name' => $complementFromDB->name,
                'price' => $complementFromDB->price,
                'content' => $complementFromDB->content,
            ];
        }

        $productPrice = $product->price;
        $complementsPrice = 0;
        foreach ($complementsFromDB as $c) {
            $complementsPrice += $c->price;
        }
        $totalPrice = $productPrice + $complementsPrice;

        $userId = 1;

        $order = Order::create(
            $formattedProduct,
            $payment,
            $shipment,
            $formattedComplements,
            OrderStates::PENDING,
            $userId,
            $formattedProduct["id"],
            $totalPrice
        );
        $order->save();

        return view('payments.paypal', ["totalPrice" => $totalPrice]);
    }

    public function addStripeOrder(Request $request)
    {
        $productId = $request->session()->get('buy.productId');
        $product = Product::where('id', $productId)->first();

        $formattedProduct = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'content' => $product->content,
        ];

        $payment = [
            'type' => 2
        ];

        $shipment = $request->session()->get('buy.shipment');

        $complements = $request->session()->get('buy.complements');

        $complementsFromDB = Complement::whereIn('id', $complements)->get()->all();

        $formattedComplements = [];
        foreach ($complementsFromDB as $complementFromDB){
            $formattedComplements[] = [
                'id' => $complementFromDB->id,
                'name' => $complementFromDB->name,
                'price' => $complementFromDB->price,
                'content' => $complementFromDB->content,
            ];
        }

        $productPrice = $product->price;
        $complementsPrice = 0;
        foreach ($complementsFromDB as $c) {
            $complementsPrice += $c->price;
        }
        $totalPrice = $productPrice + $complementsPrice;

        $userId = 1;

        $order = Order::create(
            $formattedProduct,
            $payment,
            $shipment,
            $formattedComplements,
            OrderStates::PENDING,
            $userId,
            $formattedProduct["id"],
            $totalPrice
        );
        $order->save();

        return view('payments.stripe', ["totalPrice" => $totalPrice]);
    }

    public function getAll()
    {
        $userId = 1;

        $orders = Order::where('user_id', $userId)->with('product')->get()->all();

        foreach ($orders as $order) {
            if ($order->state === OrderStates::PENDING) $order->state = 'Pendiente de aprobacion';
            if ($order->state === OrderStates::PREPARING_ORDER) $order->state = 'Preparando pedido';
            if ($order->state === OrderStates::SHIPMENT_IN_PROGRESS) $order->state = 'En proceso de envio';
            if ($order->state === OrderStates::DELIVERED) $order->state = 'Entregado';

            $newPayment = json_decode($order->payment, true);

            if (json_decode($order->payment, true)['type'] === 1) $newPayment["type"] = "Transferencia bancaria";
            if (json_decode($order->payment, true)['type'] === 2) $newPayment["type"] = "Tarjeta de debito/credito";
            if (json_decode($order->payment, true)['type'] === 3) $newPayment["type"] = "Yape";

            $order->payment = json_encode($newPayment);
        }

        return view('account.my-orders', ["orders" => $orders]);
    }

    public function uploadInvoice(Request $request, $id)
    {
        $order = Order::where('id', $id)->get()->first();

        $images = $request->file('invoiceUpload');

        $imageNames = [];

        foreach ($images as $file) {
            $filenameWithExt = $file->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $file->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $hashedName = sha1(md5(random_bytes(16))) . '.' . $extension;
//            $path = $file->storeAs('/public/orders', $hashedName);
            $destination = 'images/orders/';
            $file->move($destination, $hashedName);
            $imageNames[] = $hashedName;
        };

        $order->setImages($imageNames);

        $order->save();

        return redirect()->route('myOrders');
    }
}
