<?php
/**
 * Template Name: Portfolio
 * 
 * Page for displaying special feature posts
 *
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
?>
<?php get_header(); ?>

<?php 	
	$exclude_page_title = ( get_post_meta($post->ID,'kaex_metabox_include_page_title',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_include_page_title',true) );
	$category =  ( get_post_meta($post->ID,'kaex_portfolio_category',true) == ''? false : get_post_meta($post->ID,'kaex_portfolio_category',true) );
	$portfolio_columns = ( get_post_meta($post->ID,'kaex_portfolio_columns',true) == ''? false : get_post_meta($post->ID,'kaex_portfolio_columns',true) );
	$display_post_content = ( get_post_meta($post->ID,'kaex_metabox_include_post_content',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_include_post_content',true) );
	$display_image_caption = ( get_post_meta($post->ID,'kaex_metabox_include_image_caption',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_include_image_caption',true) );
	$display_image_description = ( get_post_meta($post->ID,'kaex_metabox_include_image_description',true) == ''? false : get_post_meta($post->ID,'kaex_metabox_include_image_description',true) );
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( $exclude_page_title == false) {
			echo '<div class="page-title-wide">';
				echo '<div class="page-title-wrap">';
					echo '<h2 class="portfolio">'.get_the_title().'</h2>' ;
				echo '</div>';
			echo '</div>';
		}
		echo '<div id="portfolio-post-wide">';
			echo '<div id="portfolio-post-wrap">';
				echo '<div class="portfolio-post respimg">';
					the_content('Read more');
				echo '</div>';
			echo '</div>';
		echo '</div>'; ?>
	</div>
<?php endwhile; else : endif; ?>
	
<div class="clearfix"></div>

<div id="main-section">
	<div id="content-wrap">
		<div id="portfolio-full-width">	

			<?php
			
			if( sanitize_text_field( $portfolio_columns ) == "1" ) {
				get_template_part( '/template-parts/portfolio', 'one' );
			} else if( sanitize_text_field( $portfolio_columns ) == "2" ) {
				get_template_part( '/template-parts/portfolio', 'two' );
			} else if( sanitize_text_field( $portfolio_columns ) == "3" ) {
				get_template_part('/template-parts/portfolio', 'three' );
			} else if( sanitize_text_field( $portfolio_columns ) == "4" ) {
				get_template_part( '/template-parts/portfolio', 'four' );
			}
			
			?>
			
		</div>
	</div>
</div>

<div class="clearfix"></div>

<?php get_footer(); ?>