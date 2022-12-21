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
                            <img class="banner-img-fit" src="{{$slider->images ? '/images/sliders/'.json_decode($slider->images, true)[0] : 'https://www.magnoliascusco.com/wp-content/uploads/2019/02/arreglo-siempre-juntos-b2-370x370.jpg'}}"
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
                        @foreach ($products as $product)
                            <!-- Product Single -->
                            <div class="product product-single">
                                <div class="product-thumb">
                                    <div class="product-label">
                                        <span class="sale">{{round(($product->price - $product->old_price) * 100 / $product->price)}}%</span>
                                    </div>
                                    <a href="{{url('/single-product/'.$product->id)}}" class="main-btn quick-view"><i
                                            class="fa fa-search-plus"></i> Ver producto
                                    </a>
                                    <img
                                        src="{{$product->images ? asset('images/products/'.json_decode($product->images, true)[0]) : 'https://www.magnoliascusco.com/wp-content/uploads/2019/02/arreglo-siempre-juntos-b2-370x370.jpg'}}"
                                        alt="">
                                </div>
                                <div class="product-body">
                                    <h3 class="product-price">S/{{$product->price}}
                                        <del class="product-old-price">S/{{$product->old_price}}</del>
                                    </h3>
                                    <h2 class="product-name"><a href="#">{{$product->name}}</a></h2>
                                </div>
                            </div>
                            <!-- /Product Single -->
                            @endforeach
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
