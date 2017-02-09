<?php
/*
Plugin Name: Expressions Contact Widget
Plugin URI: http://demo2.kevinsspace.ca/
Description: A widget for the Expressions theme that sets up a contact form
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
/** ----------- Session Start ----------------------------------------------
 * Start session if not already started. The session is required
 * for passing the password from kaex_captcha.php to the input
 * form data validation
 * ------------------------------------------------------------------------- */
if(!isset($_SESSION)) session_start();

 // use widgets_init action hook to execute custom function
 add_action ( 'widgets_init','ka_express_contact_register_widget' );

//register our widget 
 function ka_express_contact_register_widget() {
 	register_widget ( 'ka_express_contact_widget' );
 }
 
 //widget class
class ka_express_contact_widget extends WP_Widget {

    //process the new widget
    function ka_express_contact_widget() {
        $widget_ops = array( 
			'classname' => 'ka_express_contact_widget_class', 
			'description' => __('Display contact form','ka_express') 
			); 
        $this->WP_Widget( 'ka_express_contact_widget', __('Expressions Contact Form Widget','ka_express'), $widget_ops );
    }
 	
 	// Form for widget setup
 	function form ( $instance ) {
 		$kaex_contact_defaults = array(
 			'kaex_contact_title' => 'Contact Me',
			'kaex_contact_name_label' => 'name',
			'kaex_contact_email_label' => 'email',
			'kaex_contact_message_label' => 'message',
			'kaex_contact_send_label' => 'send'
		);
		$instance = wp_parse_args( (array) $instance, $kaex_contact_defaults );
		$title = $instance['kaex_contact_title'];
		$name_label = $instance['kaex_contact_name_label'];
		$email_label = $instance['kaex_contact_email_label'];
		$message_label = $instance['kaex_contact_message_label'];
		$send_label = $instance['kaex_contact_send_label'];
		?>
			<p>Title : <input class="widefat" id="<?php echo $this->get_field_id('kaex_contact_title'); ?>" name="<?php echo $this->get_field_name('kaex_contact_title'); ?>" type="text" value="<?php echo $title; ?>" /></p>
			<p>Name Label : <input class="widefat" id="<?php echo $this->get_field_id('kaex_contact_name_label'); ?>" name="<?php echo $this->get_field_name('kaex_contact_name_label'); ?>" type="text" value="<?php echo $name_label; ?>" /></p>
			<p>Email Label : <input class="widefat" id="<?php echo $this->get_field_id('kaex_contact_email_label'); ?>" name="<?php echo $this->get_field_name('kaex_contact_email_label'); ?>" type="text" value="<?php echo $email_label; ?>" /></p>
			<p>Message Label : <input class="widefat" id="<?php echo $this->get_field_id('kaex_contact_message_label'); ?>" name="<?php echo $this->get_field_name('kaex_contact_message_label'); ?>" type="text" value="<?php echo $message_label; ?>" /></p>
			<p>Send Label : <input class="widefat" id="<?php echo $this->get_field_id('kaex_contact_send_label'); ?>" name="<?php echo $this->get_field_name('kaex_contact_send_label'); ?>" type="text" value="<?php echo $send_label; ?>" /></p>
		<?php	
	}
	
	//save the widget settings
	function update ( $new_instance, $old_instance ) {
		$instance = $old_instance;
        $instance['kaex_contact_title'] = strip_tags( $new_instance['kaex_contact_title'] );
		$instance['kaex_contact_name_label'] = strip_tags( $new_instance['kaex_contact_name_label'] );
		$instance['kaex_contact_email_label'] = strip_tags( $new_instance['kaex_contact_email_label'] );
		$instance['kaex_contact_message_label'] = strip_tags( $new_instance['kaex_contact_message_label'] );
		$instance['kaex_contact_send_label'] = strip_tags( $new_instance['kaex_contact_send_label'] );
				
		return $instance;
	}
	
