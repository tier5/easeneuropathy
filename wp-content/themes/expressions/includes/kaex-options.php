<?php
/**
 * 
 * Expressions Theme Options
 *
 * This file defines the Options for the Expressions Theme.
 * 
 * Theme Options Functions
 * 
 *  - Define Default Theme Options
 *  - Register/Initialize Theme Options
 *  - Define Admin Settings Page
 *  - Register Contextual Help
 * 
 * @package 	Expressions
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		GNU General Public License, v3 (or newer) http://www.gnu.org/licenses/">http://www.gnu.org/licenses/ 
 *
 * 
 * Expressions Options has been set-up using  the tutorial by Chip Bennet
 * http://www.chipbennett.net/2011/02/17/incorporating-the-settings-api-in-wordpress-themes/
 * Followed the theme options settup in Oenology, a fabulous teaching theme by Chip Benett
 */

global $expressions_options; // This is the array that holds all the options


/**
 * If the Expressions Options page is called this function will load the necessary
 * styles and scripts for that page
 * 
 */
function ka_express_enqueue_admin_style($hook) {
	//Only enqueue if the admin page is loaded
	 if( 'appearance_page_expressions-settings' != $hook ) return;
	//Page is loaded so go ahead	
	wp_enqueue_style( 'expressions_admin_stylesheet', get_template_directory_uri() . '/css/kaex-options-css.css', '', false );
	wp_enqueue_script( 'expressions_theme_settings_js', get_template_directory_uri() . '/js/kaex-options-js.js', array('jquery'), '1', true );
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
	wp_enqueue_script('media-upload');

}
add_action( 'admin_enqueue_scripts', 'ka_express_enqueue_admin_style' );


/**
 * expressions Theme Settings API Implementation
 *
 * Implement the WordPress Settings API for the 
 * expressions Theme Settings.
 * 
 * @link	http://codex.wordpress.org/Settings_API	Codex Reference: Settings API
 * @link	http://ottopress.com/2009/wordpress-settings-api-tutorial/	Otto
 * @link	http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/	Ozh
 */
function ka_express_register_options(){//loads kaex_options_register.php
	require( get_template_directory() . '/includes/kaex-options-register.php' );
}
add_action( 'admin_init', 'ka_express_register_options' );// Settings API options initilization and validation


/**
 * 
 *   Add "Expressions Options" link to the "Appearance" menu
 *   add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function ) function accepts five arguments:
 *   $page_title: the HTML page title
 *   $menu_title: the title displayed in the "Appearance" menu
 *   $capability: the appropriate user capability for access to the Settings page. Use edit_theme_options, not edit_themes
 *   $menu_slug: the slug added to the Settings page URL, i.e. "...themes.php?page=$menu_slug"
 *   $function: the callback function in which the Settings page markup is defined
 * 
*/
function ka_express_add_theme_page() {
	global $expressions_settings_page;
	$expressions_settings_page= add_theme_page(__('Expressions Options','ka_express'), __('Expressions Options','ka_express'), 'edit_theme_options', 'expressions-settings', 'ka_express_admin_options_page');
	add_action( 'load-' . $expressions_settings_page, 'ka_express_settings_page_contextual_help' );
}
add_action('admin_menu', 'ka_express_add_theme_page');// Load the Admin Options page

/**
 * expressions Theme Settings Page Markup
 * 
 * this function is the callback for the admin menu. It sets the options on the page for
 * the current tab.
 * 
 * @uses	ka_express_get_current_tab()	defined in this file
 * @uses	ka_express_get_page_tab_markup()	defined in this file
 * 
 */
function ka_express_admin_options_page() { // Admin settings page markup
	// Determine the current page tab
	$currenttab = ka_express_get_current_tab();
	// Define the page section accordingly
	$settings_section = 'expressions_' . $currenttab . '_tab';
	?>
	<div class="wrap expressions_admin_<?php echo $currenttab; ?>">
		<?php ka_express_get_page_tab_markup(); ?>
		<form action="options.php" method="post">
		<?php
			// Implement settings field security, nonces, etc.
			settings_fields('theme_expressions_options');
			// Output each settings section, and each Settings field in each section
			do_settings_sections( $settings_section );
		?>
			<br/>
			<?php submit_button( __( 'Save Settings','ka_express'), 'primary', 'theme_expressions_options[submit-' . $currenttab . ']', false ); ?>
			<?php submit_button( __( 'Reset Defaults','ka_express'), 'secondary', 'theme_expressions_options[reset-' . $currenttab . ']', false ); ?>
		</form>
	</div>
<?php }

/**
 * Expressions Theme Options Defaults
 * 
 * Loads the defaults for each option into an array under each options name
 * 
 * @uses	ka_express_get_option_parameters()	defined below
 * @return 	$expressions_option_defaults
 * 
 */
function ka_express_get_option_defaults() {
	// Get the array that holds all
	// Theme option parameters
	$expressions_option_parameters = ka_express_get_option_parameters();
	// Initialize the array to hold
	// the default values for all
	// Theme options
	$expressions_option_defaults = array();
	// Loop through the option
	// parameters array
	foreach ( $expressions_option_parameters as $expressions_option_parameter ) {
		$name = $expressions_option_parameter['name'];
		// Add an associative array key
		// to the defaults array for each
		// option in the parameters array
		$expressions_option_defaults[$name] = $expressions_option_parameter['default'];
	}
	// Return the defaults array
	return $expressions_option_defaults;
}

/**
 * Expressions Theme Options Array
 * 
 * Loads the default array into $options
 * 
 * @return	$options
 * 
 */
