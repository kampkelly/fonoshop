<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="google-site-verification" content="801XK9yhdgwexU7lcgw_4c_QzmPuTtZcDZsA0GFNSlw" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>SalesNaija</title>
        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/headmobile.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/newstyle.css') }}" rel="stylesheet">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/headscript.js') }}"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="{{ asset('js/newscript.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        <script>
          $( function() {
            $( "input" ).checkboxradio();
          } );
        </script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="{{ asset('css/myiconstyle.css') }}" rel="stylesheet">

        <!-- Styles -->

    </head>
    <body style="width: 100%;">
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-106053015-1', 'auto');
      ga('send', 'pageview');

    </script>
    <div style="min-height: 100vh;">
        @include('partials/new_header')
         @if($flash = session('message'))
            <div class="alert alert-success notifications_panel" id="notifier" role="alert" style="position: fixed; top: 40px; left: 20%; width: 60%; z-index: 60;">
                {{$flash}}
                <span class="glyphicon glyphicon-remove pull-right" id="cancel_notifier" aria-hidden="true" style="cursor: pointer;"></span>
            </div>
        @endif
        <div class="search_top" style="margin-top: 45px; position: fixed; background-color: white;">
            @include('partials/search')
        </div>
        <div class="search_top" style="height: 60px"></div>
        <div class="search_desktop" style="margin-top: 0px; positio: fixed;">
            @include('partials/search')
        </div>
        @yield('content')

        @include('partials/master_script')
    </div>
    <div style="height: 100px;"></div>
    @include('partials/footer')

    </body>
</html>
