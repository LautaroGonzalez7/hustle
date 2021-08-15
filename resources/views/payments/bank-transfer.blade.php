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

            <!-- Stepper -->
            <div class="row bs-wizard" style="border-bottom:0;">

                <div class="col-xs-3 bs-wizard-step complete">
                    <div class="text-center bs-wizard-stepnum">Dedicatoria</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="{{route('stepOne.get')}}" class="bs-wizard-dot"></a>
                </div>

                <div class="col-xs-3 bs-wizard-step complete"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">Información de envío</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="{{route('stepTwo.get')}}" class="bs-wizard-dot"></a>
                </div>

                <div class="col-xs-3 bs-wizard-step complete"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">Método de pago</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="{{route('stepThree.get')}}" class="bs-wizard-dot"></a>
                </div>

                <div class="col-xs-3 bs-wizard-step active"><!-- active -->
                    <div class="text-center bs-wizard-stepnum">Fin</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#" class="bs-wizard-dot"></a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 m-card" style="margin-bottom: 2rem">
                    <h1>¡Pedido exitoso!</h1>
                    <p>Recibimos tu pedido, ahora te dejamos nuestras cuentas de banco para que realizes la
                        transferencia.</p>
                </div>
            </div>

            <!-- row -->
            <div class="row">
                <!--  Product Details -->
                <div class="product product-details clearfix">
                    <div class="row">
                        <div class="col-md-6 justify-content-center">
                            <div class="m-card payment-card text-center">
                                <div>
                                    <img src="{{asset('/assets/img/icons/money-transfer.svg')}}" class="card-img-top"
                                         width="100px">
                                    <div class="card-body payment-title">
                                        <h5 class="card-title">Transferencia en soles</h5>
                                        <p>Banco BCP</p>
                                        <p>CBU: 00304041023131312</p>
                                        <p>TITULAR: PEPITO GONZALEZ</p>
                                        <p>RUC: 12312312313</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 justify-content-center">
                            <div class="m-card payment-card text-center">
                                <div>
                                    <img src="{{asset('/assets/img/icons/money-transfer.svg')}}" class="card-img-top"
                                         width="100px">
                                    <div class="card-body payment-title">
                                        <h5 class="card-title">Transferencia en dólares</h5>
                                        <p>Banco BCP</p>
                                        <p>CBU: 00304041023131312</p>
                                        <p>TITULAR: PEPITO GONZALEZ</p>
                                        <p>RUC: 12312312313</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