function ka_express_get_option_parameters() {
	
	$options = array (
/* ----------------------------- General Tab ------------------------------------ */
/* General */
		'kaex_contact_email' => array(
			'name' => 'kaex_contact_email',
			'title' => __('Email address for contact page','ka_express'),
			'type' => 'text',
			'description' => __('Must be a valid email address','ka_express'),
			'section' => 'general',
			'tab' => 'general',
			'default' => '',
			'class' => 'email'
		),	
		'kaex_show_favicon' => array(
			'name' => 'kaex_show_favicon',
			'title' => __('Show Favicon','ka_express'),
			'type' => 'checkbox',
			'description' => __('You must put favicon.png in theme folder','ka_express'),
			'section' => 'general',
			'tab' => 'general',
			'default' => 0, // 0 for off
			'class' => 'checkbox'
		),
		'kaex_show_comment_captcha' => array(
			'name' => 'kaex_show_comment_captcha',
			'title' => __('Include Captcha in Comments Form','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to include a captcha in your comments form','ka_express'),
			'section' => 'general',
			'tab' => 'general',
			'default' => 0, // 0 for off
			'class' => 'checkbox'
		),	
		'kaex_show_contact_captcha' => array(
			'name' => 'kaex_show_contact_captcha',
			'title' => __('Include Captcha in Contact Form','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to include a captcha in your contact form','ka_express'),
			'section' => 'general',
			'tab' => 'general',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_use_color_captcha' => array(
			'name' => 'kaex_use_color_captcha',
			'title' => __('Use color caption option','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to the color option','ka_express'),
			'section' => 'general',
			'tab' => 'general',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_nivo_slider_effect' => array(
			'name' => 'kaex_nivo_slider_effect',
			'title' => __('Nivo Slider Transition Effect','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'sliceDown',
				'sliceUp',
				'fold',
				'fade',
				'random',
				'slideInRight',
				'slideInLeft',
				'boxRain',
				'boxRainGrow'
			),
			'description' => __('Select the transition for the slider','ka_express'),
			'section' => 'nivo',
			'tab' => 'general',
			'default' => 'fade',
			'class' => 'select' 
		),
		'kaex_nivo_slider_pause' => array(
			'name' => 'kaex_nivo_slider_pause',
			'title' => __('Nivo Slider Pause Time','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'4000',
				'5000',
				'6000',
				'7000',
				'8000',
				'9000',
				'10000',
				'11000',
				'12000'
			),
			'description' => __('Select the pause time in milli-seconds','ka_express'),
			'section' => 'nivo',
			'tab' => 'general',
			'default' => '5000',
			'class' => 'select' 
		),
		'kaex_nivo_slider_trans' => array(
			'name' => 'kaex_nivo_slider_trans',
			'title' => __('Nivo Slider Transition Time','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'500',
				'1000',
				'1500',
				'2000',
				'2500',
				'3000'
			),
			'description' => __('Select the transition time in milli-seconds','ka_express'),
			'section' => 'nivo',
			'tab' => 'general',
			'default' => '1000',
			'class' => 'select' 
		),
		'kaex_use_font_icons' => array(
			'name' => 'kaex_use_font_icons',
			'title' => __('Use font icons','ka_express'),
			'type' => 'checkbox',
			'description' => __('Post meta, list items, etc','ka_express'),
			'section' => 'posts',
			'tab' => 'general',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_display_post_icons' => array(
			'name' => 'kaex_display_post_icons',
			'title' => __('Display Post Format icons','ka_express'),
			'type' => 'checkbox',
			'description' => __('icons display to the left of each post','ka_express'),
			'section' => 'posts',
			'tab' => 'general',
			'default' => 1,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_use_pformat_font_icons' => array(
			'name' => 'kaex_use_pformat_font_icons',
			'title' => __('Use Post Format font icons','ka_express'),
			'type' => 'checkbox',
			'description' => __('Use font icons instead of images','ka_express'),
			'section' => 'posts',
			'tab' => 'general',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_author_in_blog' => array(
			'name' => 'kaex_author_in_blog',
			'title' => __('Include author name in blog posts','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to include','ka_express'),
			'section' => 'posts',
			'tab' => 'general',
			'default' => 1,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_timestamp_in_blog' => array(
			'name' => 'kaex_timestamp_in_blog',
			'title' => __('Include date in blog posts','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to include','ka_express'),
			'section' => 'posts',
			'tab' => 'general',
			'default' => 1,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_category_in_blog' => array(
			'name' => 'kaex_category_in_blog',
			'title' => __('Include category in blog posts','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to include','ka_express'),
			'section' => 'posts',
			'tab' => 'general',
			'default' => 1,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_tags_in_blog' => array(
			'name' => 'kaex_tags_in_blog',
			'title' => __('Include tags in blog posts','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to include','ka_express'),
			'section' => 'posts',
			'tab' => 'general',
			'default' => 1,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_disable_colorboxjs' => array(
			'name' => 'kaex_disable_colorboxjs',
			'title' => __('Disable colorbox.js plugin','ka_express'),
			'type' => 'checkbox',
			'description' => __('colorbox.js is a javascript image plugin','ka_express'),
			'section' => 'jquery',
			'tab' => 'general',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_disable_fitvidsjs' => array(
			'name' => 'kaex_disable_fitvidsjs',
			'title' => __('Disable fitvids.js plugin','ka_express'),
			'type' => 'checkbox',
			'description' => __('fitvids.js is the responsive video javascript plugin','ka_express'),
			'section' => 'jquery',
			'tab' => 'general',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_disable_post_image_filter' => array(
			'name' => 'kaex_disable_post_image_filter',
			'title' => __('Disable responsive post images','ka_express'),
			'type' => 'checkbox',
			'description' => __('Select to disable changing post image width to %, height to auto','ka_express'),
			'section' => 'jquery',
			'tab' => 'general',
			'default' => 1,// 0 for off or don't use this feature
			'class' => 'checkbox' 
		),			
		'kaex_include_mobile_design' => array(
			'name' => 'kaex_include_mobile_design',
			'title' => __('Include mobile friendly design','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check this to use design elements for small devices','ka_express'),
			'section' => 'mobile',
			'tab' => 'general',
			'default' => 1,// 0 for off
			'class' => 'checkbox' 
		),
/* ------- Sidebars Tab ---------- */
		'kaex_use_fullwidth_single_post' => array(
			'name' => 'kaex_use_fullwidth_single_post',
			'title' => __('Use full width for single posts','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check this to display single posts without a sidebar','ka_express'),
			'section' => 'general',
			'tab' => 'sidebars',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),																		
		'kaex_index_sidebar_loc' => array(
			'name' => 'kaex_index_sidebar_loc',
			'title' => __('Blog/Default sidebar location','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'right',
				'left'
			),
			'description' => __('Used for the blog pages','ka_express'),
			'section' => 'sidebars',
			'tab' => 'sidebars',
			'default' => 'right',
			'class' => 'select' 
		),
		'kaex_author_sidebar_loc' => array(
			'name' => 'kaex_author_sidebar_loc',
			'title' => __('Author page sidebar location','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'right',
				'left'
			),
			'description' => __('Used for Author Posts','ka_express'),
			'section' => 'sidebars',
			'tab' => 'sidebars',
			'default' => 'right',
			'class' => 'select' 
		),
		'kaex_category_sidebar_loc' => array(
			'name' => 'kaex_category_sidebar_loc',
			'title' => __('Category page sidebar location','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'right',
				'left'
			),
			'description' => __('Used to display posts by category','ka_express'),
			'section' => 'sidebars',
			'tab' => 'sidebars',
			'default' => 'right',
			'class' => 'select' 
		),
		'kaex_date_sidebar_loc' => array(
			'name' => 'kaex_date_sidebar_loc',
			'title' => __('Date page sidebar location','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'right',
				'left'
			),
			'description' => __('Used to display posts by month','ka_express'),
			'section' => 'sidebars',
			'tab' => 'sidebars',
			'default' => 'right',
			'class' => 'select' 
		),
		'kaex_search_sidebar_loc' => array(
			'name' => 'kaex_search_sidebar_loc',
			'title' => __('Search page sidebar location','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'right',
				'left'
			),
			'description' => __('Used to display posts from search','ka_express'),
			'section' => 'sidebars',
			'tab' => 'sidebars',
			'default' => 'right',
			'class' => 'select' 
		),
		'kaex_single_sidebar_loc' => array(
			'name' => 'kaex_single_sidebar_loc',
			'title' => __('Single page sidebar location','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'right',
				'left'
			),
			'description' => __('Used to display single posts','ka_express'),
			'section' => 'sidebars',
			'tab' => 'sidebars',
			'default' => 'right',
			'class' => 'select' 
		),
		'kaex_tag_sidebar_loc' => array(
			'name' => 'kaex_tag_sidebar_loc',
			'title' => __('Tag page sidebar location','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'right',
				'left'
			),
			'description' => __('Used to display posts by tag','ka_express'),
			'section' => 'sidebars',
			'tab' => 'sidebars',
			'default' => 'right',
			'class' => 'select' 
		),
		'kaex_404_sidebar_loc' => array(
			'name' => 'kaex_404_sidebar_loc',
			'title' => __('404 Error page sidebar location','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'right',
				'left'
			),
			'description' => __('404 Error page is displayed when a page is not found','ka_express'),
			'section' => 'sidebars',
			'tab' => 'sidebars',
			'default' => 'right',
			'class' => 'select' 
		),							
/* -------------- header tab ------------- */
		'kaex_show_logo' => array(
			'name' => 'kaex_show_logo',
			'title' => __( 'Show LOGO' ,'ka_express' ),
			'type' => 'checkbox',
			'description' => __('Check to show logo in header','ka_express'),
			'section' =>'general',
			'tab' =>'header',
			'default' =>0, // 0 for off
			'class' => 'checkbox'
		),
		'kaex_center_logo' => array(
			'name' => 'kaex_center_logo',
			'title' => __( 'Center LOGO' ,'ka_express' ),
			'type' => 'checkbox',
			'description' => __('Logo will be on the left if not centered.','ka_express'),
			'section' =>'general',
			'tab' =>'header',
			'default' =>0, // 0 for off
			'class' => 'checkbox'
		),					
		'kaex_show_blog_title' => array(
			'name' => 'kaex_show_blog_title',
			'title' => __( 'Show Blog Title' ,'ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to include','ka_express'),
			'section' =>'general',
			'tab' =>'header',
			'default' =>1, // 0 for off
			'class' => 'checkbox'
		),				
		'kaex_show_blog_description' => array(
			'name' => 'kaex_show_blog_description',
			'title' => __( 'Show Blog Description' ,'ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to include','ka_express'),
			'section' =>'general',
			'tab' =>'header',
			'default' =>1, // 0 for off
			'class' => 'checkbox'
		),
		'kaex_menu_border' => array(
			'name' => 'kaex_menu_border',
			'title' => __('Menu border options','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'full width',
				'menu only',
				'no border'
			),
			'description' => __('menu only setting applies only to centered menu','ka_express'),
			'section' => 'menu',
			'tab' => 'header',
			'default' => 'no border',
			'class' => 'select' 
		),					
		'kaex_menu_loc' => array(
			'name' => 'kaex_menu_loc',
			'title' => __('Header menu location','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'center',
				'left',
				'right'
			),
			'description' => __('left,right or center','ka_express'),
			'section' => 'menu',
			'tab' => 'header',
			'default' => 'center',
			'class' => 'select' 
		),					
/* ---------------- footer tab ----------------- */
		'kaex_show_footer' => array(
			'name' => 'kaex_show_footer',
			'title' => __( 'Show Footer Area' ,'ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to include','ka_express'),
			'section' =>'footer',
			'tab' =>'footer',
			'default' =>1, // 0 for off
			'class' => 'checkbox'
		),
		'kaex_footer_cols' => array(
			'name' => 'kaex_footer_cols',
			'title' => __('Select footer columns','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'3',
				'4'
			),
			'description' => __('How many footer columns?','ka_express'),
			'section' => 'footer',
			'tab' => 'footer',
			'default' => '3',
			'class' => 'select' 
		),
		'kaex_show_copyright_strip' => array(
			'name' => 'kaex_show_copyright_strip',
			'title' => __( 'Show Copyright Strip' ,'ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to include','ka_express'),
			'section' =>'copyright',
			'tab' =>'footer',
			'default' =>1, // 0 for off
			'class' => 'checkbox'
		),					
		'kaex_left_copyright_text' => array(
			'name' => 'kaex_left_copyright_text',
			'title' => __('Copyright left text','ka_express'),
			'type' => 'text',
			'description' => __("Some HTML allowed, suggest : &#38;copy; copyright &#60;a href='#'&#62;www.yoursite.url&#60;/a&#62;",'ka_express'),
			'section' => 'copyright',
			'tab' => 'footer',
			'default' => '',
			'class' => 'html'
		),	
		'kaex_middle_copyright_text' => array(
			'name' => 'kaex_middle_copyright_text',
			'title' => __('Copyright middle text','ka_express'),
			'type' => 'text',
			'description' => __("Some HTML allowed, suggest : site by &#38;nbsp; &#60;a href='#'&#62;www.developer.url&#60;/a&#62;",'ka_express'),
			'section' => 'copyright',
			'tab' => 'footer',
			'default' => '',
			'class' => 'html'
		),	
		'kaex_right_copyright_text' => array(
			'name' => 'kaex_right_copyright_text',
			'title' => __('Copyright right text','ka_express'),
			'type' => 'text',
			'description' => __("Some HTML allowed, suggest : &#60;a href='#'&#62;sitemap&#60;/a&#62;",'ka_express'),
			'section' => 'copyright',
			'tab' => 'footer',
			'default' => '',
			'class' => 'html'
		),
/* ----------- social tab ----------- */
		'kaex_use_social_font_icons' => array(
			'name' => 'kaex_use_social_font_icons',
			'title' => __('Use Social font icons','ka_express'),
			'type' => 'checkbox',
			'description' => __('Use font icons instead of images','ka_express'),
			'section' => 'general',
			'tab' => 'social',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_delicious_link' => array(
			'name' => 'kaex_delicious_link',
			'title' => __('Delicious Link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:www.delicious.com/save/','ka_express'),
			'section' => 'links',
			'tab' => 'social',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_digg_link' => array(
			'name' => 'kaex_digg_link',
			'title' => __('Digg Link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:digg.com/user','ka_express'),
			'section' => 'links',
			'tab' => 'social',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_facebook_link' => array(
			'name' => 'kaex_facebook_link',
			'title' => __('Facebook Link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:www.facebook.com/your_profile/','ka_express'),
			'section' => 'links',
			'tab' => 'social',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_flickr_link' => array(
			'name' => 'kaex_flickr_link',
			'title' => __('Flickr Link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:www.flickr.com/your_link/','ka_express'),
			'section' => 'links',
			'tab' => 'social',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_google_link' => array(
			'name' => 'kaex_google_link',
			'title' => __('Google Plus Link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:plus.google.com/your_page_number/posts','ka_express'),
			'section' => 'links',
			'tab' => 'social',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_instagram_link' => array(
			'name' => 'kaex_instagram_link',
			'title' => __('Instagram Link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:www.instagram.com/your_page_number/posts','ka_express'),
			'section' => 'links',
			'tab' => 'social',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_linkedin_link' => array(
			'name' => 'kaex_linkedin_link',
			'title' => __('Linkedin Link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:ca.linkedin.com/profile link/','ka_express'),
			'section' => 'links',
			'tab' => 'social',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_myspace_link' => array(
			'name' => 'kaex_myspace_link',
			'title' => __('My Space Link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:www.myspace.com/your_link/','ka_express'),
			'section' => 'links',
			'tab' => 'social',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_pinterest_link' => array(
			'name' => 'kaex_pinterest_link',
			'title' => __('Pinterest URL','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:pinterest.com/username/','ka_express'),
			'section' => 'links',
			'tab' => 'social',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_rss_link' => array(
			'name' => 'kaex_rss_link',
			'title' => __('RSS Link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:your.feed.url/feed/','ka_express'),
			'section' => 'links',
			'tab' => 'social',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_tumblr_link' => array(
			'name' => 'kaex_tumblr_link',
			'title' => __('Tumblr Link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:www.tumblr.com/your_link/','ka_express'),
			'section' => 'links',
			'tab' => 'social',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_twitter_link' => array(
			'name' => 'kaex_twitter_link',
			'title' => __('Twitter Link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:twitter.com/your_twitter/','ka_express'),
			'section' => 'links',
			'tab' => 'social',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_vimeo_link' => array(
			'name' => 'kaex_vimeo_link',
			'title' => __('Vimeo Link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:vimeo.com/your_link/','ka_express'),
			'section' => 'links',
			'tab' => 'social',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_yelp_link' => array(
			'name' => 'kaex_yelp_link',
			'title' => __('Yelp Link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:vimeo.com/your_yelp/','ka_express'),
			'section' => 'links',
			'tab' => 'social',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_vimeo_link' => array(
			'name' => 'kaex_vimeo_link',
			'title' => __('Vimeo Link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:vimeo.com/your_link/','ka_express'),
			'section' => 'links',
			'tab' => 'social',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_youtube_link' => array(
			'name' => 'kaex_youtube_link',
			'title' => __('YouTube Link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:youtube.com/your_link/','ka_express'),
			'section' => 'links',
			'tab' => 'social',
			'default' => '#',
			'class' => 'url'
		),
/* ---------------------------- Styles Tab ----------------------------------------- */					
		'kaex_use_skin' => array(
			'name' => 'kaex_use_skin',
			'title' => __('Use Style Skin','ka_express'),
			'type' => 'checkbox',
			'description' => __('Each skin offers different colors and styles.','ka_express'),
			'section' => 'skins',
			'tab' => 'styles',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),					
		'kaex_select_skin' => array(
			'name' => 'kaex_select_skin',
			'title' => __('Skin For Theme','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'Black',
				'Blue',
				'Gray',
				'Block Brown',
				'Block Gray'
			),
			'description' => __('Select a skin to use.','ka_express'),
			'section' => 'skins',
			'tab' => 'styles',
			'default' => 'Black',
			'class' => 'select' 
		),
		'kaex_header_font_option' => array(
			'name' => 'kaex_header_font_option',
			'title' => __('Select header font option','ka_express'),
			'type' => 'select',
			'valid_options' => array(
				"standard web fonts" ,
				"google web fonts",
				"@font-face web fonts"
			),
			'description' => __('Select a font option for headers','ka_express'),
			'section' => 'fonts',
			'tab' => 'styles',
			'default' => 'standard web fonts',
			'class' => 'select'
		), 			 			
		'kaex_standard_header_font' => array(
			'name' => 'kaex_standard_header_font',
			'title' => __('Standard Header Fonts','ka_express'),
			'type' => 'select',
			'valid_options' => array(
				"default",
				"Arial, Helvetica, sans-serif",
				"'Book Antiqua', 'Palatino Linotype', Palatino, serif",
				"Cambria, Georgia, serif",
				"'Comic Sans MS', sans-serif",
				"Georgia, serif",
				"Tahoma, Geneva, sans-serif",
				"'Times New Roman', Times, serif",
				"'Trebuchet MS', Helvetica, sans-serif",
				"Verdana, Geneva, sans-serif"									
			),
			'description' => __('Select a standard font for headers','ka_express'),
			'section' => 'fonts',
			'tab' => 'styles',
			'default' => 'default',
			'class' => 'select'
		),
		'kaex_google_header_font' => array(
			'name' => 'kaex_google_header_font',
			'title' => __('Google Font for Headers','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				"Allerta, Helvetica, Arial, sans-serif",
				"Arvo, Georgia, Times, serif",
				"Cabin, Helvetica, Arial, sans-serif",
				"Corben, Georgia, Times, serif",
				"'Droid Sans', Helvetica, Arial, sans-serif",
				"'Droid Serif', Georgia, Times, serif",
				"Lekton, Helvetica, Arial, sans-serif",
				"Molengo, Georgia, Times, serif",
				"Nobile, Helvetica, Arial, sans-serif",
				"Raleway, Helvetica, Arial, sans-serif",
				"Ubuntu, Helvetica, Arial, sans-serif",
				"Vollkorn, Georgia, Times, serif"							
			),
			'description' => __('Select a Google font for headers','ka_express'),
			'section' => 'fonts',
			'tab' => 'styles',
			'default' => "'Droid Serif', Georgia, Times, serif",
			'class' => 'select'
		),
		'kaex_fontface_header_font' => array(
			'name' => 'kaex_fontface_header_font',
			'title' => __('@font-face Font for Headers','ka_express'),
			'type' => 'select',
			'valid_options' => array(
				'Artifika, Georgia, Times, serif',
				"'Bitstream Vera', Helvetica, Arial, sans-serif",
				"'Gentium Basic', Georgia, Times, serif",
				'Josefin, Georgia, Times, serif',
				"'Lobster Two', Georgia, Times, serif", 
				"'Old Standard', Georgia, Times, serif",
				"'PT Serif', Georgia, Times, serif",
				"'PT Sans', Helvetica, Arial, sans-serif",
				"'Puritan 2.0', Helvetica, Arial, sans-serif",
				"'Qumpellka 12', Georgia, Times, serif",
				"'Source Code Pro', Courier, 'Courier New', sans-serif",
				'Titillium, Helvetica, Arial, sans-serif'
			),
			'description' => __('Select a @font-face font for headers','ka_express'),
			'section' => 'fonts',
			'tab' => 'styles',
			'default' => "'PT Sans', Helvetica, Arial, sans-serif",
			'class' => 'select'
		),
		'kaex_body_font_option' => array(
			'name' => 'kaex_body_font_option',
			'title' => __('Select body font option','ka_express'),
			'type' => 'select',
			'valid_options' => array(
				"standard web fonts" ,
				"google web fonts",
				"@font-face web fonts"
			),
			'description' => __('Select a font option for headers','ka_express'),
			'section' => 'fonts',
			'tab' => 'styles',
			'default' => 'standard web fonts',
			'class' => 'select'
		), 			 					
		'kaex_standard_body_font' => array(
			'name' => 'kaex_standard_body_font',
			'title' => __('Standard Font for Body Text','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				"default",
				"Arial, Helvetica, sans-serif",
				"'Book Antiqua', 'Palatino Linotype', Palatino, serif",
				"Cambria, Georgia, serif",
				"'Comic Sans MS', sans-serif",
				"Georgia, serif",
				"Tahoma, Geneva, sans-serif",
				"'Times New Roman', Times, serif",
				"'Trebuchet MS', Helvetica, sans-serif",
				"Verdana, Geneva, sans-serif"								
			),
			'description' => __('Select a font for Body Text','ka_express'),
			'section' => 'fonts',
			'tab' => 'styles',
			'default' => 'default',
			'class' => 'styles'
		), 			
		'kaex_google_body_font' => array(
			'name' => 'kaex_google_body_font',
			'title' => __('Google Font for Body','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				"Allerta, Helvetica, Arial, sans-serif",
				"Arvo, Georgia, Times, serif",
				"Cabin, Helvetica, Arial, sans-serif",
				"Corben, Georgia, Times, serif",
				"'Droid Sans', Helvetica, Arial, sans-serif",
				"'Droid Serif', Georgia, Times, serif",
				"Lekton, Helvetica, Arial, sans-serif",
				"Molengo, Georgia, Times, serif",
				"Nobile, Helvetica, Arial, sans-serif",
				"Raleway, Helvetica, Arial, sans-serif",
				"Ubuntu, Helvetica, Arial, sans-serif",
				"Vollkorn, Georgia, Times, serif"							
			),
			'description' => __('Select a Google font for Body Text','ka_express'),
			'section' => 'fonts',
			'tab' => 'styles',
			'default' => "'Droid Sans', Helvetica, Arial, sans-serif",
			'class' => 'select'
		),
		'kaex_fontface_body_font' => array(
			'name' => 'kaex_fontface_body_font',
			'title' => __('@font-face Font for Body','ka_express'),
			'type' => 'select',
			'valid_options' => array(
				'Artifika, Georgia, Times, serif',
				"'Bitstream Vera', Helvetica, Arial, sans-serif",
				"'Gentium Basic', Georgia, Times, serif",
				'Josefin, Georgia, Times, serif',
				"'Lobster Two', Georgia, Times, serif",  
				"'Old Standard', Georgia, Times, serif",
				"'PT Serif', Georgia, Times, serif",
				"'PT Sans', Helvetica, Arial, sans-serif",
				"'Puritan 2.0', Helvetica, Arial, sans-serif",
				"'Qumpellka 12', Georgia, Times, serif",
				"'Source Code Pro', Courier, 'Courier New', sans-serif",
				'Titillium, Helvetica, Arial, sans-serif'
			),
			'description' => __('Select a @font-face font for Body Text','ka_express'),
			'section' => 'fonts',
			'tab' => 'styles',
			'default' => "'PT Sans', Helvetica, Arial, sans-serif",
			'class' => 'select'
		), 		 			
/* ---------------------------- Static Home Page Options ----------------------------------- */
		'kaex_home_area_1' => array(
			'name' => 'kaex_home_area_1',
			'title' => __('Home Page Area 1','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'Section 1 - one column and button',
				'Section 2 - three column service box',
				'Section 3 - one column and button',
				'Section 4 - two column service box',
				'Section 5 - one column and button',
				'Section 6 - two column service box',
				'Section 7 - one column and button',
				'Section 8 - four column service box',
				'none'
			),
			'description' => __('Set the section for Area 1','ka_express'),
			'section' => 'layout',
			'tab' => 'home',
			'default' => 'Section 1 - one column and button',
			'class' => 'select' 
		),
		'kaex_home_area_2' => array(
			'name' => 'kaex_home_area_2',
			'title' => __('Home Page Area 2','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'Section 1 - one column and button',
				'Section 2 - three column service box',
				'Section 3 - one column and button',
				'Section 4 - two column service box',
				'Section 5 - one column and button',
				'Section 6 - two column service box',
				'Section 7 - one column and button',
				'Section 8 - four column service box',
				'none'
			),
			'description' => __('Set the section for Area 2','ka_express'),
			'section' => 'layout',
			'tab' => 'home',
			'default' => 'Section 2 - three column service box',
			'class' => 'select' 
		),
		'kaex_home_area_3' => array(
			'name' => 'kaex_home_area_3',
			'title' => __('Home Page Area 3','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'Section 1 - one column and button',
				'Section 2 - three column service box',
				'Section 3 - one column and button',
				'Section 4 - two column service box',
				'Section 5 - one column and button',
				'Section 6 - two column service box',
				'Section 7 - one column and button',
				'Section 8 - four column service box',
				'none'
			),
			'description' => __('Set the section for Area 3','ka_express'),
			'section' => 'layout',
			'tab' => 'home',
			'default' => 'Section 3 - one column and button',
			'class' => 'select' 
		),
		'kaex_home_area_4' => array(
			'name' => 'kaex_home_area_4',
			'title' => __('Home Page Area 4','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'Section 1 - one column and button',
				'Section 2 - three column service box',
				'Section 3 - one column and button',
				'Section 4 - two column service box',
				'Section 5 - one column and button',
				'Section 6 - two column service box',
				'Section 7 - one column and button',
				'Section 8 - four column service box',
				'none'
			),
			'description' => __('Set the section for Area 4','ka_express'),
			'section' => 'layout',
			'tab' => 'home',
			'default' => 'Section 4 - two column service box',
			'class' => 'select' 
		),
		'kaex_home_area_5' => array(
			'name' => 'kaex_home_area_5',
			'title' => __('Home Page Area 5','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'Section 1 - one column and button',
				'Section 2 - three column service box',
				'Section 3 - one column and button',
				'Section 4 - two column service box',
				'Section 5 - one column and button',
				'Section 6 - two column service box',
				'Section 7 - one column and button',
				'Section 8 - four column service box',
				'none'
			),
			'description' => __('Set the section for Area 5','ka_express'),
			'section' => 'layout',
			'tab' => 'home',
			'default' => 'Section 5 - one column and button',
			'class' => 'select' 
		),
		'kaex_home_area_6' => array(
			'name' => 'kaex_home_area_6',
			'title' => __('Home Page Area 6','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'Section 1 - one column and button',
				'Section 2 - three column service box',
				'Section 3 - one column and button',
				'Section 4 - two column service box',
				'Section 5 - one column and button',
				'Section 6 - two column service box',
				'Section 7 - one column and button',
				'Section 8 - four column service box',
				'none'
			),
			'description' => __('Set the section for Area 6','ka_express'),
			'section' => 'layout',
			'tab' => 'home',
			'default' => 'Section 6 - two column service box',
			'class' => 'select' 
		),
		'kaex_home_area_7' => array(
			'name' => 'kaex_home_area_7',
			'title' => __('Home Page Area 7','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'Section 1 - one column and button',
				'Section 2 - three column service box',
				'Section 3 - one column and button',
				'Section 4 - two column service box',
				'Section 5 - one column and button',
				'Section 6 - two column service box',
				'Section 7 - one column and button',
				'Section 8 - four column service box',
				'none'
			),
			'description' => __('Set the section for Area 7','ka_express'),
			'section' => 'layout',
			'tab' => 'home',
			'default' => 'Section 7 - one column and button',
			'class' => 'select' 
		),
		'kaex_home_area_8' => array(
			'name' => 'kaex_home_area_8',
			'title' => __('Home Page Area 8','ka_express'),
			'type' => 'select',
			'valid_options' => array( 
				'Section 1 - one column and button',
				'Section 2 - three column service box',
				'Section 3 - one column and button',
				'Section 4 - two column service box',
				'Section 5 - one column and button',
				'Section 6 - two column service box',
				'Section 7 - one column and button',
				'Section 8 - four column service box',
				'none'
			),
			'description' => __('Set the section for Area 8','ka_express'),
			'section' => 'layout',
			'tab' => 'home',
			'default' => 'none',
			'class' => 'select' 
		),
/* Section 1 */
		'kaex_section1_onoroff' => array(
			'name' => 'kaex_section1_onoroff',
			'title' => __('Enable Section 1','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to display Section 1','ka_express'),
			'section' => 'section_1',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_section1_text' => array(
			'name' => 'kaex_section1_text',
			'title' => __('Text to include','ka_express'),
			'type' => 'textarea',
			'description' => __('HTML is allowed','ka_express'),
			'section' => 'section_1',
			'tab' => 'home',
			'default' => '',
			'class' => 'html'
		),
		'kaex_include_section1_button' => array(
			'name' => 'kaex_include_section1_button',
			'title' => __('Include a link button','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to use a button','ka_express'),
			'section' => 'section_1',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_section1_button_name' => array(
			'name' => 'kaex_section1_button_name',
			'title' => __('Button Name','ka_express'),
			'type' => 'text',
			'description' => __('Enter text to appear on button','ka_express'),
			'section' => 'section_1',
			'tab' => 'home',
			'default' => '...more',
			'class' => 'nohtml'
		),		
		'kaex_section1_button_link' => array(
			'name' => 'kaex_section1_button_link',
			'title' => __('Button Link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:http://your.website.url/contact/','ka_express'),
			'section' => 'section_1',
			'tab' => 'home',
			'default' => '#',
			'class' => 'url'
		),
/* Section 2 */
		'kaex_section2_onoroff' => array(
			'name' => 'kaex_section2_onoroff',
			'title' => __('Enable Section 2','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to display Section 2','ka_express'),
			'section' => 'section_2',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_service1_image' => array(
			'name' => 'kaex_service1_image',
			'title' => __('Service box 1 image URL','ka_express'),
			'type' => 'text',
			'description' => '',
			'section' => 'section_2',
			'tab' => 'home',
			'default' => '',
			'class' => 'img'
		),
		'kaex_service1_title' => array(
			'name' => 'kaex_service1_title',
			'title' => __('Service box 1 title','ka_express'),
			'type' => 'text',
			'description' => __('Enter a title for Service Box 1','ka_express'),
			'section' => 'section_2',
			'tab' => 'home',
			'default' => '',
			'class' => 'nohtml'
		),
		'kaex_service1_text' => array(
			'name' => 'kaex_service1_text',
			'title' => __('Service box 1 text','ka_express'),
			'type' => 'textarea',
			'description' => __('Enter text for your service box - html allowed','ka_express'),
			'section' => 'section_2',
			'tab' => 'home',
			'default' => '',
			'class' => 'html'
		),
		'kaex_service1_include_link' => array(
			'name' => 'kaex_service1_include_link',
			'title' => __('Include a link','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to include','ka_express'),
			'section' => 'section_2',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_service1_button_link' => array(
			'name' => 'kaex_service1_button_link',
			'title' => __('Service box 1 link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:http://your.website.url/page/','ka_express'),
			'section' => 'section_2',
			'tab' => 'home',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_service1_button_title' => array(
			'name' => 'kaex_service1_button_title',
			'title' => __('Service box 1 link title','ka_express'),
			'type' => 'text',
			'description' => __('Enter a title for the button','ka_express'),
			'section' => 'section_2',
			'tab' => 'home',
			'default' => '...more',
			'class' => 'nohtml'
		),		
		'kaex_service2_image' => array(
			'name' => 'kaex_service2_image',
			'title' => __('Service box 2 image URL','ka_express'),
			'type' => 'text',
			'description' => '',
			'section' => 'section_2',
			'tab' => 'home',
			'default' => '',
			'class' => 'img'
		),
		'kaex_service2_title' => array(
			'name' => 'kaex_service2_title',
			'title' => __('Service box 2 title','ka_express'),
			'type' => 'text',
			'description' => __('Enter a title for Service Box 2','ka_express'),
			'section' => 'section_2',
			'tab' => 'home',
			'default' => '',
			'class' => 'nohtml'
		),
		'kaex_service2_text' => array(
			'name' => 'kaex_service2_text',
			'title' => __('Service box 2 text','ka_express'),
			'type' => 'textarea',
			'description' => __('Enter text for your service box - html allowed','ka_express'),
			'section' => 'section_2',
			'tab' => 'home',
			'default' => '',
			'class' => 'html'
		),
		'kaex_service2_include_link' => array(
			'name' => 'kaex_service2_include_link',
			'title' => __('Include a link','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to include','ka_express'),
			'section' => 'section_2',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_service2_button_link' => array(
			'name' => 'kaex_service2_button_link',
			'title' => __('Service box 2 link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:http://your.website.url/page/','ka_express'),
			'section' => 'section_2',
			'tab' => 'home',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_service2_button_title' => array(
			'name' => 'kaex_service2_button_title',
			'title' => __('Service box 2 link title','ka_express'),
			'type' => 'text',
			'description' => __('Enter a title for the button','ka_express'),
			'section' => 'section_2',
			'tab' => 'home',
			'default' => '...more',
			'class' => 'nohtml'
		),		
		'kaex_service3_image' => array(
			'name' => 'kaex_service3_image',
			'title' => __('Service box 3 image URL','ka_express'),
			'type' => 'text',
			'description' => '',
			'section' => 'section_2',
			'tab' => 'home',
			'default' => '',
			'class' => 'img'
		),
		'kaex_service3_title' => array(
			'name' => 'kaex_service3_title',
			'title' => __('Service box 3 title','ka_express'),
			'type' => 'text',
			'description' => __('Enter a title for Service Box 3','ka_express'),
			'section' => 'section_2',
			'tab' => 'home',
			'default' => '',
			'class' => 'nohtml'
		),
		'kaex_service3_text' => array(
			'name' => 'kaex_service3_text',
			'title' => __('Service box 3 text','ka_express'),
			'type' => 'textarea',
			'description' => __('Enter text for your service box - html allowed','ka_express'),
			'section' => 'section_2',
			'tab' => 'home',
			'default' => '',
			'class' => 'html'
		),
		'kaex_service3_include_link' => array(
			'name' => 'kaex_service3_include_link',
			'title' => __('Include a link','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to include','ka_express'),
			'section' => 'section_2',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_service3_button_link' => array(
			'name' => 'kaex_service3_button_link',
			'title' => __('Service box 3 link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:http://your.website.url/page/','ka_express'),
			'section' => 'section_2',
			'tab' => 'home',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_service3_button_title' => array(
			'name' => 'kaex_service3_button_title',
			'title' => __('Service box 3 link title','ka_express'),
			'type' => 'text',
			'description' => __('Enter a title for the button','ka_express'),
			'section' => 'section_2',
			'tab' => 'home',
			'default' => '...more',
			'class' => 'nohtml'
		),		
/* Section 3 */
		'kaex_section3_onoroff' => array(
			'name' => 'kaex_section3_onoroff',
			'title' => __('Enable Section 3','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to display Section 3','ka_express'),
			'section' => 'section_3',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_section3_text' => array(
			'name' => 'kaex_section3_text',
			'title' => __('Text to include','ka_express'),
			'type' => 'textarea',
			'description' => __('HTML is allowed','ka_express'),
			'section' => 'section_3',
			'tab' => 'home',
			'default' => '',
			'class' => 'html'
		),
		'kaex_include_section3_button' => array(
			'name' => 'kaex_include_section3_button',
			'title' => __('Include a link button','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to use a button','ka_express'),
			'section' => 'section_3',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_section3_button_name' => array(
			'name' => 'kaex_section3_button_name',
			'title' => __('Button Name','ka_express'),
			'type' => 'text',
			'description' => __('Enter text to appear on button','ka_express'),
			'section' => 'section_3',
			'tab' => 'home',
			'default' => '...more',
			'class' => 'nohtml'
		),		
		'kaex_section3_button_link' => array(
			'name' => 'kaex_section3_button_link',
			'title' => __('Button Link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:http://your.website.url/contact/','ka_express'),
			'section' => 'section_3',
			'tab' => 'home',
			'default' => '#',
			'class' => 'url'
		),
/* Section 4 */
		'kaex_section4_onoroff' => array(
			'name' => 'kaex_section4_onoroff',
			'title' => __('Enable section 4','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to display Section 4','ka_express'),
			'section' => 'section_4',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_service4_image' => array(
			'name' => 'kaex_service4_image',
			'title' => __('Service box 1 image URL','ka_express'),
			'type' => 'text',
			'description' => '',
			'section' => 'section_4',
			'tab' => 'home',
			'default' => '',
			'class' => 'img'
		),
		'kaex_service4_title' => array(
			'name' => 'kaex_service4_title',
			'title' => __('Service box 1 title','ka_express'),
			'type' => 'text',
			'description' => __('Enter a title for Service Box 1','ka_express'),
			'section' => 'section_4',
			'tab' => 'home',
			'default' => '',
			'class' => 'nohtml'
		),
		'kaex_service4_text' => array(
			'name' => 'kaex_service4_text',
			'title' => __('Service box 1 text','ka_express'),
			'type' => 'textarea',
			'description' => __('Enter text for your service box - html allowed','ka_express'),
			'section' => 'section_4',
			'tab' => 'home',
			'default' => '',
			'class' => 'html'
		),
		'kaex_service4_include_link' => array(
			'name' => 'kaex_service4_include_link',
			'title' => __('Include a link button','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to include','ka_express'),
			'section' => 'section_4',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_service4_button_link' => array(
			'name' => 'kaex_service4_button_link',
			'title' => __('Button link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:http://your.website.url/page/','ka_express'),
			'section' => 'section_4',
			'tab' => 'home',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_service4_button_title' => array(
			'name' => 'kaex_service4_button_title',
			'title' => __('Button name','ka_express'),
			'type' => 'text',
			'description' => __('Enter text to appear on button','ka_express'),
			'section' => 'section_4',
			'tab' => 'home',
			'default' => '...more',
			'class' => 'nohtml'
		),		
		'kaex_service5_image' => array(
			'name' => 'kaex_service5_image',
			'title' => __('Service box 2 image URL','ka_express'),
			'type' => 'text',
			'description' => '',
			'section' => 'section_4',
			'tab' => 'home',
			'default' => '',
			'class' => 'img'
		),
		'kaex_service5_title' => array(
			'name' => 'kaex_service5_title',
			'title' => __('Service box 2 title','ka_express'),
			'type' => 'text',
			'description' => __('Enter a title for Service Box 2','ka_express'),
			'section' => 'section_4',
			'tab' => 'home',
			'default' => '',
			'class' => 'nohtml'
		),
		'kaex_service5_text' => array(
			'name' => 'kaex_service5_text',
			'title' => __('Service Box 2 Text','ka_express'),
			'type' => 'textarea',
			'description' => __('Enter text for your service box - html allowed','ka_express'),
			'section' => 'section_4',
			'tab' => 'home',
			'default' => '',
			'class' => 'html'
		),
		'kaex_service5_include_link' => array(
			'name' => 'kaex_service5_include_link',
			'title' => __('Include a link button','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to include','ka_express'),
			'section' => 'section_4',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_service5_button_link' => array(
			'name' => 'kaex_service5_button_link',
			'title' => __('Button link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:http://your.website.url/page/','ka_express'),
			'section' => 'section_4',
			'tab' => 'home',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_service5_button_title' => array(
			'name' => 'kaex_service5_button_title',
			'title' => __('Button title','ka_express'),
			'type' => 'text',
			'description' => __('Enter a title for the button','ka_express'),
			'section' => 'section_4',
			'tab' => 'home',
			'default' => '...more',
			'class' => 'nohtml'
		),				
/* Section 5 */																					
		'kaex_section5_onoroff' => array(
			'name' => 'kaex_section5_onoroff',
			'title' => __('Enable Section 5','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to display Section 5','ka_express'),
			'section' => 'section_5',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_section5_text' => array(
			'name' => 'kaex_section5_text',
			'title' => __('Text to include','ka_express'),
			'type' => 'textarea',
			'description' => __('HTML is allowed','ka_express'),
			'section' => 'section_5',
			'tab' => 'home',
			'default' => '',
			'class' => 'html'
		),
		'kaex_include_section5_button' => array(
			'name' => 'kaex_include_section5_button',
			'title' => __('Include a link button','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to use a button','ka_express'),
			'section' => 'section_5',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_section5_button_name' => array(
			'name' => 'kaex_section5_button_name',
			'title' => __('Button Name','ka_express'),
			'type' => 'text',
			'description' => __('Enter text to appear on button','ka_express'),
			'section' => 'section_5',
			'tab' => 'home',
			'default' => '...more',
			'class' => 'nohtml'
		),		
		'kaex_section5_button_link' => array(
			'name' => 'kaex_section5_button_link',
			'title' => __('Button Link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:http://your.website.url/contact/','ka_express'),
			'section' => 'section_5',
			'tab' => 'home',
			'default' => '#',
			'class' => 'url'
		),
/* Section 6 */
		'kaex_section6_onoroff' => array(
			'name' => 'kaex_section6_onoroff',
			'title' => __('Enable section 6','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to display Section 6','ka_express'),
			'section' => 'section_6',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_service6_image' => array(
			'name' => 'kaex_service6_image',
			'title' => __('Service box 1 image URL','ka_express'),
			'type' => 'text',
			'description' => '',
			'section' => 'section_6',
			'tab' => 'home',
			'default' => '',
			'class' => 'img'
		),
		'kaex_service6_title' => array(
			'name' => 'kaex_service6_title',
			'title' => __('Service box 1 title','ka_express'),
			'type' => 'text',
			'description' => __('Enter a title for Service Box 1','ka_express'),
			'section' => 'section_6',
			'tab' => 'home',
			'default' => '',
			'class' => 'nohtml'
		),
		'kaex_service6_text' => array(
			'name' => 'kaex_service6_text',
			'title' => __('Service box 1 text','ka_express'),
			'type' => 'textarea',
			'description' => __('Enter text for your service box - html allowed','ka_express'),
			'section' => 'section_6',
			'tab' => 'home',
			'default' => '',
			'class' => 'html'
		),
		'kaex_service6_include_link' => array(
			'name' => 'kaex_service6_include_link',
			'title' => __('Include a link button','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to include','ka_express'),
			'section' => 'section_6',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_service6_button_link' => array(
			'name' => 'kaex_service6_button_link',
			'title' => __('Button link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:http://your.website.url/page/','ka_express'),
			'section' => 'section_6',
			'tab' => 'home',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_service6_button_title' => array(
			'name' => 'kaex_service6_button_title',
			'title' => __('Button name','ka_express'),
			'type' => 'text',
			'description' => __('Enter text to appear on button','ka_express'),
			'section' => 'section_6',
			'tab' => 'home',
			'default' => '...more',
			'class' => 'nohtml'
		),		
		'kaex_service7_image' => array(
			'name' => 'kaex_service7_image',
			'title' => __('Service box 2 image URL','ka_express'),
			'type' => 'text',
			'description' => '',
			'section' => 'section_6',
			'tab' => 'home',
			'default' => '',
			'class' => 'img'
		),
		'kaex_service7_title' => array(
			'name' => 'kaex_service7_title',
			'title' => __('Service box 2 title','ka_express'),
			'type' => 'text',
			'description' => __('Enter a title for Service Box 2','ka_express'),
			'section' => 'section_6',
			'tab' => 'home',
			'default' => '',
			'class' => 'nohtml'
		),
		'kaex_service7_text' => array(
			'name' => 'kaex_service7_text',
			'title' => __('Service Box 2 Text','ka_express'),
			'type' => 'textarea',
			'description' => __('Enter text for your service box - html allowed','ka_express'),
			'section' => 'section_6',
			'tab' => 'home',
			'default' => '',
			'class' => 'html'
		),
		'kaex_service7_include_link' => array(
			'name' => 'kaex_service7_include_link',
			'title' => __('Include a link button','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to include','ka_express'),
			'section' => 'section_6',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_service7_button_link' => array(
			'name' => 'kaex_service7_button_link',
			'title' => __('Button link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:http://your.website.url/page/','ka_express'),
			'section' => 'section_6',
			'tab' => 'home',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_service7_button_title' => array(
			'name' => 'kaex_service7_button_title',
			'title' => __('Button title','ka_express'),
			'type' => 'text',
			'description' => __('Enter a title for the button','ka_express'),
			'section' => 'section_6',
			'tab' => 'home',
			'default' => '...more',
			'class' => 'nohtml'
		),				
/* Section 7 */
		'kaex_section7_onoroff' => array(
			'name' => 'kaex_section7_onoroff',
			'title' => __('Enable Section 7','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to display Section 7','ka_express'),
			'section' => 'section_7',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_section7_text' => array(
			'name' => 'kaex_section7_text',
			'title' => __('Text to include','ka_express'),
			'type' => 'textarea',
			'description' => __('HTML is allowed','ka_express'),
			'section' => 'section_7',
			'tab' => 'home',
			'default' => '',
			'class' => 'html'
		),
		'kaex_include_section7_button' => array(
			'name' => 'kaex_include_section7_button',
			'title' => __('Include a link button','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to use a button','ka_express'),
			'section' => 'section_7',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_section7_button_name' => array(
			'name' => 'kaex_section7_button_name',
			'title' => __('Button Name','ka_express'),
			'type' => 'text',
			'description' => __('Enter text to appear on button','ka_express'),
			'section' => 'section_7',
			'tab' => 'home',
			'default' => '...more',
			'class' => 'nohtml'
		),		
		'kaex_section7_button_link' => array(
			'name' => 'kaex_section7_button_link',
			'title' => __('Button Link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:http://your.website.url/contact/','ka_express'),
			'section' => 'section_7',
			'tab' => 'home',
			'default' => '#',
			'class' => 'url'
		),
/* Section 8 */
		'kaex_section8_onoroff' => array(
			'name' => 'kaex_section8_onoroff',
			'title' => __('Enable Section 8','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to display Section 8','ka_express'),
			'section' => 'section_8',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_service8_image' => array(
			'name' => 'kaex_service8_image',
			'title' => __('Service box 1 image URL','ka_express'),
			'type' => 'text',
			'description' => '',
			'section' => 'section_8',
			'tab' => 'home',
			'default' => '',
			'class' => 'img'
		),
		'kaex_service8_title' => array(
			'name' => 'kaex_service8_title',
			'title' => __('Service box 1 title','ka_express'),
			'type' => 'text',
			'description' => __('Enter a title for Service Box 1','ka_express'),
			'section' => 'section_8',
			'tab' => 'home',
			'default' => '',
			'class' => 'nohtml'
		),
		'kaex_service8_text' => array(
			'name' => 'kaex_service8_text',
			'title' => __('Service box 1 text','ka_express'),
			'type' => 'textarea',
			'description' => __('Enter text for your service box - html allowed','ka_express'),
			'section' => 'section_8',
			'tab' => 'home',
			'default' => '',
			'class' => 'html'
		),
		'kaex_service8_include_link' => array(
			'name' => 'kaex_service8_include_link',
			'title' => __('Include a link','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to include','ka_express'),
			'section' => 'section_8',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_service8_button_link' => array(
			'name' => 'kaex_service8_button_link',
			'title' => __('Service box 1 link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:http://your.website.url/page/','ka_express'),
			'section' => 'section_8',
			'tab' => 'home',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_service8_button_title' => array(
			'name' => 'kaex_service8_button_title',
			'title' => __('Service box 1 link title','ka_express'),
			'type' => 'text',
			'description' => __('Enter a title for the button','ka_express'),
			'section' => 'section_8',
			'tab' => 'home',
			'default' => '...more',
			'class' => 'nohtml'
		),
		'kaex_service9_image' => array(
			'name' => 'kaex_service9_image',
			'title' => __('Service box 2 image URL','ka_express'),
			'type' => 'text',
			'description' => '',
			'section' => 'section_8',
			'tab' => 'home',
			'default' => '',
			'class' => 'img'
		),
		'kaex_service9_title' => array(
			'name' => 'kaex_service9_title',
			'title' => __('Service box 2 title','ka_express'),
			'type' => 'text',
			'description' => __('Enter a title for Service Box 2','ka_express'),
			'section' => 'section_8',
			'tab' => 'home',
			'default' => '',
			'class' => 'nohtml'
		),
		'kaex_service9_text' => array(
			'name' => 'kaex_service9_text',
			'title' => __('Service box 2 text','ka_express'),
			'type' => 'textarea',
			'description' => __('Enter text for your service box - html allowed','ka_express'),
			'section' => 'section_8',
			'tab' => 'home',
			'default' => '',
			'class' => 'html'
		),
		'kaex_service9_include_link' => array(
			'name' => 'kaex_service9_include_link',
			'title' => __('Include a link','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to include','ka_express'),
			'section' => 'section_8',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_service9_button_link' => array(
			'name' => 'kaex_service9_button_link',
			'title' => __('Service box 2 link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:http://your.website.url/page/','ka_express'),
			'section' => 'section_8',
			'tab' => 'home',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_service9_button_title' => array(
			'name' => 'kaex_service9_button_title',
			'title' => __('Service box 2 link title','ka_express'),
			'type' => 'text',
			'description' => __('Enter a title for the button','ka_express'),
			'section' => 'section_8',
			'tab' => 'home',
			'default' => '...more',
			'class' => 'nohtml'
		),
		'kaex_service10_image' => array(
			'name' => 'kaex_service10_image',
			'title' => __('Service box 3 image URL','ka_express'),
			'type' => 'text',
			'description' => '',
			'section' => 'section_8',
			'tab' => 'home',
			'default' => '',
			'class' => 'img'
		),
		'kaex_service10_title' => array(
			'name' => 'kaex_service10_title',
			'title' => __('Service box 3 title','ka_express'),
			'type' => 'text',
			'description' => __('Enter a title for Service Box 3','ka_express'),
			'section' => 'section_8',
			'tab' => 'home',
			'default' => '',
			'class' => 'nohtml'
		),
		'kaex_service10_text' => array(
			'name' => 'kaex_service10_text',
			'title' => __('Service box 3 text','ka_express'),
			'type' => 'textarea',
			'description' => __('Enter text for your service box - html allowed','ka_express'),
			'section' => 'section_8',
			'tab' => 'home',
			'default' => '',
			'class' => 'html'
		),
		'kaex_service10_include_link' => array(
			'name' => 'kaex_service10_include_link',
			'title' => __('Include a link','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to include','ka_express'),
			'section' => 'section_8',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_service10_button_link' => array(
			'name' => 'kaex_service10_button_link',
			'title' => __('Service box 3 link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:http://your.website.url/page/','ka_express'),
			'section' => 'section_8',
			'tab' => 'home',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_service10_button_title' => array(
			'name' => 'kaex_service10_button_title',
			'title' => __('Service box 3 link title','ka_express'),
			'type' => 'text',
			'description' => __('Enter a title for the button','ka_express'),
			'section' => 'section_8',
			'tab' => 'home',
			'default' => '...more',
			'class' => 'nohtml'
		),
			'kaex_service11_image' => array(
			'name' => 'kaex_service11_image',
			'title' => __('Service box 4 image URL','ka_express'),
			'type' => 'text',
			'description' => '',
			'section' => 'section_8',
			'tab' => 'home',
			'default' => '',
			'class' => 'img'
		),
		'kaex_service11_title' => array(
			'name' => 'kaex_service11_title',
			'title' => __('Service box 4 title','ka_express'),
			'type' => 'text',
			'description' => __('Enter a title for Service Box 4','ka_express'),
			'section' => 'section_8',
			'tab' => 'home',
			'default' => '',
			'class' => 'nohtml'
		),
		'kaex_service11_text' => array(
			'name' => 'kaex_service11_text',
			'title' => __('Service box 4 text','ka_express'),
			'type' => 'textarea',
			'description' => __('Enter text for your service box - html allowed','ka_express'),
			'section' => 'section_8',
			'tab' => 'home',
			'default' => '',
			'class' => 'html'
		),
		'kaex_service11_include_link' => array(
			'name' => 'kaex_service11_include_link',
			'title' => __('Include a link','ka_express'),
			'type' => 'checkbox',
			'description' => __('Check to include','ka_express'),
			'section' => 'section_8',
			'tab' => 'home',
			'default' => 0,// 0 for off
			'class' => 'checkbox' 
		),
		'kaex_service11_button_link' => array(
			'name' => 'kaex_service11_button_link',
			'title' => __('Service box 4 link','ka_express'),
			'type' => 'text',
			'description' => __('Suggested Format:http://your.website.url/page/','ka_express'),
			'section' => 'section_8',
			'tab' => 'home',
			'default' => '#',
			'class' => 'url'
		),
		'kaex_service11_button_title' => array(
			'name' => 'kaex_service11_button_title',
			'title' => __('Service box 4 link title','ka_express'),
			'type' => 'text',
			'description' => __('Enter a title for the button','ka_express'),
			'section' => 'section_8',
			'tab' => 'home',
			'default' => '...more',
			'class' => 'nohtml'
		),			
	 );
	return apply_filters( 'expressions_get_option_parameters', $options );
}

