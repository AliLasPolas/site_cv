$(function(){


	let deck_de_b1e = [
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
	]
	let deck_actuel = deck_de_b1e;
	console.log(deck_actuel);
	let mise = 0;
	let argent = 1000;
	let parties = 0;
	let buche = false;
	let ace = false;
	let tour_croupier = false;
	let score = 0;
	let score_croupier = 0;


	function defaite(e){
		bootbox.alert('Vous avez perdu...');
		argent -= mise;
		lancerPartie();
	}
	function victoire(e){
		bootbox.alert('Vous avez gagné !');
		argent += mise;
		lancerPartie();
	}
	function egalite(e){
		bootbox.alert('Égalité.');
		lancerPartie();
	}

	function logiqueJeu(e){

		do{
			let tire = Math.floor(Math.random() * deck_actuel.length);
			let carte = deck_actuel[tire];
			// console.log('tire' + tire);
			// bootbox.alert('Vous carte est un(e) ' + carte);
			let valeur = carte.substr(0,1);
			carte = carte.substr(1,2);
			$('.carte_joueur.libre').html('<img style="left: 100%; " class="'+carte+'" src="assets_front/img/cartes/" '+carte+'.svg>');
			if (valeur == 'A') {
				let reponse = bootbox.confirm('Passer la valeur de l\'as a 11 ? ', function(reponse){
					return reponse;
				});
				if (reponse) {
					valeur = 11;
				}
				else{
					valeur = 1;
				}
			}
			else if(valeur == 'J' || valeur == 'Q' || valeur == 'K'){
				valeur = 10;
				buche = true;
			}
			else{
				valeur = parseInt(valeur)
			}
			console.log(carte);
			console.log(valeur);
			score += valeur;
			console.log('Score : '+score)
			deck_actuel.splice(tire, 1);
			let question =  bootbox.confirm('Tirer une carte ?', function(reponse){
				return reponse;
			});
		} while(score < 21);
		
		if (score < 22) {
			if (buche && ace) {
				bootbox.alert('Blackjack !')
				score = 22;
			}
			tour_croupier = true;
			buche = false;
			ace = false;
			deck_actuel = deck_de_b1e;
			do{
				let tire_croupier = Math.floor(Math.random() * deck_actuel.length);
				let carte_croupier = deck_actuel[tire_croupier];
				// console.log('tire croupier' + tire_croupier);
				// alert('La carte du croupier est un(e) ' + carte_croupier);
				console.log('croupier'+carte_croupier);
				let valeur_croupier = carte_croupier.substr(0,carte_croupier.indexOf(' '));
			if (valeur_croupier == 'A') {
				if (buche &&  ) {

				}
			}
			else if(valeur == 'J' || valeur == 'Q' || valeur == 'K'){
				valeur = 10;
				buche = true;
			}				
			console.log(carte_croupier);
				console.log(valeur_croupier);
				score_croupier += valeur_croupier;
				console.log('Score croupier : '+score_croupier)
				deck_actuel.splice(tire_croupier, 1);

			} while(score_croupier < 17);
			console.log('score : ' +score + 'score croupier ' + score_croupier);
			if (buche && ace) {
				score_croupier = 22;
			}
			if (score > score_croupier) {
				victoire();
			}
			else if(score == score_croupier){
				egalite();
			}
			else if (score_croupier > score){
				defaite();
			}

		}
		else{
			defaite();
		}
	}
	function lancerPartie(e){
		parties++;
		console.log('parties : '+parties);
		console.log('pognon : '+argent);
		if (parties > 9 || argent > 3000 || argent < 100) {
			if (argent > 1000) {
				bootbox.alert('Vous avez trop gagné au BlackJack');
				bootbox.alert('Le casino vous accusecompter les cartes');
				bootbox.alert('Les gros br1la sécurité vous renvoient vers le site CVAli');
				window.location.replace('/site_cv/front/Accueil/');
			}
			else{	
				bootbox.alert('Vous avez trop perdu au BlackJack.');
				bootbox.alert('Vous allez être redirigé sur le site sosjoueurs.org');
				window.location.replace('http://sosjoueurs.org/');
			}
		}
		else{
			buche = false;
			ace = false;
			tour_croupier = false;
			score = 0;
			score_croupier = 0;
			mise = 0;
			let partie = bootbox.confirm('Jouer une partie ?', function(e){
				return e;
			});
			let miser = bootbox.confirm('Miser ?', function(e){
				return e;
			});
			let somme_a_miser = bootbox.prompt('Somme a miser :', function(e){
				return e;
			});

			if (partie) {
				if (miser) {
					mise = parseInt(somme_a_miser);
					if (isNaN(mise) || mise > argent) {
						bootbox.alert('Mise invalide');
						mise = 0;
					}
				}
				logiqueJeu();
			}
		console.log(mise);
		}
	}
	lancerPartie();
});
