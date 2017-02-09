<?php
/**
 * Expressions Post Format Aside
 *
 * The Aside Post Format is typically styled without a title. Similar to a Facebook note update.
 * In my case I have excluded all links, meta (except author), and the title. Only content is shown.
 * 
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
//load user defined options
global $kaex_options;
$kaex_options = ka_express_get_options();
$display_post_icon = $kaex_options['kaex_display_post_icons'];
$display_post_author = $kaex_options['kaex_author_in_blog'];
$use_pformat_font_icons = $kaex_options['kaex_use_pformat_font_icons'];
$display_post_timestamp = 0;
$display_post_categories = 0;
$display_post_tags =0;

if ( $display_post_icon == 1 ) {
	echo '<div class="post-icon">';
	
		if($use_pformat_font_icons == 1 ){
			echo '<i class="post-icon-format fa fa-file-text" title="aside"></i>';		
		} else {
			echo '<img class="post-icon-format" src="'.get_template_directory_uri().'/images/format-aside_24.png" title="aside" alt="aside" />';	
		}
		
	echo '</div>';
	echo '<div class="post-wrap">';
} else {
	echo '<div class="post-wrap-no-icons">';
} ?>
<div class="aside-entry respimg">
	
	<?php the_content(__('Read more','ka_express')); ?>
	
	<?php ka_express_post_meta_top( 'aside' , $display_post_timestamp , $display_post_author , $display_post_categories ); ?>

	<div class="clearfix"></div>
				
	<?php ka_express_post_meta_bottom( 'aside' , $display_post_tags ); ?>
	
</div>

<div class="clearfix"></div>