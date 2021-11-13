@extends('layouts.app')

@section('content')
    <!-- HOME -->
    <div id="home">

        <!-- home wrap -->
        <div class="">
            <!-- home slick -->
            <div id="home-slick">
                @foreach($sliders as $slider)
                    <!-- banner -->
                        <div class="banner banner-1">
                            <img class="banner-img-fit" src="{{$slider->images ? '/storage/sliders/'.json_decode($slider->images, true)[0] : 'https://www.magnoliascusco.com/wp-content/uploads/2019/02/arreglo-siempre-juntos-b2-370x370.jpg'}}"
                                 alt="">
                            <div class="banner-caption text-center">
                                <h1>{{$slider->title}}</h1>
                                <h3 class="white-color font-weak">{{$slider->subtitle}}</h3>
                                <a class="primary-btn" href="{{$slider->link}}">Tienda</a>
                            </div>
                        </div>
                        <!-- /banner -->
                @endforeach
            </div>
            <!-- /home slick -->
        </div>
        <!-- /home wrap -->

        <!-- container -->
        <div class="container">

            <section>
                <div class="row">
                    <figure class="col-sm-4 boxes">
                        <a href="#" class="justify-left-boxes">
                            <img src="{{ asset('assets/img/icons/truck.svg') }}" width="62" height="55">
                            <figcaption class="fig-text-boxes"><b>DELIVERY</b><br>LUNES - SÁBADOS</figcaption>
                        </a>
                    </figure>
                    <figure class="col-sm-4 boxes">
                        <a href="#" class="justify-left-boxes">
                            <img src="{{ asset('assets/img/icons/flower.svg') }}"
                                 alt="Trust Pearsons Gift Stores Sydney" width="62" height="55">
                            <figcaption class="fig-text-boxes"><b>CALIDAD</b> EN<br>FLORES SELECCIONADAS</figcaption>
                        </a>
                    </figure>
                    <figure class="col-sm-4 boxes">
                        <a href="#" class="justify-left-boxes">
                            <img src="{{ asset('assets/img/icons/florista.svg') }}"
                                 alt="Quality Sydney Flowers Guaranteed" width="62" height="55">
                            <figcaption class="fig-text-boxes"><b>ASESORAMIENTO</b> DE EXPERTOS EN FLORISTERÍA<br>
                            </figcaption>
                        </a>
                    </figure>
                </div>
            </section>

        </div>
        <!-- /container -->
    </div>
    <!-- /HOME -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section-title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">Diseños destacados</h2>
                        <div class="pull-right">
                            <div class="product-slick-dots-1 custom-dots"></div>
                        </div>
                    </div>
                </div>
                <!-- /section-title -->

                <!-- Product Slick -->
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div id="product-slick-1" class="product-slick">
                            <!-- Product Single -->
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <span>Nuevo</span>
                                        <span class="sale">-20%</span>
                                    </div>
                                    <a href="{{url('/single-product')}}" class="main-btn quick-view"><i
                                            class="fa fa-search-plus"></i> Ver producto
                                    </a>
                                    <img
                                        src="https://www.magnoliascusco.com/wp-content/uploads/2019/02/Deseo-cumplido-B06-370x370.jpg"
                                        alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">S/85.00
                                        <del class="product-old-price">S/100.00</del>
                                    </h3>
                                    <h2 class="product-name"><a href="#">Deseo cumplido</a></h2>
                                    <div class="product-btns">
                                        <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i>
                                            Agregar al carrito
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /Product Single -->

                            <!-- Product Single -->
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <span class="sale">-20%</span>
                                    </div>
                                    <a href="{{url('/single-product')}}" class="main-btn quick-view"><i
                                            class="fa fa-search-plus"></i> Ver producto
                                    </a>
                                    <img
                                        src="https://www.magnoliascusco.com/wp-content/uploads/2019/02/arreglo-siempre-juntos-b2-370x370.jpg"
                                        alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">S/100.00
                                        <del class="product-old-price">S/115.00</del>
                                    </h3>
                                    <h2 class="product-name"><a href="#">Siempre juntos</a></h2>
                                    <div class="product-btns">
                                        <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i>
                                            Agregar al carrito
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /Product Single -->

                            <!-- Product Single -->
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <span>Nuevo</span>
                                        <span class="sale">-20%</span>
                                    </div>
                                    <a href="{{url('/single-product')}}" class="main-btn quick-view"><i
                                            class="fa fa-search-plus"></i> Ver producto
                                    </a>
                                    <img
                                        src="https://www.magnoliascusco.com/wp-content/uploads/2018/05/oso-flores-bouquet-1-370x370.jpg"
                                        alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">S/200.00
                                        <del class="product-old-price">S/250.00</del>
                                    </h3>
                                    <h2 class="product-name"><a href="#">Oso de peluche y ramo de rosas</a></h2>
                                    <div class="product-btns">
                                        <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i>
                                            Agregar al carrito
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /Product Single -->

                            <!-- Product Single -->
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <span>Nuevo</span>
                                        <span class="sale">-20%</span>
                                    </div>
                                    <a href="{{url('/single-product')}}" class="main-btn quick-view"><i
                                            class="fa fa-search-plus"></i> Ver producto
                                    </a>
                                    <img
                                        src="https://www.magnoliascusco.com/wp-content/uploads/2018/04/eterno-detalle-cap1-370x370.jpg"
                                        alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">S/85.00
                                        <del class="product-old-price">S/100.00</del>
                                    </h3>
                                    <h2 class="product-name"><a href="#">Eterno detalle</a></h2>
                                    <div class="product-btns">
                                        <button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i>
                                            Agregar al carrito
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /Product Single -->
                        </div>
                    </div>
                </div>
                <!-- /Product Slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->

    <!-- section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- section-title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h2 class="title">¿Qué estás buscando?</h2>
                    </div>
                </div>
                <!-- /section-title -->
                <!-- banner -->
                <div class="col-md-4 col-sm-6 container-banner">
                    <div class="banner banner-1 categories-img"
                         style="background: url('/assets/img/banners/banner-1.png')center/cover">
                        <div class="text-center">
                            <p>
                                <strong class="categories-text-strong">Gift Ideas for</strong>
                                <span class="categories-text-span">Father's Day</span>
                            </p>
                            <button class="primary-btn categories-button">
                                AMISTAD
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-8 col-sm-6 container-banner">
                    <div class="banner banner-1 categories-img"
                         style="background: url('/assets/img/banners/banner-2.png')center/cover">
                        <div class="text-center">
                            <p>
                                <strong class="categories-text-strong">Gift Ideas for</strong>
                                <span class="categories-text-span">Father's Day</span>
                            </p>
                            <button class="primary-btn categories-button">
                                AMOR
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-8 col-sm-6 container-banner">
                    <div class="banner banner-1 categories-img"
                         style="background: url('/assets/img/banners/banner-3.png')center/cover">
                        <div class="text-center">
                            <p>
                                <strong class="categories-text-strong">Gift Ideas for</strong>
                                <span class="categories-text-span">Father's Day</span>
                            </p>
                            <button class="primary-btn categories-button">
                                CONDOLENCIAS
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-4 col-sm-6 container-banner">
                    <div class="banner banner-1 categories-img"
                         style="background: url('/assets/img/banners/banner-4.jpg')center/cover">
                        <div class="text-center">
                            <p>
                                <strong class="categories-text-strong">Gift Ideas for</strong>
                                <span class="categories-text-span">Father's Day</span>
                            </p>
                            <button class="primary-btn categories-button">
                                REGALOS
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-4 col-sm-6 container-banner">
                    <div class="banner banner-1 categories-img"
                         style="background: url('/assets/img/banners/banner-4.jpg')center/cover">
                        <div class="text-center">
                            <p>
                                <strong class="categories-text-strong">Gift Ideas for</strong>
                                <span class="categories-text-span">Father's Day</span>
                            </p>
                            <button class="primary-btn categories-button">
                                FESTIVIDAD
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-8 col-sm-6 container-banner">
                    <div class="banner banner-1 categories-img"
                         style="background: url('/assets/img/banners/banner-5.png')center/cover">
                        <div class="text-center">
                            <p>
                                <strong class="categories-text-strong">Gift Ideas for</strong>
                                <span class="categories-text-span">Father's Day</span>
                            </p>
                            <button class="primary-btn categories-button">
                                EVENTOS
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /banner -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /section -->
@endsection
