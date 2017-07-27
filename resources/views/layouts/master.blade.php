<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FonoShop</title>

        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('ism/css/my-slider.css') }}" rel="stylesheet">
     <!--   <link href="{{ asset('jquery-ui/jquery-ui.css') }}" rel="stylesheet"> -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
     <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('ism/js/ism-2.2.min.js') }}"></script>
      <!--  <script src="{{ asset('jquery-ui/jquery-ui.js') }}"></script> -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="{{ asset('js/script.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        <script>
          $( function() {
            $( "#tabs" ).tabs();
          } );
        </script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->

    </head>
    <body style="width: 100%;">
    @include('partials/header')
     @if($flash = session('message'))
        <div class="alert alert-success notifications_panel" role="alert" style="position: fixed; top: 40px; width: 30%; z-index: 60;">
            {{$flash}}
        </div>
    @endif

    @yield('content')

    @include('partials/master_script')


        
    </body>
</html>
