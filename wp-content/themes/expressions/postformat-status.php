<?php
/**
 * Expressions Post Format Status
 *
 * The Status Post Format is a short status update, similar to a Twitter status update.
 * Included in this format is a time stamp, author avatar and a author name. Comments are 
 * permitted. 
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
$use_font_icons = $kaex_options['kaex_use_font_icons'];
$use_pformat_font_icons = $kaex_options['kaex_use_pformat_font_icons'];
$use_font_icons = $kaex_options['kaex_use_font_icons'];
$display_post_icon = $kaex_options['kaex_display_post_icons'];
$display_post_author = $kaex_options['kaex_author_in_blog'];
$display_post_timestamp = $kaex_options['kaex_timestamp_in_blog'];
$display_post_tags = 0;

if ( $display_post_icon == 1 ) {
	
	echo '<div class="post-icon">';
	
		if($use_pformat_font_icons == 1 ){
			echo '<i class="post-icon-format fa fa-bullhorn" title="status"></i>';		
		} else {	
			echo '<img class="post-icon-format" src="'.get_template_directory_uri().'/images/format-status_24.png" title="status" alt="status" />';		
		}
		
	echo '</div>';
	echo '<div class="post-wrap">';

} else {
	
	echo '<div class="post-wrap-no-icons">';
	
} ?> 

	<div class="status-entry respimg">
		<?php if( is_sticky() ) {
			if( $use_font_icons == 1 ) {
				echo '<i class="icon-pin kaex-sticky" title="sticky"></i>';
			} else {
				echo '<img class="kaex-sticky" src="'.get_template_directory_uri().'/images/sticky_16.png" title="sticky" alt="sticky" />';
			}
		}
		
		if($display_post_timestamp == 1) { ?><span class="timestamp updated"><?php the_time(get_option('date_format')); ?></span> <?php } ?>
		
		<?php if ( comments_open() && is_single() != 1 ) {
			
			if( $use_font_icons == 1 ) { ?>
				<span class="comments"><a class="icon-comment" href="<?php comments_link(); ?>">&nbsp;<?php echo get_comments_number(); ?></a></span>
			<?php } else { ?>
				<span class="comments"><a class="comments-button" href="<?php comments_link(); ?>"><?php echo get_comments_number(); ?></a></span>
			<?php }
			
		} ?>
		
		<div class="clearfix"></div>
		<?php
			$has_valid_avatar = ka_express_validate_gravatar(get_the_author_meta('user_email'));
			if ( $has_valid_avatar == 1 ) echo get_avatar( get_the_author_meta('ID'), 50 ); 
		?>
		<?php the_content(__('Read more','ka_express')); ?>
		<?php if($display_post_author == 1) { ?>
			<span class="author vcard">
				<a class="url fn n" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" 
					title="<?php __('Posts by Author','ka_express'); ?>" 
					rel="author" ><?php the_author(); ?> </a>
			</span>
		<?php } ?>
	</div>
	
	<div class="clearfix"></div>
			
	<?php ka_express_post_meta_bottom( 'status' , $display_post_tags ); ?>
	
</div>
<div class="clearfix"></div>