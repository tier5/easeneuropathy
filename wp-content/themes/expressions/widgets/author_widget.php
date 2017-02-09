<?php
/*
Plugin Name: Expressions Author Widget
Plugin URI: http://demo2.kevinsspace.ca/
Description: A widget for the Expressions Theme that displays a WordPress Author
Version: 1.0
Author: Kevin Archibald
Author URI: http://www.kevinsspace.ca/
License: GPLv3
 */
 
/**
 * Social links widget file
 *
 * This file is a widget that will custom contact form for your site
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
// use widgets_init action hook to execute custom function
 add_action ( 'widgets_init','ka_express_author_register_widget' );

//register our widget 
 function ka_express_author_register_widget() {
 	register_widget ( 'ka_express_author_widget' );
 }
 
 //widget class
class ka_express_author_widget extends WP_Widget {

    //process the new widget
    function ka_express_author_widget() {
        $widget_ops = array( 
			'classname' => 'ka_express_author_widget_class', 
			'description' => __('Display author biography','ka_express') 
			); 
        $this->WP_Widget( 'ka_express_author_widget', __('Expressions Author Widget','ka_express'), $widget_ops );
    }
 	
 	// Form for widget setup
 	function form ( $instance ) {
 		$kaex_author_defaults = array(
 			'kaex_author_title' => 'About the Author',
 			'kaex_author_name' => '',
 			'kaex_author_email' => '',
 			'kaex_author_website' => '',
 			'kaex_author_bio' => ''
		);
		
		$instance = wp_parse_args( (array) $instance, $kaex_author_defaults );
		$title = $instance['kaex_author_title'];
		$name = $instance['kaex_author_name'];
		$email = $instance['kaex_author_email'];
		$website = $instance['kaex_author_website'];
		$bio = $instance['kaex_author_bio'];
		
		echo '<p>'.__( 'Title : ' , 'ka_express' ).
					'<input class="widefat" id="'.esc_attr( $this->get_field_id( 'kaex_author_title' ) ).
					'" name="'.esc_attr( $this->get_field_name( 'kaex_author_title' ) ).'" type="text" 
					value="'.esc_attr( $title ).'" /></p>';
		echo '<p>'.__( 'Name : ' , 'ka_express' ).
					'<input class="widefat" id="'.esc_attr( $this->get_field_id( 'kaex_author_name' ) ).
					'" name="'.esc_attr( $this->get_field_name( 'kaex_author_name' ) ).
					'" type="text" value="'.esc_attr( $name ).'" /></p>';
		echo '<p>'.__( 'Email : ' , 'ka_express' ).
					'<input class="widefat" id="'.esc_attr( $this->get_field_id( 'kaex_author_email' ) ).
					'" name="'.esc_attr( $this->get_field_name( 'kaex_author_email' ) ).
					'" type="text" value="'.esc_attr( $email ).'" /></p>';
		echo '<p>'.__( 'Website : ' , 'ka_express' ).
					'<input class="widefat" id="'.esc_attr( $this->get_field_id( 'kaex_author_website' ) ).
					'" name="'.esc_attr( $this->get_field_name( 'kaex_author_website' ) ).
					'" type="text" value="'.esc_attr( $website ).'" /></p>';
		echo '<p>'.__('Biography : ','ka_express').'<textarea class="widefat" id="'.esc_attr( $this->get_field_id( 'kaex_author_bio' ) ).
					'" name="'.esc_attr( $this->get_field_name('kaex_author_bio' ) ).'">'.esc_attr( $bio ).'</textarea></p>';
			
	}
	
	//save the widget settings
	function update ( $new_instance, $old_instance ) {
		$instance = $old_instance;
        $instance['kaex_author_title'] = strip_tags( $new_instance['kaex_author_title'] );
		$instance['kaex_author_name'] = strip_tags( $new_instance['kaex_author_name'] );
		$instance['kaex_author_email'] = strip_tags( $new_instance['kaex_author_email'] );
		$instance['kaex_author_website'] = strip_tags( $new_instance['kaex_author_website'] );
		$instance['kaex_author_bio'] = strip_tags( $new_instance['kaex_author_bio'] );
				
		return $instance;
	}
	
	//display the widget
    function widget($args, $instance) {
    	global $kaex_options;
		$kaex_options = ka_express_get_options();
     	extract ( $args);
		echo $before_widget;
		$title = apply_filters( 'widget_title', $instance['kaex_author_title'] );
		if ( !empty( $title )) { echo $before_title.$title.$after_title; }
		$kaex_author_name = esc_attr( $instance['kaex_author_name'] );
		$kaex_author_email = esc_attr( $instance['kaex_author_email'] );
		$kaex_author_website = esc_url( $instance['kaex_author_website'] );
		$kaex_author_bio = esc_attr( $instance['kaex_author_bio'] );
		$has_valid_avatar = ka_express_validate_gravatar( $kaex_author_email );
	
		echo '<div class="kaex-author-widget">';
		
			if( $has_valid_avatar == 1 ) { echo '<span class="author-widget-avatar">'.get_avatar( $kaex_author_email , 70 ).'</span>'; }
			if( $kaex_author_name != '' ) { echo '<span class="author-widget-name">'.$kaex_author_name.'</span><br/>'; }
			if( $kaex_author_bio != '' ) {
				echo '<span class="author-widget-bio">'.$kaex_author_bio.'</span>';
			} else {
				echo 'You should probably put a few nice words here...it is a bio after all :)';
			}

		if( $kaex_author_website != '' ) { echo '<br/><a class="author-widget-website" href="'.$kaex_author_website.'" title="Author Website" >Website</a>'; }
	
		echo '</div>';

		echo $after_widget; 
	}
}		