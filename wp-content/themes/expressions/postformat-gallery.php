<?php
/**
 * Expressions Post Format Gallery
 *
 * The Gallery Post Format is really set up for a single gallery. It alllows the user 
 * to post a gallery and not have all the pictures presented. The number of pictures are counted
 * and displayed as a caption to the most recent image in the gallery. Only the post excerpt is allowed.
 * I used the twenty-eleven content-gallery.php as a guide for this format.
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
$display_post_author = $kaex_options['kaex_author_in_blog'];
$display_post_timestamp = $kaex_options['kaex_timestamp_in_blog'];
$display_post_categories = $kaex_options['kaex_category_in_blog'];
$display_post_tags = $kaex_options['kaex_tags_in_blog'];

if ( $display_post_icon == 1 ) {
	
	echo '<div class="post-icon">';
	
		if($use_pformat_font_icons == 1 ){
			echo '<i class="post-icon-format fa fa-th" title="gallery"></i>';		
		} else {	
			echo '<img class="post-icon-format" src="'.get_template_directory_uri().'/images/format-gallery_24.png" title="gallery" alt="gallery" />';		
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
	<?php ka_express_post_meta_top( 'gallery' , $display_post_timestamp , $display_post_author , $display_post_categories ); ?>
	<?php  if (has_post_thumbnail()) {
		echo '<div class="image-post-feature">';
			the_post_thumbnail();
		echo '</div>';
	} ?>
	<div class="gallery-entry">
		<?php
			global $post;
			if(!is_single()) {
				$images = ka_express_get_gallery_images();
				if ( $images ) :
					$total_images = count( $images );
					//echo $total_images;
					$image = array_shift( $images );
				?>
					<figure class="gallery-thumb">
						<a href="<?php the_permalink(); ?>"><?php echo wp_get_attachment_image( $image, 'thumbnail' ); ?></a>
						<div class="clearfix"></div>
						<em><?php echo $total_images; _e(' images','ka_express'); ?></em>
					</figure><!-- .gallery-thumb -->
					<div class="gallery-excerpt">
						<?php the_excerpt(); ?>
					</div>
				<?php endif; 								
			} else {
				the_content(__('Read more','ka_express')); 
			} ?>
	</div>
	
	<div class="clearfix"></div>
	
	<?php ka_express_post_meta_bottom( 'gallery' , $display_post_tags ); ?>
	
</div>
<div class="clearfix"></div>