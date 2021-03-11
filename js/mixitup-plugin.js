

jQuery(function () {
		
		var filterList = {
		
			init: function () {
			
				// MixItUp plugin
				// http://mixitup.io
				jQuery('#portfoliolist').mixItUp({
  				selectors: {
    			  target: '.portfolio',
    			  filter: '.filter'	
    		  },

    		  
    		  load: {
      		  filter: '.dolnośląskie, .kujawsko-pomorskie, .lubelskie, .lubuskie, .mazowieckie, .małopolskie, .podlaskie, .pomorskie, .śląskie, .świętokrzyskie, .warmińsko-mazurskie, .wielkopolskie, .zachodniopomorskie, .łódzkie'  
      		}     
				});								
			
			}

		};
		
		// Run the show!
		filterList.init();
		
		
	});	