/**
 * Get expressions Theme Options
 * 
 * Array that holds all of the defined values for Expressions Theme options. If the user 
 * has not specified a value for a given Theme option, then the option's default value is
 * used instead.
 *
 * @uses	ka_express_get_option_defaults()	defined in this file
 * @uses	get_option()
 * @uses	wp_parse_args()
 * @return	array	$expressions_options	current values for all Theme options
 * 
 */
function ka_express_get_options() {
	// Get the option defaults
	$expressions_option_defaults = ka_express_get_option_defaults();
	// Globalize the variable that holds the Theme options
	global $expressions_options;
	// Parse the stored options with the defaults
	$expressions_options = wp_parse_args( get_option( 'theme_expressions_options', array() ), $expressions_option_defaults );
	// Return the parsed array
	return $expressions_options;
}

/**
 * Separate settings by tab
 * 
 * Returns an array of tabs, each of which is an indexed array of settings
 * included with the specified tab.
 *
 * @uses	ka_express_get_option_parameters()	defined in this file
 * @uses	ka_express_get_settings_page_tabs()	defined in this file
 * 
 * @return	array	$settingsbytab	array of arrays of settings by tab
 */
function ka_express_get_settings_by_tab() {
	// Get the list of settings page tabs
	$tabs = ka_express_get_settings_page_tabs();
	// Initialize an array to hold
	// an indexed array of tabnames
	$settingsbytab = array();
	// Loop through the array of tabs
	foreach ( $tabs as $tab ) {
		$tabname = $tab['name'];
		// Add an indexed array key to the settings-by-tab array for each tab name
		$settingsbytab[] = $tabname;
	}
	// Get the array of option parameters
	$option_parameters = ka_express_get_option_parameters();
	// Loop through the option parameters array
	foreach ( $option_parameters as $option_parameter ) {
		$optiontab = $option_parameter['tab'];
		$optionname = $option_parameter['name'];
		// Add an indexed array key to the settings-by-tab array for each setting associated with each tab
		$settingsbytab[$optiontab][] = $optionname;
		$settingsbytab['all'][] = $optionname;
	}
	// Return the settings-by-tab array
	return $settingsbytab;
}

