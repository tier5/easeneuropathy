<?php
/**
 * Custom functions file
 * 
 * This file contains custom functions for the theme
 * 
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
?>
<?php

global $kaex_options;
$kaex_options = ka_express_get_options(); 
/**
 * Header Function
 * 
 * ka_express_header is the functioned called by header.php and is used to 
 * set up the header for the website.
 * 
 * @uses ka_express_show_logo() in this file
 * 
 * WordPress functions - see codex :
 * @uses home_url() @uses bloginfo('name') @uses bloginfo('description')
 * @uses dynamic_sidebar() @uses get_header_image() @uses site_url()
 * @uses get_custom_header()
 * 
 */
if( !function_exists( 'ka_express_header' ) ) {
	function ka_express_header(){
		global $kaex_options;
		$showlogo = $kaex_options['kaex_show_logo'];
		$showtitle = $kaex_options['kaex_show_blog_title'];
		$showtagline = $kaex_options['kaex_show_blog_description'];
		$centered = $kaex_options['kaex_center_logo'];
		
			if ( $showlogo == true && $centered == true && $showtitle == true && $showtagline == true ) {
				?>
					<br/>
					<div class="header-image-center" ><?php ka_express_show_logo(); ?></div>
					<div class="blog-title-center"><h1><a href="<?php echo esc_url(home_url()); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1></div>
					<div class="blog-description-center"><?php bloginfo('description'); ?></div>
					<div class="clearfix"></div><br/>
				<?php
			} elseif ( $showlogo == true && $centered == true && $showtitle == true && $showtagline == false ) {
				?>
					<br/>
					<div class="header-image-center" >	<?php ka_express_show_logo(); ?></div>
					<div class="blog-title-center"><h1><a href="<?php echo esc_url(home_url()); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1></div>
					<div class="clearfix"></div><br/>
				<?php
			} elseif ( $showlogo == true && $centered == true && $showtitle == false && $showtagline == true ) {
				?>
					<br/>
					<div class="header-image-center" >	<?php ka_express_show_logo(); ?></div> 
					<div class="blog-description-center"><?php bloginfo('description'); ?></div>
					<div class="clearfix"></div><br/>
				<?php
			} elseif ( $showlogo == true && $centered == true && $showtitle == false && $showtagline == false ) { 
				?>
					<br/>
					<div class="header-image-center" >	<?php ka_express_show_logo(); ?></div>
					<div class="clearfix"></div>
				<?php
			} elseif ( $showlogo == true && $centered == false && $showtitle == true && $showtagline == true ) {
				?>
					<div class="header-image-left" ><?php ka_express_show_logo(); ?></div>
					<div class="blog-title-center-2">
						<h1><a href="<?php echo esc_url(home_url()); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
						<span class="blog-description-center-2"><?php bloginfo('description'); ?></span>
					</div>
					<div class="clearfix"></div>
				<?php
			} elseif ( $showlogo == true && $centered == false && $showtitle == true && $showtagline == false ) { 
				?>
					<div class="header-image-left" ><?php ka_express_show_logo(); ?></div>
					<div class="blog-title-center-2"><h1><a href="<?php echo esc_url(home_url()); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1></div>
					<div class="clearfix"></div>
				<?php
			} elseif ( $showlogo == true && $centered == false && $showtitle == false && $showtagline == false ) {
				?>
					<div class="header-image-left" ><?php ka_express_show_logo(); ?></div>
				<?php
			} elseif ( $showlogo == true && $centered == false && $showtitle == false && $showtagline == true ) {
				?>
					<div class="header-image-left" ><?php ka_express_show_logo(); ?></div>
					<div class="blog-title-center-2"><h4>&nbsp;</h4><span class="blog-description-center-2"><?php bloginfo('description'); ?></span></div>
				<?php			
			} elseif ( $showlogo == false && $showtitle == true && $showtagline == false ) {
				?>
				<br/>
				<div class="blog-title-center">
					<h1><a href="<?php echo esc_url(home_url()); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
					</div>
				<div class="clearfix"></div><br/>
				<?php
			} elseif ( $showlogo == false && $showtitle == false && $showtagline == true ) {
				?>
				<br/>
				<div class="blog-description-center"><h3><?php bloginfo('description'); ?></h3></div>
				<div class="clearfix"></div><br/>
				<?php
			} elseif ( $showlogo == false && $showtitle == true && $showtagline == true ) { 
				?>
				<br/>
				<div class="blog-title-center"><h1><a href="<?php echo esc_url(home_url()); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1></div>
				<div class="blog-description-center"><?php bloginfo('description'); ?></div>
				<div class="clearfix"></div><br/>	
				<?php
			} elseif ( $showlogo == false && $showtitle == false && $showtagline == false ) { //default : $showlogo == false && $showtitle == true && $showtagline == true
				?>
				<div class="header-widget-left">
					<?php if ( !dynamic_sidebar('Left Header Area') ) : ?>
									
					<?php endif; ?>
				</div>
				<div class="full-header-image" >
					<?php
					$header_image = get_header_image();
					If ( $header_image ) { ?>
						<a href="<?php echo esc_url(site_url()); ?>/">
							<img class="logo" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="logo" />
						</a> 
					<?php } ?>
				</div>
				<?php
			}
	}
}

/**
 * Get Logo and show
 * 
 * This function is called by ka_express_header().
 * It checks to see if there is a header image from Appearance => Header if there it loads it.
 * If blank then a default is loaded. It was handled this way because in the custom header controls 
 * inputting a default is done at default height and width which in the case of variable height and width
 * set up, is the max height and width. Not good when your default height and width is different.
 * 
 * WordPress Functions used - see WordPress Codex
 * @uses  get_header_image() @uses site_url() @uses header_image()
 * @uses get_custom_header() @uses get_template_directory_uri()
 * 
 */
if( !function_exists( 'ka_express_show_logo' ) ) {
	function ka_express_show_logo() {
		$header_image = get_header_image();
		If ( $header_image ) { ?>
			<a href="<?php echo esc_url(home_url()); ?>/">
				<img class="logo" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="logo" />
			</a>
		<?php } else { ?>
			<a href="<?php echo esc_url(home_url()); ?>/">
				<img class="logo" src="<?php echo get_template_directory_uri().'/images/Expressions_logo.png'; ?>" height="70" width="270" alt="logo" />
			</a>
		<?php }
	}
}

/**
 * Header Menu Function
 * 
 * This function sets up the menu for the header. The menu can be set up left, right, 
 * or centered with and without a border
 * 
 * WordPress Functions - See the Codex
 * @uses has_nav_menu() @uses wp_nav_menu()
 */
 
