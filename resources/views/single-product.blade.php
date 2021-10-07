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
            <!-- row -->
            <div class="row">
                <!--  Product Details -->
                <div class="product product-details clearfix">
                    <div class="col-md-6">
                        <div id="product-main-view">
                            <div class="product-view">
                                <img
                                    src="{{$product->images ? '/storage/products/'.json_decode($product->images, true)[0] : 'https://www.magnoliascusco.com/wp-content/uploads/2019/02/arreglo-siempre-juntos-b2-370x370.jpg'}}"
                                    alt="">
                            </div>
                            <div class="product-view">
                                <img
                                    src="{{$product->images ? '/storage/products/'.json_decode($product->images, true)[0] : 'https://www.magnoliascusco.com/wp-content/uploads/2019/02/arreglo-siempre-juntos-b2-370x370.jpg'}}"
                                    alt="">
                            </div>
                        </div>
                        <div id="product-view">
                            <div class="product-view">
                                <img
                                    src="{{$product->images ? '/storage/products/'.json_decode($product->images, true)[0] : 'https://www.magnoliascusco.com/wp-content/uploads/2019/02/arreglo-siempre-juntos-b2-370x370.jpg'}}"
                                    alt="">
                            </div>
                            <div class="product-view">
                                <img
                                    src="{{$product->images ? '/storage/products/'.json_decode($product->images, true)[0] : 'https://www.magnoliascusco.com/wp-content/uploads/2019/02/arreglo-siempre-juntos-b2-370x370.jpg'}}"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-body">
                            <div class="product-label">
                                <span>Nuevo</span>
                                <span class="sale">-20%</span>
                            </div>
                            <h2 class="product-name">{{$product->name}}</h2>
                            <h3 class="product-price">S/{{$product->price}}
                                <del class="product-old-price">/S{{$product->old_price}}</del>
                            </h3>

                            <hr>
                            <h3 class="product-section">1- Seleccionar horario</h3>
                            <div data-v-b4f612e4=""
                                 class="col-md-12 d-flex flex-column flex-lg-row calendar-buttons p-0"
                                 style="display: flex;">
                                <div data-v-b4f612e4=""
                                     class="schedule-select p-0 mr-1 w-100 schedule-select option-select mb-1"
                                     style="width: 150px;margin: 0 15px 0 0;">
                                    <button type="button" data-toggle="collapse" aria-expanded="true"
                                            aria-controls="schedules20200817" data-target="#schedules20200817"
                                            class="btn btn-lg w-100 btn-outline-secondary size-14 shortcut-date-text btn-outline-secondary"
                                            style="height: 68px;background: #fff;border: 1px solid;width: 100%;">
                                        <p class="size-16 font-weight-bold mb-0" style="
    font-weight: bold;
    margin: 0;
