$(function(){

	/*Page compétences, remplissage progressif des competences*/
	$(document).on("mouseover", "li.nav-item", function(e){
		let img = $(this).attr('id');
		let chemin_image = 'url(../assets_front/img/bg_'+img+'.jpg)';
		// //console.log(chemin_image);
		$('.contenant').css('background-image', chemin_image);
	});

	/*Page experiences, affichage de l'information au survol du point de la timeline*/

	$(document).on('mouseover', 'span.rond', function(e){
		if ($(this).attr('id')) {
			let table_id = $(this).attr('id');
			let index = table_id.indexOf("_");
			let table = table_id.substr(0, index);
			let id = table_id.substr(index + 1 );
			//console.log(table);
			//console.log(id);
			$.ajax({
				url: '../rest.php',
				type: 'post',
				data: {
					table: table,
					id: id
				}
			}).
			done(function(data){
				data = JSON.parse(data);
				//console.log(data);
				let texte_exp = `
				<h2>`+data[1]+`</h2>
				<h3>`+data[2]+`</h3>
				<span>`+data[3]+`</span>
				<span>`+data[4]+`</span>
				`;
				$('.contenu_exp').html(texte_exp);
				if (table == 'experiences') {
					$('.contenu_exp').css('background-color', 'rgba(192, 57, 43, 0.2)');
				}
				if (table == 'formations') {
					$('.contenu_exp').css('background-color', 'rgba(41, 128, 185, 0.2)');
				}

				$('.contenu_exp').animate({
					opacity: '1'
				}, 1500);

			});
		}
	});

	$(document).on('mouseout', 'span.rond', function(e){
		$('.contenu_exp').animate({
			opacity: '0'
		}, 1);
	});

	$(document).on('submit', function(e){
		e.preventDefault();
		let pseudo_contact 		= $('.pseudo_contact').val();
		let email_contact 		= $('.email_contact').val();
		let telephone_contact 	= $('.telephone_contact').val();
		let sujet_contact 		= $('.sujet_contact').val();
		let texte_contact 		= $('.texte_contact').val();

		$.ajax({
			url: '../rest.php',
			type: 'post',
			data: {
				pseudo_contact: pseudo_contact,
				email_contact: email_contact,
				telephone_contact: telephone_contact,
				sujet_contact: sujet_contact,
				texte_contact: texte_contact
			}
		}).done(function(data){
			$('.alert').remove();
			if (data == '') {
				$('form').before(`<div class="alert alert-success"><strong> Merci.</strong> Vous serez recontacté sous peu. En attendant, pourquoi ne pas chercher le petit secret caché sur ce site ? </div>`);
			}
			else{
				$('form').before('<div class="alert alert-danger">'+data+'</div>');
			}
		});
	});

	setInterval(function(){ 
	    var date = new Date();
	    heure = date.getHours();
	    minute = date.getMinutes();
	    seconde = date.getSeconds();
	    heure = String(heure);
	    minute = String(minute);
	    seconde = String(seconde);

	    if (heure.length < 2) {
	    	heure = '0' + heure;
	    }
	    if (minute.length < 2) {
	    	minute = '0' + minute;
	    }
	    if (seconde.length < 2) {
	    	seconde = '0' + seconde;
	    }

		date = heure + ':' + minute + ':' + seconde;
		// console.log(date);

		$('.heure').text(date);
	}, 1000); 	
});