<?php
/**
 * Template Name: Archive
 * 
 * This is a archive template
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
?>
<?php 
	$archive_sidebar_loc = ( get_post_meta($post->ID,'kaex_metabox_sidebar_loc',true) == ''? 'right' : get_post_meta($post->ID,'kaex_metabox_sidebar_loc',true) );
	$sidebar_name =  ( get_post_meta($post->ID,'kaex_metabox_sidebar_name',true) == ''? 'default' : get_post_meta($post->ID,'kaex_metabox_sidebar_name',true) );
	$exclude_page_title = ( get_post_meta($post->ID,'kaex_metabox_include_page_title',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_include_page_title',true) );
?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php if ( $exclude_page_title == false) { ?>
		<div class="page-title-wide">
			<div class="page-title-wrap">
				<h2 class="left-title"><?php echo get_the_title(); ?></h2>
			</div>
		</div>
	<?php } ?>

<?php endwhile; else : endif; ?>
	
<div class="clearfix"></div>
	
<div id="main-section">
	<div id="content-wrap">
		
		<?php if ( $archive_sidebar_loc == 'left') { ?>
			<div id="widecolumn-right">
		<?php } else { ?>
			<div id="widecolumn-left">
		<?php } ?>
		
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>					
				<div class="entry respimg">
					<?php 
						if (has_post_thumbnail()) {
							echo '<div class="image-post-feature">';
							the_post_thumbnail();
							echo '</div>';
							}
						the_content('Read more');
					?>
				</div>
			</div>
		<?php endwhile; else : endif; ?>
								
		<div class="clearfix"></div>
		
		<div class="archivespage">
			<h2><?php _e('Archives by Month:','ka_express'); ?></h2>
			<ul class="list-cog">
				<?php wp_get_archives('type=monthly'); ?>
			</ul>

			<h2><?php _e('Archives by Category:','ka_express'); ?></h2>
			<ul class="list-dot">
		 		<?php wp_list_categories("title_li="); ?>
			</ul>
	
			<h2><?php _e('Archives by Author:','ka_express'); ?></h2>
			<ul class="list-arrow">
		 		<?php wp_list_authors(); ?>
			</ul>
			<br/><br/><br/>
		</div>
	</div>
	
	<?php 
		if ( $archive_sidebar_loc == 'left') { ?>
			<aside id="sidebar-left">
				<?php get_sidebar($sidebar_name); ?>
			</aside>
		<?php } else { ?>
			<aside id="sidebar-right">
				<?php get_sidebar($sidebar_name); ?>
			</aside>
	<?php } ?>

	</div>
</div>
					
<div class="clearfix"></div>

<?php get_footer(); ?>