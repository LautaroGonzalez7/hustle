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
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="{{route('stepOne.get')}}" class="bs-wizard-dot"></a>
                </div>

                <div class="col-xs-3 bs-wizard-step active"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">Información de envío</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="#" class="bs-wizard-dot"></a>
                </div>

                <div class="col-xs-3 bs-wizard-step disabled"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">Método de pago</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="#" class="bs-wizard-dot"></a>
                </div>

                <div class="col-xs-3 bs-wizard-step disabled"><!-- active -->
                    <div class="text-center bs-wizard-stepnum">Fin</div>
                    <div class="progress"><div class="progress-bar"></div></div>
                    <a href="#" class="bs-wizard-dot"></a>
                </div>
            </div>

            <!-- row -->
            <div class="row">
                <!--  Product Details -->
                <div class="product product-details clearfix">
                   Información de envío:
                    <form action="{{route('session.addShipmentInformation.post')}}" method="post">
                        @csrf
                        <label for="name">Nombre completo</label>
                        <input name="name" id="name" type="text" class="form-control" placeholder="María del Carmen" value="{{$shipment['name'] ?? ''}}" />
                        <label for="district">Distrito</label>
                        <input name="district" id="district" type="text" class="form-control" placeholder="San Sebastián" value="{{$shipment['district'] ?? ''}}" />
                        <label for="address">Dirección</label>
                        <input name="address" id="address" type="text" class="form-control" placeholder="Pellegrini 211" value="{{$shipment['address'] ?? ''}}" />
                        <label for="phone">Teléfono</label>
                        <input name="phone" id="phone" type="text" class="form-control" placeholder="555-555555" value="{{$shipment['phone'] ?? ''}}" />
                        <button class="primary-btn add-to-cart col-md-12">
                            <i class="fa fa-shopping-cart"></i>Continuar
                        </button>
                    </form>
                </div>
                <!-- /Product Details -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
