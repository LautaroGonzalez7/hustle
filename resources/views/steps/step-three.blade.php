@extends('layouts.app')

@section('content')
    <script src="https://js.stripe.com/v3/"></script>

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

                <div class="col-xs-3 bs-wizard-step active"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">Método de pago</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#" class="bs-wizard-dot"></a>
                </div>

                <div class="col-xs-3 bs-wizard-step disabled"><!-- active -->
                    <div class="text-center bs-wizard-stepnum">Fin</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#" class="bs-wizard-dot"></a>
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
                                    <img src="{{asset('/assets/img/icons/money-transfer.svg')}}"
                                         class="card-img-top" width="100px">
                                    <div class="card-body payment-title">
                                        <h5 class="card-title">Transferencia bancaria</h5>
                                    </div>
                                    <a href="{{route('addOrder')}}" class="primary-btn add-to-cart col-md-12">Seleccionar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="m-card payment-card text-center">
                                <div>
                                    <img src="{{asset('/assets/img/icons/credit-cards.svg')}}" class="card-img-top"
                                         width="100px">
                                    <div class="card-body payment-title">
                                        <h5 class="card-title">Tarjeta de crédito/débito</h5>
                                        <button id="checkout-button" class="primary-btn add-to-cart col-md-12">Seleccionar</button>
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

    <script type="text/javascript">
        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

        // Create an instance of the Stripe object with your publishable API key
        var stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');
        var checkoutButton = document.getElementById('checkout-button');

        checkoutButton.addEventListener('click', function () {
            // Create a new Checkout Session using the server-side endpoint you
            // created in step 3.
            fetch('/stripe', {
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": csrfToken
                },
                method: 'GET',
            })
                .then(function (response) {
                    return response.json();
                })
                .then(function (session) {
                    return stripe.redirectToCheckout({sessionId: session.id});
                })
                .then(function (result) {
                    // If `redirectToCheckout` fails due to a browser or network
                    // error, you should display the localized error message to your
                    // customer using `error.message`.
                    if (result.error) {
                        alert(result.error.message);
                    }
                })
                .catch(function (error) {
                    console.error('Error:', error);
                });
        });
    </script>
@endsection
