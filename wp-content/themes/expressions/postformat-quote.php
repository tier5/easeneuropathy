<?php
/**
 * Expressions Post Format Quote
 *
 * The Quote Post Format is really the same as the Standard Post Format. The main difference 
 * is that the conent is posted under a "quote-entry" class, allowing special CSS for <blockquote>
 * and <cite> tags.
 *
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */

//load user defined options
global $kaex_options,$wp_version;
$kaex_options = ka_express_get_options();
$display_post_icon = $kaex_options['kaex_display_post_icons'];
$use_font_icons = $kaex_options['kaex_use_font_icons'];
$use_pformat_font_icons = $kaex_options['kaex_use_pformat_font_icons'];
$display_post_author = $kaex_options['kaex_author_in_blog'];
$display_post_timestamp = $kaex_options['kaex_timestamp_in_blog'];
$display_post_categories = $kaex_options['kaex_category_in_blog'];
$display_post_tags = $kaex_options['kaex_tags_in_blog'];

if ( $display_post_icon == 1 ) {
	
	echo '<div class="post-icon">';
	
		if($use_pformat_font_icons == 1 ){
			echo '<i class="post-icon-format fa fa-quote-left" title="quote"></i>';		
		} else {	
			echo '<img class="post-icon-format" src="'.get_template_directory_uri().'/images/format-quote_24.png" title="quote" alt="quote" />';		
		}
		
	echo '</div>';
	echo '<div class="post-wrap">';

} else {
	
	echo '<div class="post-wrap-no-icons">';
	
} ?> 

	<h2 class="entry-title">
		<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		<?php if ( comments_open() && is_single() != 1 ) {
			
			if( $use_font_icons == 1 ) { ?>
				<span class="comments"><a class="fa fa-comment" href="<?php comments_link(); ?>">&nbsp;<?php echo get_comments_number(); ?></a></span>
			<?php } else { ?>
				<span class="comments"><a class="comments-button" href="<?php comments_link(); ?>"><?php echo get_comments_number(); ?></a></span>
			<?php }
			
		} ?>
	</h2>
	
	<div class="clearfix"></div>
	
	<?php ka_express_post_meta_top( 'quote' , $display_post_timestamp , $display_post_author , $display_post_categories ); ?>
	
	<?php  if (has_post_thumbnail()) {
		echo '<div class="image-post-feature">';
			the_post_thumbnail();
		echo '</div>';
	} ?>
	
	<div class = "quote-entry respimg">
		<?php the_content(__('Read more','ka_express')); ?>
	</div>
			
	<div class="clearfix"></div>
	
	<?php ka_express_post_meta_bottom( 'quote' , $display_post_tags ); ?>
	
</div>
<div class="clearfix"></div>