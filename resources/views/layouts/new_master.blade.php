<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SalesNaija</title>

        <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('ism/css/my-slider.css') }}" rel="stylesheet">
        <link href="{{ asset('css/headmobile.css') }}" rel="stylesheet">
     <!--   <link href="{{ asset('jquery-ui/jquery-ui.css') }}" rel="stylesheet"> -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
     <!--   <link rel="shortcut icon" href="{{ asset('favicon.ico') }}"> -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
     <!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/headscript.js') }}"></script>
        <script src="{{ asset('ism/js/ism-2.2.min.js') }}"></script>
      <!--  <script src="{{ asset('jquery-ui/jquery-ui.js') }}"></script> -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="{{ asset('js/script1.js') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        <script type="text/javascript" src="nailthumb/jquery.nailthumb.1.1.js"></script>
        <link href="nailthumb/jquery.nailthumb.1.1.css" type="text/css" rel="stylesheet" />
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
    <div style="min-height: 100vh;">
        @include('partials/new_header')
         @if($flash = session('message'))
            <div class="alert alert-success notifications_panel" id="notifier" role="alert" style="position: fixed; top: 40px; left: 20%; width: 60%; z-index: 60;">
                {{$flash}}
                <span class="glyphicon glyphicon-remove pull-right" id="cancel_notifier" aria-hidden="true" style="cursor: pointer;"></span>
            </div>
        @endif
        <!-- Go to www.addthis.com/dashboard to customize your tools --> <div class="addthis_inline_share_toolbox"></div>
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


        <!--Start of Tawk.to Script 
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5979cf875dfc8255d623f38a/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
End of Tawk.to Script-->

<script type="text/javascript">
  /*  $(".namedrop").click(function() {
    //  $(".drop ul").show("");
        //$(".drop ul").slideDown();
        $(this).find("ul").slideDown();
    }); 
    $(".namedrop").mouseenter(function() {
        $(this).css('color', 'red');
    }); 
    $(".namedrop").mouseleave(function() {
        $(".namedrop ul").hide(1000);
    }); */
</script>

<!-- Go to www.addthis.com/dashboard to customize your tools  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-590b6d62620c44d0"></script>   -->
    </body>
</html>