">Hoy</p>
                                        17 agosto
                                    </button>
                                    <div id="schedules20200817" class="collapse" style="width: 150px;">
                                        <div aria-labelledby="dropdownMenuButton"
                                             class="btn btn-block border-0 mt-0 p-0" style="padding: 0;">
                                            <div value="0"
                                                 class="list-item border btn btn-sm btn-outline-secondary border-1 my-1 mx-0 text-center p-0 py-1 disabled"
                                                 style="display: block;border: 1px solid;margin: 3px 0;">
                                                8:00AM - 11:00AM
                                            </div>
                                            <div value="1"
                                                 class="list-item border btn btn-sm btn-outline-secondary border-1 my-1 mx-0 text-center p-0 py-1 disabled"
                                                 style="display: block;border: 1px solid;margin: 3px 0;">
                                                11:00AM - 2:00PM
                                            </div>
                                            <div value="2"
                                                 class="list-item border btn btn-sm btn-outline-secondary border-1 my-1 mx-0 text-center p-0 py-1 disabled"
                                                 style="display: block;border: 1px solid;margin: 3px 0;">
                                                2:00PM - 5:00PM
                                            </div>
                                            <div value="3"
                                                 class="list-item border btn btn-sm btn-outline-secondary border-1 my-1 mx-0 text-center p-0 py-1 unselectable"
                                                 style="display: block;border: 1px solid;margin: 3px 0;">
                                                5:00PM - 8:00PM
                                            </div>
                                        </div> <!---->
                                    </div>
                                </div>

                                <div data-v-b4f612e4=""
                                     class="schedule-select p-0 mr-1 w-100 schedule-select option-select mb-1"
                                     style="width: 150px;margin: 0 15px 0 0;">
                                    <button type="button" data-toggle="collapse" aria-expanded="true"
                                            aria-controls="schedules20200818" data-target="#schedules20200818"
                                            class="btn btn-lg w-100 btn-outline-secondary size-14 shortcut-date-text btn-outline-secondary"
                                            style="height: 68px;background: #fff;border: 1px solid;width: 100%;">
                                        <p class="size-16 font-weight-bold mb-0" style="font-weight: bold;margin: 0;">
                                            Mañana</p>
                                        18 agosto
                                    </button>
                                    <div id="schedules20200818" class="collapse" style="width: 150px;">
                                        <div aria-labelledby="dropdownMenuButton"
                                             class="btn btn-block border-0 mt-0 p-0" style="padding: 0;">
                                            <div value="0"
                                                 class="list-item border btn btn-sm btn-outline-secondary border-1 my-1 mx-0 text-center p-0 py-1 disabled"
                                                 style="display: block;border: 1px solid;margin: 3px 0;">
                                                8:00AM - 11:00AM
                                            </div>
                                            <div value="1"
                                                 class="list-item border btn btn-sm btn-outline-secondary border-1 my-1 mx-0 text-center p-0 py-1 disabled"
                                                 style="display: block;border: 1px solid;margin: 3px 0;">
                                                11:00AM - 2:00PM
                                            </div>
                                            <div value="2"
                                                 class="list-item border btn btn-sm btn-outline-secondary border-1 my-1 mx-0 text-center p-0 py-1 disabled"
                                                 style="display: block;border: 1px solid;margin: 3px 0;">
                                                2:00PM - 5:00PM
                                            </div>
                                            <div value="3"
                                                 class="list-item border btn btn-sm btn-outline-secondary border-1 my-1 mx-0 text-center p-0 py-1 unselectable"
                                                 style="display: block;border: 1px solid;margin: 3px 0;">
                                                5:00PM - 8:00PM
                                            </div>
                                        </div> <!----> <!----><!----><!---->
                                    </div>
                                </div>

                                <div data-v-b4f612e4="" class="p-0 w-100 schedule-select schedule-select option-select"
                                     id="calendar-input-button" style="width: 170px;">
                                    <button type="button" data-toggle="modal" data-target="#calendarModal"
                                            class="btn btn-lg w-100 btn-outline-secondary dropdown w-100 p-0 pointer"
                                            style="height: 68px;background: #fff;border: 1px solid;width: 100%;">
                                        <div class="d-flex flex-column h-100">
                                            <div
                                                class="d-flex flex-column delivery-selector m-0 p-0 border-0 h-100 selected">
                                                <div
                                                    class="size-14 size-lg-12 size-xl-14 input-content d-flex p-0 h-100">
                                                    <div class="d-flex w-100">
                                                        <div class="d-flex w-100">
                                                            <i class="icon-calendar opacity-25 size-24 d-flex align-items-center px-1"></i>
                                                            <div
                                                                class="input-text flex-fill schedule-content w-100 d-flex align-items-center">
                                                                <div class="text-center w-100" id="customDate">
                                                                    <p class="mb-0"
                                                                       style="font-weight: bold;margin: 0;">mar. 18,
                                                                        agosto</p>
                                                                    2:00PM - 5:00PM<br>
                                                                    <div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <!----> <!----> <!---->
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <br>
                            <h3 class="product-section">2- Seleccionar Complementos (opcional)</h3>
                            <div class="row">
                                @foreach ($complements as $complement)
                                    <div class="col-md-4">
                                        <img
                                            src="{{$complement->images ? '/storage/complements/'.json_decode($complement->images, true)[0] : 'https://www.magnoliascusco.com/wp-content/uploads/2018/04/ferrero-rocher-corazon-8-150x150.jpg'}}"
                                            alt="">
                                    </div>
                                @endforeach
                            </div>
                            <br>
                            <h3 class="product-section">3- Continuar</h3>
                            <div class="product-btns">
                                <form action="{{route('session.addProduct.post')}}" method="post">
                                    @csrf
                                    <input type="text" name="productId" value="{{$product->id}}" hidden>
                                    <button class="primary-btn add-to-cart col-md-12">
                                        <i class="fa fa-shopping-cart"></i>Continuar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="product-tab">
                            <ul class="tab-nav">
                                <li class="active"><a data-toggle="tab" href="#tab1">Descripción del producto</a></li>
                                <li><a data-toggle="tab" href="#tab2">Políticas de envío</a></li>
                                <li><a data-toggle="tab" href="#tab3">Políticas de sustitución</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="tab1" class="tab-pane fade in active">
                                    <p>{{$product->content}}</p>
                                </div>
                                <div id="tab2" class="tab-pane fade in">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        Duis aute
                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                        qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <div id="tab3" class="tab-pane fade in">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                                        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                        Duis aute
                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                        qui officia deserunt mollit anim id est laborum.</p>
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

    <!-- Modal-->
    <div class="modal fade" id="customDateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">SELECCIONAR HORARIO</h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="padding:15px">
                        <div class="col-md-12">
                            <div class="date-picker-2"></div>
                        </div>
                        <div class="col-md-4" style="padding-top: 7px" id="hour-buttons"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
    <script>

        $(".date-picker-2").datepicker({
            onSelect: (dateText) => {
                let d = new Date(dateText);
                let html = `<button  class="calendar-buttons3" onclick="option('8:00-9:00', ${d.getDate()})">8:00 am – 9:00 am</button><button  class="calendar-buttons3">10:00 am – 12:00 pm</button><button  class="calendar-buttons3">12:00 pm – 2:00 pm</button>`;
                $('#hour-buttons').html(html);

            }
        });

        function option(hour, day) {
            console.log(3, hour)
            console.log(4, day)
        }

        $('#customDate').click(function () {
            $('#customDateModal').modal('show');
        });
    </script>
    <style>
        .ui-datepicker {
            width: 100%;
        }

        .ui-datepicker-header {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .ui-widget-header {
            color: white;
        }

        .ui-widget-header a {
            color: white;
        }

    </style>
@endsection
