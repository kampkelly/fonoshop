$(document).ready(function () {
  /*  $(document, '#closeicon').click( function(){
        $('#mobmenu').css({"transition": "1s", "left": "-50%"});
        $('#closeicon').hide();
        $('#openicon').show();
    }); */
    $(document).on('click', function(event) {
      if (!$(event.target).closest('#mobmenu, #openicon').length) {
        // Hide the menus.
        $('#mobmenu').css({"transition": "1s", "left": "-50%"});
        $('#closeicon').hide();
        $('#openicon').show();
      }
    });
    $("#openicon").click(function(event) {
     //   event.stopPropagation();
       $('#mobmenu').css({"transition": "1s", "left": "0"});
       $('#mobmenu').focus();
       $(this).hide();
       $('#closeicon').show();
     }); 
 
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
            $('.firstsection').css('padding', '0px 0px 0px 0px');
        }
        if (w < 468) {
         $('.intrtext1').removeClass('text-center');
        }else{
            $('.intrtext1').addClass('text-center');
        }
        if (w > 992) {
            $('.firstsection').addClass('container');
            $(".top_selling").show();
        }else{
            $(".top_selling").hide();
            $('.firstsection').css('padding', '0px 20px 0px 20px');
        }
    }

  }); 
///push menu