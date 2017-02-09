<?php
/**
 * Main functions file
 * 
 * This file is WordPress functions file, which which contains many of the functions 
 * for set up and operation of the theme
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
 ?>
<?php
/* ---- Set content width --------*/
if(!isset( $content_width )) $content_width = 960;

/* ---- load files ---------------*/ 
require(get_template_directory() . '/includes/kaex-options.php');
require(get_template_directory() . '/includes/kaex-post-functions.php');
require(get_template_directory() . '/includes/kaex-custom-functions.php');
require(get_template_directory() . '/includes/kaex-metabox-functions.php');
require(get_template_directory() . '/widgets/social_widget.php');
require(get_template_directory() . '/widgets/contact_widget.php');
require(get_template_directory() . '/widgets/author_widget.php');

/**
 *  Allows shortcodes to be displayed in sidebar widgets
 */
add_filter('widget_text', 'do_shortcode');

/* ========================================================================================================
 *                 Scripts and Styles
 * ======================================================================================================== */
/**
 * Load jQuery Scripts
 * 
 * function to load jquery scripts. Some of the functions are conditionally loaded 
 * so that the user can disable naughty scripts
 * @uses ka_express_get_options() found in kaex-options.php
 * @uses ka_express_check_ie78() found in this file
 * WordPress functions - see codex
 * @uses is_admin() @uses wp_enqueue_script @uses get_template_directory_uri()
 * 
 */
if ( !function_exists ('ka_express_load_js')){
	function ka_express_load_js() {
		global $kaex_options;
		$kaex_options = ka_express_get_options(); 
		$disable_colorbox = $kaex_options['kaex_disable_colorboxjs'];
		$disable_fitvidsjs = $kaex_options['kaex_disable_fitvidsjs'];
		$disable_responsive_post_images = $kaex_options['kaex_disable_post_image_filter'];
		$include_mobile_design = $kaex_options['kaex_include_mobile_design'];
		if( !is_admin() ){
			
			wp_enqueue_script( 'jquery' );
			wp_deregister_script( 'hoverIntent' );
			wp_enqueue_script( 'hoverIntent' , get_template_directory_uri() . '/js/superfish/hoverIntent.min.js' , array( 'jquery' ) , '' , true );
			wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish/superfish.min.js' , array( 'jquery' ) , '' );
			
			if ( $disable_fitvidsjs != 1 ) {
				wp_enqueue_script( 'fitvids' , get_template_directory_uri() . '/js/jquery.fitvids.js' , array( 'jquery' ) , '' );
				wp_enqueue_script( 'fitvids_doc_ready' , get_template_directory_uri() . '/js/fitvids-doc-ready.js' , array( 'jquery' ) , '' );
			}

			if ( $include_mobile_design == 1 ) {
				wp_enqueue_script( 'mobile_doc_ready' , get_template_directory_uri() . '/js/mobile-doc-ready.js' , array( 'jquery' ) , '' );
			}
			
			if ( $disable_responsive_post_images != 1 ) {
				wp_enqueue_script( 'responsive_post_images', get_template_directory_uri() . '/js/ka_wp_responsive_image.js', array( 'jquery' ), '' );
			}
						
			if ( $disable_colorbox != 1 ) {
				wp_enqueue_script( 'colorbox' , get_template_directory_uri() . '/js/colorbox/jquery.colorbox-min.js' , array( 'jquery' ) , '' );
				wp_enqueue_script( 'colorbox_doc_ready' , get_template_directory_uri() . '/js/colorbox/colorbox_doc_ready.js' , array( 'jquery' ) , '' );
			}
			
			wp_enqueue_script( 'nivo' , get_template_directory_uri() . '/js/nivo-slider/jquery.nivo.slider.pack.js' , array( 'jquery' ) , '' );
			wp_enqueue_script( 'ka_express_custom_js' , get_template_directory_uri() . '/js/doc-ready-scripts.js' , array( 'jquery' ) , '' );
		}
	}
	add_action( 'wp_enqueue_scripts' , 'ka_express_load_js' );
}

/**
 * Load CSS Styles
 * 
 * function to load css styles. Some of the style sheets are conditionally loaded 
 * so as they are part of jQuery plugins
 * @uses ka_express_get_options() found in kaex-options.php
 * @uses ka_express_check_ie78() found in this file
 * WordPress functions - see codex
 * @uses wp_register_style() @uses wp_enqueue_style @uses get_template_directory_uri()
 * @uses get_template_directory_uri()
 * 
 */
