<?php
/**
 * Custom functions file for adding Expressions metabox to page panels
 * 
 * This file contains custom functions for the theme
 * 
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
?>
<?php
/**
 * This file set up as per 
 * @link http://wp.tutsplus.com/tutorials/reusable-custom-meta-boxes-part-1-intro-and-basic-fields/
 * The intent is to set up a generalized set of functions to add options to page set ups, allowing 
 * for custom page options.
 * 
 */
/**
 * =============================================================================================
 *                     Custom Page Meta Box
 * =============================================================================================
 */ 
 /** 
  * Add the Meta Box
  * 
  * source: @link http://codex.wordpress.org/Function_Reference/add_meta_box
  * add_meta_box( $id, $title, $callback, $post_type, $context, $priority, $callback_args );
  * $id : (string) (required) HTML 'id' attribute of the edit screen section Default: None 
  * $title : (string) (required) Title of the edit screen section, visible to user Default: None 
  * $callback : (callback) (required) Function that prints out the HTML for the edit screen section. 
  *             Pass function name as a string
  * $post_type : (string) (required) The type of Write screen on which to show the edit screen section 
  *              ('post', 'page', 'link', or 'custom_post_type' where custom_post_type is the custom post type slug)
  *              Default: None 
  * $context : (string) (optional) The part of the page where the edit screen section should be shown 
  *            ('normal', 'advanced', or 'side'). (Note that 'side' doesn't exist before 2.7)Default: 'advanced' 
  * $priority : (string) (optional) The priority within the context where the boxes should show 
  *             ('high', 'core', 'default' or 'low') Default: 'default' 
  * $callback_args : (array) (optional) Arguments to pass into your callback function. The callback will receive 
  *                  the $post object and whatever parameters are passed through this variable. Default: null 
  * 
  */
if ( !function_exists ('ka_express_add_page_custom_meta_box') ) {
	function ka_express_add_page_custom_meta_box() {
		add_meta_box(
			'ka_express_page_custom_meta_box', // $id  
			'Expressions Page Options', // $title  
			'ka_express_show_page_custom_meta_box', // $callback  
			'page', // $page  
			'normal', // $context  
			'high'); // $priority  
	}
	add_action('add_meta_boxes', 'ka_express_add_page_custom_meta_box');   
}

/**
 * Array of elements
 * 
 * This section defines the array of elements that will be used to 
 * set up the custom page options
 * 
 */
