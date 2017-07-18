$(function(){

	$(document).on("mouseover", "li.nav-item", function(e){
		let img = $(this).attr('id');
		let chemin_image = 'url(/site_cv/front_cv/public/assets/img//bg_'+img+'.jpg)';
		console.log(chemin_image);
		$('.contenant').css('background-image', chemin_image);
	});
});