	//display the widget
    function widget($args, $instance) {
    	global $kaex_options;
		$kaex_options = ka_express_get_options();
     	extract ( $args);
		echo $before_widget;
		$title = apply_filters( 'widget_title', $instance['kaex_contact_title'] );
		if ( !empty( $title )) { echo $before_title.$title.$after_title;}
		
		$kaex_contact_name_label = $instance['kaex_contact_name_label'];
		$kaex_contact_email_label = $instance['kaex_contact_email_label'];
		$kaex_contact_message_label = $instance['kaex_contact_message_label'];
		$kaex_contact_send_label = $instance['kaex_contact_send_label'];
		$nameError = '';
		$emailError= '';
		$commentError = '';
		$captchaError = '';
		$hasError = false;
		$name = '';
		$email = '';
		$comments = '';
		
		if(isset($_POST['kaex_widget_contact_submitted']) && wp_verify_nonce( $_POST['kaex_widget_contact_form_nonce'],'kaex_widget_contact_nonce_1')) {
		
			//sanitize data input from forms	
			$name = sanitize_text_field($_POST['kaex_widget_contact_name']);
			$email = sanitize_email($_POST['kaex_widget_contact_email']);
			$comments = sanitize_text_field($_POST['kaex_widget_contact_comments']);
			$comments = stripcslashes($comments);
			//validate data input from forms
			if($name === '') {
				$nameError = __('Name required!','ka_express');
				$hasError = true;
			}
			if($email === '')  {
				$emailError = __('Email required!','ka_express');
				$hasError = true;
			} else if(ka_express_validEmail($email) != true){
				$emailError = __('Invalid email!','ka_express');
				$hasError = true;
			}
			if($comments === '') {
				$commentError = __('Message required!','ka_express');
				$hasError = true;
			}
			if($kaex_options['kaex_show_contact_captcha'] == 1) {
				if ($_SESSION['kaex_pass_phrase'] != sha1($_POST['verify'])){
					$captchaError = __('Captcha incorrect - try again','ka_express');
					$hasError = true;
				}
			}
			
			// Everything checks out so continue
			if( !isset($hasError) || $hasError == false ) {
				
				if(isset($kaex_options['kaex_contact_email']) && $kaex_options['kaex_contact_email'] !== '' && is_email($kaex_options['kaex_contact_email'])) {
					$emailTo = $kaex_options['kaex_contact_email'];
				} else {
					$emailTo = get_option('admin_email');
				}
				
				$subject = __('A message from ','ka_express').$name;
				$body = __('Name:','ka_express').' '.$name."\n\n".__('Email: ','ka_express').' '.$email."\n\n".__('Comments:','ka_express').' '.$comments;
				$headers = 'From: '.$name.' <'.$email.'>';
				wp_mail($emailTo, $subject, $body, $headers);
				$emailSent = true;
				$name = '';
				$email = '';
				$comments = '';
			}
		
		} ?>
				
		<div class="kaex-contact-widget">
			
			<?php if(isset($emailSent) && $emailSent == true) { ?>
				<div class="kaex-widget-contact-thanks">
					<p><?php _e('Thanks, your email was sent successfully.','ka_express'); ?></p>
					<script>alert('<?php _e("Thanks, your email was sent successfully.","ka_express"); ?>')</script>
				</div>
			<?php }
 
			if( $hasError == true || $captchaError == true ) { ?>
				<p class="kaex-widget-contact-error"><?php _e('Sorry, an error occured.','ka_express'); ?></p>
				<script>alert('<?php _e("Sorry there were errors, email was not sent.","ka_express"); ?>')</script>
			<?php } ?>
							
			<form method="post">
				
				<?php wp_nonce_field( 'kaex_widget_contact_nonce_1' , 'kaex_widget_contact_form_nonce' ); ?>
				
				<label><?php echo esc_attr( $kaex_contact_name_label ); ?></label><br/>
				<input type="text" name="kaex_widget_contact_name" class="kaex-widget-contact-name" value="<?php echo $name; ?>" /><br/>
				<?php if( $nameError != '' ) { ?>
					<span class="kaex-widget-contact-error"><?php echo esc_attr( $nameError ); ?></span><br/>
				<?php } ?>
		
				<label><?php echo $kaex_contact_email_label; ?></label><br/>
				<input type="text" name="kaex_widget_contact_email" class="kaex-widget-email" value="<?php echo $email; ?>" /><br/>
				<?php if( $emailError != '' ) { ?>
					<span class="kaex-widget-contact-error"><?php echo esc_attr( $emailError ); ?></span><br/>
				<?php } ?>

				<label><?php echo $kaex_contact_message_label; ?></label><br/>
				<textarea name="kaex_widget_contact_comments" class="kaex-widget-contact-comments" rows="10" ><?php echo $comments; ?></textarea><br/>
				<?php if( $commentError != '' ) { ?>
					<span class="kaex-widget-contact-error"><?php echo $commentError; ?></span><br/>
				<?php } ?>
		
				<?php if( $kaex_options['kaex_show_contact_captcha'] == 1 ) {
					
					if ( $kaex_options['kaex_use_color_captcha'] == 1 ) { ?>
						<img src="<?php echo get_template_directory_uri(); ?>/captcha/kaex_captcha_color.php" alt="Verification Captcha" /><br/>
					<?php } else { ?>
						<img src="<?php echo get_template_directory_uri(); ?>/captcha/kaex_captcha_bw.php" alt="Verification Captcha" /><br/>
					<?php } ?>
						
					<input type="text" class="kaex-widget-contact-captcha" id="widget-verify" name="verify" value="<?php _e('Enter Captcha','ka_express'); ?>" onclick="this.select();" /><br/>
						
					<?php if( $captchaError != '' ) { ?>
						<span class="kaex-widget-contact-error"><?php echo $captchaError; ?></span><br/>
					<?php }

				} ?>

				<button class="kaex_widget_contact_submit" type="submit"><?php echo esc_attr( $kaex_contact_send_label ); ?></button>
				<input type="hidden" name="kaex_widget_contact_submitted" value="true" />
				
			</form>
		</div>
		
		<?php
		echo $after_widget; 
	}
}