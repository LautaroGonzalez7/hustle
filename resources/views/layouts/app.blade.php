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
        <!-- header -->
        <div id="header" class="fixed-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 text-right">
                        <!-- NAVIGATION -->
                        <div id="navigation">
                            <!-- container -->
                            <div class="">
                                <div id="responsive-nav" class="nav-bg">
                                    <!-- menu nav -->
                                    <div class="menu-nav">
                                        <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
                                        <ul class="menu-list">
                                            <li class="dropdown mega-dropdown mega-main">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                                   aria-expanded="true">Tienda <i class="fa fa-caret-down"></i>
                                                </a>
                                                <div class="custom-menu">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <ul class="list-links">
                                                                @foreach($allCategories["ocasiones"] as $category)
                                                                    @if(isset($category))
                                                                        <li><a href="#">{{$category->name}}</a></li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                            <hr class="hidden-md hidden-lg">
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li><a href="{{route('products')}}">Sobre Nosotros</a></li>
                                            <li><a href="#">Contacto</a></li>
                                        </ul>
                                    </div>
                                    <!-- menu nav -->
                                </div>
                            </div>
                            <!-- /container -->
                        </div>
                        <!-- /NAVIGATION -->
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <!-- Logo -->
                            <div class="header-logo col-md-12">
                                <div class="justify-logo">
                                    <a class="logo" href="#">
                                        <img src="{{ asset('assets/img/brand/logo.svg') }}" alt="logo">
                                    </a>
                                </div>
                            </div>
                            <!-- /Logo -->
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
                                            <span class="text-uppercase">{{auth()->user()->name}} <i class="fa fa-caret-down"></i></span>
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
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="footer">
                        <!-- footer logo -->
                        <div class="footer-logo text-left">
                            <h4 class="footer-title">HUSTLE</h4>
                            <span class="footer-subtitle">La elegencia del esfuerzo incansable.</span>
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
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-header">Información</h3>
                        <ul class="list-links">
                            <li><a href="#">Cambios y devoluciones</a></li>
                            <li><a href="#">Medios de pago</a></li>
                            <li><a href="#">Talles</a></li>
                            <li><a href="#">Envíos</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /footer widget -->

                <div class="clearfix visible-sm visible-xs"></div>

                <!-- footer widget -->
                <div class="col-md-4 col-sm-6 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-header">News Letter</h3>
                        <span class="footer-subtitle">Suscríbete y entérate de todas las novedades y ofertas.</span>
                        <div class="justify-center footer-newsletter">
                            <input type="text" placeholder="E-mail" class="form-control">
                            <button class="primary-btn">Suscribirse</button>
                        </div>
                    </div>
                </div>
                <!-- /footer widget -->
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
                        hustle.com
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
