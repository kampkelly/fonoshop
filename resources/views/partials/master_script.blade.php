<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	$(".namedrop").click(function() {
	//	$(".drop ul").show("");
		//$(".drop ul").slideDown();
		$(this).find("ul").slideDown();
	}); 
	$(".namedrop").mouseleave(function() {
		$(".namedrop ul").hide(1000);
	}); 
	$("#cancel_notifier").click(function() {
		$("#notifier").hide();
	}); 
	

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
    

  }); 
</script>

