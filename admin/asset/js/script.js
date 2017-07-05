$(function(){
	var data;
	$(document).on('click', '.supprimer', function(e){
		let confirmation = confirm("Valider la suppression");
		if (confirmation == true) {
			console.log($('.hidden').html());
			$.ajax({
				url : "delete.php",
				type : "POST",
				data: {
					id_competence : $(this).children().html()
				}
			}).
			done(function(data){
				$('.validation').html('<div class="alert alert-success">La compétence a bien été supprimée</div>');
			}).
			fail(function(data){
				$('.validation').html('<div class="alert alert-danger">Erreur, la compétence n\'a pas été supprimée </div>');
			});
		}
		$(this).parent().parent().remove();
	});
	$(document).on('click', '.ajouter', insertion );
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
				data = JSON.parse(data);
				console.log(data);
				$('.validation').html('<div class="alert alert-success">La compétence a bien été ajoutée</div>');
				$('tr').last().before('<tr><td>' + data.competence + '</td><td><span class="supprimer glyphicon glyphicon-remove"><div class="hidden">' + data.id_competence + '</div></span></td></tr>') ;
				$('input').val('');
			}).
			fail(function(){
				$('.validation').html('<div class="alert alert-danger">Erreur, la compétence n\'a pas été ajoutée </div>');
			});
		}
		else{
			$('.validation').html('<div class="alert alert-danger">Erreur, la compétence ne peut etre laissée vide ! </div>');
		}
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
		$('.tr_competences').remove();
	});

});