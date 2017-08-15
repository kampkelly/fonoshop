<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">/*
$(document).ready(function () {
	$(".namedrop").click(function() {
	//	$(".drop ul").show("");
		//$(".drop ul").slideDown();
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
		// $(".top_selling").show();
		 $('.firstsection').addClass('container');
		}else{
	//		$(".top_selling").hide();
		}
	}

/*
	$(".pael").css('cursor', 'pointer');
	$("section #hov").click(function() {
		$(this).css('cursor', 'pointer');
		$(this).find(".shw").css({"background-color": "#fafafa", "border": "1px solid #fafafa"});
		$(this).find(".shw").slideDown(1000);
	}); 

	$("section #hov").mouseleave(function() {
		$(this).find(".shw").slideUp(1000);
		$(this).find(".shw").css({"background-color": "#fafafa", "border": "1px solid #fafafa"});
	}); 

});

/*
	$(document).on('mouseenter', '#hov', function () {
        $(this).find(".shw").slideDown();
        $(this).find("h6").css("color", "blue");
    }).on('mouseleave', '#hov', function () {
        $(this).find(".shw").slideUp();
        $(this).find("h6").css("color", "black");
    }); */
    
/*
  }); */
</script>

