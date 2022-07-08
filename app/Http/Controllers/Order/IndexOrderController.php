<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Enums\OrderStates;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Psr\Http\Message\ServerRequestInterface;

class IndexOrderController extends Controller
{
    public function __invoke(ServerRequestInterface $request): JsonResponse
    {

        $orders = Order::orderBy('id', 'DESC')->get()->all();

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

        return response()->json(["data" => $orders], 200);

    }
}
