jQuery(document).ready(function ($) {
	$('.fa-bars').click(function (e) {
		e.preventDefault();
		$('#menuPrincipal-burger').stop().slideToggle();
	});
})