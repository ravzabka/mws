(function() {

   jQuery('.our-events__container').slick(
   	{
   		
  		infinite: true,
  	 	autoplay: true,
  	 	fade: true,
  		autoplaySpeed: 4000,
   	});

    jQuery('.alert-box__desc').slick(
   	{
   		
  		infinite: true,
  	 	autoplay: true,  	 	
  		autoplaySpeed: 4000,
  		dots: false,
  		arrows: false
   	});

    jQuery('.slider__box').slick(
    {
      
      infinite: true,
      autoplay: true,     
      autoplaySpeed: 4000,
      dots: false,
      arrows: false
    });

    jQuery('.opinie').slick(
    {
      
      infinite: true,
      autoplay: true,     
      autoplaySpeed: 6000,
      dots: false,
      arrows: false
    });



})();