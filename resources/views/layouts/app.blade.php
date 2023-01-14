<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Magnolias Cusco</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"/>

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/slick.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/slick-theme.css') }}"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/nouislider.min.css') }}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/style.css') }}"/>

    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/custom-styles.css') }}"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="page-container">
    <div class="overlay-mega-menu" id="overlay-mega-menu"></div>
    <!-- HEADER -->
    <header>
        <!-- top Header -->
        <div id="top-header" class="primary-bg top-header">
            <div class="container">
                <div class="pull-left">
                    <span><i class="fa fa-whatsapp"></i> +51 984750606 | </span>
                    <span><i class="fa fa-mobile"></i> +51 958154031 | </span>
                    <span><i class="fa fa-phone"></i> +51 084 594446</span>
                </div>
                <div class="pull-right">
                    <ul class="header-top-links">
                        <li><a href="#">Store Locations</a></li>
                        <li><a href="#">Online Flowers</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /top Header -->

        <!-- header -->
        <div id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <!-- Logo -->
                            <div class="header-logo col-md-3">
                                <div class="justify-logo">
                                    <a class="logo" href="#">
                                        <img src="{{ asset('assets/img/brand/logo.png') }}" alt="logo">
                                    </a>
                                </div>
                            </div>
                            <!-- /Logo -->
                            <div class="header-search col-md-9">
                                <form id="labnol" method="get">
                                    <input class="input search-input" name="buscar" id="transcript" type="text"
                                           placeholder="¿Qué estás buscando?">
                                    <span onclick="startDictation()" class="justify-mic search-btn"><i
                                            class="fa fa-microphone"></i></span>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-right">
                        <ul class="header-btns">
                            <!-- Account -->
                            <li class="header-account dropdown default-dropdown">
                                @guest
                                    <div class="access-login">
                                        <div class="header-btns-icon">
                                            <i class="fa fa-user-o"></i>
                                        </div>
                                        <a href="{{route('login')}}" class="text-uppercase btn-login">Acceder</a>
                                        <a href="{{route('register')}}" class="text-uppercase">Registrarse</a>
                                    </div>
                                @endguest
                                @auth
                                    <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                                        <div class="access-login">
                                            <div class="header-btns-icon">
                                                <i class="fa fa-user-o"></i>
                                            </div>
                                            <strong class="text-uppercase">{{auth()->user()->name}} <i class="fa fa-caret-down"></i></strong>
                                        </div>
                                    </div>
                                @endauth
                                <ul class="custom-menu">
                                    <li><a href="#"><i class="fa fa-user-o"></i> Mi cuenta</a></li>
                                    <li><a href="/my-orders"><i class="fa fa-user-o"></i> Mis compras</a></li>
                                    <li><a href="#" id="logout-button"><i class="fa fa-unlock-alt"></i> Salir</a></li>
                                </ul>
                            </li>
                            <!-- /Account -->

                            <!-- Mobile nav toggle-->
                            <li class="nav-toggle">
                                <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
                            </li>
                            <!-- / Mobile nav toggle -->
                        </ul>
                    </div>
                </div>
            </div>
            <!-- header -->
        </div>
        <!-- container -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <div id="navigation" class="navigation-shadow">
        <!-- container -->
        <div class="container">
            <div id="responsive-nav" class="nav-bg">
                <!-- menu nav -->
                <div class="menu-nav">
                    <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                    <ul class="menu-list">
                        <li><a href="{{url('/')}}">Inicio</a></li>
                        <li><a href="{{route('products')}}">Tienda</a></li>
                        <li class="dropdown mega-dropdown mega-main">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="true">Por Ocasión <i class="fa fa-caret-down"></i>
                            </a>
                            <div class="custom-menu">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li><a href="#">Cumpleaños</a></li>
                                            <li><a href="#">Amor y aniversarios</a></li>
                                            <li><a href="#">Nacimientos</a></li>
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li><a href="#">San Valentín</a></li>
                                            <li><a href="#">Día del padre</a></li>
                                            <li><a href="#">Día de la madre</a></li>
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li><a href="#">Mejorate</a></li>
                                            <li><a href="#">Gracias</a></li>
                                            <li><a href="#">Mejores deseos</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row hidden-sm hidden-xs">
                                    <div class="col-md-12">
                                        <hr>
                                        <a class="banner banner-1" href="#">
                                            <img class="nav-img-fit"
                                                 src="https://media-exp1.licdn.com/dms/image/C4E1BAQHU77Da1HGgtA/company-background_10000/0?e=2159024400&v=beta&t=us_7A5cSfy5Cde3_dv_QWLRRL2DFxAPmBwT68hzinCI"
                                                 alt="">
                                            <div class="banner-caption text-center">
                                                <h2 class="white-color">UN REGALO PERFECTO</h2>
                                                <h3 class="white-color font-weak">PARA LA OCASIÓN PERFECTA</h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown mega-dropdown mega-main">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="true">Por tipo <i class="fa fa-caret-down"></i>
                            </a>
                            <div class="custom-menu">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li><a href="#">Ramos</a></li>
                                            <li><a href="#">Combinados</a></li>
                                            <li><a href="#">Gerberas</a></li>
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li><a href="#">Girasoles</a></li>
                                            <li><a href="#">Lilys / Stargazer</a></li>
                                            <li><a href="#">Orquídeas</a></li>
                                        </ul>
                                        <hr class="hidden-md hidden-lg">
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="list-links">
                                            <li><a href="#">Plantas</a></li>
                                            <li><a href="#">Rosas</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row hidden-sm hidden-xs">
                                    <div class="col-md-12">
                                        <hr>
                                        <a class="banner banner-1" href="#">
                                            <img class="nav-img-fit"
                                                 src="https://images.food52.com/G1SGDj8VuusTxHrzWG8EjkvTiJQ=/1200x900/b7db9ece-1db1-496f-821e-211c1c39aa91--2019-0410_farmgirl-flowers_single-stem-flowers_family_silo_ty-mecham_018.jpg"
                                                 alt="">
                                            <div class="banner-caption text-center">
                                                <h2 class="white-color">EL TIPO EXACTO</h2>
                                                <h3 class="white-color font-weak">PARA CADA MOMENTO</h3>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li><a href="#">Contacto</a></li>
                        <li><a href="#"><span class="nav-featured">Primavera</span></a></li>
                        <li><a href="#"><span class="nav-featured">Promociones</span></a></li>
                    </ul>
                </div>
                <!-- menu nav -->
            </div>
        </div>
        <!-- /container -->
    </div>
    <!-- /NAVIGATION -->

    <!-- CONTENT -->
    <div class="page-content">
        @yield('content')
    </div>
    <!-- CONTENT -->

    <!-- FOOTER -->
    <footer id="footer" class="section section-grey page-footer">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- footer widget -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="footer">
                        <!-- footer logo -->
                        <div class="footer-logo text-center">
                            <a class="logo" href="#">
                                <img src="{{asset('assets/img/brand/logo-footer.png')}}" alt="">
                            </a>
                        </div>
                        <!-- /footer logo -->

                        <!-- footer social -->
                        <ul class="footer-social text-center">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                        <!-- /footer social -->
                    </div>
                </div>
                <!-- /footer widget -->

                <!-- footer widget -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-header">Ayuda</h3>
                        <ul class="list-links">
                            <li><a href="#">Preguntas frecuentes</a></li>
                            <li><a href="#">Servicios especiales</a></li>
                            <li><a href="#">Políticas de envío</a></li>
                            <li><a href="#">Políticas de privacidad</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /footer widget -->

                <div class="clearfix visible-sm visible-xs"></div>

                <!-- footer widget -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-header">Conócenos</h3>
                        <ul class="list-links">
                            <li><a href="#">Sobre nosotros</a></li>
                            <li><a href="#">Blog</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /footer widget -->

                <!-- footer subscribe -->
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-header">Contacto</h3>
                        <ul class="list-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i> Av. el Sol N° 315 Cercado de Cusco</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> info@magnoliascusco.com</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> clientes@magnoliascusco.com</a></li>
                            <li><a href="#"><i class="fa fa-whatsapp"></i> +51 984750606</a></li>
                            <li><a href="#"><i class="fa fa-mobile"></i> +51 958154031</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i> +51 084 594446</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /footer subscribe -->
            </div>
            <!-- /row -->
            <hr>
            <!-- row -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <!-- footer copyright -->
                    <div class="footer-copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                        . magnoliascusco.com
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </div>
                    <!-- /footer copyright -->
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </footer>
    <!-- /FOOTER -->
