<?php
/*
Plugin Name: Expressions Social Links Widget
Plugin URI: http://expressions.kevinsspace.ca/
Description: A widget for the Expressions theme that displays the social links
Version: 1.0
Author: Kevin Archibald
Author URI: http://www.kevinsspace.ca/
License: GPLv3
 */
 
/**
 * Social links widget file
 *
 * This file is  widget that will load any links that have urls coded in the 
 * ka_express Options => General Tab
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */

 // use widgets_init action hook to execute custom function
 add_action ( 'widgets_init','ka_express_social_links_register_widget' );

//register our widget 
 function ka_express_social_links_register_widget() {
 	register_widget ( 'ka_express_social_links_widget' );
 }
 
 //widget class
class ka_express_social_links_widget extends WP_Widget {

    //process the new widget
    function ka_express_social_links_widget() {
        $widget_ops = array( 
			'classname' => 'ka_express_social_links_widget_class', 
			'description' => __('Display social links','ka_express') 
			); 
        $this->WP_Widget( 'ka_express_social_links_widget', __('Expressions Social Links Widget','ka_express'), $widget_ops );
    }
 	
 	// Form for widget setup
 	function form ( $instance ) {
 		$kaex_social_defaults = array(
 			'kaex_social_title' => 'Social Links',
			'kaex_social_icon_size' => 'small',
 			'kaex_social_delicious' => 0,
 			'kaex_social_digg' => 0,
			'kaex_social_facebook' => 0,
			'kaex_social_flickr' => 0,
			'kaex_social_google' => 0,
			'kaex_social_instagram' => 0,
			'kaex_social_linkedin' => 0,
			'kaex_social_myspace' => 0,
			'kaex_social_pinterest' => 0,
			'kaex_social_rss' => 0,
			'kaex_social_tumblr' => 0,
			'kaex_social_twitter' => 0,
			'kaex_social_vimeo' => 0,
			'kaex_social_yelp' => 0,
			'kaex_social_youtube' => 0
		);
		$instance = wp_parse_args( (array) $instance, $kaex_social_defaults );
		$title = $instance['kaex_social_title'];
		$icon_size = $instance['kaex_social_icon_size'];
		$delicious = $instance['kaex_social_delicious'];
		$digg = $instance['kaex_social_digg'];
		$facebook = $instance['kaex_social_facebook'];
		$flickr = $instance['kaex_social_flickr'];
		$google = $instance['kaex_social_google'];
		$instagram = $instance['kaex_social_instagram'];
		$linkedin = $instance['kaex_social_linkedin'];
		$myspace = $instance['kaex_social_myspace'];
		$pinterest = $instance['kaex_social_pinterest'];
		$rss = $instance['kaex_social_rss'];
		$tumblr = $instance['kaex_social_tumblr'];
		$twitter = $instance['kaex_social_twitter'];
		$vimeo = $instance['kaex_social_vimeo'];
		$yelp = $instance['kaex_social_yelp'];
		$youtube = $instance['kaex_social_youtube'];
		?>
			<p>Title : <input class="widefat" id="<?php echo $this->get_field_id('kaex_social_title'); ?>" name="<?php echo $this->get_field_name('kaex_social_title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
			<p>Icon size : 
				<select name="<?php echo $this->get_field_name('kaex_social_icon_size'); ?>">
					<option value="small" <?php selected( $icon_size, "small" ); ?>>small</option>
					<option value="large" <?php selected( $icon_size, "large" ); ?>>large</option>
				</select> 
			</p>
			<p>Delicious <input name="<?php echo $this->get_field_name('kaex_social_delicious'); ?>" type="checkbox" <?php checked( $delicious, 'on' ); ?> /></p>
			<p>Digg <input name="<?php echo $this->get_field_name('kaex_social_digg'); ?>" type="checkbox" <?php checked( $digg, 'on' ); ?> /></p>
			<p>Facebook <input name="<?php echo $this->get_field_name('kaex_social_facebook'); ?>" type="checkbox" <?php checked( $facebook, 'on' ); ?> /></p>
			<p>Flickr <input name="<?php echo $this->get_field_name('kaex_social_flickr'); ?>" type="checkbox" <?php checked( $flickr, 'on' ); ?> /></p>
			<p>Google+ <input name="<?php echo $this->get_field_name('kaex_social_google'); ?>" type="checkbox" <?php checked( $google, 'on' ); ?> /></p>
			<p>Instagram <input name="<?php echo $this->get_field_name('kaex_social_instagram'); ?>" type="checkbox" <?php checked( $instagram, 'on' ); ?> /></p>
			<p>Linkedin <input name="<?php echo $this->get_field_name('kaex_social_linkedin'); ?>" type="checkbox" <?php checked( $linkedin, 'on' ); ?> /></p>
			<p>MySpace <input name="<?php echo $this->get_field_name('kaex_social_myspace'); ?>" type="checkbox" <?php checked( $myspace, 'on' ); ?> /></p>
			<p>Pinterest <input name="<?php echo $this->get_field_name('kaex_social_pinterest'); ?>" type="checkbox" <?php checked( $pinterest, 'on' ); ?> /></p>
			<p>RSS <input name="<?php echo $this->get_field_name('kaex_social_rss'); ?>" type="checkbox" <?php checked( $rss, 'on' ); ?> /></p>
			<p>Tumblr <input name="<?php echo $this->get_field_name('kaex_social_tumblr'); ?>" type="checkbox" <?php checked( $tumblr, 'on' ); ?> /></p>
			<p>Twitter <input name="<?php echo $this->get_field_name('kaex_social_twitter'); ?>" type="checkbox" <?php checked( $twitter, 'on' ); ?> /></p>
			<p>Vimeo <input name="<?php echo $this->get_field_name('kaex_social_vimeo'); ?>" type="checkbox" <?php checked( $vimeo, 'on' ); ?> /></p>
			<p>Yelp <input name="<?php echo $this->get_field_name('kaex_social_yelp'); ?>" type="checkbox" <?php checked( $yelp, 'on' ); ?> /></p>
			<p>Youtube <input name="<?php echo $this->get_field_name('kaex_social_youtube'); ?>" type="checkbox" <?php checked( $youtube, 'on' ); ?> /></p>
		<?php	
	}
	
