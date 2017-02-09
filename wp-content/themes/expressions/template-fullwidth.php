<?php
/**
 * Template Name: Fullwidth
 * 
 * This is a full width template
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
?>
<?php 
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
		<div id="fullwidth">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>					
					<div class="entry respimg">
						<?php
						
							if (has_post_thumbnail()) {
								echo '<div class="image-post-feature">';
								//the_post_thumbnail(array(600,600));
								the_post_thumbnail();
								echo '</div>';
							}			
							
							the_content('Read more');
							
						?>
					</div>
					<?php if(comments_open()) {
						echo '<div class="clearfix"></div><br/><br/>';
						comments_template('', true); 
					} ?>
				</div>
			<?php endwhile; else : endif; ?>
									
			<div class="clearfix"></div>
		
		</div>
	</div>
</div>
					
<div class="clearfix"></div>

<?php get_footer(); ?>