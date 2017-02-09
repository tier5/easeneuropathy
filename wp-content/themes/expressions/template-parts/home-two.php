<?php
/**
 * Expressions Home Page template part - layout option 2
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
if ( $kaex_options['kaex_section2_onoroff'] == true ) { ?>
	<div class="clearfix"></div>
	<div class="home-section-2-wrap">
		<div class="servicebox-type-A box_2a">
			<?php if( esc_url($kaex_options['kaex_service1_image'] !== "")) echo '<img class="servicebox" src="'.esc_url($kaex_options['kaex_service1_image']).'" alt="Service 1 Image" />'; ?>
			<?php if( esc_attr(stripslashes($kaex_options['kaex_service1_title'] !== "" ))) echo '<h4>'.sanitize_text_field(stripslashes($kaex_options['kaex_service1_title'])).'</h4>'; ?>
			<?php if( wp_kses_post(stripslashes($kaex_options['kaex_service1_text'] !== "" ))) echo wp_kses_post(stripslashes($kaex_options['kaex_service1_text'])); ?>
			<?php if( $kaex_options['kaex_service1_include_link'] == true ) {?>
				<a class="button1" href="<?php echo esc_url($kaex_options['kaex_service1_button_link']); ?>" 
						 			title="<?php echo sanitize_text_field($kaex_options['kaex_service1_button_title']); ?>">
						 			<?php echo sanitize_text_field($kaex_options['kaex_service1_button_title']); ?></a>
			<?php } ?>
		</div>
		<div class="servicebox-type-A box_2b">
			<?php if( esc_url($kaex_options['kaex_service2_image'] !== "")) echo '<img class="servicebox" src="'.esc_url($kaex_options['kaex_service2_image']).'" alt="Service 2 Image" />'; ?>
			<?php if( esc_attr(stripslashes($kaex_options['kaex_service2_title'] !== "" ))) echo '<h4>'.sanitize_text_field(stripslashes($kaex_options['kaex_service2_title'])).'</h4>'; ?>
			<?php if( wp_kses_post(stripslashes($kaex_options['kaex_service2_text'] !== "" ))) echo wp_kses_post(stripslashes($kaex_options['kaex_service2_text'])); ?>
			<?php if( $kaex_options['kaex_service2_include_link'] == true ) {?>
				<a class="button1" href="<?php echo esc_url($kaex_options['kaex_service2_button_link']); ?>" 
						 			title="<?php echo sanitize_text_field($kaex_options['kaex_service2_button_title']); ?>">
						 			<?php echo sanitize_text_field($kaex_options['kaex_service2_button_title']); ?></a>
			<?php } ?>
		</div>
		<div class="servicebox-type-A box_2c">
			<?php if( esc_url($kaex_options['kaex_service3_image'] !== "")) echo '<img class="servicebox" src="'.esc_url($kaex_options['kaex_service3_image']).'" alt="Service 3 Image" />'; ?>
			<?php if( esc_attr(stripslashes($kaex_options['kaex_service3_title'] !== "" ))) echo '<h4>'.sanitize_text_field(stripslashes($kaex_options['kaex_service3_title'])).'</h4>'; ?>
			<?php if( wp_kses_post(stripslashes($kaex_options['kaex_service3_text'] !== "" ))) echo wp_kses_post(stripslashes($kaex_options['kaex_service3_text'])); ?>
			<?php if( $kaex_options['kaex_service3_include_link'] == true ) {?>
				<a class="button1" href="<?php echo esc_url($kaex_options['kaex_service3_button_link']); ?>" 
						 			title="<?php echo sanitize_text_field($kaex_options['kaex_service3_button_title']); ?>">
						 			<?php echo sanitize_text_field($kaex_options['kaex_service3_button_title']); ?></a>
			<?php } ?>
		</div>
	</div>
<?php }