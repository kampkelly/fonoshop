$(document).ready(function () {
    $(".namedrop").click(function() {
        $(this).find("ul").slideDown();
    }); 
    $(".namedrop").mouseenter(function() {
        $(this).css('color', 'red');
    }); 
    $(".namedrop").mouseleave(function() {
        $(".namedrop ul").hide(1000);
    }); 
    $("#cancel_notifier").click(function() {
        $("#notifier").hide();
    }); 

    if ($(window).width() > 768) {
        $(".search_top").hide();
        $('.firstsection').removeClass('container');
    }else{
        $(".search_top").show();
        $('.firstsection').addClass('container');
    }
    if ($(window).width() < 468) {
         $('.intrtext1').removeClass('text-center');
    }else{
        $('.intrtext1').addClass('text-center');
    }
    if ($(window).width() > 992) {
     $(".top_selling").show();
     $('.firstsection').addClass('container');
    }else{
        $(".top_selling").hide();
    }

    //WINDOW RESIZE EVENTS BEGINS
    window.addEventListener("resize", myFunction);
    function myFunction() {
        var w = window.outerWidth;
        var h = window.outerHeight;
        var txt = "Window size: width=" + w + ", height=" + h;
        if (w > 768) {
            $(".search_top").hide();
            $('.firstsection').removeClass('container');
            $(".top_selling").show();
        }else{
            $(".search_top").show();
            $('.firstsection').addClass('container');
            $(".top_selling").hide();
        }
        if (w < 468) {
         $('.intrtext1').removeClass('text-center');
        }else{
            $('.intrtext1').addClass('text-center');
        }
        if (w > 992) {
         $('.firstsection').addClass('container');
        }else{
        }
    }

  }); 
