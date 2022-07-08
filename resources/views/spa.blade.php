<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('/assets/img/brand/favicon.png')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Magnolias Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{asset('/spaAssets/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
        WebFont.load({
            google: {"families": ["Lato:300,400,700,900"]},
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: [{{asset('/spaAssets/css/fonts.min.css')}}]
            },
            active: function () {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--  Fonts and icons     -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/spaAssets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/spaAssets/css/atlantis.min.css')}}">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,400italic">
    <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
</head>
<body>
<div id="app"></div>

<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>

<!--   Core JS Files   -->
<script src="{{asset('spaAssets/js/core/jquery.3.2.1.min.js')}}"></script>
<script src="{{asset('spaAssets/js/core/popper.min.js')}}"></script>
<script src="{{asset('spaAssets/js/core/bootstrap.min.js')}}"></script>

<!-- jQuery UI -->
<script src="{{asset('spaAssets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
<script src="{{asset('spaAssets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

<!-- jQuery Scrollbar -->
<script src="{{asset('spaAssets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


<!-- Chart JS -->
<script src="{{asset('spaAssets/js/plugin/chart.js/chart.min.js')}}"></script>

<!-- jQuery Sparkline -->
<script src="{{asset('spaAssets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Chart Circle -->
<script src="{{asset('spaAssets/js/plugin/chart-circle/circles.min.js')}}"></script>

<!-- Datatables -->
<script src="{{asset('spaAssets/js/plugin/datatables/datatables.min.js')}}"></script>

<!-- Bootstrap Notify -->
<script src="{{asset('spaAssets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

<!-- jQuery Vector Maps -->
<script src="{{asset('spaAssets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('spaAssets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{asset('spaAssets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

<!-- Atlantis JS -->
<script src="{{asset('spaAssets/js/atlantis.min.js')}}"></script>
</body>
</html>