$kaex_page_custom_meta_fields = array(  
	array(
		'label'=> __('Do not include Page Title','ka_express'),
		'desc'  => __('Click to exclude title','ka_express'),
		'id'    => 'kaex_metabox_include_page_title',
		'type'  => 'checkbox',
		'default' => 0  
	),
	array(  
		'label'=> __('Sidebar Name','ka_express'),
		'desc'  => __('Which sidebar do you want to use?','ka_express'),
		'id'    => 'kaex_metabox_sidebar_name',
		'type'  => 'select',
		'options' => array (
			'default',
			'404',
			'about',
			'blog',
 			'contact',
			'sidebar_1',
			'sidebar_2',
			'sidebar_3',
			'sidebar_4',
			'sidebar_5',
			'sidebar_6'
		),
		'default' =>'default'
	),
	array(
		'label'=> __('Sidebar Position','ka_express'),
		'desc'  => __('right side or left side?','ka_express'),
		'id'    => 'kaex_metabox_sidebar_loc',  
		'type'  => 'select',
		'options' => array (
			'right',
			'left'
		),
		'default' => 'right'  
	),
	array(
		'label' => __('Feature Category','ka_express'),
		'desc' => __('Only for pages using a feature slider or mosaic','ka_express'),
		'id'    => 'kaex_metabox_feature_category',
		'type'  => 'tax_select'
	),
/* Feature */
	array(  
		'label'=> __('Feature Type','ka_express'),
		'desc'  => __('Pick the type of feature you want','ka_express'),
		'id'    => 'kaex_metabox_feature_type',
		'type'  => 'select',
		'options' => array (
			'Small slides button navigation',
			'Small slides thumbnail navigation',
			'Small slides no navigation',
			'Full slides button navigation',
			'Full slides thumbnail navigation',
			'Full slides no navigation',
			'Center slides button navigation',
			'Center slides thumbnail navigation',
			'Center slides no navigation',
			'Single Image - Center',
			'Single Image - Small',
			'Single Image - Full',
			'Mosaic with 4 images',
			'Mosaic with 6 images',
			'Mosaic with 9 images',
			'No feature'
		),
		'default' => __('No feature','ka_express'),
	),
	array(
		'label' => 'Portfolio Feature Category',
		'desc' => 'Only for Portfolio Pages',
		'id'    => 'kaex_portfolio_category',
		'type'  => 'tax_select'
	),
	array(  
		'label'=> 'Portfolio Columns',
		'desc'  => 'Only for Portfolio Pages',
		'id'    => 'kaex_portfolio_columns',
 		'type'  => 'select',
		'options' => array (
			'1',
			'2',
			'3',
			'4',
		),
		'default' => '1'
	),
	array(  
		'label'=> 'Include Post Content',
		'desc'  => 'Only for 2,3,4 column Portfolio Pages',
		'id'    => 'kaex_metabox_include_post_content',
		'type'  => 'checkbox',
		'default' => 0
 	),
	array(  
		'label'=> 'Include Image Caption',
		'desc'  => 'Only for all Portfolio Pages',
		'id'    => 'kaex_metabox_include_image_caption',
		'type'  => 'checkbox',
		'default' => 0
	),
	array(  
		'label'=> 'Include Image Description',
		'desc'  => 'Only for all Portfolio Pages',
		'id'    => 'kaex_metabox_include_image_description',
		'type'  => 'checkbox',
		'default' => 0
	),	
);

/**
 * The Callback
 * 
 * The callback is used to display the options on the page
 * 
 */
if ( !function_exists ('ka_express_show_page_custom_meta_box') ) {
	function ka_express_show_page_custom_meta_box() {
		global $kaex_page_custom_meta_fields, $post;
		// Use nonce for verification  
		echo '<input type="hidden" name="ka_express_page_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';  
		// Begin the field table and loop  
		echo '<table class="form-table">';
		foreach ($kaex_page_custom_meta_fields as $field) {
			// get value of this field if it exists for this post  
			$meta = get_post_meta($post->ID, $field['id'], true);  
			// begin a table row with  
			echo '<tr> 
					<th><label for="'.$field['id'].'">'.$field['label'].'</label></th> 
					<td>';  
						switch($field['type']) {
							// text  
							case 'text':
								echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.$meta.'" size="30" /> 
										<br /><span class="description">'.$field['desc'].'</span>';
							break;
							// textarea  
							case 'textarea':
								echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea> 
										<br /><span class="description">'.$field['desc'].'</span>';
							break;	
							// checkbox  
							case 'checkbox':
								echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/> 
										<label for="'.$field['id'].'">'.$field['desc'].'</label>';
							break;
							// select  
							case 'select':
								$valid_options = array();
								$valid_options = $field['options'];
								
								echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
								foreach ($field['options'] as $option) {  
									echo '<option', $meta == $option? ' selected="selected"' : '', ' value="'.$option.'">'.$option.'</option>'; 
								}
								echo '</select><br /><span class="description">'.$field['desc'].'</span>';  
							break;
							// tax_select  
							case 'tax_select':
								$categories = get_categories();
							
								echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
								foreach ($categories as $category) {
									echo '<option', $meta == $category->name? ' selected="selected"' : '', ' value="'.$category->name.'">'.$category->name.'</option>'; 
								}
								echo '</select><br /><span class="description">'.$field['desc'].'</span>';
							break;
						}//end switch  
			echo '</td></tr>';
		}// end foreach  
		echo '</table>';// end table
	}
}

