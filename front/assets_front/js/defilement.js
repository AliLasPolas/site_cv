$(function(){

	let scroll = true;
	let tableau_pages = ['index.html', 'index2.html', ]
	let index_tableau = 0;


	function suivant(e){
		e.preventDefault();
		if (scroll) {
			console.log(index_tableau);
			if (index_tableau == tableau_pages.length-1) {
				console.log('Fin de page atteint');
			}
			else{
				index_tableau++;
				$('main').animate({
					opacity:"0",
				}, 500, function(){
					// $('body').remove();
					//$('main').load("/site_cv/front/" + tableau_pages[index_tableau] );
					$.get('/site_cv/front/' + tableau_pages[index_tableau], function( data ) {
					    $('main').html(data);
					    $('main').animate({
							opacity:"1",
						}, 500);
					});
				});
			}
		}
	}

	function precedent(e){
		e.preventDefault();
		if (scroll) {	
			console.log(index_tableau);
			if (index_tableau == 0) {
				console.log('Haut de page atteint');
			}
			else{
				index_tableau--;
				$('main').animate({
					opacity:"0",
				}, 500, function(){
					// $('body').load("/site_cv/front/" + tableau_pages[index_tableau] );
					$.get('/site_cv/front/' + tableau_pages[index_tableau], function( data ) {
					    $('.contenu').html(data);
					});
				});
			}

		}
	}

	function defilementMenu(e){
		// if  ($(this).hasClass('active') ) {
		// 	for (let i = 0; i <= 10; i++) {
		// 		$('ul.nav').animate({
		// 			left:"-"+ ((i*i) ) +"vw",
		// 		}, 30 );
		// 		console.log(i*i);
		// 	}

		// 	for (let i = 10; i >= 0; i--) {
		// 		$('main').animate({
		// 			left:(i*i) +"vw",
		// 		}, 30 );
		// 		console.log(i*i);
		// 	}

		// 	console.log('enroulement');
		// 	scroll = true;
		// 	$('p.menu').removeClass('active');

		// }

			for (let i = 10; i >= 0; i--) {
				$('ul.nav').animate({
					left:(-(i*i)) +"vw",
				}, 30 );
				console.log(i*i);
			}

			for (let i = 0; i <= 10; i++) {
				$('main').animate({
					left:""+ ((i*i) ) +"vw",
				}, 30, function(e){
					$('.contenu').fadeOut('slow');
					console.log('déroulement');
					scroll = false;
					$('.close')
				});
			}	

			
		}

	function enroulementMenu(e){

	}

	$(document).bind('mousewheel', '.main', function(e) {
	    if(e.originalEvent.wheelDelta / 120 > 0) {
	        precedent(e);
	    } 
	    else {
	        suivant(e);
	    }
	});

	$(document).on("click", '.scroll_down', suivant);
	$(document).on("click", '.scroll_up', precedent);

	$(document).on("click", '.menu', defilementMenu);
});