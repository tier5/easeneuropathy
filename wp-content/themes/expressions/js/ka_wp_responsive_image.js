jQuery(document).ready(function($){
	
	jQuery('#fullwidth-blog .respimg img').each(function(){
		var imgWidth = jQuery(this).attr('width');
		var imgSetWidth;
		var captionWidth;
		if ( jQuery(this).parents('div.wp-caption').length ) {
			captionWidth = parseInt(imgWidth)*100/634;
			if ( captionWidth > 100 ){ captionWidth = 100; }
			captionWidth = 'width:' + captionWidth + '%;';
			imgSetWidth = '100%';
			jQuery(this).parents('div.wp-caption').attr('style',captionWidth);
			jQuery(this).attr({'width':imgSetWidth,'height':'auto'});
		} else if ( jQuery(this).parents('div.caption').length ) {
			
		} else {
			if ( imgWidth == 0 ) {
				imgSetWidth = '100%';
			} else {
				imgSetWidth = imgWidth*100/634;
				if ( imgSetWidth > 100 ) { imgSetWidth = 100; }
				imgSetWidth = imgSetWidth + '%';
			}
			jQuery(this).attr({'width':imgSetWidth,'height':'auto'});
		}
	});
	
	jQuery('#portfolio-post-wrap .respimg img').each(function(){
		var imgWidth = jQuery(this).attr('width');
		var imgSetWidth;
		var captionWidth;
		if ( jQuery(this).parents('div.wp-caption').length ) {
			captionWidth = parseInt(imgWidth)*100/864;
			if ( captionWidth > 100 ){ captionWidth = 100; }
			captionWidth = 'width:' + captionWidth + '%;';
			imgSetWidth = '100%';
			jQuery(this).parents('div.wp-caption').attr('style',captionWidth);
			jQuery(this).attr({'width':imgSetWidth,'height':'auto'});
		} else if ( jQuery(this).parents('div.caption').length ) {
			
		} else {
			if ( imgWidth == 0 ) {
				imgSetWidth = '100%';
			} else {
				imgSetWidth = imgWidth*100/864;
				if ( imgSetWidth > 100 ) { imgSetWidth = 100; }
				imgSetWidth = imgSetWidth + '%';
			}
			jQuery(this).attr({'width':imgSetWidth,'height':'auto'});
		}
	});
	
	jQuery('#widecolumn-left .respimg img').each(function(){
		var imgWidth = jQuery(this).attr('width');
		var imgSetWidth;
		var captionWidth;
		if ( jQuery(this).parents('div.wp-caption').length ) {
			captionWidth = parseInt(imgWidth)*100/544;
			if (captionWidth > 100 ) {captionWidth = 100;}
			captionWidth = 'width:' + captionWidth + '%;';
			imgSetWidth = '100%';
			jQuery(this).parents('div.wp-caption').attr('style',captionWidth);
			jQuery(this).attr({'width':imgSetWidth,'height':'auto'});
		} else if ( jQuery(this).parents('div.caption').length ) {
			
		} else {
			if ( imgWidth == 0 ) {
				imgSetWidth = '100%';
			} else {
				imgSetWidth = imgWidth*100/544;
				if (imgSetWidth > 100 ){ imgSetWidth = 100; }
				imgSetWidth = imgSetWidth + '%';
			}
			jQuery(this).attr({'width':imgSetWidth,'height':'auto'});
		}
	});
	
	jQuery('#widecolumn-right .respimg img').each(function(){
		var imgWidth = jQuery(this).attr('width');
		var imgSetWidth;
		var captionWidth;
		if ( jQuery(this).parents('div.wp-caption').length ) {
			captionWidth = parseInt(imgWidth)*100/544;
			if (captionWidth > 100 ) {captionWidth = 100;}
			captionWidth = 'width:' + captionWidth + '%;';
			imgSetWidth = '100%';
			jQuery(this).parents('div.wp-caption').attr('style',captionWidth);
			jQuery(this).attr({'width':imgSetWidth,'height':'auto'});
		} else if ( jQuery(this).parents('div.caption').length ) {
			
		} else {
			if ( imgWidth == 0 ) {
				imgSetWidth = '100%';
			} else {
				imgSetWidth = imgWidth*100/544;
				if (imgSetWidth > 100 ){ imgSetWidth = 100; }
				imgSetWidth = imgSetWidth + '%';
			}
			jQuery(this).attr({'width':imgSetWidth,'height':'auto'});
		}
	});
	
	jQuery('#fullwidth .respimg img').each(function(){
		var imgWidth = jQuery(this).attr('width');
		var imgSetWidth;
		var captionWidth;
		if ( jQuery(this).parents('div.wp-caption').length ) {
			captionWidth = parseInt(imgWidth)*100/864;
			if ( captionWidth > 100 ){ captionWidth = 100; }
			captionWidth = 'width:' + captionWidth + '%;';
			imgSetWidth = '100%';
			jQuery(this).parents('div.wp-caption').attr('style',captionWidth);
			jQuery(this).attr({'width':imgSetWidth,'height':'auto'});
		} else if ( jQuery(this).parents('div.caption').length ) {
			
		} else {
			if ( imgWidth == 0 ) {
				imgSetWidth = '100%';
			} else {
				imgSetWidth = imgWidth*100/864;
				if ( imgSetWidth > 100 ) { imgSetWidth = 100; }
				imgSetWidth = imgSetWidth + '%';
			}
			jQuery(this).attr({'width':imgSetWidth,'height':'auto'});
		}
	});
	
	//home template width: 883px
	jQuery('#home-full-width .respimg img').each(function(){
		var imgWidth = jQuery(this).attr('width');
		var imgSetWidth;
		var captionWidth;
		if ( jQuery(this).parents('div.wp-caption').length ) {
			captionWidth = parseInt(imgWidth)*100/884;
			if ( captionWidth > 100 ){ captionWidth = 100; }
			captionWidth = 'width:' + captionWidth + '%;';
			imgSetWidth = '100%';
			jQuery(this).parents('div.wp-caption').attr('style',captionWidth);
			jQuery(this).attr({'width':imgSetWidth,'height':'auto'});
		} else if ( jQuery(this).parents('div.caption').length ) {
			
		} else {
			if ( imgWidth == 0 ) {
				imgSetWidth = '100%';
			} else {
				imgSetWidth = imgWidth*100/884;
				if ( imgSetWidth > 100 ) { imgSetWidth = 100; }
				imgSetWidth = imgSetWidth + '%';
			}
			jQuery(this).attr({'width':imgSetWidth,'height':'auto'});
		}
	});
	
});