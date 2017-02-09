<?php
/**
 * Single Page WordPress file
 *
 * This file is the Singe Page template file, which is output a single post
 * 
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
	$single_sidebar_loc = $kaex_options['kaex_single_sidebar_loc'];
	$post_icons_on = $kaex_options['kaex_display_post_icons'];
	$use_fullwidth = $kaex_options['kaex_use_fullwidth_single_post'];
	$use_font_icons = $kaex_options['kaex_use_font_icons'];
?>
<?php get_header(); ?>

<div id="main-section">
	<div id="content-wrap">
		<?php
			if ( $use_fullwidth == "1" ) {
				echo '<div id="fullwidth-blog">';
			} else {
				if ( $single_sidebar_loc == 'left') {
					echo '<div id="widecolumn-right">';
				} else {
					echo '<div id="widecolumn-left">';
				}
			}
		?>
		
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
					<?php ka_express_post_format(); ?>
					<div class="clearfix"></div>
				</article>
				<?php if( $post_icons_on == true ) {
					echo '<div class="comments-wrap-icons">';
				} else {
					echo '<div class="comments-wrap-no-icons">';
				}
					comments_template('', true);
				echo '</div>';
			endwhile; ?>
				<div class="postpagenav">
					
					<?php
					
						if ( $use_font_icons == 1 ) {
							if (is_attachment()) { ?>
								
								<div class="left"><?php next_image_link('','<i class="fa  fa-hand-o-left"></i> View previous'); ?></div>
								<div class="right"><?php previous_image_link('','View next <i class="fa  fa-hand-o-right"></i>' ); ?></div>
								
							<?php } else {
								
								next_post_link('<div class="right">%link <i class="fa  fa-hand-o-right"></i></div>');
								previous_post_link('<div class="left"><i class="fa  fa-hand-o-left"></i> %link</div>');
								
							} 
						} else {
							
							if (is_attachment()) { ?>
								
								<div class="left"><?php next_image_link('','&lt;&lt; View previous'); ?></div>
								<div class="right"><?php previous_image_link('','View next <i class="icon-right-hand"></i>' ); ?></div>
								
							<?php } else {
								
								next_post_link('<div class="right">%link &gt;&gt;</div>');
								previous_post_link('<div class="left">&lt;&lt; %link</div>');
								
							} 
						} ?>
				
				</div>
				
			<?php else : endif; ?>
			<br/>
		</div>
		<?php
			if ($use_fullwidth != 1 ) {
				if ( $single_sidebar_loc == 'left') {
					echo '<aside id="sidebar-left">';
					get_sidebar('default');
					echo '</aside>';
				} else {
					echo '<aside id="sidebar-right">';
					get_sidebar('default');
					echo '</aside>';
				}
			}
		?>
	</div>
</div>
<div class="clearfix"></div>
<?php get_footer(); ?>