$(function(){
	let score = 0;
	$('img').on("click", function(e){
		$(this).fadeOut(200);
	});



	function avancer(e){
       	setTimeout( avancer, 1);
		$('.test').css( 'bottom', '+=1px' );
	}

	avancer();
});