if( !function_exists( 'ka_express_header_menu' ) ) {
	function ka_express_header_menu() {
		global $kaex_options;
		if ( $kaex_options['kaex_menu_loc'] == 'right' ) {
			if(has_nav_menu('primary-nav')){
				wp_nav_menu(
					array(
						'theme_location' => 'primary-nav',
						'container_class' => 'main-nav',
						'container_id' => 'main-menu-right-noborder',
						'menu_class' => 'sf-menu',
						'menu_id' => 'main_menu_ul',
						'fallback_cb' => 'wp_page_menu'
					)
				);
			}
		} else if ( $kaex_options['kaex_menu_loc'] == 'left' ) {
			if(has_nav_menu('primary-nav')){
				wp_nav_menu(
					array(
						'theme_location' => 'primary-nav',
						'container_class' => 'main-nav',
						'container_id' => 'main-menu-left-noborder',
						'menu_class' => 'sf-menu',
						'menu_id' => 'main_menu_ul',
						'fallback_cb' => 'wp_page_menu'
					)
				);
			}			
		} else {
			If ( $kaex_options['kaex_menu_border'] == 'menu only' ) {
				if(has_nav_menu('primary-nav')){
					wp_nav_menu(
						array(
							'theme_location' => 'primary-nav',
							'container_class' => 'main-nav',
							'container_id' => 'main-menu-center-border',
							'menu_class' => 'sf-menu',
							'menu_id' => 'main_menu_ul',
							'fallback_cb' => 'wp_page_menu'
						)
					);
				}
			} else {
				if(has_nav_menu('primary-nav')){
					wp_nav_menu(
						array(
							'theme_location' => 'primary-nav',
							'container_class' => 'main-nav',
							'container_id' => 'main-menu-center-noborder',
							'menu_class' => 'sf-menu',
							'menu_id' => 'main_menu_ul',
							'fallback_cb' => 'wp_page_menu'
						)
					);
				}	
			}
		}
		
					
	}
}

/* ==============================================================================================
 *                        Filters
 * ============================================================================================== */

/**
 * Dynamic Excerpt Function
 * 
 * modified from @link http://wordpress.org/support/topic/dynamic-the_excerpt?replies=22 
 * This function filters the content to the passed character length from where it was called.
 * It then returns the string with a post link so the user can click the link to go to the post
 * 
 * @param int $length length to filter to in characters, passed from function call
 * WordPress Functions - see Codex
 * @uses get_the_content() @uses apply_filters() @uses strip_shortcodes()
 * @uses get_permalink()
 * 
 */
if ( !function_exists ('ka_express_the_excerpt_dynamic')){// Outputs an excerpt of variable length (in characters)
	function ka_express_the_excerpt_dynamic($length) { 
		
		global $post;
		$text = $post->post_excerpt;
		if ( '' == $text ) {
			$text = get_the_content();
			$text = apply_filters('the_content', $text);
			$text = str_replace(']]>', ']]&gt;', $text);
		}
		$text = strip_shortcodes($text);
		$text = strip_tags($text,'<p></p><i></i><ol></ol><ul></ul><br/><li></li>');
		
		$output = strlen($text);
		if($output > $length ) {
			$break_pos = strpos($text, ' ', $length);//find next space after desired length
			if($break_pos == '')$break_pos = $length;
			$text = substr($text,0,$break_pos);
			$text = force_balance_tags($text);
			$text = $text.' <a href="'. get_permalink($post->ID) . '" > [...]</a>';
		}
	
		echo apply_filters('the_excerpt',$text);
	}
}

/**
 * Portfolio Title Filter
 * 
 * function to limit characters in portfolio titles
 * @param string $content text to be filtered
 * @param int $limit length in caracters to filter to
 * 
 */
if ( !function_exists ('ka_express_portfolio_titles')){
	function ka_express_portfolio_titles($content,$limit){
		$content = strip_tags($content);
		if(strlen($content) > $limit){
			$visible = substr($content, 0, $limit);
			$visible = $visible.'&nbsp;...';
		} else {
			$visible = $content;
		}
		echo strip_tags(apply_filters('the_excerpt',$visible));
	}
}

/**
 * Portfolio Feature Description Filter
 * 
 * function to limit characters in portfolio titles
 * @param string $content text to be filtered
 * @param int $limit length in caracters to filter to
 * 
 */
if ( !function_exists ('ka_express_portfolio_feature_description')){
	function ka_express_portfolio_feature_description($content,$limit){
		global $post;
		$content = do_shortcode($content);
		$content = strip_tags($content,'<p></p><i></i><ol></ol><ul></ul><br/><li></li>');
		if(strlen($content) > $limit){
			$break_pos = strpos($content, ' ', $limit);//find next space after desired length
			if($break_pos == '')$break_pos = $limit;
			$visible = substr($content, 0, $break_pos);
			$visible = force_balance_tags($visible);
			$visible = $visible.wp_get_attachment_link( get_post_thumbnail_id($post->ID),'',true,false,'[...]' );
		} else {
			$visible = $content;
		}
		echo apply_filters('the_content',$visible);
	}
}
 	
/**
 * --------------------HTML Validation Filters ------------------------
 *  
 * the rel tag does not validate it says it does not like the term category
 * Discussion at wordpess.org suggests it is an HTML/W#C issue.Browsers do 
 * not use this attribute in any way. However, search engines can use this 
 * attribute to get more information about a link.
 * 
 * This filter simply searches the content for the rel tag and replaces "category tag"
 *  with "tag"
 * 
 */
if ( !function_exists ('ka_express_html5_fix_the_category')){//rel tag validation fix
	function ka_express_html5_fix_the_category($content) { 
		$pattern = '/rel="category tag"/';
		$replacement = 'rel="tag"';
		$content = preg_replace($pattern, $replacement, $content);
		return $content;
	}
	add_filter('the_category','ka_express_html5_fix_the_category');
}

/**
 * wpautop filter fix 
 *
 * Description: Fix issues when shortcodes are embedded in a block of content that is filtered by wpautop.
 * Author URI: http://www.johannheyne.de
 * 
 */

if ( !function_exists ('ka_express_shortcode_paragraph_insertion_fix')){//Empty Paragraph Fix
	function ka_express_shortcode_paragraph_insertion_fix($content) { 
	    $array = array (
	        '<p>[' => '[', 
	        ']</p>' => ']', 
	        ']<br />' => ']',
	        ']<br/>' => ']',
	        '<p></p>' => ''
	    );
	    $content = strtr($content, $array);
	    return $content;
	}
	add_filter('the_content', 'ka_express_shortcode_paragraph_insertion_fix'); 
}