	//save the widget settings
	function update ( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
        $instance['kaex_social_title'] = strip_tags( $new_instance['kaex_social_title'] );
		$instance['kaex_social_icon_size'] = strip_tags( $new_instance['kaex_social_icon_size'] );
		$instance['kaex_social_delicious'] = strip_tags( $new_instance['kaex_social_delicious'] );
		$instance['kaex_social_digg'] = strip_tags( $new_instance['kaex_social_digg'] );
		$instance['kaex_social_facebook'] = strip_tags( $new_instance['kaex_social_facebook'] );
		$instance['kaex_social_flickr'] = strip_tags( $new_instance['kaex_social_flickr'] );
		$instance['kaex_social_google'] = strip_tags( $new_instance['kaex_social_google'] );
		$instance['kaex_social_instagram'] = strip_tags( $new_instance['kaex_social_instagram'] );
		$instance['kaex_social_linkedin'] = strip_tags( $new_instance['kaex_social_linkedin'] );
		$instance['kaex_social_myspace'] = strip_tags( $new_instance['kaex_social_myspace'] );
		$instance['kaex_social_pinterest'] = strip_tags( $new_instance['kaex_social_pinterest'] );
		$instance['kaex_social_rss'] = strip_tags( $new_instance['kaex_social_rss'] );
		$instance['kaex_social_tumblr'] = strip_tags( $new_instance['kaex_social_tumblr'] );
		$instance['kaex_social_twitter'] = strip_tags( $new_instance['kaex_social_twitter'] );
		$instance['kaex_social_vimeo'] = strip_tags( $new_instance['kaex_social_vimeo'] );
		$instance['kaex_social_yelp'] = strip_tags( $new_instance['kaex_social_yelp'] );
		$instance['kaex_social_youtube'] = strip_tags( $new_instance['kaex_social_youtube'] );
		
		return $instance;
	}
	
