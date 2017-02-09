<?php
/**
 * This file is the default Page template file, used to display static
 * Pages if no custom Page template is defined.
 * 
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
?>
<?php 
	$page_sidebar_loc = ( get_post_meta($post->ID,'kaex_metabox_sidebar_loc',true) == ''? 'right' : get_post_meta($post->ID,'kaex_metabox_sidebar_loc',true) );
	$sidebar_name =  ( get_post_meta($post->ID,'kaex_metabox_sidebar_name',true) == ''? 'default' : get_post_meta($post->ID,'kaex_metabox_sidebar_name',true) );
	$exclude_page_title = ( get_post_meta($post->ID,'kaex_metabox_include_page_title',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_include_page_title',true) );
?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php if ( $exclude_page_title == false) { ?>
		<div class="page-title-wide">
			<div class="page-title-wrap">
				<h2 class="left-title entry-title"><?php echo get_the_title(); ?></h2>
			</div>
		</div>
	<?php } ?>

<?php endwhile; else : endif; ?>
	
<div class="clearfix"></div>
	
<div id="main-section">
	<div id="content-wrap">
		
		<?php if ( $page_sidebar_loc == 'left') { ?>
			<div id="widecolumn-right">
		<?php } else { ?>
			<div id="widecolumn-left">
		<?php } ?>
			<div class="widecolumn-page-wrap">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>					
						<div class="entry respimg">
							<?php 
								if (has_post_thumbnail()) {
									the_post_thumbnail();
								}			
								the_content('Read more');
							?>
						</div>
						<div class="clearfix"></div>
						<?php if(comments_open()) comments_template('', true); ?>
					</div>
				<?php endwhile; else : endif; ?>
										
				<div class="clearfix"></div>
			</div>
		</div>
	
		<?php 
			if ( $page_sidebar_loc == 'left') { ?>
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