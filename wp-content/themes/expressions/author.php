<?php
/**
 * Author Page template file
 *
 * This file is the Author Page template file, which is output whenever
 * a author link is clicked
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
	$author_sidebar_loc = $kaex_options['kaex_author_sidebar_loc']; 
?>
<?php get_header(); ?>

<div id="main-section">
	<div id="content-wrap">
		<?php if ( $author_sidebar_loc == 'left') { ?>
			<div id="widecolumn-right">
		<?php } else { ?>
			<div id="widecolumn-left">
		<?php } ?>
			<?php 
				$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
			?>
			<div class="author-bio">
				<h2><?php _e('Posts by ','ka_express'); echo $curauth->display_name; ?></h2>
				<?php
					$has_valid_avatar = ka_express_validate_gravatar( $curauth->user_email );
					if ($has_valid_avatar == 1 && $curauth->description != '' ) {
						echo '<div class="author-border"></div>';
						echo get_avatar( $curauth->user_email , 50 );
						echo '<p>'.$curauth->description.'</p>';
					}
				?>
			</div>
			<div class="clearfix"></div>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
						<?php ka_express_post_format(); ?>
						<div class="clearfix"></div>
					</article>
					<div class="bottom-line-1"></div>
				<?php endwhile;
					if(function_exists('wp_pagenavi')) {
		 				echo '<div class="postpagenav">';
		 					wp_pagenavi();
						echo '</div>';
					} else { ?>
						<nav class="postpagenav">
							<div class="left"><?php next_posts_link(__('&lt;&lt; older entries','ka_express') ); ?></div>
							<div class="right"><?php previous_posts_link(__(' newer entries &gt;&gt;','ka_express') ); ?></div>
							<br/>
						</nav>
					<?php }
			else : ?>
				<!-- search found nothing -->
				<div class="nosearch">
					<h2><?php _e('Sorry about that but we could not find any posts!','ka_express'); ?></h2>
					<p><?php _e('You may want to try another author.','ka_express'); ?></p>
					<h2><?php _e('Something to read?','ka_express'); ?></h2>
					<p><?php _e('Want to read something else? These are the latest posts:','ka_express'); ?><br/><br/></p>
					<ul><?php wp_get_archives('type=postbypost&limit=20&format=html'); ?></ul>
				</div>
			<?php endif; ?>
			<br/>
		</div>
		<?php if ( $author_sidebar_loc == 'left') { ?>
			<aside id="sidebar-left">
				<?php get_sidebar('default'); ?>
			</aside>
		<?php } else { ?>
			<aside id="sidebar-right">
				<?php get_sidebar('default'); ?>
			</aside>
		<?php } ?>
	</div>
</div>

<div class="clearfix"></div>

<?php get_footer(); ?>