/**
 * Custom WordPress Gallery code
 * 
 * Remove WordPress gallery shortcode and add our own. The purpose is to remove the css from
 * being injected into the post, and to fix the dd error.
 * Basis is from @link http://wpengineer.com/1802/a-solution-for-the-wordpress-gallery/
 * 
 * Note : This is not set up as a conditional load because it will not work. Therefore you can't 
 * modify this function in a child theme
 * 
 */
//deactivate WordPress function
remove_shortcode('gallery', 'gallery_shortcode');
//activate own function
add_shortcode('gallery', 'ka_express_gallery_shortcode');
//the own renamed function
function ka_express_gallery_shortcode($attr) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) )
			$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$columns = intval($columns);
	//$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$output = apply_filters('gallery_style', "<div id='$selector' class='gallery galleryid-{$id}'>");
	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

		$output .= "<{$itemtag} class='gallery-item col-{$columns}'>";
		$output .= "
			<{$icontag} class='gallery-icon'>
				$link
			</{$icontag}>";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<{$captiontag} class='wp-caption-text gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</{$captiontag}>";
		} else {
			$output .= "
				<{$captiontag} class='wp-caption-text gallery-caption'>
				
				</{$captiontag}>";
		}
		$output .= "</{$itemtag}>";
		if ( $columns > 0 && ++$i % $columns == 0 )
			$output .= '<br/>';
	}

	$output .= "</div>\n";

	return $output;
}

/*                 Static Home Page Functions
 * ========================================================================================= */

/**
 * Home Page Area Selection Helper
 * 
 * This function is called by template-home.php and is used to set up 
 * the area variables on the the home page
*/ 
 
 if ( !function_exists ('ka_express_home_area_selection')){
	function ka_express_home_area_selection($area_select) {
				
		if( $area_select == 'Section 1 - one column and button' ){
			$area_select = 'one';
		} elseif( $area_select == 'Section 2 - three column service box' ){
			$area_select = 'two';
		} elseif( $area_select == 'Section 3 - one column and button' ){
			$area_select = 'three';
		} elseif( $area_select == 'Section 4 - two column service box' ){
			$area_select = 'four';
		} elseif( $area_select == 'Section 5 - one column and button' ){
			$area_select = 'five';
		} elseif( $area_select == 'Section 6 - two column service box' ){
			$area_select = 'six';
		} elseif( $area_select == 'Section 7 - one column and button' ){
			$area_select = 'seven';
		} elseif( $area_select == 'Section 8 - four column service box' ){
			$area_select = 'eight';
		} else {
			$area_select = 'none';
		}

		return $area_select;
		
	}
}
 
/**
 * Home Page Slider Options
 * 
 * This function is called by template-home.php and is used to set up 
 * the feature section of the home page
 * 
 */
if ( !function_exists ('ka_express_home_feature_options')){
	function ka_express_home_feature_options($feature_option,$feature_category) {

		$category_ID = get_cat_ID($feature_category);
		echo '<div class="feature">';
			echo '<div class="feature-wrap">';
				if ( $feature_option == 'Full slides button navigation') {
					ka_express_display_feature_full_or_half('full',$category_ID);
				} elseif ( $feature_option == 'Full slides thumbnail navigation') {
					ka_express_display_feature_full_or_half('full-thumb',$category_ID);
				} elseif ( $feature_option == 'Full slides no navigation') {
					ka_express_display_feature_full_or_half('full-nonav',$category_ID);	
				} elseif ( $feature_option == 'Small slides button navigation' ) {
					ka_express_display_feature_full_or_half('half',$category_ID);
				} elseif ( $feature_option == 'Small slides thumbnail navigation' ) {
					ka_express_display_feature_full_or_half('half-thumb',$category_ID);
				} elseif ( $feature_option == 'Small slides no navigation' ) {
					ka_express_display_feature_full_or_half('half-nonav',$category_ID);		
				} elseif ( $feature_option == 'Center slides button navigation' ) {
					ka_express_display_center_slider('center',$category_ID);
				} elseif ( $feature_option == 'Center slides thumbnail navigation' ){
					ka_express_display_center_slider('center-thumb',$category_ID);
				} elseif ( $feature_option == 'Center slides no navigation' ){
					ka_express_display_center_slider('center-nonav',$category_ID);
				} elseif ( $feature_option == 'Mosaic with 4 images' ){
					ka_express_display_feature_mosaic($category_ID,4);
				} elseif ( $feature_option == 'Mosaic with 6 images' ){
					ka_express_display_feature_mosaic($category_ID,6);
				} elseif ( $feature_option == 'Mosaic with 9 images' ){
					ka_express_display_feature_mosaic($category_ID,9);
				} elseif ( $feature_option == 'Single Image - Center' ){
					ka_express_display_single_image('center',$category_ID);
				} elseif ( $feature_option == 'Single Image - Small' ){
					ka_express_display_single_image('small',$category_ID);
				} elseif ( $feature_option == 'Single Image - Full' ){
					ka_express_display_single_image('full',$category_ID);
				}
			echo '</div>';
		echo '</div>';
	} 
}

/**
 * Home Page Slider Options
 * 
 * This function is called by ka_express_home_feature_options() and is used to set up 
 * the feature section for full and half single images
 * 
 */
