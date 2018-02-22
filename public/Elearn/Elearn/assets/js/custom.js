$(document).ready(function() {

  
   $('.toggle').on('click', function() {
	  $('.contacts-container').stop().addClass('active');
	});

	$('.close').on('click', function() {
	  $('.contacts-container').stop().removeClass('active');
	});

 });

/* Thanks to CSS Tricks for pointing out this bit of jQuery
https://css-tricks.com/equal-height-blocks-in-rows/
It's been modified into a function called at page load and then each time the page is resized. One large modification was to remove the set height before each new calculation. */

equalheight = function(container){

var currentTallest = 0,
     currentRowStart = 0,
     rowDivs = new Array(),
     $el,
     topPosition = 0;
 $(container).each(function() {

   $el = $(this);
   $($el).height('auto')
   topPostion = $el.position().top;

   if (currentRowStart != topPostion) {
     for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
       rowDivs[currentDiv].height(currentTallest);
     }
     rowDivs.length = 0; // empty the array
     currentRowStart = topPostion;
     currentTallest = $el.height();
     rowDivs.push($el);
   } else {
     rowDivs.push($el);
     currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
  }
   for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
     rowDivs[currentDiv].height(currentTallest);
   }
 });
}

$(window).load(function() {
  equalheight('.team .card.card-profile.card-plain');
});


$(window).resize(function(){
  equalheight('.team .card.card-profile.card-plain');
});


$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    console.log(scroll);
    if (scroll >= 120) {
        
        $(".online-school .main.main-raised .aside").addClass("fixed-aside");
    } else {
        $(".online-school .main.main-raised .aside").removeClass("fixed-aside");

    }
});


$(window).scroll(function() {    
    var scroll = $(window).scrollTop();
    console.log(scroll);
    if (scroll >= 530) {
        
        $(".courses .aside").addClass("fixed-aside-course");
    } else {
        $(".courses .aside").removeClass("fixed-aside-course");

    }
});