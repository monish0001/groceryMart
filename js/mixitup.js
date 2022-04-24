$(function () {
    "use strict";
		var filterList = {
		
			init: function () {
			
				// MixItUp plugin
				// http://mixitup.io
				$('#portfoliolist').mixItUp({
  				selectors: {
    			  target: '.portfolio',
    			  filter: '.filter'	
    		  },
    		  load: {
      		  filter: '.filter1, .filter2, .filter3, .filter4'  
      		}     
				});								
			
			}

		};
		
		// Run the show!
		filterList.init();
		
		
	});	