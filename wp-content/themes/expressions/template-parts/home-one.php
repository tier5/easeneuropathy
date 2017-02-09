<?php
/**
 * Expressions Home Page template part - area 1
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
if ( $kaex_options['kaex_section1_onoroff'] == true ) { ?>
	<div class="clearfix"></div>		
	<div class="home-section-type-A">
		<?php if ( $kaex_options['kaex_include_section1_button'] == 1 ) { ?>
			<div class="home-section-type-A-html-75"><?php echo wp_kses_post(stripslashes($kaex_options['kaex_section1_text'])); ?></div>
			<div class="home-section-type-A-button">
				<a class="button1" href="<?php echo esc_url($kaex_options['kaex_section1_button_link']); ?>" 
					 				title="<?php echo sanitize_text_field($kaex_options['kaex_section1_button_name']); ?>">
					 				<?php echo sanitize_text_field($kaex_options['kaex_section1_button_name']); ?></a>
			</div>
		<?php } else { ?>
			<div class="home-section-type-A-html-100"><?php echo wp_kses_post(stripslashes($kaex_options['kaex_section1_text'])); ?></div>
		<?php } ?>
	</div>
<?php }