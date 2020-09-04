jQuery(document).ready(function ($) {
	$('#prevBtn').hide();
	var i = 1;
	$('#nextBtn').click(function (e) {
		e.preventDefault();
		//Vérifier si l'article suivant existe
		if (typeof $(".article" + (i + 2)).html() != "undefined") {
			// Si oui, fadeout du premier
			$(".article" + i).fadeOut();
			// Et FadeIn du suivant
			$(".article" + (i + 2)).fadeIn();
			// Préparation de i pour le prochain clic
			i++;
			console.log(i);
		}
		if (typeof $(".article" + (i + 2)).html() == "undefined") {
			console.log(i + 2);
			$('#nextBtn').hide()
		}
		$('#prevBtn').show()
	});
	$('#prevBtn').click(function (e) {
		e.preventDefault();
		console.log(i);
		//Vérifier si l'article suivant existe
		if (typeof $(".article" + (i - 1)).html() != "undefined") {
			// Si oui, fadeout du dernier
			$(".article" + (i + 1)).fadeOut();
			// Et FadeIn du précédent
			$(".article" + (i - 1)).fadeIn();
			// Préparation de i pour le prochain clic
			i--;
			console.log(i);
		}
		if (typeof $(".article" + (i - 1)).html() == "undefined") {
			console.log(i - 2);
			$('#prevBtn').hide()
		}
		$('#nextBtn').show();
	});
})