if ( !function_exists ( 'ka_express_styles' ) ) {
	function ka_express_styles() {
		global $kaex_options;
		$kaex_options = ka_express_get_options(); 
		$use_font_icons = $kaex_options['kaex_use_font_icons'];
		$use_pformat_font_icons = $kaex_options['kaex_use_pformat_font_icons'];
		$use_social_font_icons = $kaex_options['kaex_use_social_font_icons'];
		$disable_colorbox = $kaex_options['kaex_disable_colorboxjs'];
		$include_mobile_design = $kaex_options['kaex_include_mobile_design'];
		
		wp_register_style( 'main_style' , get_stylesheet_directory_uri() . '/style.css' , array() );
		wp_enqueue_style( 'main_style' );
		wp_register_style( 'nivo_style' , get_template_directory_uri() . '/js/nivo-slider/nivo-slider.css' , array() );
		wp_enqueue_style( 'nivo_style' );
		wp_register_style( 'nivo_style_theme' , get_template_directory_uri() . '/js/nivo-slider/themes/default/default.css' , array() );
		wp_enqueue_style( 'nivo_style_theme' );
		wp_register_style( 'superfish_style', get_template_directory_uri() . '/js/superfish/superfish.css' , array() );
		wp_enqueue_style( 'superfish_style' );

		if ( $disable_colorbox != 1 ) {
			wp_register_style( 'colorbox_style' , get_template_directory_uri() . '/js/colorbox/colorbox.css' , array() );
			wp_enqueue_style( 'colorbox_style' );
		}

		if ( $include_mobile_design == 1 ) {
			wp_register_style( 'mobile_style' , get_template_directory_uri() . '/css/mobile.css' , array() );
			wp_enqueue_style( 'mobile_style' );
		}
		
		if ( $use_font_icons == 1 || $use_pformat_font_icons == 1 || $use_social_font_icons == 1 ) {
			//wp_register_style( 'kaex_font_icons' , get_template_directory_uri() . '/fontello/css/fontello.css' , array() );
			wp_register_style( 'kaex_font_icons' , get_template_directory_uri() . '/font-awesome-4.1.0/css/font-awesome.css' , array() );
			wp_enqueue_style( 'kaex_font_icons' );
		}

	}
	add_action( 'wp_enqueue_scripts', 'ka_express_styles' );
}

/**
 * Load custom fomts and styles Styles
 * 
 * WordPress functions - see codex
 * @uses get_template_directory()
 * 
 */
if ( !function_exists ('ka_express_setup')){// load custom styles and fonts
	function ka_express_setup(){
		include( get_template_directory() . '/css/kaex-custom-fonts.php' );
		include( get_template_directory() . '/css/kaex-custom-styles.php' );
	 }
	add_action( 'wp_print_styles', 'ka_express_setup' );
}


/**
 * This function checks for IE browser and loads HTML5 shiv if present
 * 
 * The shiv is a piece of JavaScript, originally developed 
 * by John Resig, can magically make the new HTML5 elements 
 * visible to older versions of IE.
 * 
 */

if ( !function_exists ('ka_express_enqueue_ie_script')){//Script for loading js shiv for ie HTML5
	function ka_express_enqueue_ie_script() {
		global $is_IE;
		if ( $is_IE ) {
			wp_register_script( 'ie_html5_shiv', get_template_directory_uri().'/js/html5.js', array( 'jquery' ), '');
			wp_enqueue_script('ie_html5_shiv');
		}
	}
	add_action('wp_enqueue_scripts', 'ka_express_enqueue_ie_script');
}

/**
 * This function returns the page title for the title tags in the html header.
 * It returns home if it is the home page and the page title otherwise.
 * Then it adds the blog name on the right hand side.
 * WordPress functions - see codex
 * @uses is_front_page() @uses get_bloginfo()
 * 
 * @return string string for header title tag
 */
if ( !function_exists ('ka_express_title_filter')){
	function ka_express_title_filter($title) {
		if(is_front_page()) {
			$return = 'home | '.get_bloginfo( 'name' );
		} else {
			$return = $title.' | '.get_bloginfo( 'name' );
		}
		
	    return $return;
	}
	add_filter( 'wp_title', 'ka_express_title_filter', 10, 3 );
}
  
/*
********* Set up Menu in Dashboard under Appearance **************
*/
function ka_express_register_menu() {
	register_nav_menu('primary-nav','Primary Menu');
}
add_action( 'init', 'ka_express_register_menu' );