/**
 * Save the data
 * 
 * This functon takes the meta data and saves it to the WordPress Database
 */
if ( !function_exists ('ka_express_save_page_custom_meta') ) {
	function ka_express_save_page_custom_meta($post_id) {
		global $kaex_page_custom_meta_fields;
		
		// verify nonce  
		if (isset($_POST['ka_express_page_meta_box_nonce']) == false || 
			check_admin_referer( basename(__FILE__) , 'ka_express_page_meta_box_nonce' ) == false )
			return $post_id;
		// check autosave  
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
			return $post_id;
		// check permissions  
		if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {
			if (!current_user_can('edit_page', $post_id))
				return $post_id;
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
		}
		// loop through fields and save the data  
		foreach ($kaex_page_custom_meta_fields as $field) {
			$old = get_post_meta($post_id, $field['id'], true);
			if ($field['type'] == 'select' )   {
				if(isset($_POST[$field['id']])) {
					$new = $_POST[$field['id']];
					$new = sanitize_text_field($new);
				} else {
					$new = $field['default'];
				}
			} elseif ($field['type'] == 'tax_select' ) {
				if(isset($_POST[$field['id']])) {
					$new = $_POST[$field['id']];
					$new = sanitize_text_field($new);
				}
			} elseif ($field['type'] == 'checkbox' ) {
				$new = ( ( isset($_POST[$field['id']]) && true == $_POST[$field['id']] ) ? true : $field['default'] );
			}
			if ($new && $new != $old) {
				update_post_meta($post_id, $field['id'], $new);
			} elseif ('' == $new && $old) {
				delete_post_meta($post_id, $field['id'], $old);
			}
		} // end foreach  
	}
	add_action('save_post', 'ka_express_save_page_custom_meta');
}

/**
 * =============================================================================================
 *                     Custom Post Meta Box
 * =============================================================================================
 */
 if ( !function_exists ('ka_express_add_post_custom_meta_box') ) {
	function ka_express_add_post_custom_meta_box() {
		add_meta_box(  
			'ka_express_post_custom_meta_box', // $id  
			'Expressions Post Options', // $title  
			'ka_express_show_post_custom_meta_box', // $callback  
			'post', // $post  
			'normal', // $context  
			'high'); // $priority  
	}
	add_action('add_meta_boxes', 'ka_express_add_post_custom_meta_box');   
}

/**
 * Array of elements
 */
$kaex_post_custom_meta_fields = array(
	array(  
		'label'=> 'Do not display this post',
		'desc'  => 'Click to exclude in blog, or other pages',
		'id'    => 'kaex_metabox_exclude_post',
		'type'  => 'checkbox',
		'default' => 0
	),
	array(  
		'label'=> 'Exclude Feature Image Link',
		'desc'  => 'Click to exclude a link to this post from a feature image',
		'id'    => 'kaex_metabox_exclude_feature_link',
		'type'  => 'checkbox',
		'default' => 0
	),
	array(  
		'label'=> 'Feature Image Custom Link',
		'desc'  => 'Add custom link ',
		'id'    => 'kaex_custom_feature_link',
		'type'  => 'url',
		'default' => ''
	),
	array(  
	'label'=> 'Use Post Title instead of Image Caption',
	'desc'  => 'Only for Feature slider - small and full slide options',
	'id'    => 'kaex_metabox_include_feature_title',
	'type'  => 'checkbox',
	'default' => 0
	),
);

