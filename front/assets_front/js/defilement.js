$(function(){
	console.log('Essayez d\'entrer le code konami sur la page...');
	let scroll = true;
	let tableau_pages = ['Accueil', 'Competences', 'Experiences', 'Realisations', 'Contact' ]
	let index_tableau = $('.hidden_index').html();
	if ($('hidden_index')) {
		index_tableau = $('.hidden_index').html();
		index_tableau = parseInt(index_tableau) - 1;
		if (isNaN(index_tableau)) {
			index_tableau = -1;
		}
	}
	else{
		index_tableau = -1;
	}
	suivant();
	// window.history.pushState("", 'Accueil', '/site_cv/front/Accueil/');

	function suivant(e){
		//console.log('suivant');
		// e.preventDefault();
		if (scroll) {
			//console.log(index_tableau);
			if (index_tableau == tableau_pages.length-1) {
				//console.log('Fin de page atteint');
				$('.bas').animate({
					top: "-=50px",
				}, 500).delay(800).animate({
					top: "+=50px",
					opacity: "0"
				});
			}
			
			else{
				if (e == "no-charge") {
					index_tableau++;
					$.ajax({
						url: '../' + tableau_pages[index_tableau] + '/' + tableau_pages[index_tableau] + '.php',
						type: 'post'
					}).
					done(function(data){
						$('main').html(data);
					    $('main').animate({
							opacity:"1",
						}, 500);
					    if (tableau_pages[index_tableau] == 'Competences') {
							//console.log('animation barres');
							$('.barre-prog-vertical>.barre-prog').css('top', '+=100%');
							$('.barre-prog-vertical>.barre-prog').animate({
								top: '-=100%'
							},1500);
							$('.barre-prog-horizontal>.barre-prog').css('right', '+=100%');
							$('.barre-prog-horizontal>.barre-prog').animate({
								right: '-=100%'
							},1500);
							$('.haut').css('opacity', '1');
						}
					});
				}
				else{
					index_tableau++;
					$('main').animate({
						opacity:"0",
					}, 500, function(){
						$.ajax({
							url: '../' + tableau_pages[index_tableau] + '/' + tableau_pages[index_tableau] + '.php',
							type: 'post'
						}).
						done(function(data){
							$('main').html(data);
						    $('main').animate({
								opacity:"1",
							}, 500);
						    if (tableau_pages[index_tableau] == 'Competences') {
								//console.log('animation barres');
								$('.barre-prog-vertical>.barre-prog').css('top', '+=100%');
								$('.barre-prog-vertical>.barre-prog').animate({
									top: '-=100%'
								},1500);
								$('.barre-prog-horizontal>.barre-prog').css('right', '+=100%');
								$('.barre-prog-horizontal>.barre-prog').animate({
									right: '-=100%'
								},1500);
							}
							
						});
					});
					document.title = tableau_pages[index_tableau];
					window.history.pushState("", tableau_pages[index_tableau], '/site_cv/front/'+tableau_pages[index_tableau]+"/");
				}
			}
		}
	}

	function precedent(e){
		//console.log('precedent');
		// e.preventDefault();
		if (scroll) {	
			//console.log(index_tableau);
			if (index_tableau == 0) {
				//console.log('Haut de page atteint');
				$('.haut').stop();
				$('.haut').animate({
					bottom: "-=50px",
				}, 500).delay(800).animate({
					bottom: "+=50px",
					opacity: "0"
				});
			}
			else{
				index_tableau--;
				$('main').animate({
					opacity:"0",
				}, 500, function(){
					$.ajax({
						url: '../' + tableau_pages[index_tableau] + '/' + tableau_pages[index_tableau] + '.php',
						type: 'post'
					}).
					done(function(data){
						$('main').html(data);
					    $('main').animate({
							opacity:"1",
						}, 500);
						if (tableau_pages[index_tableau] == 'Competences') {
							//console.log('animation barres');
							$('.barre-prog-vertical>.barre-prog').css('top', '+=100%');
							$('.barre-prog-vertical>.barre-prog').animate({
								top: '-=100%'
							},1500);
							$('.barre-prog-horizontal>.barre-prog').css('right', '+=100%');
							$('.barre-prog-horizontal>.barre-prog').animate({
								right: '-=100%'
							},1500);
						}
						if(tableau_pages[index_tableau] == 'Realisations'){
							$('.bas').css('opacity', '1');
						}
					});
				});
				document.title = tableau_pages[index_tableau];
				window.history.pushState("", tableau_pages[index_tableau], '/site_cv/front/'+tableau_pages[index_tableau]+"/");
			}
		}
	}

	function defilementMenu(e){
		//console.log('derouement');
		$('.admin').hide();
		$('.fermer').hide();
		for (let i = 10; i >= 0; i--) {
			$('ul.nav').animate({
				left:(-(i*i)) +"vw",
			}, 30 );
			//console.log(i*i);
		}

		for (let i = 0; i <= 10; i++) {
			$('main').animate({
				left:""+ ((i*i) ) +"vw",
			}, 30, function(e){
				$('.contenu').fadeOut('slow');
				$('.fermer').fadeIn('slow');
				$('.fermer').removeClass('hidden');
				//console.log('déroulement');
			});
		}
		scroll = false;
		return;		
	}

	function enroulementMenu(e){
		//console.log('enroulement');
		for (let i = 0; i <= 10; i++) {
			$('ul.nav').animate({
				left:(-(i*i)) +"vw",
			}, 30 );
			//console.log('ul');
		}

		for (let i = 10; i >= 0; i--) {
			$('main').animate({
				left:""+ (i*i) +"vw",
			}, 30, function(e){
				$('.contenu').show();
				$('.fermer').addClass('hidden');
				//console.log('renroulement');
			});
		}
		$('.contenant').css('background-image', '');
		$('.admin').show();
		scroll = true;
		return;		
	}

	$(document).on('mousewheel', function(e){
		// console.log(e);
		if (e.deltaY < 0) {
			suivant();
			scroll = false;
			setTimeout(function(){
				scroll = true;
			}, 1500);

		}
		else if(e.deltaY > 0){
			precedent();
			scroll = false;
			setTimeout(function(){
				scroll = true;
			}, 1500);
		}
	});

	$(document).on('keydown', function(e){

		if (e.which == 38) {
			//console.log('up');
			precedent();
		}
		else if (e.which == 40) {
			//console.log('down');
			suivant();
		}
	});

	$(document).on("click", ".nav-item", function(e){
		// //console.log('cliqke');
		let traget = e.target;
		traget = $(traget).text();
		traget = traget.substr(0,1);
		index_tableau = traget-1;
		scroll = true;
		suivant('no-charge');
		enroulementMenu();
		
	});

	$(document).swipe( {
	//Generic swipe handler for all directions
		swipe:function(event, direction, distance, duration, fingerCount, fingerData) {
			if (direction == 'up') {
				suivant();
			}
			else if (direction == 'down') {
				precedent();
			}
		}
	});

	$(document).on("click", '.scroll_down', suivant);
	$(document).on("click", '.scroll_up', precedent);
	$(document).on("click", '.menu', defilementMenu);
	$(document).on("click", '.fermer>p', enroulementMenu);

});