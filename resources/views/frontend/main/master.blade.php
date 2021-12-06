<!DOCTYPE html>
<html lang="en">
    <head>
        {{-- <base href="{{asset('frontend')}}/"> --}}
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shops Homepage </title>
        {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" /> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="{{asset('/frontend/css/icons.css')}} " rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{asset('/frontend/css/styles.css')}} " rel="stylesheet" />
        {{-- <link href="css/treeview.css" rel="stylesheet"> --}}
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>    
    </head>
    <body>
        <!-- Navigation-->
        @include('frontend.main.header')
        <!-- Section-->
        <section class="">
            @yield('content')
        </section>
        <!-- Footer-->
        @include('frontend.main.footer')
        <!-- Bootstrap core JS-->
        <script src=" {{asset('/frontend/js/bootstrap.bundle.min.js')}} "></script>
        <!-- Core theme JS-->
        <script src="{{asset('/frontend/js/scripts.js')}} "></script>
        @yield('js')
        @yield('notification')
        {{-- <script src="js/treeview.js"></script> --}}
    </body>
</html>
