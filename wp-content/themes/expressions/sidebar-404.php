<?php
/**
 * Template part file that contains the default sidebar content
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
<?php if ( !dynamic_sidebar('Sidebar-404') ) : ?>
	<div id="search">
		<h2><?php _e('Search','ka_express'); ?></h2>
		<?php get_search_form(); ?>
	</div>
	<div>
		<br/>
		<h2><?php _e('Categories','ka_express'); ?></h2>

		<?php wp_dropdown_categories(); ?>

	</div>
	<div>
		<br/>
		<h2><?php _e('Recent Posts','ka_express'); ?></h2>
		<ul>
		<?php wp_get_archives(array(
			'type' => 'postbypost', // or daily, weekly, monthly, yearly
			'limit' => 5, // maximum number shown
			'format' => 'html', // or select (dropdown), link, or custom
			'show_post_count' => false, // show number of posts per link
			'echo' => 1 // display results or return array
			)); 
		?>
		</ul>
	</div>
<?php endif; ?>