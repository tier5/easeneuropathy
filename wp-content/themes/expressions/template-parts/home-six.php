<?php
/**
 * Expressions Home Page template part - layout option 6
 * 
 * This template part is called by template-home.php
 *
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
global $kaex_options;
if ( $kaex_options['kaex_section6_onoroff'] == true ) { ?>
	<div class="clearfix"></div>
	<div class="home-section-type-B-wrap">
		<div class="home-section-type-B box_6a">
			<?php if( esc_url($kaex_options['kaex_service6_image'] !== "" )) { ?>
				<div class="home-section-type-B-image-wrap">
					<?php echo '<img class="serviceboxB" src="'.esc_url($kaex_options['kaex_service6_image']).'" alt="Service 6 Image" />'; ?>
				</div>
				<div class="home-section-type-B-html-image">
					<?php if( esc_attr(stripslashes($kaex_options['kaex_service6_title'] !== "" ))) echo '<h4>'.sanitize_text_field(stripslashes($kaex_options['kaex_service6_title'])).'</h4>'; ?>
					<?php echo wp_kses_post(stripslashes($kaex_options['kaex_service6_text'])); ?>					
					<?php if ( $kaex_options['kaex_service6_include_link'] == 1 ) { ?>
						<a class="button1" href="<?php echo esc_url($kaex_options['kaex_service6_button_link']); ?>" 
							 				title="<?php echo sanitize_text_field($kaex_options['kaex_service6_button_title']); ?>">
							 				<?php echo sanitize_text_field($kaex_options['kaex_service6_button_title']); ?></a>
					<?php } ?>
				</div>
			<?php } else { ?>
				<div class="home-section-type-B-html-noimage">
					<?php if( esc_attr(stripslashes($kaex_options['kaex_service6_title'] !== "" ))) echo '<h4>'.sanitize_text_field(stripslashes($kaex_options['kaex_service6_title'])).'</h4>'; ?>
					<?php echo wp_kses_post(stripslashes($kaex_options['kaex_service6_text'])); ?>
					<?php if ( $kaex_options['kaex_service6_include_link'] == 1 ) { ?>
						<a class="button1" href="<?php echo esc_url($kaex_options['kaex_service6_button_link']); ?>" 
							 				title="<?php echo sanitize_text_field($kaex_options['kaex_service6_button_title']); ?>">
							 				<?php echo sanitize_text_field($kaex_options['kaex_service6_button_title']); ?></a>
					<?php } ?>
				</div>				
			<?php } ?>
		</div>
		<div class="home-section-type-B box_6b">
			<?php if( esc_url($kaex_options['kaex_service7_image'] !== "" )) { ?>
				<div class="home-section-type-B-image-wrap">
					<?php echo '<img class="serviceboxB" src="'.esc_url($kaex_options['kaex_service7_image']).'" alt="Service 7 Image" />'; ?>
				</div>
				<div class="home-section-type-B-html-image">
					<?php if( esc_attr(stripslashes($kaex_options['kaex_service7_title'] !== "" ))) echo '<h4>'.sanitize_text_field(stripslashes($kaex_options['kaex_service7_title'])).'</h4>'; ?>
					<?php echo wp_kses_post(stripslashes($kaex_options['kaex_service7_text'])); ?>
					<?php if ( $kaex_options['kaex_service7_include_link'] == 1 ) { ?>
						<a class="button1" href="<?php echo esc_url($kaex_options['kaex_service7_button_link']); ?>" 
							 				title="<?php echo sanitize_text_field($kaex_options['kaex_service7_button_title']); ?>">
							 				<?php echo sanitize_text_field($kaex_options['kaex_service7_button_title']); ?></a>
					<?php } ?>
				</div>
			<?php } else { ?>
				<div class="home-section-type-B-html-noimage">
					<?php if( esc_attr(stripslashes($kaex_options['kaex_service7_title'] !== "" ))) echo '<h4>'.sanitize_text_field(stripslashes($kaex_options['kaex_service7_title'])).'</h4>'; ?>
					<?php echo wp_kses_post(stripslashes($kaex_options['kaex_service7_text'])); ?>
				
				<?php if ( $kaex_options['kaex_service7_include_link'] == 1 ) { ?>

						<a class="button1" href="<?php echo esc_url($kaex_options['kaex_service7_button_link']); ?>" 
							 				title="<?php echo sanitize_text_field($kaex_options['kaex_service7_button_title']); ?>">
							 				<?php echo sanitize_text_field($kaex_options['kaex_service7_button_title']); ?></a>
				<?php } ?>
				</div>				
			<?php } ?>
		</div>				
	</div>			
<?php }