/**
 * Theme Support Functions
 * 
 * This function adds all theme support functions on the after_setup_theme hook
 * See the WordPress Codex for each support
 * 
 */
 if( !function_exists ('ka_express_theme_supports')){
 	function ka_express_theme_supports () {
 		/* ----------- post formats -------------------- */
 		// ADD POST FORMATS
 		//add_theme_support( 'structured-post-formats', array('audio', 'video' ) );
		add_theme_support( 'post-formats', array( 'aside', 'audio','chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
		/* ------------editor-style -------------------- */
 		add_editor_style();
		//Custom Backgrounds 
		add_theme_support('custom-background');
		//custom header
		$kaex_header_args = array(
			'flex-width' => true,
			'width' => 960,
			'flex-height' => true,
			'height' => 320,
			'header-text' => false,
			'default-image' => '',//get_template_directory_uri().'/images/Expressions_logo.png',
			'uploads' => true,
		);
		add_theme_support('custom-header',$kaex_header_args);
		//feeds
		add_theme_support('automatic-feed-links');
		//thumbnails
		add_theme_support('post-thumbnails');
		add_image_size('wide_thumbnail',180,120);
		set_post_thumbnail_size( 960, 9999 );
		//enable translation
   		load_theme_textdomain('ka_express', get_template_directory() . '/languages'); 
 	}
 }
add_action('after_setup_theme','ka_express_theme_supports');

/**
 * Register Side bars
 * Thans to Justin Tadlock for the post on sidebars 
 * @link http://justintadlock.com/archives/2010/11/08/sidebars-in-wordpress
 */

if (!function_exists ( 'ka_express_register_sidebars' )) {
	function ka_express_register_sidebars() {
	// Sidebars and footer areas
    register_sidebar(array(
    					'id' => 'kaex_default_sidebar',
    					'name'=>'Sidebar-default',
    					'description' => __( 'Used for the blog', 'ka_express' ),
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h3 class="widget-title">',
						'after_title' => '</h3>'
						)
					);
	register_sidebar(array(
						'id' => 'kaex_right_header_sidebar',
						'name'=>'Right Header Area',
						'description' => __( 'Placed in upper right hand corner of header', 'ka_express' ),
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h3 class="widget-title">',
						'after_title' => '</h3>'
						)
					);
	register_sidebar(array(
						'id' => 'kaex_left_header_sidebar',
						'name'=>'Left Header Area',
						'description' => __( 'Placed in upper left hand corner of header', 'ka_express' ),
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h3 class="widget-title">',
						'after_title' => '</h3>'
						)
					);
	register_sidebar(array(
						'id' => 'kaex_feature_sidebar',
						'name'=>'Feature',
						'description' => __( 'Used in Feature Area', 'ka_express' ),
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h3 class="widget-title">',
						'after_title' => '</h3>'
						)
					);					
	register_sidebar(array(
						'id' => 'kaex_404_sidebar',
						'name'=>'Sidebar-404',
						'description' => __( 'Use this for your 404 page', 'ka_express' ),
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h3 class="widget-title">',
						'after_title' => '</h3>'
						)
					);
	register_sidebar(array(
						'id' => 'kaex_contact_sidebar',
						'name'=>'Sidebar-contact',
						'description' => __( 'Use this for your Contact page', 'ka_express' ),
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h3 class="widget-title">',
						'after_title' => '</h3>'
						)
					);
	register_sidebar(array(
						'id' => 'kaex_about_sidebar',
						'name'=>'Sidebar-about',
						'description' => __( 'Use this for your About page', 'ka_express' ),
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h3 class="widget-title">',
						'after_title' => '</h3>'
						)
					);				
	register_sidebar(array(
						'id' => 'kaex_blog_sidebar',
						'name'=>'Sidebar-blog',
						'description' => __( 'Used for your home-blog template page', 'ka_express' ),
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h3 class="widget-title">',
						'after_title' => '</h3>'
						)
					);
	register_sidebar(array(
						'id' => 'kaex_footer_a_sidebar',
						'name'=>'Footer-A',
						'description' => __( 'First column in footer', 'ka_express' ),
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h3 class="widget-title">',
						'after_title' => '</h3>'
						)
					);
	register_sidebar(array(
						'id' => 'kaex_footer_b_sidebar',
						'name'=>'Footer-B',
						'description' => __( 'Second column in footer', 'ka_express' ),
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h3 class="widget-title">',
						'after_title' => '</h3>'
						)
					);	
	register_sidebar(array(
						'id' => 'kaex_footer_c_sidebar',
						'name'=>'Footer-C',
						'description' => __( 'Third column in footer', 'ka_express' ),
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h3 class="widget-title">',
						'after_title' => '</h3>'
						)
					);	
	register_sidebar(array(
						'id' => 'kaex_footer_d_sidebar',
						'name'=>'Footer-D',
						'description' => __( 'Fourth column in footer', 'ka_express' ),
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h3 class="widget-title">',
						'after_title' => '</h3>'
						)
					);						
	register_sidebar(array(
						'id' => 'kaex_sidebar_1',
						'name'=>'Sidebar-sidebar_1',
						'description' => __( 'Use for your custom pages', 'ka_express' ),
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h3 class="widget-title">',
						'after_title' => '</h3>'
						)
					);
	register_sidebar(array(
						'id' => 'kaex_sidebar_2',
						'name'=>'Sidebar-sidebar_2',
						'description' => __( 'Use for your custom pages', 'ka_express' ),
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h3 class="widget-title">',
						'after_title' => '</h3>'
						)
					);
	register_sidebar(array(
						'id' => 'kaex_sidebar_3',
						'name'=>'Sidebar-sidebar_3',
						'description' => __( 'Use for your custom pages', 'ka_express' ),
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h3 class="widget-title">',
						'after_title' => '</h3>'
						)
					);
	register_sidebar(array(
						'id' => 'kaex_sidebar_4',
						'name'=>'Sidebar-sidebar_4',
						'description' => __( 'Use for your custom pages', 'ka_express' ),
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h3 class="widget-title">',
						'after_title' => '</h3>'
						)
					);
	register_sidebar(array(
						'id' => 'kaex_sidebar_5',
						'name'=>'Sidebar-sidebar_5',
						'description' => __( 'Use for your custom pages', 'ka_express' ),
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h3 class="widget-title">',
						'after_title' => '</h3>'
						)
					);
	register_sidebar(array(
						'id' => 'kaex_sidebar_6',
						'name'=>'Sidebar-sidebar_6',
						'description' => __( 'Use for your custom pages', 'ka_express' ),
						'before_widget' => '<div id="%1$s" class="widget %2$s">',
						'after_widget' => '</div>',
						'before_title' => '<h3 class="widget-title">',
						'after_title' => '</h3>'
						)
					);
	}
	add_action( 'widgets_init', 'ka_express_register_sidebars' );
}


/* ========================================================================================================
 *              Comments and Pingbacks
 * ======================================================================================================== */
/**
 * Javascript setup for threaded comments
 */
if ( !function_exists ('ka_express_enqueue_comment_reply_script')){
	function ka_express_enqueue_comment_reply_script() {
		if (is_singular() && comments_open() && (get_option('thread_comments') == 1)) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'ka_express_enqueue_comment_reply_script' );
}
/**
 * Clean Pings and Trackbacks
 * From Digging into WordPress 4.4 page 230
 */
if ( !function_exists ('ka_express_cleanPings')){// clean pingbacks and trackbacks
	function ka_express_cleanPings($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		echo '<li>';
		echo comment_author_link().'&nbsp;&nbsp;';
		edit_comment_link('Edit');
		echo '</li>';
	}
}

/**
 * Custom Comments Display
 * @link http://codex.wordpress.org/Function_Reference/wp_list_comments
 * 
 * 
 */
if (!function_exists ('ka_express_comment')){
	function ka_express_comment($comment, $args, $depth) {
			$GLOBALS['comment'] = $comment;
			extract($args, EXTR_SKIP);
	
			if ( 'div' == $args['style'] ) {
				$tag = 'div';
				$add_below = 'comment';
			} else {
				$tag = 'li';
				$add_below = 'div-comment';
			}
	?>
			<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
			<?php if ( 'div' != $args['style'] ) : ?>
				<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
			<?php endif; ?>
			
			<div class="comment-author vcard">
				<?php
					$has_valid_avatar = ka_express_validate_gravatar(get_comment_author_email($comment->comment_ID));
					If ( $has_valid_avatar == 1 ) {
				 		if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); 
					}	
				 ?>
				<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author()) ?>
			</div>
			<?php if ($comment->comment_approved == '0') : ?>
				<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.','ka_express') ?></em>
				<br />
			<?php endif; ?>
	
			<?php comment_text() ?>
			
			<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
				<?php
					/* translators: 1: date, 2: time */
					printf( __('%1$s at %2$s','ka_express'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)','ka_express'),'  ','' );
				?>
			</div>
			<br/>
			<div class="reply">
			<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</div>
			<?php if ( 'div' != $args['style'] ) : ?>
			</div>
			<?php endif; ?>
	<?php
	        }
}

/**
 * This function was taken from http://codex.wordpress.org/Using_Gravatars
 * It checks the gravatar site for a valid gravatar for the email supplied and 
 * returns a boolean true or false
 */
if (!function_exists ('ka_express_validate_gravatar')){
	function ka_express_validate_gravatar($email) {
		// Craft a potential url and test its headers
		$hash = md5(strtolower(trim($email)));
		$uri = 'http://www.gravatar.com/avatar/' . $hash . '?d=404';
		$headers = @get_headers($uri);
		if (!preg_match("|200|", $headers[0])) {
			$has_valid_avatar = FALSE;
		} else {
			$has_valid_avatar = TRUE;
		}
		return $has_valid_avatar;
	}
}

/* ========================================================================================================
 *              Captcha
 * ======================================================================================================== */
/**
 * ------------------- Comment Captcha ------------------------- 
 * 
 * Modified code from Chip Bennet's post 
 *  at http://www.chipbennett.net/2010/07/29/using-really-simple-captcha-plugin-for-comments/
 * Captcha from Book "Headfirst PHP & MYSQL"
 * 
 * -------------Add Captcha to comment form -------------------*/
if ( !function_exists ('ka_express_comment_captcha')){//add comment captcha 
	function ka_express_comment_captcha () { 
		global $kaex_options;
		$kaex_options = ka_express_get_options();
		if (!is_user_logged_in() && $kaex_options['kaex_show_comment_captcha'] == 1) { ?>
		 	<p class="comment-form-captcha">
		 	<label><?php _e('Verification *','ka_express'); ?> </label>
			<input type="text" id="comment_captcha_response" name="comment_captcha_response" value="<?php _e('Enter Captcha','ka_express'); ?>" onclick="this.select();" />
			
			<?php if ( $kaex_options['kaex_use_color_captcha'] == 1 ) { ?>
				<img src="<?php echo get_template_directory_uri(); ?>/captcha/kaex_captcha_color.php" alt="Verification Captcha" />
			<?php } else { ?>
				<img src="<?php echo get_template_directory_uri(); ?>/captcha/kaex_captcha_bw.php" alt="Verification Captcha" />
			<?php } ?>
			
			</p>
		<?php }
	}
}
add_action( 'comment_form_after_fields' , 'ka_express_comment_captcha' );

if ( !function_exists ('ka_express_check_comment_captcha')) {//Validate Captcha Entry
	function ka_express_check_comment_captcha( $comment_data  ) { 
		global $kaex_options;
		$kaex_options = ka_express_get_options();
		if ( ( !is_user_logged_in() ) && ($comment_data['comment_type'] == '') && $kaex_options['kaex_show_comment_captcha'] == 1) {
				if(!isset($_SESSION)) session_start();
				// This variable will hold the result of the CAPTCHA validation. Set to 'false' until CAPTCHA validation passes	
				$ka_express_comment_captcha_correct = false; 		
				// Validate the CAPTCHA response
				if ($_SESSION['kaex_pass_phrase'] == SHA1($_POST['comment_captcha_response'])){
					$ka_express_comment_captcha_correct = true; 
				}	
				// If CAPTCHA validation fails (incorrect value entered in CAPTCHA field) don't process the comment.
				if ( $ka_express_comment_captcha_correct == false ) { ?>
					
					<?php if ( $kaex_options['kaex_use_color_captcha'] == 1 ) { ?>
						<img style="visibility:hidden;" src="<?php echo get_template_directory_uri(); ?>/captcha/kaex_captcha_color.php" alt="Verification Captcha" />
					<?php } else { ?>
						<img style="visibility:hidden;" src="<?php echo get_template_directory_uri(); ?>/captcha/kaex_captcha_bw.php" alt="Verification Captcha" />
					<?php } ?>
					
					<?php wp_die(__('You have entered an incorrect CAPTCHA value. Click the BACK button on your browser, and try again.','ka_express'));
					break;
				} 
				// if CAPTCHA validation passes (correct value entered in CAPTCHA field), process the comment as per normal
				session_destroy();
				return $comment_data;
		} else {
			return $comment_data;
		}
	}
}
add_filter('preprocess_comment', 'ka_express_check_comment_captcha');