</div>
<script>

    let overlay = document.getElementById('overlay-mega-menu');
    let lists = document.querySelectorAll(".mega-main");

    lists.forEach(function (elem) {
        elem.addEventListener('mouseover', function () {
            overlay.classList.add('visible')
        })
        elem.addEventListener('mouseleave', function () {
            overlay.classList.remove('visible')
        })
    });

    function startDictation() {

        if (window.hasOwnProperty('webkitSpeechRecognition')) {

            let recognition = new webkitSpeechRecognition();

            recognition.continuous = false;
            recognition.interimResults = false;
            recognition.lang = "es-ES";
            recognition.start();

            recognition.onresult = function (e) {
                document.getElementById('transcript').value = e.results[0][0].transcript;
                recognition.stop();
                document.getElementById('labnol').submit();
            };
            recognition.onerror = function (e) {
                recognition.stop();
            }
        }
    }

</script>

<!-- jQuery Plugins -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/nouislider.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.zoom.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<script>
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

    var logoutButton = document.getElementById('logout-button');

    logoutButton.addEventListener('click', function () {
        fetch('/logout', {
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            },
            method: 'POST',
        })
            .then(function (response) {
                window.location = '/'
            })
            .catch(function (error) {
                console.error('Error:', error);
            });
    });


</script>

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/619400866885f60a50bc1967/1fkl2440u';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
