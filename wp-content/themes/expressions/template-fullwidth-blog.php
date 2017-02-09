<?php
/**
 * Template Name: Fullwidth Blog
 * 
 * This is a full width template used for the blog
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
	$use_font_icons = $kaex_options['kaex_use_font_icons'];
	$exclude_page_title = ( get_post_meta($post->ID,'kaex_metabox_include_page_title',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_include_page_title',true) );
?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php if ( $exclude_page_title == false) { ?>
		<div class="page-title-wide">
			<div class="page-title-wrap">
				<h2 class="fullwidth-blog-left-title"><?php echo get_the_title(); ?></h2>
			</div>
		</div>
	<?php } ?>

<?php endwhile; else : endif; ?>
	
<div class="clearfix"></div>

<div id="main-section">
	<div id="content-wrap">
		<div id="fullwidth-blog">
		
			<?php
				if ( get_query_var('paged') ) { $paged = get_query_var('paged'); }
				elseif ( get_query_var('page') ) { $paged = get_query_var('page'); }
				else { $paged = 1; }
				$temp = $wp_query;
				$wp_query = null;
				$wp_query = new WP_Query();
				/*
				 * WP_Query is used to get the posts....allowing the filtering of posts 
				 * the user does not want to include on the blog page. For WordPress 3.5 
				 * and above the meta query excludes those posts selected in the custom 
				 * field for the post. A second option works for all versions of WordPress.
				 * Create a tag called "exclude" and tag the post with it.
				 */
				$tags = get_tags();
				$exclude_tag_id = 0;
				foreach ($tags as $tag){
					if( $tag->slug == 'exclude') {
						$exclude_tag_id =  $tag->term_id;
					}
				}
				$ppp = get_option('posts_per_page');
				 $args = array(
								'post_status' => 'publish',
								'tag__not_in' => array($exclude_tag_id),
								'meta_query' => array(
									array(
										'key' => 'kaex_metabox_exclude_post',
										'compare' => 'NOT EXISTS'
										)
									),
								'posts_per_page'=> $ppp,
								'paged' => $paged
								);
				$wp_query -> query( $args);
				if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
						<?php
							global $more; 
							$more = 0;
							ka_express_post_format(); 
						?>
						<div class="clearfix"></div>
						<br/>
					</article>
					<div class="bottom-line-1"></div>
				<?php endwhile;
					if(function_exists('wp_pagenavi')) {
		 				echo '<div class="postpagenav">';
		 					wp_pagenavi();
						echo '</div>';
					} else { ?>
					<nav class="postpagenav">
						
						<?php if ( $use_font_icons == 1 ) { ?>
							<div class="left"><?php next_posts_link('<i class="fa  fa-hand-o-left">&nbsp;</i>'.__('older entries','ka_express') ); ?></div>
							<div class="right"><?php previous_posts_link(__(' newer entries','ka_express').'&nbsp;<i class="fa  fa-hand-o-right"></i>' ); ?></div>
							<br/>
						<?php } else { ?>
							<div class="left"><?php next_posts_link(__('&lt;&lt; older entries','ka_express') ); ?></div>
							<div class="right"><?php previous_posts_link(__(' newer entries &gt;&gt;','ka_express') ); ?></div>
							<br/>
						<?php } ?>
						
					</nav>
			  <?php } 
				$wp_query = null;
				$wp_query = $temp;
				wp_reset_query();
		
				else :
				endif; 
			?>
			
		</div>
	</div>
</div>
					
<div class="clearfix"></div>

<?php get_footer(); ?>