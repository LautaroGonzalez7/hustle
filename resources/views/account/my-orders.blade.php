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
    <div class="section">
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
                        <div class="col-md-12 justify--center">
                            <div class="order-card">
                                <div class="order-header">
                                    <h4 class="order-title">{{json_decode($order->productDetail, true)["name"]}}</h4>
                                    <span class="label label-success order-state">{{$order->state}}</span>
                                </div>
                                <div class="order-content">
                                    <div class="row">
                                        <div class="col-md-1">
                                            @if(isset($order->product->images))
                                                <img
                                                    src="/images/products/{{json_decode($order->product->images, true)[0]}}"
                                                    width="100%">
                                            @else
                                                <img
                                                    src="{{asset('assets/img/products/default-image.png')}}"
                                                    width="100%">
                                            @endif
                                        </div>
                                        <div class="col-md-9">
                                            <p class="order-description">
                                                <span><b>Día de entrega:</b> {{json_decode($order->shipment, true)["date"]}}</span>
                                            </p>
                                            <p class="order-description">
                                                <span><b>Horario de entrega:</b> {{json_decode($order->shipment, true)["hour"]}}</span>
                                            </p>
                                            <p class="order-description">
                                                <span><b>Método de pago:</b>
                                                    {{json_decode($order->payment, true)["type"]}}
                                                </span>
                                            </p>
                                            <p class="order-description">
                                                @if($order->images)
                                                    <b>Comprobantes:</b>
                                            <div class="order-invoices-container">
                                                @foreach(json_decode($order->images, true) as $image)
                                                    <a href="/images/orders/{{$image}}" target="_blank">
                                                        @if(preg_split("/\./", $image)[1] === 'pdf')
                                                            <div>
                                                                <img
                                                                    src="{{asset('assets/img/orders/invoice-pdf.png')}}"
                                                                    width="50px" alt="invoice">
                                                            </div>
                                                        @else
                                                            <img src="{{asset('assets/img/orders/invoice-image.png')}}"
                                                                 width="50px" alt="invoice">
                                                        @endif
                                                    </a>
                                                @endforeach
                                            </div>
                                            @endif
                                            </p>
                                        </div>
                                        <div class="col-md-2 order-button">
                                            <a href="{{route('single.product', json_decode($order->productDetail, true)["id"])}}"
                                               class="primary-btn add-to-cart">Ver producto</a>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="order-upload-invoice-container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="order/{{$order->id}}" method="POST"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <input id="invoice-upload{{$order->id}}" type="file"
                                                       name="invoiceUpload[]"
                                                       accept="*" multiple
                                                       onchange="showSelectedFiles(event, {{$order->id}})"
                                                       style="display: none"/>
                                                <label for="invoice-upload{{$order->id}}">
                                                    <span class="btn btn-info">Subir comprobante</span>
                                                </label>
                                                <button class="btn btn-success" id="confirm-button{{$order->id}}"
                                                        style="display: none">Confirmar
                                                </button>
                                            </form>
                                        </div>
                                        <div class="col-md-12">
                                            <span class="order-upload-invoice-names"
                                                  id="invoice-upload-file-names{{$order->id}}"></span>
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

    <script>
        function showSelectedFiles(event, orderId) {
            const spanNames = document.getElementById(`invoice-upload-file-names${orderId}`);
            const confirmButton = document.getElementById(`confirm-button${orderId}`);
            const files = Object.values(event.target.files);

            const names = [];

            files.forEach(file => {
                names.push(file.name);
            })

            spanNames.textContent = names.join(', ');
            confirmButton.style.display = 'initial';
        }
    </script>
@endsection
