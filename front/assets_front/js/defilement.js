$(function(){

	let scroll = true;
	let tableau_pages = ['accueil.php', 'competences.php', 'experiences.php', 'realisations.php', 'contact.php' ]
	let index_tableau = 0;

	function suivant(e){
		console.log('suivant');
		// e.preventDefault();
		if (scroll) {
			console.log(index_tableau);
			if (index_tableau == tableau_pages.length-1) {
				console.log('Fin de page atteint');
				$('.bas').animate({
					top: "-=50px",
				}, 500).delay(800).animate({
					top: "+=50px",
				});
			}
			
			else{
				index_tableau++;
				$('main').animate({
					opacity:"0",
				}, 500, function(){
					$.ajax({
						url: tableau_pages[index_tableau],
						type: 'post'
					}).
					done(function(data){
						$('main').html(data);
					    $('main').animate({
							opacity:"1",
						}, 500);
					    if (tableau_pages[index_tableau] == 'competences.php') {
							console.log('animation barres');
							$('.progress-bar-vertical>.progress-bar').css('top', '+=100%');
							$('.progress-bar-vertical>.progress-bar').animate({
								top: '-=100%'
							},1500);
							$('.progress-bar-horizontal>.progress-bar').css('right', '+=100%');
							$('.progress-bar-horizontal>.progress-bar').animate({
								right: '-=100%'
							},1500);
						}
					});
				});
			}
		}
	}

	function precedent(e){
		console.log('precedent');
		// e.preventDefault();
		if (scroll) {	
			console.log(index_tableau);
			if (index_tableau == 0) {
				console.log('Haut de page atteint');
				$('.haut').animate({
					bottom: "-=50px",
				}, 500).delay(800).animate({
					bottom: "+=50px",
				});
			}
			else{
				index_tableau--;
				$('main').animate({
					opacity:"0",
				}, 500, function(){
					$.ajax({
						url: tableau_pages[index_tableau],
						type: 'post'
					}).
					done(function(data){
						$('main').html(data);
					    $('main').animate({
							opacity:"1",
						}, 500);
						if (tableau_pages[index_tableau] == 'competences.php') {
							console.log('animation barres');
							$('.progress-bar-vertical>.progress-bar').css('top', '+=100%');
							$('.progress-bar-vertical>.progress-bar').animate({
								top: '-=100%'
							},1500);
							$('.progress-bar-horizontal>.progress-bar').css('right', '+=100%');
							$('.progress-bar-horizontal>.progress-bar').animate({
								right: '-=100%'
							},1500);
						}
					});
				});
			}

		}
	}

	function defilementMenu(e){
		console.log('derouement');
		$('.admin').hide();
		$('.fermer').hide();
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
				$('.fermer').fadeIn('slow');
				$('.fermer').removeClass('hidden');
				console.log('déroulement');
			});
		}
		scroll = false;
		return;		
	}

	function enroulementMenu(e){
		console.log('enroulement');
		for (let i = 0; i <= 10; i++) {
			$('ul.nav').animate({
				left:(-(i*i)) +"vw",
			}, 30 );
			console.log('ul');
		}

		for (let i = 10; i >= 0; i--) {
			$('main').animate({
				left:""+ (i*i) +"vw",
			}, 30, function(e){
				$('.contenu').show();
				$('.fermer').addClass('hidden');
				console.log('renroulement');
			});
		}
		$('.contenant').css('background-image', '');
		$('.admin').show();
		scroll = true;
		return;		
	}


	$(document).bind('mousewheel', '.main', function(e) {
	    if(e.originalEvent.wheelDelta / 120 > 0) {
	        precedent(e);
	    } 
	    else {
	        suivant(e);
	    }
	});

	$(document).on('keydown', function(e){

		if (e.which == 38) {
			console.log('up');
			precedent();
		}
		else if (e.which == 40) {
			console.log('down');
			suivant();
		}
	});

	$(document).on("click", "li.nav-item", function(e){
		let traget = e.target;
		traget = $(traget).text();
		traget = traget.substr(0,1);
		index_tableau = traget-1;
		
	});
	$(document).on("click", '.scroll_down', suivant);
	$(document).on("click", '.scroll_up', precedent);
	$(document).on("click", '.menu', defilementMenu);
	$(document).on("click", '.fermer>p', enroulementMenu);

});