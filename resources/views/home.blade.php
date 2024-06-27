@extends('layouts.app')

@section('content')
    <!-- HOME -->
    <div id="home" class="home-container">

        <!-- home wrap -->
        <div class="">
            <!-- home slick -->
            <div id="home-slick">
                @foreach($sliders as $slider)
                    <!-- banner -->
                        <div class="banner banner-content" style="background-image: linear-gradient(rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.8)),url('{{asset('assets/img/brand/logo-bg.svg')}}')">
                            <img class="banner-img-fit" src="{{$slider->images ? '/images/sliders/'.json_decode($slider->images, true)[0] : 'https://www.magnoliascusco.com/wp-content/uploads/2021/06/web-envia-1.jpg'}}"
                                 alt="">
                            <div class="banner-caption text-left">
                                <img src="{{asset('assets/img/brand/logo-only-text.svg')}}" width="400px">
                                <h3 class="font-weak">{{$slider->subtitle}}</h3>
                            </div>
                        </div>
                        <!-- /banner -->
                @endforeach
            </div>
            <!-- /home slick -->
        </div>
        <!-- /home wrap -->
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
                        <h2 class="title">Últimos ingresos</h2>
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
                                    <a href="{{url('/single-product/'.$product->id)}}" class="quick-view primary-btn"><i
                                            class="fa fa-search-plus"></i> Ver producto
                                    </a>
                                    <img
                                        src="{{$product->images ? asset('images/products/'.json_decode($product->images, true)[0]) : 'https://www.magnoliascusco.com/wp-content/uploads/2019/02/arreglo-siempre-juntos-b2-370x370.jpg'}}"
                                        alt="">
                                </div>
                                <div class="product-body">
                                    <h2 class="product-name"><a href="#">{{$product->name}}</a></h2>
                                    <h4 class="product-price">${{$product->price}}
                                        <del class="product-old-price">S/{{$product->old_price}}</del>
                                    </h4>
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
                        <h2 class="title">Categorías</h2>
                    </div>
                </div>
                <!-- /section-title -->
                <!-- banner -->
                <div class="col-md-4 col-sm-6 container-banner">
                    <div class="banner banner-content categories-img"
                         style="background: url('{{asset('assets/img/banners-ocasiones/banner1.png')}}')center/cover">
                        <div class="text-center">
                            <p>
                                <strong class="categories-text-strong">Remeras</strong>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-4 col-sm-6 container-banner">
                    <div class="banner banner-content categories-img"
                         style="background: url('{{asset('assets/img/banners-ocasiones/banner2.png')}}')center/cover">
                        <div class="text-center">
                            <p>
                                <strong class="categories-text-strong">Abrigos</strong>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- /banner -->

                <!-- banner -->
                <div class="col-md-4 col-sm-6 container-banner">
                    <div class="banner banner-content categories-img"
                         style="background: url('{{asset('assets/img/banners-ocasiones/banner3.png')}}')center/cover">
                        <div class="text-center">
                            <p>
                                <strong class="categories-text-strong">Pantalones</strong>
                            </p>
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

    <!-- container -->
    <div class="container">
        <section>
            <div class="row boxes">
                <figure class="col-sm-3">
                    <div class="justify-center">
                        <img src="{{ asset('assets/img/icons/whatsapp.svg') }}" width="62" height="55">
                    </div>
                    <figcaption class="text-center boxes-text">¿Te ayudamos?</figcaption>
                </figure>
                <figure class="col-sm-3">
                    <div class="justify-center">
                        <img src="{{ asset('assets/img/icons/me-bi.svg') }}" width="62" height="55">
                    </div>
                    <figcaption class="text-center boxes-text">Medios de pago</figcaption>
                </figure>
                <figure class="col-sm-3">
                    <div class="justify-center">
                        <img src="{{ asset('assets/img/icons/cube.svg') }}" width="62" height="55">
                    </div>
                    <figcaption class="text-center boxes-text">Envíos a todo el país</figcaption>
                </figure>
                <figure class="col-sm-3">
                    <div class="justify-center">
                        <img src="{{ asset('assets/img/icons/instagram.svg') }}" width="62" height="55">
                    </div>
                    <figcaption class="text-center boxes-text">Seguinos</figcaption>
                </figure>
            </div>
        </section>
    </div>
    <!-- /container -->
@endsection
