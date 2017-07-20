$(function(){
	let table = $('.table_bdd').html();
	function ajout(e){
		let infos = $('input.ajout');
		let champ_infos = [];
		let valeur_infos = [];
		for (let i = 0; i < infos.length; i++) {
			champ_infos[i] = infos[i].id;
		}
		for (let i = 0; i < infos.length; i++) {
			if (infos[i].id == "utilisateur_id") {
				valeur_infos[i] = 1;
			}
			else if(i == 0){
				valeur_infos[i] = null;
			}
			else{
				valeur_infos[i] = infos[i].value;
			}
		}
		
		$.ajax({
			url: 'ajout.php',
			type : 'POST',
			data : {
				table : table,
				champs : champ_infos,
				valeurs : valeur_infos
			}
		}).
		done(function(data){
			data = $.parseJSON(data);
			console.log(data[3] );
			$('.validation').html('<div class="alert alert-success">L\'info a bien été ajoutée</div>');

			let ligne = '<tr class="tr_'+table+'">';
			for (let i = Object.keys(data).length/2; i < Object.keys(data).length; i++){
				let key = Object.keys(data)[i];
				ligne += `<td class="case_`+key+`">
	                <p class="texte_`+key+`">`+data[key]+`</p>
	                <input class="modification hidden" type="text" name="text" value="`+data[key]+`">
	            </td>`
			}
	            
	        ligne+=`<td class="td_suppression"><span id="`+data[0]+`" class="supprimer glyphicon glyphicon-remove"></span></td></tr>`

			$('tr').last().before(ligne);
			$('input.ajout').val('');
		}).
		fail(function(){
			$('.validation').html('<div class="alert alert-danger">Erreur, l\'info n\'a pas été ajoutée </div>');
		});
	}

	function suppression (e){
		let id_suppression = $(this).attr('id');
		console.log(id_suppression);
		$.ajax({
			url : 'delete.php',
			type : 'POST',
			data : {
				table : table,
				valeurs : id_suppression
			}
		}).
		done(function(e){
			$('.validation').html('<div class="alert alert-success">L\'info a bien été supprimée</div>');
			$('span#'+id_suppression).parent().parent().remove();
		}).fail(function(e){
			$('.validation').html('<div class="alert alert-danger">Erreur, l\'info n\'a pas été supprimée </div>');

		});
	}

	function affichage(e){
		if (!e.target.classList.contains('texte_id_'+table) && !e.target.classList.contains('texte_utilisateur_id')) {
			console.log('ca roule');
			$(this).addClass('hidden');
			$(this).siblings('input').removeClass('hidden');
		}

	}

	function modification (e){
		let valeur_modification = $(e.target).val();
		let id_modification = $(e.target).parent().parent().children('td.td_suppression').children().attr('id');
		let champ_modification = $(e.target).siblings('p').attr('class');
		champ_modification = champ_modification.substring(champ_modification.indexOf("_") + 1);
		champ_modification = champ_modification.substring(0, champ_modification.indexOf(" "));

		console.log(valeur_modification);
		console.info(id_modification);
		console.info(champ_modification);
		$.ajax({
			url: 'modification.php',
			type: 'POST',
			data: {
				table : table,
				valeur : valeur_modification,
				id : id_modification,
				champ : champ_modification
			}
		}).done(function(e){
			$('.validation').html('<div class="alert alert-success"> L\'info a bien été modifiée</div>');
		}).fail(function(e){
			$('.validation').html('<div class="alert alert-danger">Erreur, l\'info n\'a pas été modifiée </div>');
		});



		$(e.target).siblings('p').html(valeur_modification);
		$(e.target).siblings('p').removeClass('hidden');
		$(e.target).addClass('hidden');

	}

	$('a.supprimer_tout').on('click', function(){
		$.ajax({
			url: 'delete_all.php',
			type : 'POST',
			data : {
				table : table
			}
		}).done(function(e){
			$('.validation').html('<div class="alert alert-success">Toutes les infos ont bien été supprimées</div>');
			 $('.tr_'+table).remove();
		}).fail(function(e){
			$('.validation').html('<div class="alert alert-danger">Erreur, les infos n\'ont pas été supprimées </div>');
		});
	});

	function connexion(e){
		e.preventDefault();
		$('footer').after('<div class="plein"><div></div></div>');
		
	}

	$(document).on("click", ".menu>span", function(e){
		console.log('click');
		if ( $('.menu_small').hasClass('hidden-sm') ) {
			$('.menu_small').removeClass('hidden-sm');
			$('.menu_small').removeClass('hidden-xs');
			$('.menu_small').addClass('col-sm-12');
			$('.menu_small').addClass('col-xs-12');	
		}
		else{
			$('.menu_small').addClass('hidden-sm');
			$('.menu_small').addClass('hidden-xs');
			$('.menu_small').removeClass('col-sm-12');
			$('.menu_small').removeClass('col-xs-12');
		}
	});



	
	$(document).on('click', 'a#connexion', connexion);
	

	$(document).on('click', 'span.ajout', ajout);

	$(document).on('click', 'span.supprimer', suppression);
	
	$(document).on('keypress', 'input.ajout', function(e){
		if (e.which == 13) {
			ajout(e);
		}
	});	

	$(document).on('keypress', 'input.modification', function(e){
		let laspolas = $(this).val();
		if (e.which == 13) {
			modification(e);
		}
	});

	$(document).on('click', function(e){
		if ( !$(e.target).is('input.modification') ) {
			$('input.modification').removeClass('hidden');
			$('input.modification').addClass('hidden');
			$('td>p').removeClass('hidden');
			if ( $(e.target).is('td>p') ) {
				if ($(e.target).attr('class').match("^texte_id_")) {
					$('.validation').html('<div class="alert alert-danger">Vous ne pouvez pas modifier l\'id ! </div>');
				}
				else if ($(e.target).attr('class').match("^texte_utilisateur_id") ){
					$('.validation').html('<div class="alert alert-danger">Vous ne pouvez pas modifier l\'id utilisateur ! </div>');
				}
				else if ($(e.target).hasClass("texte_statut") ){
					$('.validation').html('<div class="alert alert-danger">Vous ne pouvez pas modifier le statut utilisateur ! </div>');
				}
				else{
					$(e.target).addClass('hidden');
					$(e.target).siblings('input').removeClass('hidden');
				}
			}
		}
	});


	// Code Konami
	var k = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65],
	n = 0;
	$(document).keydown(function (e) {
	    if (e.keyCode === k[n++]) {
	        if (n === k.length) {
	            alert('Le code Konami... \nVous entrez le niveau secret.');
	            window.location.replace("/site_cv/front/secret.php");
	            n = 0;
	            return false;
	        }
	    }
	    else {
	        n = 0;
	    }
	});

});