<?php
/**
 * Error 404 Page template file
 *
 * This file is the Error 404 Page template file, which is output whenever
 * the server encounters a "404 - file not found" error.
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
	$page_404_sidebar_loc = $kaex_options['kaex_404_sidebar_loc'];  
?>
<?php get_header(); ?>
<div id="main-section">
	<div id="content-wrap">
		<?php if ( $page_404_sidebar_loc == 'left') { ?>
			<div id="widecolumn-right">
		<?php } else { ?>
			<div id="widecolumn-left">
		<?php } ?>
			<div id="error_404">
				<h1><?php _e('Sorry - Page Not Found','ka_express'); ?></h1><br/><br/>
				<h3><?php _e('Can you refine your search and try again?','ka_express'); ?></h3>
			</div>
		</div>
		<?php if ( $page_404_sidebar_loc == 'left') { ?>
			<aside id="sidebar-left">
				<?php get_sidebar('404'); ?>
			</aside>
		<?php } else { ?>
			<aside id="sidebar-right">
				<?php get_sidebar('404'); ?>
			</aside>
		<?php } ?>
	</div>
</div>
<?php get_footer(); ?>