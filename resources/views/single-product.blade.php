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
                            @if(!$product->images)
                                <div class="product-view">
                                    <img
                                        src="https://www.magnoliascusco.com/wp-content/uploads/2019/02/arreglo-siempre-juntos-b2-370x370.jpg"
                                        alt="">
                                </div>
                            @endif
                            @foreach (json_decode($product->images, true) as $image)
                                <div class="product-view">
                                    <img src="{{'/images/products/'.$image}}" alt="">
                                </div>
                            @endforeach
                        </div>
                        <div id="product-view">
                            @if(!$product->images)
                                <div class="product-view">
                                    <img
                                        src="https://www.magnoliascusco.com/wp-content/uploads/2019/02/arreglo-siempre-juntos-b2-370x370.jpg"
                                        alt="">
                                </div>
                            @endif
                            @foreach (json_decode($product->images, true) as $image)
                                <div class="product-view">
                                    <img src="{{'/images/products/'.$image}}" alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-body">
                            <div class="product-label">
                                <span class="sale">-{{round(($product->price - $product->old_price) * 100 / $product->price)}}%</span>
                            </div>
                            <h2 class="product-name">{{$product->name}}</h2>
                            <h3 class="product-price">S/{{$product->price}}
                                <del class="product-old-price">/S{{$product->old_price}}</del>
                            </h3>

                            <hr>
                            <h3 class="product-section">1- Seleccionar horario</h3>
                            <div data-v-b4f612e4=""
                                 class="col-md-12 d-flex flex-column flex-lg-row p-0"
                                 style="display: flex;">
                                <div class="row w-100">
                                    <div class="schedule-select p-0 mr-1 col-md-4 schedule-select option-select mb-1">
                                        <button type="button" data-toggle="collapse" aria-expanded="true"
                                                aria-controls="schedules20200817" data-target="#schedules20200817"
                                                class="calendar-card">
                                            <p class="size-16 font-weight-bold mb-0" style="
    font-weight: bold;
    margin: 0;
