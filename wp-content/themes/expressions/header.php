<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
    
/**
 * Header Template Part File
 * 
 * Template part file that contains the HTML document head and 
 * opening HTML body elements, as well as the site header.
 *
 * This file is called by all primary template pages
 * 
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
?>
<!DOCTYPE html>
<html class="non-ie" <?php language_attributes(); ?>>

<head>
<?php 
	if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) header('X-UA-Compatible: IE=edge,chrome=1');
?>
<meta charset=<?php bloginfo('charset'); ?> >

<?php 
	global $kaex_options;
	$kaex_options = ka_express_get_options();
	if( $kaex_options['kaex_include_mobile_design'] == 1 ) echo '<meta name="viewport" content="width=device-width" />' ;
?>

<title><?php wp_title(''); ?></title>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if( isset($kaex_options['kaex_show_favicon']) && $kaex_options['kaex_show_favicon'] == 1 ) echo '<link rel="shortcut icon" href="'. get_template_directory_uri().'/favicon.ico" />'; ?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<header>
		<div id="header-wrap" >
			<div class="header-widget">
				<?php if ( !dynamic_sidebar('Right Header Area') ) : ?>
								
				<?php endif; ?>
			</div>
			<?php ka_express_header(); ?>
			<?php if ( $kaex_options['kaex_menu_border'] == 'full width' ) { ?>
				<div class="thin-border"></div>
				<nav class="nav-container ka-menu">
					<?php ka_express_header_menu() ?>
				</nav>
				<div class="thin-border"></div>
			<?php } else { ?>
				<nav class="nav-container ka-menu">
					<?php ka_express_header_menu() ?>
				</nav>	
			<?php }?>
			<div class="clearfix"></div>
		</div>
	</header>