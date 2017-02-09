<?php
/**
 * Expressions Home Page template part - layout option 4
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
if ( $kaex_options['kaex_section4_onoroff'] == true ) { ?>
	<div class="clearfix"></div>
	<div class="home-section-type-B-wrap">
		<div class="home-section-type-B box_4a">
			<?php if( esc_url($kaex_options['kaex_service4_image'] !== "" )) { ?>
				<div class="home-section-type-B-image-wrap">
					<?php echo '<img class="serviceboxB" src="'.esc_url($kaex_options['kaex_service4_image']).'" alt="Service 4 Image" />'; ?>
				</div>
				<div class="home-section-type-B-html-image">
					<?php if( esc_attr(stripslashes($kaex_options['kaex_service4_title'] !== "" ))) echo '<h4>'.sanitize_text_field(stripslashes($kaex_options['kaex_service4_title'])).'</h4>'; ?>
					<?php echo wp_kses_post(stripslashes($kaex_options['kaex_service4_text'])); ?>					
					<?php if ( $kaex_options['kaex_service4_include_link'] == 1 ) { ?>
						<a class="button1" href="<?php echo esc_url($kaex_options['kaex_service4_button_link']); ?>" 
							 				title="<?php echo sanitize_text_field($kaex_options['kaex_service4_button_title']); ?>">
							 				<?php echo sanitize_text_field($kaex_options['kaex_service4_button_title']); ?></a>
					<?php } ?>
				</div>
			<?php } else { ?>
				<div class="home-section-type-B-html-noimage">
					<?php if( esc_attr(stripslashes($kaex_options['kaex_service4_title'] !== "" ))) echo '<h4>'.sanitize_text_field(stripslashes($kaex_options['kaex_service4_title'])).'</h4>'; ?>
					<?php echo wp_kses_post(stripslashes($kaex_options['kaex_service4_text'])); ?>
					<?php if ( $kaex_options['kaex_service4_include_link'] == 1 ) { ?>
						<a class="button1" href="<?php echo esc_url($kaex_options['kaex_service4_button_link']); ?>" 
							 				title="<?php echo sanitize_text_field($kaex_options['kaex_service4_button_title']); ?>">
							 				<?php echo sanitize_text_field($kaex_options['kaex_service4_button_title']); ?></a>
					<?php } ?>
				</div>				
			<?php } ?>
		</div>
		<div class="home-section-type-B box_4b">
			<?php if( esc_url($kaex_options['kaex_service5_image'] !== "" )) { ?>
				<div class="home-section-type-B-image-wrap">
					<?php echo '<img class="serviceboxB" src="'.esc_url($kaex_options['kaex_service5_image']).'" alt="Service 5 Image" />'; ?>
				</div>
				<div class="home-section-type-B-html-image">
					<?php if( esc_attr(stripslashes($kaex_options['kaex_service5_title'] !== "" ))) echo '<h4>'.sanitize_text_field(stripslashes($kaex_options['kaex_service5_title'])).'</h4>'; ?>
					<?php echo wp_kses_post(stripslashes($kaex_options['kaex_service5_text'])); ?>
					<?php if ( $kaex_options['kaex_service5_include_link'] == 1 ) { ?>
						<a class="button1" href="<?php echo esc_url($kaex_options['kaex_service5_button_link']); ?>" 
							 				title="<?php echo sanitize_text_field($kaex_options['kaex_service5_button_title']); ?>">
							 				<?php echo sanitize_text_field($kaex_options['kaex_service5_button_title']); ?></a>
					<?php } ?>
				</div>
			<?php } else { ?>
				<div class="home-section-type-B-html-noimage">
					<?php if( esc_attr(stripslashes($kaex_options['kaex_service5_title'] !== "" ))) echo '<h4>'.sanitize_text_field(stripslashes($kaex_options['kaex_service5_title'])).'</h4>'; ?>
					<?php echo wp_kses_post(stripslashes($kaex_options['kaex_service5_text'])); ?>
				
				<?php if ( $kaex_options['kaex_service5_include_link'] == 1 ) { ?>

						<a class="button1" href="<?php echo esc_url($kaex_options['kaex_service5_button_link']); ?>" 
							 				title="<?php echo sanitize_text_field($kaex_options['kaex_service5_button_title']); ?>">
							 				<?php echo sanitize_text_field($kaex_options['kaex_service5_button_title']); ?></a>
				<?php } ?>
				</div>				
			<?php } ?>
		</div>				
	</div>
<?php }