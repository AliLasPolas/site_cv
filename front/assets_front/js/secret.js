$(function(){

	let son_background = new Audio('assets_front/monochrome_clock.mp3');
	let son_tricheur = new Audio('assets_front/roundabout.mp3');
	son_tricheur.currentTime = 39;
	let bg_play = true;
	son_background.volume= 0.1;
	son_background.loop = true;
	son_background.play();


	$('.fa-2x').on("click", function(){
		if (bg_play) {
			son_background.pause();
			$(this).removeClass('fa-volume-off');
			$(this).addClass('fa-play');
			bg_play = false;
		}
		else{	
			son_background.play();
			$(this).removeClass('fa-play');
			$(this).addClass('fa-volume-off');
			bg_play = true;
		}
	});

	let son_mise = new Audio('assets_front/mise.mp3');
	let son_melange = new Audio('assets_front/melange.mp3');
	let son_tire = new Audio('assets_front/tire.wav');
	let son_victoire = new Audio('assets_front/victoire.mp3');
	let son_defaite = new Audio('assets_front/defaite.mp3');


	let table_libre_joueur = 
	`		<div class="row">
				<div class="col-md-1 libre carte_joueur"></div>
				<div class="col-md-1 libre carte_joueur"></div>
				<div class="col-md-1 libre carte_joueur"></div>
				<div class="col-md-1 libre carte_joueur"></div>
				<div class="col-md-1 libre carte_joueur"></div>
				<div class="col-md-1 libre carte_joueur"></div>
				<div class="col-md-1 libre carte_joueur"></div>
				<div class="col-md-1 libre carte_joueur"></div>
				<div class="col-md-1 libre carte_joueur"></div>
				<div class="col-md-1 libre carte_joueur"></div>
				<div class="col-md-1 libre carte_joueur"></div>
				<div class="col-md-1"></div>
			</div>`;

	let table_libre_croupier = 
	`		<div class="row">
				<div class="col-md-1 libre carte_croupier"></div>
				<div class="col-md-1 libre carte_croupier"></div>
				<div class="col-md-1 libre carte_croupier"></div>
				<div class="col-md-1 libre carte_croupier"></div>
				<div class="col-md-1 libre carte_croupier"></div>
				<div class="col-md-1 libre carte_croupier"></div>
				<div class="col-md-1 libre carte_croupier"></div>
				<div class="col-md-1 libre carte_croupier"></div>
				<div class="col-md-1 libre carte_croupier"></div>
				<div class="col-md-1 libre carte_croupier"></div>
				<div class="col-md-1 libre carte_croupier"></div>
				<div class="col-md-1"></div>
			</div>`;

	let deck_actuel = [];
	console.log(deck_actuel);
	let mise = 0;
	let argent = 1000;
	let parties = 0;
	let buche = false;
	let ace = false;
	let blackjack_joueur = false;
	let blackjack_croupier = false;
	let score = 0;
	let score_croupier = 0;
	let etat_partie = 'debut';
	let main = 0;

	function fin(e){
		$('.contenu').hide();
		$('body').css('background-image', 'none')
		if (argent >= 1000) {
			son_background.pause();
			son_tricheur.play();
			$('.fin_tricheur').show();
			$('.fin_tricheur>.act_1').animate({
				opacity: '1'
			}, 2600, function(){
				$('.fin_tricheur>.act_2').animate({
					opacity: '1'
				}, 2600, function(){
					$('.fin_tricheur>.act_3').animate({
						opacity: '1'
					}, 2600, function(){
						$('.fin_tricheur>.act_4').animate({
							opacity: '1'
						}, 2600, function(){
							location.replace('http://alinizamuddin.ma6tvacoder.org/site_cv/front/Accueil/');
						})
					})
				})
			});
		}
		else{
			son_background.pause();
			son_tricheur.play();
			$('.fin_addict').show();
			$('.fin_addict>.act_1').animate({
				opacity: '1'
			}, 2600, function(){
				$('.fin_addict>.act_2').animate({
					opacity: '1'
				}, 2600, function(){
					$('.fin_addict>.act_3').animate({
						opacity: '1'
					}, 2600, function(){
						$('.fin_addict>.act_4').animate({
							opacity: '1'
						}, 2600, function(){
							location.replace('http://sosjoueurs.org/');
						})
					})
				})
			});
		}
	}

	function finDuJeu(){
		$('.tire').children().show();
		$('.new').children().show();
		mise = 0;
		buche = false;
		ace = false;
		blackjack_joueur = false;
		blackjack_croupier = false;
		score = 0;
		score_croupier = 0;
		etat_partie = 'debut';
		main = 0;

		$('.stop>p').text('Fini de tirer');		
		$('.score_joueur>span').text('0');
		$('.score_croupier>span').text('0');
		$('.main>span').text('0');
		$('.mise>span').text('0');
		$('.parties>span').text(parties);
		$('.argent>span').text(argent);
		$('.joueur').html(table_libre_joueur);
		$('.croupier').html(table_libre_croupier);

	}

	function defaite(e){
		$('.message>p').html('Vous avez perdu ...');
		son_defaite.play();
		argent -= mise;
		$('.argent>span').text(argent);
		finDuJeu();
	}
	function victoire(e){
		$('.message>p').html('Vous avez gagné !');
		son_victoire.play();
		argent += mise;
		$('.argent>span').text(argent);
		finDuJeu();
	}
	function egalite(e){
		$('.message>p').html('Égalite.');
		$('.argent>span').text(argent);
		finDuJeu();
	}

	function tirer_carte(e){

		$('.message>p').html('Tirez donc vos cartes. Comptage interdit.');		
		let tire = Math.floor(Math.random() * deck_actuel.length);
		let carte = deck_actuel[tire];
		// console.log('tire' + tire);
		let valeur = carte.substr(0, carte.indexOf('.'));
		carte = carte.replace('.','');
		console.log(carte);
		if(valeur == 'J' || valeur == 'Q' || valeur == 'K'){
			valeur = 10;
			buche = true;
		}
		if (valeur == 'A') {
			valeur = 1;
		}
		else{
			valeur = parseInt(valeur)
		}
		if (valeur == 1) {
			$('.carte_joueur.libre').first().html('<span class="as '+carte+'"><span class="un checked">Un</span>:<span class="onze">Onze</span></span><img style="top:-2000px;" class="'+carte+'" src="assets_front/img/cartes/'+carte+'.svg">').removeClass('libre').addClass('pris');
		}
		else{
			$('.carte_joueur.libre').first().html('<span class="'+carte+'">'+valeur+'</span><img style="top:-2000px;" class="'+carte+'" src="assets_front/img/cartes/'+carte+'.svg">').removeClass('libre').addClass('pris');
		}
		score += valeur;
		deck_actuel.splice(tire, 1);
		main++;

		son_tire.play();
		$('.carte_joueur.pris>img').last().animate({
			top: '+=2000px'
		}, 500, function(){
			console.log('Score : '+ score)
			if (score > 21) {
				$('.score_joueur>span').addClass('rouge');
				$('.score_joueur>span').html('0');
			}
			else{
				$('.score_joueur>span').removeClass('rouge');
				$('.score_joueur>span').html(score);

			}
			$('.main>span').html(main);
			if (main > 10) {
				$('.stop').trigger("click")
			}
		});
	}
	function tire_croupier(e){
		$('.tire').children().hide();
		let tire_croupier = Math.floor(Math.random() * deck_actuel.length);
		let carte_croupier = deck_actuel[tire_croupier];
		console.log('croupier'+carte_croupier);
		let valeur_croupier = carte_croupier.substr(0, carte_croupier.indexOf('.'));
		carte_croupier = carte_croupier.replace('.','');
		console.log(carte_croupier);
		console.log(valeur_croupier);
		deck_actuel.splice(tire_croupier, 1);

		if (valeur_croupier == 'A') {
			if (score_croupier < 11 ) {
				valeur_croupier = 11;
				ace = true;
			}
			else{
				valeur_croupier = 1;
			}
		}
		else if(valeur_croupier == 'J' || valeur_croupier == 'Q' || valeur_croupier == 'K'){
			valeur_croupier = 10;
			buche = true;
		}
		else{
			valeur_croupier = parseInt(valeur_croupier);
		}
		console.log(score_croupier);
		console.log(carte_croupier);
		console.log(valeur_croupier);
		score_croupier = score_croupier + valeur_croupier;
		$('.carte_croupier.libre').last().html('<img style="bottom:-500px;" class="'+carte_croupier+'" src="assets_front/img/cartes/'+carte_croupier+'.svg">').removeClass('libre').addClass('pris');
		if (score_croupier > 21) {
			$('.score_croupier>span').addClass('rouge');
			$('.score_croupier>span').html('0');
		}
		else{
			$('.score_croupier>span').removeClass('rouge');
			$('.score_croupier>span').html(score_croupier);
		}

		son_tire.play();
		$('.carte_croupier.pris>img').first().animate({
			bottom: '+=500px'
		}, 500, function(){
			// main++;
			console.log('score : ' +score + 'score croupier ' + score_croupier);
			if (score_croupier < 17) {
				recursive_tire(e);
			}
			else{
				if (score_croupier == 21 && buche && ace) {
					blackjack_croupier = true;
				}
				etat_partie = 'revision';
			}
		});

	}
	function recursive_tire(e){
		tire_croupier(e);
	}

	function verification(e){
		if (score > 21) {
			defaite();
		}
		else if (score_croupier > 21) {
			score_croupier = 0;
		}
		else{
			if (blackjack_joueur == true) {
				$('.message>p').html('BlackJack !');
				score = 22;
			}
			if (blackjack_croupier == true) {
				$('.message>p').html('Blackjack pour le croupier !');

				score_croupier = 22;
			}
			console.log('score '+score);
			console.log('score c'+score_croupier);
			if (score > score_croupier) {
				victoire();
			}
			else if (score == score_croupier) {
				egalite();
			}
			else if (score_croupier > score) {
				defaite();
			}
		}
	}

	$(document).on("click", '.new', function(e){
		deck_actuel = [
		"A.S", "A.C", "A.D", "A.H", 
		"2.S", "2.C", "2.D", "2.H", 
		"3.S", "3.C", "3.D", "3.H", 
		"4.S", "4.C", "4.D", "4.H", 
		"5.S", "5.C", "5.D", "5.H", 
		"6.S", "6.C", "6.D", "6.H", 
		"7.S", "7.C", "7.D", "7.H", 
		"8.S", "8.C", "8.D", "8.H", 
		"9.S", "9.C", "9.D", "9.H", 
		"10.S", "10.C", "10.D", "10.H", 
		"J.S", "J.C", "J.D", "J.H", 
		"Q.S", "Q.C", "Q.D", "Q.H", 
		"K.S", "K.C", "K.D", "K.H"
	];
		console.log(deck_actuel);
		if (etat_partie = 'debut') {
			if (parties > 8 || argent > 2500 || argent < 1) {
				fin();
			}
			else{
				parties++;
				son_mise.play();
				mise = prompt('Entrez votre mise');
				mise = parseInt(mise);
				if (isNaN(mise) ) {
					$('.message>p').html('Mise invalide');
					mise = 0;
				}
				else if (mise > argent){
					$('.message>p').html('Vous n\'avez pas assez de thunes, votre mise est réduite en conséquence. ');
					mise = argent;
				}
				$('.mise>span').html(mise);
				etat_partie = 'tour_joueur';
				son_melange.play();
				tirer_carte();
				$('.new').children().hide();

			}
		}
	});

	$(document).on("click", '.tire', function(e){
		if (etat_partie == 'tour_joueur') {
			tour_croupier = true;
			tirer_carte(e);
		}
	});

	$(document).on("click", '.as_un', function(e){
		if (etat_partie == 'tour_joueur' || etat_partie == 'revision') {
			this.addClass('.as_onze');
			this.removeClass('.as_un');
			buche = true;
		}
	});
	$(document).on("click", '.as', function(e){
		if (etat_partie == 'tour_joueur' || etat_partie == 'revision') {
			if ( $(this).children('.un').hasClass('checked') ) {
				$(this).children('.un').removeClass('checked');
				$(this).children('.onze').addClass('checked');
				score += 10;
				buche = true;
			}
			else if ( $(this).children('.onze').hasClass('checked') ){
				$(this).children('.onze').removeClass('checked');
				$(this).children('.un').addClass('checked');
				score -= 10;
				buche = false;
			}
			if (score > 21) {
				$('.score_joueur>span').addClass('rouge');
				$('.score_joueur>span').html('0');
			}
			else{
				$('.score_joueur>span').removeClass('rouge');
				$('.score_joueur>span').html(score);

			}
		}
	});
	$(document).on("click", '.stop', function(e){
		if (etat_partie == 'tour_joueur') {
			if (score > 21) {
				verification();
			}
			else{
				if (score == 21 && buche && ace) {
					blackjack_joueur = true;
				}
				$('.message>p').html('Vous pouvez changer la valeur de vos as si vous en avez.');	
				etat_partie = 'tour_croupier';
				tour_croupier = true;
				buche = false;
				ace = false;
				$('.stop>p').text('Fini de vérifier ses AS ?');
				tire_croupier(e);
			}
		}
		else if(etat_partie == 'revision'){
			verification();
		}
	});
	// $(document).on("mousedown", function(e){
	// 	if (e.which == 2) {
	// 		fin();
	// 	}
	// })
});