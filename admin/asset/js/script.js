$(function(){

	let info = 'competence';
	let infos = $('th');
	for (var i = 0; i < infos.length; i++) {
		infos[i] = infos.eq(i).html();
	}

	function compte(e){
		let nombre = $('.tr_'+infos);
		nombre = nombre.length;
		$('#compte').html(nombre);
	};

	var data;
	$(document).on('click', '.supprimer', function(e){
		let confirmation = confirm("Valider la suppression");
		if (confirmation == true) {
			console.log($('.id').html());
			$.ajax({
				url : "delete.php",
				type : "POST",
				data: {
					id_info : $(this).children('div .id').html()
				}
			}).
			done(function(data){
				$('.validation').html('<div class="alert alert-success">La compétence a bien été supprimée</div>');
			}).
			fail(function(data){
				$('.validation').html('<div class="alert alert-danger">Erreur, la compétence n\'a pas été supprimée </div>');
			});
			$(this).parent().parent().remove();
		}
		compte();
	});
	$(document).on('click', '.ajouter', insertion);
	$('#ajout').on('keypress', function(e){
		if (e.which == 13) {
		insertion();
		}
	});

	function insertion(e){
		let ajout = $('#ajout').val();
		if (ajout.length > 0) {
			$.ajax({
				url : "ajout.php",
				type : "POST",
				data: {
					id_ajout : $('#ajout').val()
				}
			}).
			done(function(data){
				// data = JSON.parse(data);
				// console.log(data);
				let text = '<tr class="tr_'+infos+'">';
				for (var i = 0; i < data.length-1; i++) {
					'<td><p class="'+info[i]+'">' + data[1] + '</p><input class="input_'+info[i]+' hidden" type="text" name="text" id="'+data[0]+'" value="'+data[1]+'"></td>'
				}
				text += '<td><span class="supprimer glyphicon glyphicon-remove"><div class="hidden">' + data.id + '</div></span></td></tr>'
				$('.validation').html('<div class="alert alert-success">L\'info a bien été ajoutée</div>');
				$('tr').last().before('') ;
				$('input').val('');
			}).
			fail(function(){
				$('.validation').html('<div class="alert alert-danger">Erreur, l\'info n\'a pas été ajoutée </div>');
			});
		}
		else{
			$('.validation').html('<div class="alert alert-danger">Erreur, l\'info ne peut etre laissée vide ! </div>');
		}
		compte();
	}
	$('.supprimer_tout').on("click", function(e){
		let confirme = confirm("Valider la suppression");
		if (confirme == true) {
			console.log('true');
			$.ajax({
				url : "delete_all.php",
				type : "POST",
				data : {
					post : "post"
				}
			});
		}
		$('.tr_'+infos).remove();
		compte();
	});

	$(document).on("click", 'body', affichage);
	function affichage(e){
		if ( $(e.target).hasClass(infos) ) {
			$(".input_" + info).removeClass('hidden').addClass('hidden');
			$("." + infos).addClass('hidden').removeClass('hidden');
			let valeur = $(e.target).html();
			$(e.target).siblings('.input_' + info).val(valeur);
			$(e.target).addClass('hidden');
			$(e.target).siblings('.input_' + info).removeClass('hidden');
		}
		else if ( !$(e.target).hasClass('input_' + info) ) {
			$(".input_" + info).removeClass('hidden').addClass('hidden');
			$("." + infos).addClass('hidden').removeClass('hidden');
		}
	}


	$(document).on('keypress', '.input_' + info, entrer);
	function entrer(e){
		if (e.which == 13) {
			console.log('entrer');
			let modif = $(this).val();
			let id_modif = $(this).attr('id');
			$.ajax({
				url : "modification.php",
				type : "POST",
				data : {
					modif : modif,
					id_modif : id_modif
				}
			}).
			done(function(data){
				$("."+infos+".hidden").html(modif);
				$("."+infos+".hidden").siblings('.input_'+info).val(modif);
				$(".input_"+info).removeClass('hidden').addClass('hidden');
				$("."+infos).addClass('hidden').removeClass('hidden');
			})
		}
	}



	// $('.competences').on("click", function(e){
	// 		$(this).addClass('hidden');
	// 		$(this).siblings('.input_competence').removeClass('hidden');
	// });

});