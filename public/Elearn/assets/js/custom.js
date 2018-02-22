$(document).ready(function() {

  
   $('.toggle').on('click', function() {
	  $('.contacts-container').stop().addClass('active');
	});

	$('.close').on('click', function() {
	  $('.contacts-container').stop().removeClass('active');
	});

 });