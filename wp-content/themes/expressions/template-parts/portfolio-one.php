<?php
/**
 * Expressions Portfolio Four Column template part
 *
 * This template part is called by template-portfolio.php
 *
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
global $category,$display_post_content,$display_image_caption,$display_image_description;
$category_ID = get_cat_ID(sanitize_text_field($category));
global $post,$feature_pic_count;
$args = array('category'=>$category_ID,'numberposts'=>999);
$custom_posts = get_posts($args);
		
if ($category_ID !== 0 && $custom_posts){ 

	$feature_pic_count == 0;

	foreach($custom_posts as $post) : setup_postdata($post);

		//get the switches to exclude a feature image link or customize the link
		$exclude_feature_link = get_post_meta($post->ID,'kap_metabox_exclude_feature_link',true) == ''? false : get_post_meta($post->ID,'kap_metabox_exclude_feature_link',true);
		$custom_feature_link = get_post_meta($post->ID,'kap_custom_feature_link',true) == ''? false : get_post_meta($post->ID,'kap_custom_feature_link',true);

		if (has_post_thumbnail()) {

			if ( $feature_pic_count != 0 ) echo '<div class="thin-border"></div>';

			echo '<div class="portfolio_one_column">';
				
				$feature_pic_count ++;

				echo '<div class="left_col">';

					echo '<a href="';
					
						if ( $exclude_feature_link == true ) {
							echo '#"';
						} elseif ( $custom_feature_link != false ) {
							echo $custom_feature_link;echo '"';
						} else {
							the_permalink(); echo '"';
						}
						
						echo ' title="';the_title_attribute(); echo '" >';
						
						the_post_thumbnail('large');
						
					echo '</a>';
	
					if( $display_image_caption == 1 || $display_image_caption == 'on' ) {
						
						echo '<div class="display_caption">';
							//echo '<h4>';echo get_post(get_post_thumbnail_id())->post_excerpt;echo '</h4>';
							$content = get_post(get_post_thumbnail_id())->post_excerpt;
							echo '<h4>';
							ka_express_portfolio_titles($content,75);
							echo '</h4>';
						echo '</div>';
						
					}
	
					if( $display_image_description == 1 || $display_image_caption == 'on' ) {
						echo '<div class="display_description">';
							//echo get_post(get_post_thumbnail_id())->post_content;
							$content = get_post(get_post_thumbnail_id())->post_content;
							ka_express_portfolio_feature_description($content,350);
						echo '</div>';
					}

				echo '</div>';

				echo '<div class="right_col">';
					echo '<h3>';echo the_title_attribute();echo '</h3>';
					ka_express_the_excerpt_dynamic(600);
				echo '</div>';
	
				echo '<div class="clearfix"></div>';
				
			echo '</div>';					
		}

	endforeach;

} else {
	
	echo '<div class="portfolio_error">';
		echo '<h3>'.__('Error: no posts or categories are wrong!','ka_express').'</h3>';
	echo '</div>';
	
}
		
if ($feature_pic_count == 0){
	echo '<div class="portfolio_error">';
	echo '<h3>'.__('Error: There were no feature images found?','ka_express').'</h3>';
	echo '</div>';
}