">Hoy</p>
                                            <span id="todayDate"></span>
                                        </button>
                                        <div id="schedules20200817" class="collapse">
                                            <div aria-labelledby="dropdownMenuButton" class="text-center">
                                                <div value="0"
                                                     onclick="optionToday('8:00-11:00')"
                                                     class="calendar-buttons calendar-buttons-disabled">
                                                    8:00AM - 11:00AM
                                                </div>
                                                <div value="1"
                                                     onclick="optionToday('11:00-14:00')"
                                                     class="calendar-buttons calendar-buttons-disabled">
                                                    11:00AM - 2:00PM
                                                </div>
                                                <div value="2"
                                                     onclick="optionToday('14:00-17:00')"
                                                     class="calendar-buttons calendar-buttons-disabled">
                                                    2:00PM - 5:00PM
                                                </div>
                                                <div value="3"
                                                     onclick="optionToday('17:00-20:00')"
                                                     class="calendar-buttons unselectable">
                                                    5:00PM - 8:00PM
                                                </div>
                                            </div> <!---->
                                        </div>
                                    </div>

                                    <div class="schedule-select p-0 mr-1 col-md-4 schedule-select option-select mb-1">
                                        <button type="button" data-toggle="collapse" aria-expanded="true"
                                                aria-controls="schedules20200818" data-target="#schedules20200818"
                                                class="calendar-card">
                                            <p class="size-16 font-weight-bold mb-0"
                                               style="font-weight: bold;margin: 0;">
                                                Mañana</p>
                                            <span id="tomorrowDate"></span>
                                        </button>
                                        <div id="schedules20200818" class="collapse">
                                            <div aria-labelledby="dropdownMenuButton" class="text-center">
                                                <div value="0"
                                                     onclick="optionTomorrow('8:00-11:00')"
                                                     class="calendar-buttons calendar-buttons-disabled">
                                                    8:00AM - 11:00AM
                                                </div>
                                                <div value="1"
                                                     onclick="optionTomorrow('11:00-14:00')"
                                                     class="calendar-buttons calendar-buttons-disabled">
                                                    11:00AM - 2:00PM
                                                </div>
                                                <div value="2"
                                                     onclick="optionTomorrow('14:00-17:00')"
                                                     class="calendar-buttons calendar-buttons-disabled">
                                                    2:00PM - 5:00PM
                                                </div>
                                                <div value="3"
                                                     onclick="optionTomorrow('17:00-20:00')"
                                                     class="calendar-buttons unselectable">
                                                    5:00PM - 8:00PM
                                                </div>
                                            </div> <!----> <!----><!----><!---->
                                        </div>
                                    </div>

                                    <div class="p-0 col-md-4 schedule-select schedule-select option-select"
                                         id="calendar-input-button">
                                        <button type="button" data-toggle="modal" data-target="#calendarModal"
                                                class="calendar-card">
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
                                                                           style="font-weight: bold;margin: 0;">
                                                                            Otra fecha</p>
                                                                        <span id="otherDate">Seleccionar...</span>
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
                            </div>

                            <div class="clearfix"></div>
                            <br>
                            <h3 class="product-section">2- Seleccionar Complementos (opcional)</h3>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="complements-slick" id="complements-slick">
                                        @foreach ($complements as $complement)
                                            <!-- banner -->
                                            <div class="banner banner-1">
                                                <div style="padding: 5px">
                                                    <div class="complement-card">
                                                        <h5 class="complement-title">{{$complement->name}}</h5>
                                                        <div class="complement-content">
                                                            <img class="banner-img-fit-complements"
                                                                 src="{{$complement->images ? '/images/complements/'.json_decode($complement->images, true)[0] : 'https://www.magnoliascusco.com/wp-content/uploads/2018/04/ferrero-rocher-corazon-8-150x150.jpg'}}"
                                                                 alt="">
                                                            <div class="complement-button text-center">
                                                                <button class="primary-btn"
                                                                        onclick="optionComplement(event, {{$complement->id}})">
                                                                    Añadir
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /banner -->
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div style="padding: 5px">
                                        <div class="complement-card">
                                            <h5 class="complement-title">Ver todos</h5>
                                            <div class="complement-content">
                                                <a class="complement-plus-link" id="complementPlusLink">
                                                    <img class="complement-plus"
                                                         src="{{asset('assets/img/icons/plus.svg')}}"
                                                         alt="">
                                                    <h5 style="padding: 5px">Ver más</h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <h3 class="product-section">3- Continuar</h3>
                            <div class="product-btns">
                                <form action="{{route('session.addProduct.post')}}" method="post">
                                    @csrf
                                    <input type="text" name="productId" value="{{$product->id}}" hidden>
                                    <input type="text" name="complements" id="complements" hidden>
                                    <input type="text" name="shipmentHour" id="shipmentHour" hidden>
                                    <input type="text" name="shipmentDate" id="shipmentDate" hidden>
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
                    <h4 class="modal-title" id="myModalLabel">SELECCIONAR FECHA</h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="padding:15px">
                        <div class="col-md-12">
                            <div class="date-picker-2"></div>
                        </div>
                        <div class="col-md-12">
                            <h4 class="primary-color mt-3">Horarios</h4>
                            <div class="col-md-5" id="hour-buttons"></div>
                        </div>
                        <div class="col-md-12">
                            <h4 class="primary-color mt-3 mb-0">Horarios especiales</h4>
                            <div>
                                <span>(Tiene un costo adicional de + S/15)</span>
                            </div>
                            <div class="col-md-5" id="hour-buttons-special"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Complement Modal-->
    <div class="modal fade" id="complementsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">SELECCIONAR COMPLEMENTO</h4>
                </div>
                <div class="modal-body">
                    <div class="row" style="padding:15px">
                        <div class="col-md-12">
                            @foreach($complementCategories as $complementCategory)
                                <div class="complement-category-btn-container">
                                    <a class="btn primary-btn w-100 complement-category-btn" data-toggle="collapse"
                                       href="#complementCategory{{$complementCategory->id}}" role="button"
                                       aria-expanded="false"
                                       onclick="rotateIcon('complementCategoryIcon'+{{$complementCategory->id}})">
                                        <span>{{$complementCategory->name}}</span>
                                        <img id="complementCategoryIcon{{$complementCategory->id}}"
                                             src="{{asset('assets/img/icons/arrow-down.svg')}}" style="width: 20px;">
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="collapse multi-collapse"
                                             id="complementCategory{{$complementCategory->id}}">
                                            <div class="card card-body">
                                                @foreach($complementCategory->complement as $complement)
                                                    <div class="col-md-5">
                                                        <div style="padding: 5px">
                                                            <div class="complement-card">
                                                                <h5 class="complement-title">{{$complement->name}}</h5>
                                                                <div class="complement-content">
                                                                    <img class="banner-img-fit-complements"
                                                                         src="{{$complement->images ? '/images/complements/'.json_decode($complement->images, true)[0] : 'https://www.magnoliascusco.com/wp-content/uploads/2018/04/ferrero-rocher-corazon-8-150x150.jpg'}}"
                                                                         alt="">
                                                                    <div class="complement-button text-center">
                                                                        <button class="primary-btn"
                                                                                onclick="optionComplement(event, {{$complement->id}})">
                                                                            Añadir
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
        const months = {
            1: 'Enero',
            2: 'Febrero',
            3: 'Marzo',
            4: 'Abril',
            5: 'Mayo',
            6: 'Junio',
            7: 'Julio',
            8: 'Agosto',
            9: 'Septiembre',
            10: 'Octubre',
            11: 'Noviembre',
            12: 'Diciembre'
        }

        $(document).ready(function () {
            let d = new Date();
            const todayDay = `${d.getDate()}`
            const todayMonth = `${d.getMonth() + 1}`
            const tomorrowDay = `${d.getDate() + 1}`
            const tomorrowMonth = `${d.getMonth() + 1}`

            $('#todayDate').html(`${todayDay} de ${months[todayMonth]}`);
            $('#tomorrowDate').html(`${tomorrowDay} de ${months[tomorrowMonth]}`);

            $('.complements-slick').slick({
                slidesToShow: 3
            });

            $('#product-view').slick({
                slidesToShow: 3,
                arrows: false,
                asNavFor: '#product-main-view',
            });

            function fixSlickStyle(event, slick) {
                if (slick.slideCount <= slick.options.slidesToShow) {
                    slick.$slideTrack.css('transform','');
                }
            }

            $('#product-view')
                .on('setPosition', function(event, slick) {
                    fixSlickStyle(event, slick);
                })
                .on('afterChange', function(event, slick, currentSlide){
                    fixSlickStyle(event, slick);
                })
        });


        $(".date-picker-2").datepicker({
            onSelect: (dateText) => {
                let d = new Date(dateText);
                const fullDate = `${d.getFullYear()}/${d.getMonth() + 1}/${d.getDate()}`
                let html = `<button  class="calendar-buttons" onclick="option('8:00-9:00', '${fullDate}')">8:00 am – 9:00 am</button>`;
                html += `<button  class="calendar-buttons" onclick="option('10:00-12:00', '${fullDate}')">10:00 am – 12:00 pm</button>`;
                html += `<button  class="calendar-buttons" onclick="option('12:00-14:00', '${fullDate}')">12:00 am – 2:00 pm</button>`;
                $('#hour-buttons').html(html);

                let htmlSpecial = `<button  class="calendar-buttons" onclick="option('19:00-21:00', '${fullDate}')">19:00 pm – 21:00 pm</button>`;
                htmlSpecial += `<button  class="calendar-buttons" onclick="option('22:00-00:00', '${fullDate}')">22:00 pm – 00:00 am</button>`;
                htmlSpecial += `<button  class="calendar-buttons" onclick="option('06:00-08:00', '${fullDate}')">06:00 am – 08:00 pm</button>`;
                $('#hour-buttons-special').html(htmlSpecial);
            }
        });

        function option(hour, date) {
            $('#shipmentHour').val(hour);
            $('#shipmentDate').val(date);

            const otherDate = new Date(date)
            const otherDay = `${otherDate.getDate()}`
            const otherMonth = `${otherDate.getMonth() + 1}`

            $('#otherDate').html(`${otherDay} de ${months[otherMonth]}`);
        }

        function optionToday(hour) {
            let d = new Date();
            const fullDate = `${d.getFullYear()}/${d.getMonth() + 1}/${d.getDate()}`

            $('#shipmentHour').val(hour);
            $('#shipmentDate').val(fullDate);
        }

        function optionTomorrow(hour) {
            let d = new Date();
            const fullDate = `${d.getFullYear()}/${d.getMonth() + 1}/${d.getDate() + 1}`

            $('#shipmentHour').val(hour);
            $('#shipmentDate').val(fullDate);
        }

        function optionComplement(event, id) {
            let complements = $('#complements').val();
            complements = complements.split(',');

            if (complements.includes(String(id))) {
                complements = complements.filter(c => c !== String(id));
                event.target.innerHTML = 'Añadir'
            } else {
                complements.push(String(id));
                event.target.innerHTML = 'Quitar'
            }

            complements = complements.filter(c => c)
            complements = complements.join(',')

            $('#complements').val(complements);
        }

        $(document).on("click", ".calendar-buttons", function () {
            $('.calendar-buttons').removeClass('calendar-buttons-selected');
            $(this).addClass('calendar-buttons-selected');
        });

        $('#customDate').click(function () {
            $('#customDateModal').modal('show');
        });

        $('#complementPlusLink').click(function () {
            $('#complementsModal').modal('show');
        });

        function rotateIcon(id) {
            if (document.getElementById(id).style.transform === 'rotate(180deg)') {
                document.getElementById(id).style.transform = 'rotate(0deg)'
            } else {
                document.getElementById(id).style.transform = 'rotate(180deg)'
            }
        }
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
