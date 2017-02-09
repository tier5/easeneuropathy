<?php
/**
 * Template Name: Contact Form
 * 
 * This file is WordPress template file, which is output when
 * the user creates a page with this template
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
?>
<?php 
	$page_sidebar_loc = ( get_post_meta($post->ID,'kaex_metabox_sidebar_loc',true) == ''? 'right' : get_post_meta($post->ID,'kaex_metabox_sidebar_loc',true) );
	$exclude_page_title = ( get_post_meta($post->ID,'kaex_metabox_include_page_title',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_include_page_title',true) );
	global $kaex_options;
	$kaex_options = ka_express_get_options();
	global $nameError,$hasError,$emailError,$name,$emailError,$email,$commentError,$comments,$captchaError;
	if( $kaex_options['kaex_show_contact_captcha'] == 1 ) {
		if(!isset($_SESSION)) session_start();	
	}
	//initiate form variables
	$name = '';
	$email = '';
	$comments = '';
	
	if(isset($_POST['submitted']) && wp_verify_nonce( $_POST['ka_express_contact_form_nonce'],'ka_express_nonce_1')) {
			
		//sanitize data input from forms	
		$name = sanitize_text_field($_POST['contactName']);
		$email = sanitize_email($_POST['email']);
		$comments = sanitize_text_field($_POST['comments']);
		$comments = stripcslashes($comments);
		//validate data input from forms
		if($name === '') {
			$nameError = __('Please enter your name.','ka_express');
			$hasError = true;
		}
		if($email === '')  {
			$emailError = __('Please enter your email address.','ka_express');
			$hasError = true;
		} else if(ka_express_validEmail($email) !== true){
			$emailError = __('You entered an invalid email address.','ka_express');
			$hasError = true;
		}
		if($comments === '') {
			$commentError = __('Please enter a message.','ka_express');
			$hasError = true;
		}
		if($kaex_options['kaex_show_contact_captcha'] == 1) {
			if ($_SESSION['kaex_pass_phrase'] !== sha1($_POST['verify'])){
				$captchaError = __('Please enter the captcha exactly as shown','ka_express');
				$hasError=true;
			}
		}
	// Everything checks out so continue
		if(!isset($hasError)) {
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
	
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php if ( $exclude_page_title == false) { ?>
		<div class="page-title-wide">
			<div class="page-title-wrap">
				<h2 class="left-title"><?php echo get_the_title(); ?></h2>
			</div>
		</div>
	<?php } ?>

<?php endwhile; else : endif; ?>
	
<div class="clearfix"></div>

<div id="main-section">
	<div id="content-wrap">
		<?php if ( $page_sidebar_loc == 'left') { ?>
			<div id="widecolumn-right">
		<?php } else { ?>
			<div id="widecolumn-left">
		<?php } ?>
			<div id="contactmeform">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="post">
						<div class="entry">
							<?php if(isset($emailSent) && $emailSent == true) { ?>
								<div class="kaex-contact-thanks">
									<p><?php _e('Thanks, your email was sent successfully.','ka_express'); ?></p>
									<script>alert('<?php _e("Thanks, your email was sent successfully.","ka_express"); ?>')</script>
								</div>
							<?php } else { ?>
								<div class="respimg">
									<?php the_content(); ?>
								</div>
								<?php if(isset($hasError) || isset($captchaError)) { ?>
									<p class="error"><?php _e('Sorry, an error occured.','ka_express'); ?></p>
									<script>alert('<?php _e("Sorry there were errors, email was not sent.","ka_express"); ?>')</script>
								<?php }
							} ?>
							
							<br/><br/>
							
							<form action="<?php the_permalink(); ?>" id="contactForm" method="post">
								<?php wp_nonce_field("ka_express_nonce_1","ka_express_contact_form_nonce"); ?>
								<ul class="contactform">
									<li>
										<label for="contactName"><?php _e('Name:','ka_express'); ?></label><br/>
										<input type="text" name="contactName" id="contactName" value="<?php echo $name; ?>" /><br/><br/>
										<?php if($nameError != '') { ?>
											<span class="error"><?php echo $nameError; ?></span>
										<?php } ?>
									</li>
		
									<li>
										<label for="email"><?php _e('E-mail:','ka_express'); ?></label><br/>
										<input type="text" name="email" id="email" value="<?php echo $email; ?>" /><br/><br/>
										<?php if($emailError != '') { ?>
											<span class="error"><?php echo $emailError; ?></span>
										<?php } ?>
									</li>
		
									<li><label for="commentsText"><?php _e('Message:','ka_express'); ?></label><br/>
										<textarea name="comments" id="commentsText" rows="10" ><?php
												if(isset($_POST['comments'])) {
													if(function_exists('stripslashes')) {
														echo stripslashes($comments); 
													} else {
														echo $comments;
													}
												} ?></textarea><br/><br/>
										<?php if($commentError != '') { ?>
											<span class="error"><?php echo $commentError; ?></span>
										<?php } ?>
									</li>
		
									<?php if( $kaex_options['kaex_show_contact_captcha'] == 1 ) { ?>
										<li><label for="verify"><?php _e('Verification : ','ka_express'); ?></label>
											<input type="text" id="verify" name="verify" value="<?php _e('Enter Captcha','ka_express'); ?>" onclick="this.select();" />
											
											<?php if ( $kaex_options['kaex_use_color_captcha'] == 1 ) { ?>
												<img src="<?php echo get_template_directory_uri(); ?>/captcha/kaex_captcha_color.php" alt="Verification Captcha" />
											<?php } else { ?>
												<img src="<?php echo get_template_directory_uri(); ?>/captcha/kaex_captcha_bw.php" alt="Verification Captcha" />
											<?php } ?>
											
											<?php if($captchaError != '') { ?>
												<span class="error"><?php echo $captchaError; ?></span>
											<?php } ?>
										</li>
									<?php } ?>
									<li>
										<br />
										<button class="kaex-content-contact-submit" type="submit"><?php _e('Send E-mail','ka_express'); ?></button>
										<input type="hidden" name="submitted" id="submitted" value="true" />
									</li>
								</ul>
							</form>
						</div><!-- .entry-content -->
					</div><!-- .post -->

				<?php endwhile; endif; ?>
			</div><!-- #contacrmeform -->
		</div><!-- #widecolumn -->
		<?php if ( $page_sidebar_loc == 'left') { ?>
			<aside id="sidebar-left">
				<?php get_sidebar('contact'); ?>
			</aside>
		<?php } else { ?>
			<aside id="sidebar-right">
				<?php get_sidebar('contact'); ?>
			</aside>
		<?php } ?>
	</div><!-- #content-wrap -->
</div><!-- #main-section -->
<?php get_footer();