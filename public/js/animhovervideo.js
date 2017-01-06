$(function() {
	// OPACITY OF BUTTON SET TO 0%
	$(".roll2").css("opacity","0");
	 
	// ON MOUSE OVER
	$(".roll2").hover(function () {
	 
	// SET OPACITY TO 70%
	$(this).stop().animate({
	opacity: .7
	}, "slow");
	},
	 
	// ON MOUSE OUT
	function () {
	 
	// SET OPACITY BACK TO 50%
	$(this).stop().animate({
	opacity: 0
	}, "slow");
	});
});