if ( !function_exists ('ka_express_display_single_image')){
	function ka_express_display_single_image($feature_option,$category_ID) {
		global $post;	
		$args = array('category'=>$category_ID,'numberposts'=>1);
		$custom_posts = get_posts($args);
		
		if ($category_ID !== 0 && $custom_posts){
			$post = $custom_posts[0];
			$exclude_feature_link = get_post_meta($post->ID,'kaex_metabox_exclude_feature_link',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_exclude_feature_link',true);
			$custom_feature_link = get_post_meta($post->ID,'kaex_custom_feature_link',true) == ''? false : get_post_meta($post->ID,'kaex_custom_feature_link',true);
			$include_feature_title = get_post_meta($post->ID,'kaex_metabox_include_feature_title',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_include_feature_title',true); 
		} else {
			echo '<div class="error">'._e('You have not set up your Feature posts so I can not find any images - see user documentation.','ka_express').'</div>';
			return;
		}

		if( $feature_option == 'small' ) {
			echo '<div class="single-small">';
		} elseif( $feature_option == 'center' ) {
			echo '<div class="left-feature">';
				$image_caption = get_post(get_post_thumbnail_id($post->ID))->post_excerpt;
				$image_description = get_post(get_post_thumbnail_id($post->ID))->post_content;
				if ( $image_caption != '' || $image_description != '' ) {
						echo '<h2>'.$image_caption.'</h2>';
						echo '<p>'.$image_description.'</p>';
				}
			echo '</div>';
			echo '<div class="single-center">';
		} elseif( $feature_option == 'full' ) {
			echo '<div class="single-full">';
		}
		if (has_post_thumbnail()) {
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full') ;
			$image_url = $thumb[0];
			$title = $include_feature_title == false? get_post(get_post_thumbnail_id())->post_excerpt : the_title_attribute('echo=0');
	 		echo '<a href="';
	 		if ( $exclude_feature_link == true ) {
	 			echo '#"';
	 		} elseif ( $custom_feature_link != false ) {
	 			echo $custom_feature_link;echo '"';
	 		} else {
	 			the_permalink(); echo '"';
			}
	 		echo ' title="';the_title_attribute(); echo '" >';
	 		echo '<img src="'.$image_url.'" title="'.$title.'" alt="'.$title.'" />';
			echo '</a>';
			echo '</div>';
		} else {
			echo '<div class="error">';
				echo '<h3>'.__('Error: There were no feature images found?','ka_express').'</h3>';
			echo '</div>';
			return;
		}
		if( $feature_option == 'small' ) {
			echo '<div class="feature-right">';
				if ( !dynamic_sidebar('Feature') ) :
				 	echo __('This is the Feature widget area.','ka_express').'<br/>';
					echo __('Add widgets in Appearance=> Widgets!','ka_express');
				endif;
			echo '</div>';
		}
		if( $feature_option == 'center' ) {
			echo '<div class="feature-right-30">';
				if ( !dynamic_sidebar('Feature') ) :
					echo __('This is the Feature widget area.','ka_express').'<br/>';
					echo __('Add widgets in Appearance=> Widgets!','ka_express');
				endif;
			echo '</div>';
		}	
	}
}

/**
 * Home Page Slider Options
 * 
 * This function is called by ka_express_home_feature_options() and is used to set up 
 * the feature section slider for full and half sliders
 * 
 */
if ( !function_exists ('ka_express_display_feature_full_or_half')){
	function ka_express_display_feature_full_or_half($feature_option,$category_ID) {
		global $post, $kaex_options;
		$kaex_nivo_effect = $kaex_options['kaex_nivo_slider_effect'];
		$kaex_nivo_pause = $kaex_options['kaex_nivo_slider_pause'];
		$kaex_nivo_trans = $kaex_options['kaex_nivo_slider_trans'];
		if( $feature_option == 'full' ) {
			echo '<div class="slider-wrapper theme-default">';
				echo '<div class="ribbon"></div>';
				echo '<div id="full-slider" data-kaex_trans="'.esc_attr( $kaex_nivo_trans ).'" data-kaex_speed="'.esc_attr( $kaex_nivo_pause ).'" data-kaex_effect="'.esc_attr( $kaex_nivo_effect ).'">';
		} elseif ( $feature_option == 'full-thumb' ) {
			echo '<div class="slider-wrapper theme-default">';
				echo '<div class="ribbon"></div>';
				echo '<div id="full-slider-thumb" data-kaex_trans="'.esc_attr( $kaex_nivo_trans ).'" data-kaex_speed="'.esc_attr( $kaex_nivo_pause ).'" data-kaex_effect="'.esc_attr( $kaex_nivo_effect ).'">';	
		} elseif ( $feature_option == 'full-nonav' ) {
			echo '<div class="slider-wrapper theme-default">';
				echo '<div class="ribbon"></div>';
				echo '<div id="full-slider-nonav" data-kaex_trans="'.esc_attr( $kaex_nivo_trans ).'" data-kaex_speed="'.esc_attr( $kaex_nivo_pause ).'" data-kaex_effect="'.esc_attr( $kaex_nivo_effect ).'">';	
		} elseif ( $feature_option == 'half' ) {
			echo '<div class="half-slider-wrapper theme-default">';
				echo '<div class="ribbon"></div>';
				echo '<div id="half-slider" data-kaex_trans="'.esc_attr( $kaex_nivo_trans ).'" data-kaex_speed="'.esc_attr( $kaex_nivo_pause ).'" data-kaex_effect="'.esc_attr( $kaex_nivo_effect ).'">';	
		} elseif ( $feature_option == 'half-thumb' ) {
			echo '<div class="half-slider-wrapper theme-default">';
				echo '<div class="ribbon"></div>';
				echo '<div id="half-slider-thumb" data-kaex_trans="'.esc_attr( $kaex_nivo_trans ).'" data-kaex_speed="'.esc_attr( $kaex_nivo_pause ).'" data-kaex_effect="'.esc_attr( $kaex_nivo_effect ).'">';
		} elseif ( $feature_option == 'half-nonav' ) {
			echo '<div class="half-slider-wrapper theme-default">';
				echo '<div class="ribbon"></div>';
				echo '<div id="half-slider-nonav" data-kaex_trans="'.esc_attr( $kaex_nivo_trans ).'" data-kaex_speed="'.esc_attr( $kaex_nivo_pause ).'" data-kaex_effect="'.esc_attr( $kaex_nivo_effect ).'">';
		}

		$args = array('category'=>$category_ID,'numberposts'=>999);
		$custom_posts = get_posts($args);
		
		if ($category_ID !== 0 && $custom_posts){
			$feature_pic_count = 0;
			foreach($custom_posts as $post) : setup_postdata($post);
				$exclude_feature_link = get_post_meta($post->ID,'kaex_metabox_exclude_feature_link',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_exclude_feature_link',true);
				$custom_feature_link = get_post_meta($post->ID,'kaex_custom_feature_link',true) == ''? false : get_post_meta($post->ID,'kaex_custom_feature_link',true);
				$include_feature_title = get_post_meta($post->ID,'kaex_metabox_include_feature_title',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_include_feature_title',true); 
				if ( has_post_thumbnail() ) {
					$feature_pic_count ++;
					if ($feature_option == 'full-thumb' || $feature_option == 'half-thumb')	{
						$thumb1 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'wide_thumbnail') ;
						$thumb_url = $thumb1[0];
					}
					$thumb2 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full') ;
					$image_url = $thumb2[0];
					$title = $include_feature_title == false? get_post(get_post_thumbnail_id())->post_excerpt : the_title_attribute('echo=0');
			 		echo '<a href="';
			 		if ( $exclude_feature_link == true ) {
			 			echo '#"';
			 		} elseif ( $custom_feature_link != false ) {
			 			echo $custom_feature_link;echo '"';
			 		} else {
			 			the_permalink(); echo '"';
					}
			 		echo ' title="';the_title_attribute(); echo '" >';
			 		if ($feature_option == 'full' || $feature_option == 'half' || $feature_option == 'full-nonav' || $feature_option == 'half-nonav' ) {
			 			echo '<img src="'.$image_url.'" title="'.$title.'" alt="'.$title.'" />';
					} else {
						echo '<img src="'.$image_url.'" title="'.$title.'" alt="'.$title.'" data-thumb="'.$thumb_url.'" />';
					}
					echo '</a>';
				}
			endforeach;
			echo '</div>';
			echo '</div>';
		} else {
			echo '<div class="error">'._e('You have not set up your Feature posts so I can not find any images - see user documentation.','ka_express').'</div>';
		}
		if ($feature_pic_count == 0){
				echo '<div class="error">';
				echo '<h3>'.__('Error: There were no feature images found?','ka_express').'</h3>';
				echo '</div>';
		}
		if( $feature_option == 'half' || $feature_option == 'half-thumb' || $feature_option == 'half-nonav' ) {
				echo '<div class="feature-right">';
					if ( !dynamic_sidebar('Feature') ) :
					 	echo __('This is the Feature widget area.','ka_express').'<br/>';
					 	echo __('Add widgets in Appearance=> Widgets!','ka_express');
					endif;
				echo '</div>';
		}
	}
}

/**
 * Home Page Slider Options
 * 
 * This function is called by ka_express_home_feature_options() and is used to set up 
 * the feature section slider for a center slider, with an active caption on the left 
 * side with a home page widget on the right.
 * 
 */
if ( !function_exists ('ka_express_display_center_slider')){
	function ka_express_display_center_slider($feature_option,$category_ID) {
		global $post, $kaex_options;
		$kaex_nivo_effect = $kaex_options['kaex_nivo_slider_effect'];
		$kaex_nivo_pause = $kaex_options['kaex_nivo_slider_pause'];
		$kaex_nivo_trans = $kaex_options['kaex_nivo_slider_trans'];
		$args = array('category'=>$category_ID,'numberposts'=>999);
		$custom_posts = get_posts($args);
		echo '<div class="left-feature">';
			if ($category_ID !== 0 && $custom_posts){
				foreach($custom_posts as $post) : setup_postdata($post);
					if (has_post_thumbnail()) {
						$image_caption = get_post(get_post_thumbnail_id())->post_excerpt;
						$image_description = get_post(get_post_thumbnail_id())->post_content;
						if ( $image_caption != '' || $image_description != '' ) {
							echo '<div class="nivo-ka-caption ka-image-'.$post->ID.'">';
								echo '<h2>'.$image_caption.'</h2>';
								echo '<p>'.$image_description.'</p>';
							echo '</div>';
						}
					}
				endforeach;
			}
		echo '</div>';
		if( $feature_option == 'center') {
			echo '<div class="center-slider-wrapper theme-default">';
				echo '<div class="ribbon"></div>';
				echo '<div id="center-slider" data-kaex_trans="'.esc_attr( $kaex_nivo_trans ).'" data-kaex_speed="'.esc_attr( $kaex_nivo_pause ).'" data-kaex_effect="'.esc_attr( $kaex_nivo_effect ).'">';
		} elseif ( $feature_option == 'center-thumb' ) {
			echo '<div class="center-slider-wrapper theme-default">';
				echo '<div class="ribbon"></div>';
				echo '<div id="center-slider-thumb" data-kaex_trans="'.esc_attr( $kaex_nivo_trans ).'" data-kaex_speed="'.esc_attr( $kaex_nivo_pause ).'" data-kaex_effect="'.esc_attr( $kaex_nivo_effect ).'">';
		} elseif ( $feature_option == 'center-nonav' ) {
			echo '<div class="center-slider-wrapper theme-default">';
				echo '<div class="ribbon"></div>';
				echo '<div id="center-slider-nonav" data-kaex_trans="'.esc_attr( $kaex_nivo_trans ).'" data-kaex_speed="'.esc_attr( $kaex_nivo_pause ).'" data-kaex_effect="'.esc_attr( $kaex_nivo_effect ).'">';
		}
		if ($category_ID !== 0 && $custom_posts){
			$feature_pic_count = 0;
			foreach($custom_posts as $post) : setup_postdata($post);
				$exclude_feature_link = get_post_meta($post->ID,'kaex_metabox_exclude_feature_link',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_exclude_feature_link',true);
				$custom_feature_link = get_post_meta($post->ID,'kaex_custom_feature_link',true) == ''? false : get_post_meta($post->ID,'kaex_custom_feature_link',true);
				$include_feature_title = get_post_meta($post->ID,'kaex_metabox_include_feature_title',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_include_feature_title',true); 
				if (has_post_thumbnail()) {
					$feature_pic_count++;
					if ($feature_option == 'center-thumb')	{
						$thumb1 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'wide_thumbnail') ;
						$thumb_url = $thumb1[0];
					}
					$thumb2 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'large') ;
					$image_url = $thumb2[0];
					$title2 = the_title_attribute('echo=0');
					$title = $include_feature_title == false? '' : the_title_attribute('echo=0');
					//$title = '#'.$post->ID;
			 		echo '<a href="';
			 		if ( $exclude_feature_link == true ) {
			 			echo '#"';
			 		} elseif ( $custom_feature_link != false ) {
			 			echo $custom_feature_link; echo '"';
			 		} else {
			 			the_permalink(); echo '"';
					}
			 		echo ' title="';the_title_attribute(); echo '" >';
			 		if ( $feature_option == 'center' || $feature_option == 'center-nonav' ) {
			 			echo '<img id="ka-image-'.$post->ID.'" src="'.$image_url.'" title="'.$title.'" alt="'.$title2.'" />';
					} else {
						echo '<img id="ka-image-'.$post->ID.'" src="'.$image_url.'" title="'.$title.'" alt="'.$title2.'" data-thumb="'.$thumb_url.'" />';
					}
					echo '</a>';
				}
			endforeach;
			echo '</div>';
			echo '</div>';
			echo '<div class="feature-right-30">';
				if ( !dynamic_sidebar('Feature') ) :
					echo __('This is the Feature widget area.','ka_express').'<br/>';
					echo __('Add widgets in Appearance=> Widgets!','ka_express');
				endif;
			echo '</div>';
		} else {
			echo '<div class="error">'._e('You have not set up your Feature posts so I can not find any images - see user documentation.','ka_express').'</div>';
		}
		if ($feature_pic_count == 0){
			echo '<div class="error">';
			echo '<h3>'.__('Error: There were no feature images found?','ka_express').'</h3>';
			echo '</div>';
		}
	}
}

/**
 * Home Page Mosaic Option
 * 
 * This function is called by ka_express_home_feature_options() and is used to set up 
 * the feature section for a mosaic presentation.
 * 
 */
if ( !function_exists ('ka_express_display_feature_mosaic')){
	function ka_express_display_feature_mosaic($category_ID,$photo_number) {
		global $post;
		$args = array('category'=>$category_ID,'numberposts'=>999);
		$custom_posts = get_posts($args);
		
		if ($category_ID !== 0 && $custom_posts){
			$feature_pic_count = 0;
			echo '<div class="mosaic">';
				if ( $photo_number == 4 ) {
					$count = 1;
					echo '<div class="mosaic-4-wrap">';
						foreach($custom_posts as $post) : setup_postdata($post);
							if ( $count < 5 ) {
								$exclude_feature_link = get_post_meta($post->ID,'kaex_metabox_exclude_feature_link',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_exclude_feature_link',true);
								$custom_feature_link = get_post_meta($post->ID,'kaex_custom_feature_link',true) == ''? false : get_post_meta($post->ID,'kaex_custom_feature_link',true);
								if (has_post_thumbnail()) {
									$feature_pic_count++;
									$thumb2 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'large') ;
									$image_url = $thumb2[0];
									$title = the_title_attribute('echo=0');
									
					 				if ( $exclude_feature_link == true ) {
					 					echo '<img src="'.$image_url.'" width="400" height="200" title="'.$title.'" alt="'.$title.'" />';
					 				} elseif ( $custom_feature_link != false ) {
					 					echo '<a class="mosaic-4" href="';
					 					echo $custom_feature_link; echo '"';
										echo ' title="'.$title.'" >';
				 						echo '<img src="'.$image_url.'" width="400" height="200" title="'.$title.'" alt="'.$title.'" />';
										echo '</a>';
					 				} else {
					 					echo '<a class="mosaic-4" href="';
					 					the_permalink(); echo '"';
										echo ' title="'.$title.'" >';
				 						echo '<img src="'.$image_url.'" width="400" height="200" title="'.$title.'" alt="'.$title.'" />';
										echo '</a>';
									}		
								}
							}
							$count = $count + 1;
						endforeach;
					echo '</div>';
				} elseif ( $photo_number == 6 ) {
					$count = 1;
					echo '<div class="mosaic-6-wrap">';
						foreach($custom_posts as $post) : setup_postdata($post);
							if ( $count < 7 ) { 
								$exclude_feature_link = get_post_meta($post->ID,'kaex_metabox_exclude_feature_link',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_exclude_feature_link',true);
								$custom_feature_link = get_post_meta($post->ID,'kaex_custom_feature_link',true) == ''? false : get_post_meta($post->ID,'kaex_custom_feature_link',true);
								if (has_post_thumbnail()) {
									$feature_pic_count++;
									$thumb2 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'large') ;
									$image_url = $thumb2[0];
									$title = the_title_attribute('echo=0');
									
					 				if ( $exclude_feature_link == true ) {
					 					echo '<img src="'.$image_url.'" width="300" height="150" title="'.$title.'" alt="'.$title.'" />';
					 				} elseif ( $custom_feature_link != false ) {
					 					echo '<a class="mosaic-6" href="';
					 					echo $custom_feature_link; echo '"';
										echo ' title="'.$title.'" >';
				 						echo '<img src="'.$image_url.'" width="300" height="150" title="'.$title.'" alt="'.$title.'" />';
										echo '</a>';
					 				} else {
					 					echo '<a class="mosaic-6" href="';
					 					the_permalink(); echo '"';
										echo ' title="'.$title.'" >';
				 						echo '<img src="'.$image_url.'" width="300" height="150" title="'.$title.'" alt="'.$title.'" />';
										echo '</a>';
									}
					 											
								}
							}
							$count = $count + 1;					
						endforeach;
					echo'</div>';					
				} else {
					$count = 1;
					echo '<div class="mosaic-9-wrap">';
						echo '<div class="mosaic-9-block-1">';
							foreach($custom_posts as $post) : setup_postdata($post);
							if ( $count == 1 || $count == 2 ) {
								$exclude_feature_link = get_post_meta($post->ID,'kaex_metabox_exclude_feature_link',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_exclude_feature_link',true);
								$custom_feature_link = get_post_meta($post->ID,'kaex_custom_feature_link',true) == ''? false : get_post_meta($post->ID,'kaex_custom_feature_link',true);
								if (has_post_thumbnail()) {
									$feature_pic_count++;
									$thumb2 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'large') ;
									$image_url = $thumb2[0];
									$title = the_title_attribute('echo=0');
										
					 					if ( $exclude_feature_link == true ) {
					 						echo '<img src="'.$image_url.'" width="220" height="110" title="'.$title.'" alt="'.$title.'" />';
					 					} elseif ( $custom_feature_link != false ) {
					 						echo '<a class="mosaic-6" href="';
					 						echo $custom_feature_link; echo '"';
											echo ' title="'.$title.'" >';
				 							echo '<img src="'.$image_url.'" width="220" height="110" title="'.$title.'" alt="'.$title.'" />';
											echo '</a>';
					 					} else {
					 						echo '<a class="mosaic-6" href="';
					 						the_permalink(); echo '"';
											echo ' title="'.$title.'" >';
				 							echo '<img src="'.$image_url.'" width="220" height="110" title="'.$title.'" alt="'.$title.'" />';
											echo '</a>';
										}				 					
									}
								}
								$count = $count + 1;				
							endforeach;
						echo '</div>';
						echo '<div class="mosaic-9-block-2">';
							$count = 1;
							foreach($custom_posts as $post) : setup_postdata($post);
							if ( $count == 3 ) {
								$exclude_feature_link = get_post_meta($post->ID,'kaex_metabox_exclude_feature_link',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_exclude_feature_link',true);
								$custom_feature_link = get_post_meta($post->ID,'kaex_custom_feature_link',true) == ''? false : get_post_meta($post->ID,'kaex_custom_feature_link',true);
								if (has_post_thumbnail()) {
									$feature_pic_count++;
									$thumb2 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'large') ;
									$image_url = $thumb2[0];
									$title = the_title_attribute('echo=0');
										
					 					if ( $exclude_feature_link == true ) {
					 						echo '<img src="'.$image_url.'" width="440" height="220" title="'.$title.'" alt="'.$title.'" />';
					 					} elseif ( $custom_feature_link != false ) {
					 						echo '<a class="mosaic-6" href="';
					 						echo $custom_feature_link; echo '"';
											echo ' title="'.$title.'" >';
				 							echo '<img src="'.$image_url.'" width="440" height="220" title="'.$title.'" alt="'.$title.'" />';
											echo '</a>';
					 					} else {
					 						echo '<a class="mosaic-6" href="';
					 						the_permalink(); echo '"';
											echo ' title="'.$title.'" >';
				 							echo '<img src="'.$image_url.'" width="440" height="220" title="'.$title.'" alt="'.$title.'" />';
											echo '</a>';
										}				 					
									}
								}
								$count = $count + 1;				
							endforeach;
						echo '</div>';
						echo '<div class="mosaic-9-block-3">';
							$count = 1;
							foreach($custom_posts as $post) : setup_postdata($post);
							if ( $count == 4 || $count == 5 ) {
								$exclude_feature_link = get_post_meta($post->ID,'kaex_metabox_exclude_feature_link',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_exclude_feature_link',true);
								$custom_feature_link = get_post_meta($post->ID,'kaex_custom_feature_link',true) == ''? false : get_post_meta($post->ID,'kaex_custom_feature_link',true);
								if (has_post_thumbnail()) {
									$feature_pic_count++;
									$thumb2 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'large') ;
									$image_url = $thumb2[0];
									$title = the_title_attribute('echo=0');
										
					 					if ( $exclude_feature_link == true ) {
					 						echo '<img src="'.$image_url.'" width="220" height="110" title="'.$title.'" alt="'.$title.'" />';
					 					} elseif ( $custom_feature_link != false ) {
					 						echo '<a class="mosaic-6" href="';
					 						echo $custom_feature_link; echo '"';
											echo ' title="'.$title.'" >';
				 							echo '<img src="'.$image_url.'" width="220" height="110" title="'.$title.'" alt="'.$title.'" />';
											echo '</a>';
					 					} else {
					 						echo '<a class="mosaic-6" href="';
					 						the_permalink(); echo '"';
											echo ' title="'.$title.'" >';
				 							echo '<img src="'.$image_url.'" width="220" height="110" title="'.$title.'" alt="'.$title.'" />';
											echo '</a>';
										}				
									}
								}
								$count = $count + 1;				
							endforeach;
						echo '</div>';
						echo '<div class="mosaic-9-block-4">';
							$count = 1;
							foreach($custom_posts as $post) : setup_postdata($post);
							if ( $count == 6 || $count == 7 || $count == 8 || $count == 9 ) {
								$exclude_feature_link = get_post_meta($post->ID,'kaex_metabox_exclude_feature_link',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_exclude_feature_link',true);
								$custom_feature_link = get_post_meta($post->ID,'kaex_custom_feature_link',true) == ''? false : get_post_meta($post->ID,'kaex_custom_feature_link',true);
								if (has_post_thumbnail()) {
									$feature_pic_count++;
									$thumb2 = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'large') ;
									$image_url = $thumb2[0];
									$title = the_title_attribute('echo=0');
										
					 					if ( $exclude_feature_link == true ) {
					 						echo '<img src="'.$image_url.'" width="220" height="110" title="'.$title.'" alt="'.$title.'" />';
					 					} elseif ( $custom_feature_link != false ) {
					 						echo '<a class="mosaic-6" href="';
					 						echo $custom_feature_link; echo '"';
											echo ' title="'.$title.'" >';
				 							echo '<img src="'.$image_url.'" width="220" height="110" title="'.$title.'" alt="'.$title.'" />';
											echo '</a>';
					 					} else {
					 						echo '<a class="mosaic-6" href="';
					 						the_permalink(); echo '"';
											echo ' title="'.$title.'" >';
				 							echo '<img src="'.$image_url.'" width="220" height="110" title="'.$title.'" alt="'.$title.'" />';
											echo '</a>';
										}	
									}
								}
								$count = $count + 1;				
							endforeach;
						echo '</div>';
					echo '</div>';					
				}
		echo '</div>';
		} else {
			echo '<div class="error">'._e('You have not set up your Feature posts so I can not find any images - see user documentation.','ka_express').'</div>';
		}
		if ($feature_pic_count == 0){
			echo '<div class="error">';
			echo '<h3>'.__('Error: There were no feature images found?','ka_express').'</h3>';
			echo '</div>';
		}		
	}
}

/**
 * Home Page Section Options
 * 
 * This function is called by template-home.php and is used to set up 
 * the optional sections for the static home page
 * 
 */
if ( !function_exists ('ka_express_home_page_sections')) {
	function ka_express_home_page_sections() {
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
		if ( $kaex_options['kaex_section2_onoroff'] == true ) { ?>
			<div class="clearfix"></div>
			<div class="home-section-2-wrap">
				<div class="servicebox-type-A">
					<?php if( esc_url($kaex_options['kaex_service1_image'] !== "")) echo '<img class="servicebox" src="'.esc_url($kaex_options['kaex_service1_image']).'" alt="Service 1 Image" />'; ?>
					<?php if( esc_attr(stripslashes($kaex_options['kaex_service1_title'] !== "" ))) echo '<h4>'.sanitize_text_field(stripslashes($kaex_options['kaex_service1_title'])).'</h4>'; ?>
					<?php if( wp_kses_post(stripslashes($kaex_options['kaex_service1_text'] !== "" ))) echo '<p>'.wp_kses_post(stripslashes($kaex_options['kaex_service1_text'])).'</p>'; ?>
					<?php if( $kaex_options['kaex_service1_include_link'] == true ) {?>
						<a class="button1" href="<?php echo esc_url($kaex_options['kaex_service1_button_link']); ?>" 
								 			title="<?php echo sanitize_text_field($kaex_options['kaex_service1_button_title']); ?>">
								 			<?php echo sanitize_text_field($kaex_options['kaex_service1_button_title']); ?></a>
					<?php } ?>
				</div>
				<div class="servicebox-type-A">
					<?php if( esc_url($kaex_options['kaex_service2_image'] !== "")) echo '<img class="servicebox" src="'.esc_url($kaex_options['kaex_service2_image']).'" alt="Service 2 Image" />'; ?>
					<?php if( esc_attr(stripslashes($kaex_options['kaex_service2_title'] !== "" ))) echo '<h4>'.sanitize_text_field(stripslashes($kaex_options['kaex_service2_title'])).'</h4>'; ?>
					<?php if( wp_kses_post(stripslashes($kaex_options['kaex_service2_text'] !== "" ))) echo '<p>'.wp_kses_post(stripslashes($kaex_options['kaex_service2_text'])).'</p>'; ?>
					<?php if( $kaex_options['kaex_service2_include_link'] == true ) {?>
						<a class="button1" href="<?php echo esc_url($kaex_options['kaex_service2_button_link']); ?>" 
								 			title="<?php echo sanitize_text_field($kaex_options['kaex_service2_button_title']); ?>">
								 			<?php echo sanitize_text_field($kaex_options['kaex_service2_button_title']); ?></a>
					<?php } ?>
				</div>
				<div class="servicebox-type-A">
					<?php if( esc_url($kaex_options['kaex_service3_image'] !== "")) echo '<img class="servicebox" src="'.esc_url($kaex_options['kaex_service3_image']).'" alt="Service 3 Image" />'; ?>
					<?php if( esc_attr(stripslashes($kaex_options['kaex_service3_title'] !== "" ))) echo '<h4>'.sanitize_text_field(stripslashes($kaex_options['kaex_service3_title'])).'</h4>'; ?>
					<?php if( wp_kses_post(stripslashes($kaex_options['kaex_service3_text'] !== "" ))) echo '<p>'.wp_kses_post(stripslashes($kaex_options['kaex_service3_text'])).'</p>'; ?>
					<?php if( $kaex_options['kaex_service3_include_link'] == true ) {?>
						<a class="button1" href="<?php echo esc_url($kaex_options['kaex_service3_button_link']); ?>" 
								 			title="<?php echo sanitize_text_field($kaex_options['kaex_service3_button_title']); ?>">
								 			<?php echo sanitize_text_field($kaex_options['kaex_service3_button_title']); ?></a>
					<?php } ?>
				</div>
			</div>
		<?php }
		if ( $kaex_options['kaex_section3_onoroff'] == true ) { ?>
			<div class="clearfix"></div>
			<div class="home-section-type-A">
				<?php if ( $kaex_options['kaex_include_section3_button'] == 1 ) { ?>
					<div class="home-section-type-A-html-75"><?php echo wp_kses_post(stripslashes($kaex_options['kaex_section3_text'])); ?></div>
					<div class="home-section-type-A-button">
						<a class="button1" href="<?php echo esc_url($kaex_options['kaex_section3_button_link']); ?>" 
							 				title="<?php echo sanitize_text_field($kaex_options['kaex_section3_button_name']); ?>">
							 				<?php echo sanitize_text_field($kaex_options['kaex_section3_button_name']); ?></a>
					</div>
				<?php } else { ?>
					<div class="home-section-type-A-html-100"><?php echo wp_kses_post(stripslashes($kaex_options['kaex_section3_text'])); ?></div>
				<?php } ?>
			</div>
			<div class="feature-thin-border-3"></div>
		<?php }
		if ( $kaex_options['kaex_section4_onoroff'] == true ) { ?>
			<div class="clearfix"></div>
			<div class="home-section-type-B-wrap">
				<div class="home-section-type-B">
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
				<div class="home-section-type-B">
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
		if ( $kaex_options['kaex_section5_onoroff'] == true ) { ?>
			<div class="clearfix"></div>
			<div class="home-section-type-A">
				<?php if ( $kaex_options['kaex_include_section5_button'] == 1 ) { ?>
					<div class="home-section-type-A-html-75"><?php echo wp_kses_post(stripslashes($kaex_options['kaex_section5_text'])); ?></div>
					<div class="home-section-type-A-button">
						<a class="button1" href="<?php echo esc_url($kaex_options['kaex_section5_button_link']); ?>" 
							 				title="<?php echo sanitize_text_field($kaex_options['kaex_section5_button_name']); ?>">
							 				<?php echo sanitize_text_field($kaex_options['kaex_section5_button_name']); ?></a>
					</div>
				<?php } else { ?>
					<div class="home-section-type-A-html-100"><?php echo wp_kses_post(stripslashes($kaex_options['kaex_section5_text'])); ?></div>
				<?php } ?>
			</div>			
		<?php }
		if ( $kaex_options['kaex_section6_onoroff'] == true ) { ?>
			<div class="clearfix"></div>
			<div class="home-section-type-B-wrap">
				<div class="home-section-type-B">
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
				<div class="home-section-type-B">
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
		if ( $kaex_options['kaex_section7_onoroff'] == true ) { ?>
			<div class="clearfix"></div>
			<div class="home-section-type-A">
				<?php if ( $kaex_options['kaex_include_section7_button'] == 1 ) { ?>
					<div class="home-section-type-A-html-75"><?php echo wp_kses_post(stripslashes($kaex_options['kaex_section7_text'])); ?></div>
					<div class="home-section-type-A-button">
						<a class="button1" href="<?php echo esc_url($kaex_options['kaex_section7_button_link']); ?>" 
							 				title="<?php echo sanitize_text_field($kaex_options['kaex_section7_button_name']); ?>">
							 				<?php echo sanitize_text_field($kaex_options['kaex_section7_button_name']); ?></a>
					</div>
				<?php } else { ?>
					<div class="home-section-type-A-html-100"><?php echo wp_kses_post(stripslashes($kaex_options['kaex_section7_text'])); ?></div>
				<?php } ?>
			</div>						
		<?php }
	}
}

/**
 * http://www.linuxjournal.com/article/9585?page=0,0
 * 
 * Validate an email address.
 * Provide email address (raw input)
 * Returns true if the email address has the email
 * address format and the domain exists.
 * 
 */
if ( !function_exists ('ka_express_validEmail')){    
	function ka_express_validEmail($email)
	{
		$isValid = true;
		$atIndex = strrpos($email, "@");
		if (is_bool($atIndex) && !$atIndex)
		{
			$isValid = false;
		}
		else
		{
			$domain = substr($email, $atIndex+1);
			$local = substr($email, 0, $atIndex);
			$localLen = strlen($local);
			$domainLen = strlen($domain);
			if ($localLen < 1 || $localLen > 64)
			{
				// local part length exceeded
				$isValid = false;
			}
			else if ($domainLen < 1 || $domainLen > 255)
			{
				// domain part length exceeded
				$isValid = false;
			}
			else if ($local[0] == '.' || $local[$localLen-1] == '.')
			{
				// local part starts or ends with '.'
				$isValid = false;
			}
			else if (preg_match('/\\.\\./', $local))
			{
				// local part has two consecutive dots
				$isValid = false;
			}
			else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
			{
				// character not valid in domain part
				$isValid = false;
			}
			else if (preg_match('/\\.\\./', $domain))
			{
				// domain part has two consecutive dots
				$isValid = false;
			}
			else if(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local)))
			{
				// character not valid in local part unless 
				// local part is quoted
				if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\","",$local)))
				{
					$isValid = false;
				}
			}
			if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
			{
				// domain not found in DNS
				$isValid = false;
			}
		}
		return $isValid;
	}
}