// The Callback
if ( !function_exists ('ka_express_show_post_custom_meta_box') ) {
	function ka_express_show_post_custom_meta_box() {
		global $kaex_post_custom_meta_fields, $post;
		// Use nonce for verification  
		echo '<input type="hidden" name="ka_express_post_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
		// Begin the field table and loop  
		echo '<table class="form-table">';
		foreach ($kaex_post_custom_meta_fields as $field) {
			// get value of this field if it exists for this post  
			$meta = get_post_meta($post->ID, $field['id'], true);
			// begin a table row with  
			echo '<tr>
				<th><label for="'.$field['id'].'">'.$field['label'].'</label></th>
				<td>';
				switch($field['type']) {
					// text  
					case 'text':
						echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.sanitize_text($meta).'" size="30" />
								<br /><span class="description">'.$field['desc'].'</span>';
					break;
					//url
					case 'url':
						echo '<input type="text" name="'.$field['id'].'" id="'.$field['id'].'" value="'.esc_url($meta).'" size="30" />
								<br /><span class="description">'.$field['desc'].'</span>';
					break;
					// textarea  
					case 'textarea':
						echo '<textarea name="'.$field['id'].'" id="'.$field['id'].'" cols="60" rows="4">'.$meta.'</textarea>
								<br /><span class="description">'.$field['desc'].'</span>';
					break;
					// checkbox  
					case 'checkbox':
						echo '<input type="checkbox" name="'.$field['id'].'" id="'.$field['id'].'" ',$meta ? ' checked="checked"' : '','/>
								<label for="'.$field['id'].'">'.$field['desc'].'</label>';
					break;
					// select  
					case 'select':
						$valid_options = array();
						$valid_options = $field['options'];
						echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
						foreach ($field['options'] as $option) {
							//echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>'; 
							echo '<option', $meta == $option? ' selected="selected"' : '', ' value="'.$option.'">'.$option.'</option>'; 
						}
						echo '</select><br /><span class="description">'.$field['desc'].'</span>';
					break;
						// tax_select  
					case 'tax_select':
						$categories = get_categories();
						$valid_options = array();
						$valid_options = $field['options'];
						echo '<select name="'.$field['id'].'" id="'.$field['id'].'">';
						foreach ($categories as $category) {
							//echo '<option', $meta == $option['value'] ? ' selected="selected"' : '', ' value="'.$option['value'].'">'.$option['label'].'</option>'; 
							echo '<option', $meta == $category->name? ' selected="selected"' : '', ' value="'.$category->name.'">'.$category->name.'</option>'; 
						}
						echo '</select><br /><span class="description">'.$field['desc'].'</span>';
					break;
				}//end switch  
			echo '</td></tr>';  
		} // end foreach  
		echo '</table>'; // end table  
	}
}
 
// Save the Data
if ( !function_exists ('ka_express_save_post_custom_meta') ) {
	function ka_express_save_post_custom_meta($post_id) {
		global $kaex_post_custom_meta_fields;
		
		// verify nonce  
		if (isset($_POST['ka_express_post_meta_box_nonce']) == false || 
			check_admin_referer( basename(__FILE__) , 'ka_express_post_meta_box_nonce' ) == false )
			return $post_id;
		// check autosave  
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
			return $post_id;
		// check permissions  
		if (isset($_POST['post_type']) && 'post' == $_POST['post_type']) {
			if (!current_user_can('edit_post', $post_id))
				return $post_id;
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;  
		}
		// loop through fields and save the data  
		foreach ($kaex_post_custom_meta_fields as $field) {  
			$old = get_post_meta($post_id, $field['id'], true);
			if ($field['type'] == 'text' )   {
				if(isset($_POST[$field['id']])) {
					$new = $_POST[$field['id']];
					$new = sanitize_text_field($new);
				} else {
					$new = $field['default'];
				}
			} elseif ($field['type'] == 'url' ) {
				if(isset($_POST[$field['id']])) {
					$new = $_POST[$field['id']];
					$new = esc_url($new);
				} else {
					$new = $field['default'];
				}
			} elseif ($field['type'] == 'checkbox' ) {
				$new = ( ( isset($_POST[$field['id']]) && true == $_POST[$field['id']] ) ? true : $field['default'] );
			}
			if ($new && $new != $old) {  
				update_post_meta($post_id, $field['id'], $new);
			} elseif ('' == $new && $old) {  
				delete_post_meta($post_id, $field['id'], $old);
			}
		} // end foreach  
	}
	add_action('save_post', 'ka_express_save_post_custom_meta');
}

?>