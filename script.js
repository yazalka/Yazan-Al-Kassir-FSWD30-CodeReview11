$(document).ready(function () {

	$('#signin_botton,.signin_botton').click(function() {

		$('#register_form').css("display", "none");
		$('#signin_form').css("display", "block");

	});


	$('#register_botton,.register_botton').click(function() {

		$('#register_form').css("display", "block");
		$('#signin_form').css("display", "none");

	});


});