	//display the widget
    function widget($args, $instance) {
    	global $kaex_options;
		$kaex_options = ka_express_get_options();
		$use_social_font_icons =  $kaex_options['kaex_use_social_font_icons'];
     	extract ( $args);
		echo $before_widget;
		$title = apply_filters( 'widget_title', $instance['kaex_social_title'] );
		if ( !empty( $title )) { echo $before_title.$title.$after_title;}
		$html = '';
		if( $use_social_font_icons == 1 ) {
			$html .= '<div class="kaex-social-widget">';
				if ( $instance['kaex_social_icon_size'] == 'small' ){
					If(esc_url($kaex_options['kaex_delicious_link']) !=="" && $instance['kaex_social_delicious'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_delicious_link']) . '" target="_blank" ><i class="fa fa-delicious small" title="Delicious"></i></a>';
					If(esc_url($kaex_options['kaex_digg_link']) != "" && $instance['kaex_social_digg'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_digg_link']) . '" target="_blank" ><i class="fa fa-digg small" title="Digg"></i></a>';
					If(esc_url($kaex_options['kaex_facebook_link']) !=="" && $instance['kaex_social_facebook'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_facebook_link']) . '" target="_blank" ><i class="fa fa-facebook-square small" title="Facebook"></i></a>';
					If(esc_url($kaex_options['kaex_flickr_link']) !=="" && $instance['kaex_social_flickr'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_flickr_link']) . '" target="_blank" ><i class="fa fa-flickr small" title="Flickr"></i></a>';
					If(esc_url($kaex_options['kaex_google_link']) !=="" && $instance['kaex_social_google'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_google_link']) . '" target="_blank" ><i class="fa fa-google-plus-square small" title="Google+"></i></a>';
					If(esc_url($kaex_options['kaex_instagram_link']) !=="" && $instance['kaex_social_instagram'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_instagram_link']) . '" target="_blank" ><i class="fa fa-instagram small" title="Instagram"></i></a>';
					If(esc_url($kaex_options['kaex_linkedin_link']) !=="" && $instance['kaex_social_linkedin'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_linkedin_link']) . '" target="_blank" ><i class="fa fa-linkedin-square small" title="Linkedin"></i></a>';
					If(esc_url($kaex_options['kaex_myspace_link']) !=="" && $instance['kaex_social_myspace'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_myspace_link']) . '" target="_blank" ><i class="fa fa-users small" title="Myspace"></i></a>';
					If(esc_url($kaex_options['kaex_pinterest_link']) !=="" && $instance['kaex_social_pinterest'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_pinterest_link']) . '" target="_blank" ><i class="fa fa-pinterest-square small" title="Pinterest"></i></a>';
					If(esc_url($kaex_options['kaex_rss_link']) !=="" && $instance['kaex_social_rss'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_rss_link']) . '" target="_blank" ><i class="fa fa-rss-square small" title="RSS"></i></a>';
					If(esc_url($kaex_options['kaex_tumblr_link']) !=="" && $instance['kaex_social_tumblr'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_tumblr_link']) . '" target="_blank" ><i class="fa fa-tumblr-square small" title="Tumblr"></i></a>';
					If(esc_url($kaex_options['kaex_twitter_link']) !=="" && $instance['kaex_social_twitter'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_twitter_link']) . '" target="_blank" ><i class="fa fa-twitter-square small" title="Twitter"></i></a>';
					If(esc_url($kaex_options['kaex_vimeo_link']) !=="" && $instance['kaex_social_vimeo'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_vimeo_link']) . '" target="_blank" ><i class="fa fa-vimeo-square small" title="Vimeo"></i></a>';
					If(esc_url($kaex_options['kaex_yelp_link']) !=="" && $instance['kaex_social_yelp'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_yelp_link']) . '" target="_blank" ><i class="icon-yelp small" title="Yelp"></i></a>';
					If(esc_url($kaex_options['kaex_youtube_link']) !=="" && $instance['kaex_social_youtube'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_youtube_link']) . '" target="_blank" ><i class="fa fa-youtube-square small" title="Youtube"></i></a>';
				} else {
					If(esc_url($kaex_options['kaex_delicious_link']) !=="" && $instance['kaex_social_delicious'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_delicious_link']) . '" target="_blank" ><i class="fa fa-delicious large" title="Delicious"></i></a>';
					If(esc_url($kaex_options['kaex_digg_link']) != "" && $instance['kaex_social_digg'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_digg_link']) . '" target="_blank" ><i class="fa fa-digg large" title="Digg"></i></a>';
					If(esc_url($kaex_options['kaex_facebook_link']) !=="" && $instance['kaex_social_facebook'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_facebook_link']) . '" target="_blank" ><i class="fa fa-facebook-square large" title="Facebook"></i></a>';
					If(esc_url($kaex_options['kaex_flickr_link']) !=="" && $instance['kaex_social_flickr'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_flickr_link']) . '" target="_blank" ><i class="fa fa-flickr large" title="Flickr"></i></a>';
					If(esc_url($kaex_options['kaex_google_link']) !=="" && $instance['kaex_social_google'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_google_link']) . '" target="_blank" ><i class="fa fa-google-plus-square large" title="Google+"></i></a>';
					If(esc_url($kaex_options['kaex_instagram_link']) !=="" && $instance['kaex_social_instagram'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_instagram_link']) . '" target="_blank" ><i class="fa fa-instagram large" title="Instagram"></i></a>';
					If(esc_url($kaex_options['kaex_linkedin_link']) !=="" && $instance['kaex_social_linkedin'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_linkedin_link']) . '" target="_blank" ><i class="fa fa-linkedin-square large" title="Linkedin"></i></a>';
					If(esc_url($kaex_options['kaex_myspace_link']) !=="" && $instance['kaex_social_myspace'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_myspace_link']) . '" target="_blank" ><i class="fa fa-users large" title="Myspace"></i></a>';
					If(esc_url($kaex_options['kaex_pinterest_link']) !=="" && $instance['kaex_social_pinterest'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_pinterest_link']) . '" target="_blank" ><i class="fa fa-pinterest-square large" title="Pinterest"></i></a>';
					If(esc_url($kaex_options['kaex_rss_link']) !=="" && $instance['kaex_social_rss'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_rss_link']) . '" target="_blank" ><i class="fa fa-rss-square large" title="RSS"></i></a>';
					If(esc_url($kaex_options['kaex_tumblr_link']) !=="" && $instance['kaex_social_tumblr'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_tumblr_link']) . '" target="_blank" ><i class="fa fa-tumblr-square large" title="Tumblr"></i></a>';
					If(esc_url($kaex_options['kaex_twitter_link']) !=="" && $instance['kaex_social_twitter'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_twitter_link']) . '" target="_blank" ><i class="fa fa-twitter-square large" title="Twitter"></i></a>';
					If(esc_url($kaex_options['kaex_vimeo_link']) !=="" && $instance['kaex_social_vimeo'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_vimeo_link']) . '" target="_blank" ><i class="fa fa-vimeo-square large" title="Vimeo"></i></a>';
					If(esc_url($kaex_options['kaex_yelp_link']) !=="" && $instance['kaex_social_yelp'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_yelp_link']) . '" target="_blank" ><i class="icon-yelp large" title="Yelp"></i></a>';
					If(esc_url($kaex_options['kaex_youtube_link']) !=="" && $instance['kaex_social_youtube'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_youtube_link']) . '" target="_blank" ><i class="fa fa-youtube-square large" title="Youtube"></i></a>';
				}
			$html .= '</div>';
		} else {
			$html .= '<div class="kaex-social-widget">';
				if ( $instance['kaex_social_icon_size'] == 'small' ){
					If(esc_url($kaex_options['kaex_delicious_link']) !=="" && $instance['kaex_social_delicious'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_delicious_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/delicious_s.png" alt="Delicious" title="Delicious" /></a>';
					If(esc_url($kaex_options['kaex_digg_link']) != "" && $instance['kaex_social_digg'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_digg_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/digg_s.png" alt="Digg" title="Digg" /></a>';
					If(esc_url($kaex_options['kaex_facebook_link']) !=="" && $instance['kaex_social_facebook'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_facebook_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/facebook_s.png" alt="Facebook" title="Facebook" /></a>';
					If(esc_url($kaex_options['kaex_flickr_link']) !=="" && $instance['kaex_social_flickr'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_flickr_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/flickr_s.png" alt="Flickr" title="Flickr" /></a>';
					If(esc_url($kaex_options['kaex_google_link']) !=="" && $instance['kaex_social_google'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_google_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/google_plus_s.png" alt="Google+" title="Google+" /></a>';
					If(esc_url($kaex_options['kaex_instagram_link']) !=="" && $instance['kaex_social_instagram'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_instagram_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/instagram_s.png" alt="Instagram" title="Instagram" /></a>';
					If(esc_url($kaex_options['kaex_linkedin_link']) !=="" && $instance['kaex_social_linkedin'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_linkedin_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/linkedin_s.png" alt="Linkedin" title="Linkedin" /></a>';
					If(esc_url($kaex_options['kaex_myspace_link']) !=="" && $instance['kaex_social_myspace'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_myspace_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/myspace_s.png" alt="MySpace" title="MySpace" /></a>';
					If(esc_url($kaex_options['kaex_pinterest_link']) !=="" && $instance['kaex_social_pinterest'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_pinterest_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/pinterest_s.png" alt="Pinterest" title="Pinterest" /></a>';
					If(esc_url($kaex_options['kaex_rss_link']) !=="" && $instance['kaex_social_rss'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_rss_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/rss_s.png" alt="RSS FEED" title="RSS FEED" /></a>';
					If(esc_url($kaex_options['kaex_tumblr_link']) !=="" && $instance['kaex_social_tumblr'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_tumblr_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/tumblr_s.png" alt="Tumblr" title="Tumblr" /></a>';
					If(esc_url($kaex_options['kaex_twitter_link']) !=="" && $instance['kaex_social_twitter'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_twitter_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/twitter_s.png" alt="Twitter" title="Twitter" /></a>';
					If(esc_url($kaex_options['kaex_vimeo_link']) !=="" && $instance['kaex_social_vimeo'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_vimeo_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/vimeo_s.png" alt="Vimeo" title="Vimeo" /></a>';
					If(esc_url($kaex_options['kaex_yelp_link']) !=="" && $instance['kaex_social_yelp'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_yelp_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/yelp_s.png" alt="Yelp" title="Yelp" /></a>';
					If(esc_url($kaex_options['kaex_youtube_link']) !=="" && $instance['kaex_social_youtube'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_youtube_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/youtube_s.png" alt="YouTube" title="YouTube" /></a>';
				} else {
					If(esc_url($kaex_options['kaex_delicious_link']) !=="" && $instance['kaex_social_delicious'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_delicious_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/delicious_l.png" alt="Delicious" title="Delicious" /></a>';
					If(esc_url($kaex_options['kaex_digg_link']) !=="" && $instance['kaex_social_digg'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_digg_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/digg_l.png" alt="Digg" title="Digg" /></a>';
					If(esc_url($kaex_options['kaex_facebook_link']) !=="" && $instance['kaex_social_facebook'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_facebook_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/facebook_l.png" alt="Facebook" title="Facebook" /></a>';
					If(esc_url($kaex_options['kaex_flickr_link']) !=="" && $instance['kaex_social_flickr'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_flickr_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/flickr_l.png" alt="Flickr" title="Flickr" /></a>';
					If(esc_url($kaex_options['kaex_google_link']) !=="" && $instance['kaex_social_google'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_google_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/google_plus_l.png" alt="Google+" title="Google+" /></a>';
					If(esc_url($kaex_options['kaex_instagram_link']) !=="" && $instance['kaex_social_instagram'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_instagram_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/instagram_l.png" alt="Instagram" title="Instagram" /></a>';
					If(esc_url($kaex_options['kaex_linkedin_link']) !=="" && $instance['kaex_social_linkedin'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_linkedin_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/linkedin_l.png" alt="Linkedin" title="Linkedin" /></a>';
					If(esc_url($kaex_options['kaex_myspace_link']) !=="" && $instance['kaex_social_myspace'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_myspace_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/myspace_l.png" alt="MySpace" title="MySpace" /></a>';
					If(esc_url($kaex_options['kaex_pinterest_link']) !=="" && $instance['kaex_social_pinterest'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_pinterest_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/pinterest_l.png" alt="Pinterest" title="Pinterest" /></a>';
					If(esc_url($kaex_options['kaex_rss_link']) !=="" && $instance['kaex_social_rss'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_rss_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/rss_l.png" alt="RSS FEED" title="RSS FEED" /></a>';
					If(esc_url($kaex_options['kaex_tumblr_link']) !=="" && $instance['kaex_social_tumblr'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_tumblr_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/tumblr_l.png" alt="Tumblr" title="Tumblr" /></a>';
					If(esc_url($kaex_options['kaex_twitter_link']) !=="" && $instance['kaex_social_twitter'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_twitter_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/twitter_l.png" alt="Twitter" title="Twitter" /></a>';
					If(esc_url($kaex_options['kaex_vimeo_link']) !=="" && $instance['kaex_social_vimeo'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_vimeo_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/vimeo_l.png" alt="Vimeo" title="Vimeo" /></a>';
					If(esc_url($kaex_options['kaex_yelp_link']) !=="" && $instance['kaex_social_yelp'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_yelp_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/yelp_l.png" alt="Yelp" title="Yelp" /></a>';
					If(esc_url($kaex_options['kaex_youtube_link']) !=="" && $instance['kaex_social_youtube'] == 'on' ) $html .= '<a href="' . esc_url($kaex_options['kaex_youtube_link']) . '" target="_blank" ><img src="'. get_template_directory_uri() . '/images/social/youtube_l.png" alt="YouTube" title="YouTube" /></a>';
				}
			$html .= '</div>';
		}
		
		
		echo $html;
		echo $after_widget; 
	}
}
?>