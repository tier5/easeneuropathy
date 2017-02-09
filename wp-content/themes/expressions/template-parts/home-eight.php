<?php
/**
 * Expressions Home Page template part - layout option 8
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
if ( $kaex_options['kaex_section8_onoroff'] == true ) { ?>
	<div class="clearfix"></div>
	<div class="home-section-type-C-wrap">
		<div class="servicebox-type-C box_8a">
			<?php if( esc_url($kaex_options['kaex_service8_image'] !== "")) echo '<img class="servicebox-C" src="'.esc_url($kaex_options['kaex_service8_image']).'" alt="Service 8 Image" />'; ?>
			<?php if( esc_attr(stripslashes($kaex_options['kaex_service8_title'] !== "" ))) echo '<h4>'.sanitize_text_field(stripslashes($kaex_options['kaex_service8_title'])).'</h4>'; ?>
			<?php if( wp_kses_post(stripslashes($kaex_options['kaex_service8_text'] !== "" ))) echo wp_kses_post(stripslashes($kaex_options['kaex_service8_text'])); ?>
			<?php if( $kaex_options['kaex_service8_include_link'] == true ) {?>
				<a class="button1" href="<?php echo esc_url($kaex_options['kaex_service8_button_link']); ?>" 
						 			title="<?php echo sanitize_text_field($kaex_options['kaex_service8_button_title']); ?>">
						 			<?php echo sanitize_text_field($kaex_options['kaex_service8_button_title']); ?></a>
			<?php } ?>
		</div>
		<div class="servicebox-type-C box_8b">
			<?php if( esc_url($kaex_options['kaex_service9_image'] !== "")) echo '<img class="servicebox-C" src="'.esc_url($kaex_options['kaex_service9_image']).'" alt="Service 9 Image" />'; ?>
			<?php if( esc_attr(stripslashes($kaex_options['kaex_service9_title'] !== "" ))) echo '<h4>'.sanitize_text_field(stripslashes($kaex_options['kaex_service9_title'])).'</h4>'; ?>
			<?php if( wp_kses_post(stripslashes($kaex_options['kaex_service9_text'] !== "" ))) echo wp_kses_post(stripslashes($kaex_options['kaex_service9_text'])); ?>
			<?php if( $kaex_options['kaex_service9_include_link'] == true ) {?>
				<a class="button1" href="<?php echo esc_url($kaex_options['kaex_service9_button_link']); ?>" 
						 			title="<?php echo sanitize_text_field($kaex_options['kaex_service9_button_title']); ?>">
						 			<?php echo sanitize_text_field($kaex_options['kaex_service9_button_title']); ?></a>
			<?php } ?>
		</div>
		<div class="servicebox-type-C box_8c">
			<?php if( esc_url($kaex_options['kaex_service10_image'] !== "")) echo '<img class="servicebox-C" src="'.esc_url($kaex_options['kaex_service10_image']).'" alt="Service 10 Image" />'; ?>
			<?php if( esc_attr(stripslashes($kaex_options['kaex_service10_title'] !== "" ))) echo '<h4>'.sanitize_text_field(stripslashes($kaex_options['kaex_service10_title'])).'</h4>'; ?>
			<?php if( wp_kses_post(stripslashes($kaex_options['kaex_service10_text'] !== "" ))) echo wp_kses_post(stripslashes($kaex_options['kaex_service10_text'])); ?>
			<?php if( $kaex_options['kaex_service10_include_link'] == true ) {?>
				<a class="button1" href="<?php echo esc_url($kaex_options['kaex_service10_button_link']); ?>" 
						 			title="<?php echo sanitize_text_field($kaex_options['kaex_service10_button_title']); ?>">
						 			<?php echo sanitize_text_field($kaex_options['kaex_service10_button_title']); ?></a>
			<?php } ?>
		</div>
		<div class="servicebox-type-C box_8d">
			<?php if( esc_url($kaex_options['kaex_service11_image'] !== "")) echo '<img class="servicebox-C" src="'.esc_url($kaex_options['kaex_service11_image']).'" alt="Service 11 Image" />'; ?>
			<?php if( esc_attr(stripslashes($kaex_options['kaex_service11_title'] !== "" ))) echo '<h4>'.sanitize_text_field(stripslashes($kaex_options['kaex_service11_title'])).'</h4>'; ?>
			<?php if( wp_kses_post(stripslashes($kaex_options['kaex_service11_text'] !== "" ))) echo wp_kses_post(stripslashes($kaex_options['kaex_service11_text'])); ?>
			<?php if( $kaex_options['kaex_service11_include_link'] == true ) {?>
				<a class="button1" href="<?php echo esc_url($kaex_options['kaex_service11_button_link']); ?>" 
						 			title="<?php echo sanitize_text_field($kaex_options['kaex_service11_button_title']); ?>">
						 			<?php echo sanitize_text_field($kaex_options['kaex_service11_button_title']); ?></a>
			<?php } ?>
		</div>
	</div>
<?php }