jQuery(document).ready(function($){ 
	//alert('doc-ready-script is loaded');
	
	jQuery('#sidebar-right').height(Math.max($('#widecolumn-left').height(),$('#sidebar-right').height()));
	jQuery('#sidebar-left').height(Math.max($('#widecolumn-right').height(),$('#sidebar-left').height()));
	jQuery('#sidebar-right').height(Math.max($('#page-widecolumn-left').height(),$('#sidebar-right').height()));
	jQuery('#sidebar-left').height(Math.max($('#page-widecolumn-right').height(),$('#sidebar-left').height()));
	
    jQuery('#main_menu_ul').superfish();

	if( jQuery( '#full-slider' ).length > 0 ) {
		
		var kaex_nivo_options = this.getElementById('full-slider');
		try{
			var kaex_pause_speed = kaex_nivo_options.dataset.kaex_speed;
		}catch(e){
			var kaex_pause_speed = 5000;
		}
			
		try{
			var kaex_transition_effect = kaex_nivo_options.dataset.kaex_effect;
		}catch(e){
			var kaex_transition_effect = 'fade';
		}
		
		try{
			var kaex_transition_speed = kaex_nivo_options.dataset.kaex_trans;
		}catch(e){
			var kaex_transition_speed = 1000;
		}

		jQuery('#full-slider').nivoSlider({
     		effect: kaex_transition_effect, // Specify sets like: 'fold,fade,sliceDown'
	        slices: 15, // For slice animations
	        boxCols: 8, // For box animations
	        boxRows: 4, // For box animations
	        animSpeed: kaex_transition_speed, // Slide transition speed
	        pauseTime: kaex_pause_speed, // How long each slide will show
	        startSlide: 0, // Set starting Slide (0 index)
	        directionNav: true, // Next & Prev navigation
	        controlNav: true, // 1,2,3... navigation
	        controlNavThumbs: false, // Use thumbnails for Control Nav
	        pauseOnHover: true, // Stop animation while hovering
	        manualAdvance: false, // Force manual transitions
	        prevText: 'Prev', // Prev directionNav text
	        nextText: 'Next', // Next directionNav text
	        randomStart: false, // Start on a random slide
	        beforeChange: function(){}, // Triggers before a slide transition
	        afterChange: function(){}, // Triggers after a slide transition
	        slideshowEnd: function(){}, // Triggers after all slides have been shown
	        lastSlide: function(){}, // Triggers when last slide is shown
	        afterLoad: function(){} // Triggers when slider has loaded
    	});
	}
	
	if( jQuery( '#full-slider-thumb' ).length > 0 ) {
		
		var kaex_nivo_options = this.getElementById('full-slider-thumb');
		try{
			var kaex_pause_speed = kaex_nivo_options.dataset.kaex_speed;
		}catch(e){
			var kaex_pause_speed = 5000;
		}
			
		try{
			var kaex_transition_effect = kaex_nivo_options.dataset.kaex_effect;
		}catch(e){
			var kaex_transition_effect = 'fade';
		}
		
		try{
			var kaex_transition_speed = kaex_nivo_options.dataset.kaex_trans;
		}catch(e){
			var kaex_transition_speed = 1000;
		}
		
    	jQuery('#full-slider-thumb').nivoSlider({
	    	effect: kaex_transition_effect, // Specify sets like: 'fold,fade,sliceDown'
	        slices: 15, // For slice animations
	        boxCols: 8, // For box animations
	        boxRows: 4, // For box animations
	        animSpeed: kaex_transition_speed, // Slide transition speed
	        pauseTime: kaex_pause_speed, // How long each slide will show
	        startSlide: 0, // Set starting Slide (0 index)
	        directionNav: true, // Next & Prev navigation
	        controlNav: true, // 1,2,3... navigation
	        controlNavThumbs: true, // Use thumbnails for Control Nav
	        pauseOnHover: true, // Stop animation while hovering
	        manualAdvance: false, // Force manual transitions
	        prevText: 'Prev', // Prev directionNav text
	        nextText: 'Next', // Next directionNav text
	        randomStart: false, // Start on a random slide
	        beforeChange: function(){}, // Triggers before a slide transition
	        afterChange: function(){}, // Triggers after a slide transition
	        slideshowEnd: function(){}, // Triggers after all slides have been shown
	        lastSlide: function(){}, // Triggers when last slide is shown
	        afterLoad: function(){} // Triggers when slider has loaded
	    });
	}
	
	if( jQuery( '#full-slider-nonav' ).length > 0 ) {
		
		var kaex_nivo_options = this.getElementById('full-slider-thumb');
		try{
			var kaex_pause_speed = kaex_nivo_options.dataset.kaex_speed;
		}catch(e){
			var kaex_pause_speed = 5000;
		}
			
		try{
			var kaex_transition_effect = kaex_nivo_options.dataset.kaex_effect;
		}catch(e){
			var kaex_transition_effect = 'fade';
		}
		
		try{
			var kaex_transition_speed = kaex_nivo_options.dataset.kaex_trans;
		}catch(e){
			var kaex_transition_speed = 1000;
		}
		
    	jQuery('#full-slider-nonav').nivoSlider({
	    	effect: kaex_transition_effect, // Specify sets like: 'fold,fade,sliceDown'
	        slices: 15, // For slice animations
	        boxCols: 8, // For box animations
	        boxRows: 4, // For box animations
	        animSpeed: kaex_transition_speed, // Slide transition speed
	        pauseTime: kaex_pause_speed, // How long each slide will show
	        startSlide: 0, // Set starting Slide (0 index)
	        directionNav: true, // Next & Prev navigation
	        controlNav: false, // 1,2,3... navigation
	        controlNavThumbs: false, // Use thumbnails for Control Nav
	        pauseOnHover: true, // Stop animation while hovering
	        manualAdvance: false, // Force manual transitions
	        prevText: 'Prev', // Prev directionNav text
	        nextText: 'Next', // Next directionNav text
	        randomStart: false, // Start on a random slide
	        beforeChange: function(){}, // Triggers before a slide transition
	        afterChange: function(){}, // Triggers after a slide transition
	        slideshowEnd: function(){}, // Triggers after all slides have been shown
	        lastSlide: function(){}, // Triggers when last slide is shown
	        afterLoad: function(){} // Triggers when slider has loaded
	    });
	}
  	
  	if( jQuery( '#half-slider' ).length > 0 ) {
		
		var kaex_nivo_options = this.getElementById('half-slider');
		try{
			var kaex_pause_speed = kaex_nivo_options.dataset.kaex_speed;
		}catch(e){
			var kaex_pause_speed = 5000;
		}
			
		try{
			var kaex_transition_effect = kaex_nivo_options.dataset.kaex_effect;
		}catch(e){
			var kaex_transition_effect = 'fade';
		}
		
		try{
			var kaex_transition_speed = kaex_nivo_options.dataset.kaex_trans;
		}catch(e){
			var kaex_transition_speed = 1000;
		}
		
    	jQuery('#half-slider').nivoSlider({
    		effect: kaex_transition_effect, // Specify sets like: 'fold,fade,sliceDown'
	        slices: 15, // For slice animations
	        boxCols: 8, // For box animations
	        boxRows: 4, // For box animations
	        animSpeed: kaex_transition_speed, // Slide transition speed
	        pauseTime: kaex_pause_speed, // How long each slide will show
	        startSlide: 0, // Set starting Slide (0 index)
	        directionNav: true, // Next & Prev navigation
	        controlNav: true, // 1,2,3... navigation
	        controlNavThumbs: false, // Use thumbnails for Control Nav
	        pauseOnHover: true, // Stop animation while hovering
	        manualAdvance: false, // Force manual transitions
	        prevText: 'Prev', // Prev directionNav text
	        nextText: 'Next', // Next directionNav text
	        randomStart: false, // Start on a random slide
	        beforeChange: function(){}, // Triggers before a slide transition
	        afterChange: function(){}, // Triggers after a slide transition
	        slideshowEnd: function(){}, // Triggers after all slides have been shown
	        lastSlide: function(){}, // Triggers when last slide is shown
	        afterLoad: function(){} // Triggers when slider has loaded
    	});
	};
  	
  	if( jQuery( '#half-slider-thumb' ).length > 0 ) {
		
		var kaex_nivo_options = this.getElementById('half-slider-thumb');
		try{
			var kaex_pause_speed = kaex_nivo_options.dataset.kaex_speed;
		}catch(e){
			var kaex_pause_speed = 5000;
		}
			
		try{
			var kaex_transition_effect = kaex_nivo_options.dataset.kaex_effect;
		}catch(e){
			var kaex_transition_effect = 'fade';
		}
		
		try{
			var kaex_transition_speed = kaex_nivo_options.dataset.kaex_trans;
		}catch(e){
			var kaex_transition_speed = 1000;
		}
		
    	jQuery('#half-slider-thumb').nivoSlider({
    		effect: kaex_transition_effect, // Specify sets like: 'fold,fade,sliceDown'
	        slices: 15, // For slice animations
	        boxCols: 8, // For box animations
	        boxRows: 4, // For box animations
	        animSpeed: kaex_transition_speed, // Slide transition speed
	        pauseTime: kaex_pause_speed, // How long each slide will show
	        startSlide: 0, // Set starting Slide (0 index)
	        directionNav: true, // Next & Prev navigation
	        controlNav: true, // 1,2,3... navigation
	        controlNavThumbs: true, // Use thumbnails for Control Nav
	        pauseOnHover: true, // Stop animation while hovering
	        manualAdvance: false, // Force manual transitions
	        prevText: 'Prev', // Prev directionNav text
	        nextText: 'Next', // Next directionNav text
	        randomStart: false, // Start on a random slide
	        beforeChange: function(){}, // Triggers before a slide transition
	        afterChange: function(){}, // Triggers after a slide transition
	        slideshowEnd: function(){}, // Triggers after all slides have been shown
	        lastSlide: function(){}, // Triggers when last slide is shown
	        afterLoad: function(){} // Triggers when slider has loaded
	    });
	};
	
	if( jQuery( '#half-slider-nonav' ).length > 0 ) {
		
		var kaex_nivo_options = this.getElementById('half-slider-thumb');
		try{
			var kaex_pause_speed = kaex_nivo_options.dataset.kaex_speed;
		}catch(e){
			var kaex_pause_speed = 5000;
		}
			
		try{
			var kaex_transition_effect = kaex_nivo_options.dataset.kaex_effect;
		}catch(e){
			var kaex_transition_effect = 'fade';
		}
		
		try{
			var kaex_transition_speed = kaex_nivo_options.dataset.kaex_trans;
		}catch(e){
			var kaex_transition_speed = 1000;
		}
		
    	jQuery('#half-slider-nonav').nivoSlider({
    		effect: kaex_transition_effect, // Specify sets like: 'fold,fade,sliceDown'
	        slices: 15, // For slice animations
	        boxCols: 8, // For box animations
	        boxRows: 4, // For box animations
	        animSpeed: kaex_transition_speed, // Slide transition speed
	        pauseTime: kaex_pause_speed, // How long each slide will show
	        startSlide: 0, // Set starting Slide (0 index)
	        directionNav: true, // Next & Prev navigation
	        controlNav: false, // 1,2,3... navigation
	        controlNavThumbs: false, // Use thumbnails for Control Nav
	        pauseOnHover: true, // Stop animation while hovering
	        manualAdvance: false, // Force manual transitions
	        prevText: 'Prev', // Prev directionNav text
	        nextText: 'Next', // Next directionNav text
	        randomStart: false, // Start on a random slide
	        beforeChange: function(){}, // Triggers before a slide transition
	        afterChange: function(){}, // Triggers after a slide transition
	        slideshowEnd: function(){}, // Triggers after all slides have been shown
	        lastSlide: function(){}, // Triggers when last slide is shown
	        afterLoad: function(){} // Triggers when slider has loaded
	    });
	};
	
	if( jQuery( '#center-slider' ).length > 0 ) {
		
		var kaex_nivo_options = this.getElementById('center-slider');
		try{
			var kaex_pause_speed = kaex_nivo_options.dataset.kaex_speed;
		}catch(e){
			var kaex_pause_speed = 5000;
		}
			
		try{
			var kaex_transition_effect = kaex_nivo_options.dataset.kaex_effect;
		}catch(e){
			var kaex_transition_effect = 'fade';
		}
		
		try{
			var kaex_transition_speed = kaex_nivo_options.dataset.kaex_trans;
		}catch(e){
			var kaex_transition_speed = 1000;
		}
		
    	jQuery('#center-slider').nivoSlider({
			effect: kaex_transition_effect, // Specify sets like: 'fold,fade,sliceDown'
	        slices: 15, // For slice animations
	        boxCols: 8, // For box animations
	        boxRows: 4, // For box animations
	        animSpeed: kaex_transition_speed, // Slide transition speed
	        pauseTime: kaex_pause_speed, // How long each slide will show
	        startSlide: 0, // Set starting Slide (0 index)
	        directionNav: true, // Next & Prev navigation
	        controlNav: true, // 1,2,3... navigation
	        controlNavThumbs: false, // Use thumbnails for Control Nav
	        pauseOnHover: true, // Stop animation while hovering
	        manualAdvance: false, // Force manual transitions
	        prevText: 'Prev', // Prev directionNav text
	        nextText: 'Next', // Next directionNav text
	        randomStart: false, // Start on a random slide
	        beforeChange: function(){}, // Triggers before a slide transition
	        afterChange: function(){kaNivoShowCaption();}, // Triggers after a slide transition
	        slideshowEnd: function(){}, // Triggers after all slides have been shown
	        lastSlide: function(){}, // Triggers when last slide is shown
	        afterLoad: function(){kaNivoShowCaption();} // Triggers when slider has loaded
    	});
	};
  	
  	if( jQuery( '#center-slider-thumb' ).length > 0 ) {
		
		var kaex_nivo_options = this.getElementById('center-slider-thumb');
		try{
			var kaex_pause_speed = kaex_nivo_options.dataset.kaex_speed;
		}catch(e){
			var kaex_pause_speed = 5000;
		}
			
		try{
			var kaex_transition_effect = kaex_nivo_options.dataset.kaex_effect;
		}catch(e){
			var kaex_transition_effect = 'fade';
		}
		
		try{
			var kaex_transition_speed = kaex_nivo_options.dataset.kaex_trans;
		}catch(e){
			var kaex_transition_speed = 1000;
		}
		
    	jQuery('#center-slider-thumb').nivoSlider({
			effect: kaex_transition_effect, // Specify sets like: 'fold,fade,sliceDown'
	        slices: 15, // For slice animations
	        boxCols: 8, // For box animations
	        boxRows: 4, // For box animations
	        animSpeed: kaex_transition_speed, // Slide transition speed
	        pauseTime: kaex_pause_speed, // How long each slide will show
	        startSlide: 0, // Set starting Slide (0 index)
	        directionNav: true, // Next & Prev navigation
	        controlNav: true, // 1,2,3... navigation
	        controlNavThumbs: true, // Use thumbnails for Control Nav
	        pauseOnHover: true, // Stop animation while hovering
	        manualAdvance: false, // Force manual transitions
	        prevText: 'Prev', // Prev directionNav text
	        nextText: 'Next', // Next directionNav text
	        randomStart: false, // Start on a random slide
	        beforeChange: function(){}, // Triggers before a slide transition
	        afterChange: function(){kaNivoShowCaption();}, // Triggers after a slide transition
	        slideshowEnd: function(){}, // Triggers after all slides have been shown
	        lastSlide: function(){}, // Triggers when last slide is shown
	        afterLoad: function(){kaNivoShowCaption();} // Triggers when slider has loaded
	    });
	};
	
	if( jQuery( '#center-slider-nonav' ).length > 0 ) {
		
		var kaex_nivo_options = this.getElementById('center-slider-thumb');
		try{
			var kaex_pause_speed = kaex_nivo_options.dataset.kaex_speed;
		}catch(e){
			var kaex_pause_speed = 5000;
		}
			
		try{
			var kaex_transition_effect = kaex_nivo_options.dataset.kaex_effect;
		}catch(e){
			var kaex_transition_effect = 'fade';
		}
		
		try{
			var kaex_transition_speed = kaex_nivo_options.dataset.kaex_trans;
		}catch(e){
			var kaex_transition_speed = 1000;
		}
		
    	jQuery('#center-slider-nonav').nivoSlider({
			effect: kaex_transition_effect, // Specify sets like: 'fold,fade,sliceDown'
	        slices: 15, // For slice animations
	        boxCols: 8, // For box animations
	        boxRows: 4, // For box animations
	        animSpeed: kaex_transition_speed, // Slide transition speed
	        pauseTime: kaex_pause_speed, // How long each slide will show
	        startSlide: 0, // Set starting Slide (0 index)
	        directionNav: true, // Next & Prev navigation
	        controlNav: false, // 1,2,3... navigation
	        controlNavThumbs: false, // Use thumbnails for Control Nav
	        pauseOnHover: true, // Stop animation while hovering
	        manualAdvance: false, // Force manual transitions
	        prevText: 'Prev', // Prev directionNav text
	        nextText: 'Next', // Next directionNav text
	        randomStart: false, // Start on a random slide
	        beforeChange: function(){}, // Triggers before a slide transition
	        afterChange: function(){kaNivoShowCaption();}, // Triggers after a slide transition
	        slideshowEnd: function(){}, // Triggers after all slides have been shown
	        lastSlide: function(){}, // Triggers when last slide is shown
	        afterLoad: function(){kaNivoShowCaption();} // Triggers when slider has loaded
	    });
	};
	
	function kaNivoShowCaption() {
		var imageID = jQuery('.nivoSlider').data('nivo:vars').currentImage.attr('ID');
		//alert(imageID);
		jQuery('div.nivo-ka-caption').css({'display':'none'});
		jQuery('div.nivo-ka-caption' + "." + imageID).css({'display':'block'});
	}
  	
});