/**
 * Expressions Theme Admin Settings Page Tabs
 * 
 * Array that holds all of the tabs for the expressions Theme Settings Page. Each tab
 * key holds an array that defines the sections for each tab, including the description text.
 * 
 * @return	array	$tabs	array of arrays of tab parameters
 */	
function ka_express_get_settings_page_tabs() {
	$kaex_intro = '';
	$kaex_intro .= '<p>'.__('Welcome to the Expressions Options section. I hope you like the theme.','ka_express').'</p>';
	$kaex_intro .= '<p><strong>'.__('Help','ka_express').'</strong> - '.__('The help button in the top right corner will provide tips for each section.','ka_express').'</p>';
	$kaex_intro .= '<p><strong>'.__('Detailed Documentation','ka_express').' - </strong><a href="http://demo2.kevinsspace.ca/wp-content/uploads/expressions_docs/Expressions_docs_1.html" title="Expressions Documentation" target="_blank">Expressions Documentation</a></p>';
	$kaex_intro .= '<p>'.__('It takes a lot of effort to code these themes and maintain them. If you are using Expressions for your site then show your appreciation.','ka_express').'</p>';
	$kaex_intro .= '<p><strong>'.__('Donate','ka_express').' - </strong><a href="http://www.kevinsspace.ca/expressions-wordpress-theme/" title="Appreciate Expressions" target="_blank">Expressions Page</a>';
	$kaex_intro .= '     '.__('You can also do a review of the theme at ','ka_express').'<a href="http://wordpress.org/support/view/theme-reviews/expressions" title="Expressions Reviews" target="_blank">Expressions Reviews</a></p>';
	$tabs = array( 
		'general' => array(
			'name' => 'general',
			'title' => __( 'General','ka_express'),
			'sections' => array(
				'donate' => array(
					'name' => 'donate',
					'title' => 'Show Your Appreciation',
					'description' => $kaex_intro 
				),
				'general' => array(
					'name' => 'general',
					'title' => __( 'General Options','ka_express'),
					'description' => ''
				),
				'nivo' => array(
					'name' => 'nivo',
					'title' => __('Nivo Slider Options','ka_express'),
					'description' => ''
				),
				'posts' => array(
					'name' => 'posts',
					'title' => __('Post Options','ka_express'),
					'description' => ''
				),
				'jquery' => array(
					'name' => 'jquery',
					'title' => __( 'jQuery Options','ka_express'),
					'description' => ''
				),
				'mobile' => array(
					'name' => 'mobile',
					'title' => __( 'Responsive Options','ka_express'),
					'description' => ''
				)
			)
		),
		'sidebars' => array(
			'name' => 'sidebars',
			'title' => __( 'Sidebars','ka_express'),
			'sections' => array(
				'general' => array(
					'name' => 'general',
					'title' => __( 'General Sidebar Options','ka_express'),
					'description' => ''
				),
				'sidebars' => array(
					'name' => 'sidebars',
					'title' => __( 'Sidebar Locations','ka_express'),
					'description' => __( 'Note that these are predefined page sidebar locations. 
					                      Sidebar locations for custom pages are set up in the edit panel for that page.','ka_express')
				)
			)
		),
		'header' => array(
			'name' => 'header',
			'title' => __( 'Header','ka_express'),
			'sections' => array(
				'general' => array(
					'name' => 'general',
					'title' => __( 'General Header Options','ka_express'),
					'description' => ''
				),
				'menu' => array(
					'name' => 'menu',
					'title' => __( 'Header Menu Options','ka_express'),
					'description' => ''
				)
			)
		),
		'footer' => array(
			'name' => 'footer',
			'title' => __( 'Footer','ka_express'),
			'sections' => array(
				'footer' => array(
					'name' => 'footer',
					'title' => __( 'Footer Options','ka_express'),
					'description' => ''
				),
				'copyright' => array(
					'name' => 'copyright',
					'title' => __( 'Copyright Strip Options','ka_express'),
					'description' => ''
				)
			)
		),
		'social' => array(
			'name' => 'social',
			'title' => __( 'Social','ka_express'),
			'sections' => array(
				'general' => array(
					'name' => 'general',
					'title' => __( 'General Social Options','ka_express'),
					'description' => ''
				),
				'links' => array(
					'name' => 'links',
					'title' => __( 'Social Links','ka_express'),
					'description' => ''
				)
			)
		),
		'styles' => array(
			'name' => 'styles',
			'title' => __( 'Styles','ka_express'),
			'sections' => array(
				'skins' => array(
					'name' => 'skins',
					'title' => __( 'Skin Options','ka_express'),
					'description' => __( 'Expressions allows you to select a predefined skin.','ka_express')
				),
				'fonts' => array(
					'name' => 'fonts',
					'title' => __( 'Font Options','ka_express'),
					'description' => __( 'You can select different fonts for your site.','ka_express')
				)
			)
		),
		'home' => array(
			'name' => 'home',
			'title' => __( 'Home','ka_express'),
			'sections' => array(
				'layout' => array(
					'name' => 'layout',
					'title' => __( 'Home Page Layout Options','ka_express'),
					'description' => __( 'Select up to 8 sections for your layout.','ka_express')
				),
				'section_1' => array(
					'name' => 'section_1',
					'title' => __( 'Section 1 Options','ka_express'),
					'description' => __( 'Section 1 contains html text and an optional button.','ka_express')
				),
				'section_2' => array(
					'name' => 'section_2',
					'title' => __( 'Section 2 Options','ka_express'),
					'description' => __( 'Section 2 contains 3 service boxes, allowing an image,title,html text,and a button.','ka_express')
				),
				'section_3' => array(
					'name' => 'section_3',
					'title' => __( 'Section 3 Options','ka_express'),
					'description' => __( 'Section 3 contains html text and an optional button.','ka_express')
				),
				'section_4' => array(
					'name' => 'section_4',
					'title' => __( 'Section 4 Options','ka_express'),
					'description' => __( 'Section 4 contains 2 service boxes, allowing an image,title,html text,and a button.','ka_express')
				),
				'section_5' => array(
					'name' => 'section_5',
					'title' => __( 'Section 5 Options','ka_express'),
					'description' => __( 'Section 5 contains html text and an optional button.','ka_express')
				),
				'section_6' => array(
					'name' => 'section_6',
					'title' => __( 'Section 6 Options','ka_express'),
					'description' => __( 'Section 6 contains 2 service boxes, allowing an image,title,html text,and a button.','ka_express')
				),
				'section_7' => array(
					'name' => 'section_7',
					'title' => __( 'Section 7 Options','ka_express'),
					'description' => __( 'Section 7 contains html text and an optional button.','ka_express')
				),
				'section_8' => array(
					'name' => 'section_8',
					'title' => __( 'Section 8 Options','ka_express'),
					'description' => __( 'Section contains 4 service boxes, allowing an image,title,html text,and a button.','ka_express')
				)
			)
		)
	);
	return apply_filters( 'expressions_get_settings_page_tabs', $tabs );
}

/**
 * Get cuurent settings page tab
 * 
 * This function gets the cuurrent settings page tab and will return 'generel' if not set
 * 
 * @return $current
 * 
 */
function ka_express_get_current_tab() {
	if ( isset( $_GET['tab'] ) ) {
		$current = $_GET['tab'];
	} else {
		$current = 'general';
	}
	return $current;
}


/**
 * Define expressions Admin Page Tab Markup
 * 
 * @uses	ka_express_get_current_tab()	defined in this file
 * @uses	ka_express_get_settings_page_tabs()	defined in this filep
 * 
 * @link	http://www.onedesigns.com/tutorials/separate-multiple-theme-options-pages-using-tabs	Daniel Tara
 */
function ka_express_get_page_tab_markup() {
	$page = 'expressions-settings';
	$current = ka_express_get_current_tab();
	$tabs = ka_express_get_settings_page_tabs();
	$links = array();
	foreach( $tabs as $tab ) {
		$tabname = $tab['name'];
		$tabtitle = $tab['title'];
		if ( $tabname == $current ) {
			$links[] = "<a class='nav-tab nav-tab-active' href='?page=$page&tab=$tabname'>$tabtitle</a>";
		} else {
			$links[] = "<a class='nav-tab' href='?page=$page&tab=$tabname'>$tabtitle</a>";
		}
	}
	echo '<div id="icon-themes" class="icon32"><br /></div>';
	echo '<h2 class="nav-tab-wrapper">';
	foreach ( $links as $link )
		echo $link;
		echo '</h2>';
}

/**
 * Settings Page Contextual Help
 * 
 * Contextual help, WordPress 3.3-compatible
 * 
 * This callback is hooked into the load-$expressions_settings_page hook,
 * via the ka_express_add_theme_page() callback, which is hooked into the
 * admin_menu hook.
 * 
 * This callback works by calling the current screen object, via the WP_Screen() 
 * class via get_current_screen(), and then adding contextual help tabs to the 
 * screen object, via add_help_tab().
 * 
 * The add_help_tab() function is a member of the WP_Screen() class, and must be 
 * referenced from the class. The function accepts four arguments:
 *     add_help_tab( 
 *     		$id,		// string		(required) HTML ID attribute
 *     		$title,		// string		(required) Tab title
 *     		$content,	// string		(optional) Tab content
 *     		$callback	// callback		(optional) function that returns tab content
 *     )
 * 
 * @link 		http://codex.wordpress.org/Function_Reference/add_help_tab				add_help_tab()
 * @link 		http://codex.wordpress.org/Function_Reference/get_current_screen		get_current_screen()
 * @link 		http://codex.wordpress.org/Function_Reference/get_template_directory	get_template_directory()
 * @link 		http://php.net/manual/en/function.file.php								file()
 * @link 		http://php.net/manual/en/function.implode.php							implode()
 * @link 		http://php.net/manual/en/function.include.php							include()
 * 
 */	
function ka_express_settings_page_contextual_help() {
	// Globalize settings page
	global $expressions_settings_page;
	// Get the current screen object
	$screen = get_current_screen();
	// Ensure current page is expressions settings page
	if ( $screen->id != $expressions_settings_page ) {
		return;
	}
	// Add Settings - General help screen tab
	$screen->add_help_tab( array(
		// HTML ID attribute
		'id'      => 'expressions-settings-general',
		// Tab Title
		'title'   => __( 'General','ka_express'),
		// Tab content
		'content' => include( get_template_directory() . '/help/general_tab_help.php' ) ,
	) );
	// Add Settings - Sidebars help screen tab
	$screen->add_help_tab( array(
		// HTML ID attribute
		'id'      => 'expressions-settings-sidebars',
		// Tab Title
		'title'   => __( 'Sidebars','ka_express'),
		// Tab content
		'content' => include( get_template_directory() . '/help/sidebars_tab_help.php' ) ,
	) );
	// Add Settings - Header help screen tab
	$screen->add_help_tab( array(
		// HTML ID attribute
		'id'      => 'expressions-settings-header',
		// Tab Title
		'title'   => __( 'Header','ka_express'),
		// Tab content
		'content' => include( get_template_directory() . '/help/header_tab_help.php' ) ,
	) );
	// Add Settings - Footer help screen tab
	$screen->add_help_tab( array(
		// HTML ID attribute
		'id'      => 'expressions-settings-footer',
		// Tab Title
		'title'   => __( 'Footer','ka_express'),
		// Tab content
		'content' => include( get_template_directory() . '/help/footer_tab_help.php' ) ,
	) );
	// Add Settings - Social help screen tab
	$screen->add_help_tab( array(
		// HTML ID attribute
		'id'      => 'expressions-settings-social',
		// Tab Title
		'title'   => __( 'Social','ka_express'),
		// Tab content
		'content' => include( get_template_directory() . '/help/social_tab_help.php' ) ,
	) );
	// Add Settings - Style help screen tab
	$screen->add_help_tab( array(
		// HTML ID attribute
		'id'      => 'expressions-settings-styles',
		// Tab title
		'title'   => __( 'Style','ka_express'),
		// Tab content
		'content' => include( get_template_directory() . '/help/styles_tab_help.php' ) ,
	) );
	// Add Home Page screen tab
	$screen->add_help_tab( array(
		// HTML ID attribute
		'id'      => 'expressions-settings-home',
		// Tab title
		'title'   => __( 'Home','ka_express'),
		// Tab content
		'content' => include( get_template_directory() . '/help/home_tab_help.php' ) ,
	) );
	// Add FAQ help screen tab
	$screen->add_help_tab( array(
		// HTML ID attribute
		'id'      => 'expressions-faq',
		// Tab title
		'title'   => __( 'FAQ','ka_express'),
		// Tab content
		'content' => include( get_template_directory() . '/help/faq_tab_help.php' ) ,
	) );
}
?>