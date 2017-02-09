<?php
/**
 * Template Name: Home Page
 * 
 * The template for displaying the theme's static home page.
 * 
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
$feature_option = ( get_post_meta($post->ID,'kaex_metabox_feature_type',true) == ''? 'Small slides button navigation' : get_post_meta($post->ID,'kaex_metabox_feature_type',true) );
global $kaex_options;
$kaex_options = ka_express_get_options(); 
$area_1 = ka_express_home_area_selection( $kaex_options['kaex_home_area_1'] );
$area_2 = ka_express_home_area_selection( $kaex_options['kaex_home_area_2'] );
$area_3 = ka_express_home_area_selection( $kaex_options['kaex_home_area_3'] );
$area_4 = ka_express_home_area_selection( $kaex_options['kaex_home_area_4'] );
$area_5 = ka_express_home_area_selection( $kaex_options['kaex_home_area_5'] );
$area_6 = ka_express_home_area_selection( $kaex_options['kaex_home_area_6'] );
$area_7 = ka_express_home_area_selection( $kaex_options['kaex_home_area_7'] );
$area_8 = ka_express_home_area_selection( $kaex_options['kaex_home_area_8'] );


get_header();

if ( $feature_option != 'No feature') {
	$feature_category = ( get_post_meta($post->ID,'kaex_metabox_feature_category',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_feature_category',true) );
	if ( $feature_category == '') {
		echo '<span class="error">You need to select a category on the page setup or I can not get the slider images!</span>';
	} else {
		ka_express_home_feature_options($feature_option,$feature_category); 
	}
} 

?>

<div id="main-section">
	<div class="clearfix"></div>
	<div id="content-wrap">
		 <div id="home-full-width">
		 	
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if(the_content() != '') { ?>
						<div class="entry respimg">
							<?php the_content('Read more'); ?>
						</div>
					<?php } ?>
				</div>
		 	<?php endwhile; else : endif; ?>
		 		
		 	<?php 
		 		
		 		if( $area_1 != 'none') get_template_part( '/template-parts/home', $area_1 );
		 		if( $area_2 != 'none') get_template_part( '/template-parts/home', $area_2 );
				if( $area_3 != 'none') get_template_part( '/template-parts/home', $area_3 );
				if( $area_4 != 'none') get_template_part( '/template-parts/home', $area_4 );
				if( $area_5 != 'none') get_template_part( '/template-parts/home', $area_5 );
				if( $area_6 != 'none') get_template_part( '/template-parts/home', $area_6 );
				if( $area_7 != 'none') get_template_part( '/template-parts/home', $area_7 );
				if( $area_8 != 'none') get_template_part( '/template-parts/home', $area_8 );
		 		
		 	?>
		 	
		</div>
	</div>
</div>

<div class="clearfix"></div>

<?php get_footer(); ?>