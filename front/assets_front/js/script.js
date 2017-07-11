$(function(){

	$(document).bind('mousewheel', function(e) {
	    if(e.originalEvent.wheelDelta / 120 > 0) {
	        precedent(e);
	    } 
	    else {
	        suivant(e);
	    }
	});


	function suivant(e){
		e.preventDefault();
		$('body').load("/site_cv/front/index2.html");
	}

	function precedent(e){
		e.preventDefault();
		$('body').load("/site_cv/front/index.html");
	}

	$(document).on("click", '.scroll_down', suivant);
	$(document).on("click", '.scroll_up', precedent);
});