@extends('layouts.app')

@section('content')
    <!-- BREADCRUMB -->
    <div id="breadcrumb">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Tienda</a></li>
                <li><a href="#">Categoría</a></li>
                <li class="active">Siempre juntos</li>
            </ul>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- section -->
    <div class="section bg-gray">
        <!-- container -->
        <div class="container">

            <div class="row">
                <div class="col-md-12 m-card" style="margin-bottom: 2rem">
                    <h1>¡Pedidos!</h1>
                    <p>Aquí podrá ver el historial de todos sus pedidos.</p>
                </div>
            </div>

            <!-- row -->
            <div class="row">
                <!--  Orders List -->
                <div class="row">
                    @foreach($orders as $order)
                        <div class="col-md-12 justify-content-center">
                            <div class="order-card">
                                <h5 class="order-title">{{json_decode($order->product, true)["name"]}}</h5>
                                <div class="order-content">
                                    <div class="row">
                                        <div class="col-md-1">
                                            <img
                                                src="https://i.pinimg.com/474x/3c/98/e0/3c98e00c00bf4d210c2d50d6341d6a58.jpg"
                                                width="100%">
                                        </div>
                                        <div class="col-md-9">
                                            <p class="order-state text-success">{{$order->state}}</p>
                                            <p class="order-description">
                                                <span><b>Día de entrega:</b> {{json_decode($order->shipment, true)["date"]}}</span>
                                            </p>
                                            <p class="order-description">
                                                <span><b>Horario de entrega:</b> {{json_decode($order->shipment, true)["hour"]}}</span>
                                            </p>
                                            <p class="order-description">
                                                <span><b>Método de pago:</b> {{json_decode($order->payment, true)["type"] === 1 ? "Transferencia bancaria" : "Stripe"}}</span>
                                            </p>
                                            <p class="order-description">{{json_decode($order->product, true)["content"]}}</p>
                                        </div>
                                        <div class="col-md-2 order-button">
                                            <a href="{{route('single.product', json_decode($order->product, true)["id"])}}" class="primary-btn add-to-cart">Ver producto</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- /Orders List -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
