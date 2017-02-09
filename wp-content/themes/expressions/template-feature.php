<?php
/**
 * Template Name: Feature
 * 
 * The template for displaying a feature section on a full width page.
 * 
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
?>
<?php 
	$feature_option = ( get_post_meta($post->ID,'kaex_metabox_feature_type',true) == ''? 'Small slides button navigation' : get_post_meta($post->ID,'kaex_metabox_feature_type',true) );
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

<?php if ( $feature_option != 'No feature') {
	$feature_category = ( get_post_meta($post->ID,'kaex_metabox_feature_category',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_feature_category',true) );
	if ( $feature_category == '') {
		echo '<span class="error">You need to select a category on the page setup or I can not get the slider images!</span>';
	} else {
		ka_express_home_feature_options($feature_option,$feature_category); 
	}
} ?>
	
<div id="main-section">
	<div id="content-wrap">
		<div id="fullwidth">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry respimg">
						<?php the_content('Read more'); ?>
					</div>
				</div>
		 	<?php endwhile; else : endif; ?>
		 		
		</div>
	</div>
</div>

<div class="clearfix"></div>

<?php get_footer(); ?>