<?php
/**
 * Template part file that contains the blog sidebar content
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
<?php if ( !dynamic_sidebar('Sidebar-blog') ) : ?>
	<h2>Blog Sidebar</h2>
	<p>Go to Appearance => Widgets and drag a widget over to this sidebar.</p>
<?php endif; ?>