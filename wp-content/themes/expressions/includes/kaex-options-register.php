<?php
/**
 * Expressions Theme Options Settings API
 *
 * This file implements the WordPress Settings API for the 
 * Options for the Expressions Theme.
 * 
 * @package 	Expressions
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 * 
 */

/**
 * Register Theme Settings
 * 
 * Register theme_expressions_options array to hold
 * all Theme options.
 * 
 * @link	http://codex.wordpress.org/Function_Reference/register_setting	Codex Reference: register_setting()
 * 
 * @param	string		$option_group		Unique Settings API identifier; passed to settings_fields() call
 * @param	string		$option_name		Name of the wp_options database table entry
 * @param	callback	$sanitize_callback	Name of the callback function in which user input data are sanitized
 */
register_setting( 
	// $option_group
	'theme_expressions_options', 
	// $option_name
	'theme_expressions_options', 
	// $sanitize_callback
	'ka_express_validate_options' 
);

/**
 * Theme register_setting() sanitize callback
 * 
 * Validate and whitelist user-input data before updating Theme 
 * Options in the database. Only whitelisted options are passed
 * back to the database, and user-input data for all whitelisted
 * options are sanitized.
 * 
 * @link	http://codex.wordpress.org/Data_Validation	Codex Reference: Data Validation
 * 
 * @uses ka_express_get_options() from includes/kaex-options.php
 * @uses ka_express_get_settings_by_tab() from includes/kaex-options.php
 * @uses ka_express_get_option_parameters() from includes/kaex-options.php
 * @uses ka_express_get_option_defaults() from includes/kaex-options.php
 * @uses ka_express_get_settings_page_tabs() from includes/kaex-options.php
 * 
 * @param	array	$input	Raw user-input data submitted via the Theme Settings page
 * @return	array	$input	Sanitized user-input data passed to the database
 */
function ka_express_validate_options( $input ) {

	// This is the "whitelist": current settings
	$valid_input = ka_express_get_options();
	// Get the array of Theme settings, by Settings Page tab
	$settingsbytab = ka_express_get_settings_by_tab();
	// Get the array of option parameters
	$option_parameters = ka_express_get_option_parameters();
	// Get the array of option defaults
	$option_defaults = ka_express_get_option_defaults();
	// Get list of tabs
	$tabs = ka_express_get_settings_page_tabs();
	//array for possible errors
	$expressions_input_error = array();
	
	// Determine what type of submit was input
	$submittype = 'submit';	
	foreach ( $tabs as $tab ) {
		$resetname = 'reset-' . $tab['name'];
		if ( ! empty( $input[$resetname] ) ) {
			$submittype = 'reset';
		}
	}
	
	// Determine what tab was input
	$submittab = 'general';	
	foreach ( $tabs as $tab ) {
		$submitname = 'submit-' . $tab['name'];
		$resetname = 'reset-' . $tab['name'];
		if ( ! empty( $input[$submitname] ) || ! empty($input[$resetname] ) ) {
			$submittab = $tab['name'];
		}
	}
	// Get settings by tab
	$tabsettings = $settingsbytab[$submittab] ;
	// Loop through each tab setting
	foreach ( $tabsettings as $setting ) {
		// If no option is selected, set the default
		$valid_input[$setting] = ( ! isset( $input[$setting] ) ? $option_defaults[$setting] : $input[$setting] );
		
		// If submit, validate/sanitize $input
		if ( 'submit' == $submittype ) {
			// Get the setting details from the defaults array
			$optiondetails = $option_parameters[$setting];
			// Get the array of valid options, if applicable
			$valid_options = ( isset( $optiondetails['valid_options'] ) ? $optiondetails['valid_options'] : false );
			
			// Validate checkbox fields
			if ( 'checkbox' == $optiondetails['type'] ) {
				// If input value is set and is true, return true; otherwise return false
				$valid_input[$setting] = ( ( isset( $input[$setting] ) && true == $input[$setting] ) ? true : false );
			}
			// Validate radio button fields
			else if ( 'radio' == $optiondetails['type'] ) {
				// Only update setting if input value is in the list of valid options
				$valid_input[$setting] = ( array_key_exists( $input[$setting], $valid_options ) ? $input[$setting] : $valid_input[$setting] );
			}
			// Validate select fields
			else if ( 'select' == $optiondetails['type'] ) {
				// Only update setting if input value is in the list of valid options
				$valid_input[$setting] = ( array_key_exists( $input[$setting], $valid_options ) ? $input[$setting] : $valid_input[$setting] );
			}
			// Validate text input and textarea fields
			else if ( ( 'text' == $optiondetails['type'] || 'textarea' == $optiondetails['type'] ) ) {
				// Validate no-HTML content
				if ( 'nohtml' == $optiondetails['class'] ) {
					// Pass input data through the wp_filter_nohtml_kses filter
					$valid_input[$setting] = wp_filter_nohtml_kses( $input[$setting] );
				}
				// Validate HTML content
				else if ( 'html' == $optiondetails['class'] ) {
					// Pass input data through the wp_filter_kses filter
					$valid_input[$setting] = wp_filter_post_kses( $input[$setting] );
				}
				else if ( 'url' == $optiondetails['class'] || 'img' == $optiondetails['class'] ) {
					//eliminate invalid and dangerous characters
					$valid_input[$setting] = esc_url($valid_input[$setting]);
				}
				else if ( 'email' == $optiondetails['class'] ) {
					if ( $valid_input[$setting] !== '' ){
						$valid_input[$setting] = sanitize_email( $valid_input[$setting] );
						If ( $valid_input[$setting] == '' ){
							add_settings_error(
								$setting, // setting title
								'expressions_email_error', // error ID
								'Please enter a valid e-mail - blank returned', // error message
								'error' // type of message
							);
						}
					}
					if ( $valid_input[$setting] !== '' && ! is_email($valid_input[$setting]) ) {
						$valid_input[$setting] = '';
						add_settings_error(
							$setting, // setting title
							'expressions_email_error', // error ID
							'Please enter a valid e-mail - blank returned', // error message
							'error' // type of message
						);
					}
				}
				else if ( 'hexcolor' == $optiondetails['class'] ) {
					$valid_input[$setting] = trim($valid_input[$setting]); // trim whitespace
					if ($valid_input[$setting] == "") $valid_input[$setting] = $option_defaults[$setting];
					if(substr($valid_input[$setting],0,1) !== '#'){$valid_input[$setting] = '#' . $valid_input[$setting];}
					if(! preg_match('/^#[a-f0-9]{6}$/i', $valid_input[$setting])) {//hex color is valid
						$valid_input[$setting] = $option_defaults[$setting];
						add_settings_error(
							$setting, // setting title
							'expressions_hex_color_error', // error ID
							'Please enter a valid Hex Color Number-default returned.', // error message
							'error' // type of message
						);
					} 
				}
				else {
					// Catch all
					//Pass input data through the wp_filter_kses filter
					$valid_input[$setting] = wp_filter_kses( $input[$setting] );
				}
			}
			// Validate custom fields
			else if ( 'custom' == $optiondetails['type'] ) {
				// Use this section to validate any custom classes
			}
		} 
		// If reset, reset defaults
		elseif ( 'reset' == $submittype ) {
			// Set $setting to the default value
			$valid_input[$setting] = $option_defaults[$setting];
		}
	}
	return $valid_input;		
}


/**
 * Helper function for creating admin messages
 * src: http://www.wprecipes.com/how-to-show-an-urgent-message-in-the-wordpress-admin-area
 *
 * @param (string) $message The message to echo
 * @param (string) $msgclass The message class
 * @return echoes the message
 */	
function ka_express_show_msg($message, $msgclass = 'info') {
	echo "<div id='message' class='$msgclass'>$message</div>";
}


/**
 * Callback function for displaying admin messages
 *
* @return calls ka_express_show_msg()
*/
function ka_express_admin_msgs() {
	// check for our settings page - need this in conditional further down
	if(isset($_GET['page'])){
		$expressions_settings_pg = strpos($_GET['page'], 'expressions-settings');
	} else {
		$expressions_settings_pg = FALSE;
	}
	// collect setting errors/notices: //http://codex.wordpress.org/Function_Reference/get_settings_errors
	$set_errors = get_settings_errors(); 
	
	//display admin message only for the admin to see, only on our settings page and only when setting errors/notices are returned!	
	if(current_user_can ('manage_options') && $expressions_settings_pg !== FALSE && !empty($set_errors)){

		// have our settings succesfully been updated? 
		if($set_errors[0]['code'] == 'settings_updated' && isset($_GET['settings-updated'])){
			ka_express_show_msg("<p>" . $set_errors[0]['message'] . "</p>", 'updated');
		
		// have errors been found?
		}else{
			// there maybe more than one so run a foreach loop.
			foreach($set_errors as $set_error){
				// set the title attribute to match the error "setting title" - need this in js file
				ka_express_show_msg("<p class='setting-error-message' title='" . $set_error['setting'] . "'>" . $set_error['message'] . "</p>", 'error');
			}
		}
	}
}
add_action('admin_notices', 'ka_express_admin_msgs');


/**
 * Globalize the variable that holds 
 * the Settings Page tab definitions
 * 
 * @global	array	Settings Page Tab definitions
 */
global $expressions_tabs;
$expressions_tabs = ka_express_get_settings_page_tabs();
/**
 * Call add_settings_section() for each Settings 
 * 
 * Loop through each Theme Settings page tab, and add 
 * a new section to the Theme Settings page for each 
 * section specified for each tab.
 * 
 * @link	http://codex.wordpress.org/Function_Reference/add_settings_section	Codex Reference: add_settings_section()
 * 
 * @param	string		$sectionid	Unique Settings API identifier; passed to add_settings_field() call
 * @param	string		$title		Title of the Settings page section
 * @param	callback	$callback	Name of the callback function in which section text is output
 * @param	string		$pageid		Name of the Settings page to which to add the section; passed to do_settings_sections()
 */
foreach ( $expressions_tabs as $tab ) {
	$tabname = $tab['name'];
	$tabsections = $tab['sections'];
	foreach ( $tabsections as $section ) {
		$sectionname = $section['name'];
		$sectiontitle = $section['title'];
		// Add settings section
		add_settings_section(
			// $sectionid
			'expressions_' . $sectionname . '_section',
			// $title
			$sectiontitle,
			// $callback
			'ka_express_sections_callback',
			// $pageid
			'expressions_' . $tabname . '_tab'
		);
	}
}


/**
 * Callback for add_settings_section()
 * 
 * Generic callback to output the section text
 * for each Plugin settings section. 
 * 
 * @uses	expressions_get_settings_page_tabs()	Defined in /functions/options.php
 * 
 * @param	array	$section_passed	Array passed from add_settings_section()
 */
function ka_express_sections_callback( $section_passed ) {
	global $expressions_tabs;
	$expressions_tabs = ka_express_get_settings_page_tabs();
	foreach ( $expressions_tabs as $tabname => $tab ) {
		$tabsections = $tab['sections'];
		foreach ( $tabsections as $sectionname => $section ) {
			if ( 'expressions_' . $sectionname . '_section' == $section_passed['id'] ) {
				?>
				<p><?php echo $section['description']; ?></p>
				<?php
			}
		}
	}
}


/**
 * Globalize the variable that holds 
 * all the Theme option parameters
 * 
 * @global	array	Theme options parameters
 */
global $option_parameters;
$option_parameters = ka_express_get_option_parameters();
/**
 * Call add_settings_field() for each Setting Field
 * 
 * Loop through each Theme option, and add a new 
 * setting field to the Theme Settings page for each 
 * setting.
 * 
 * @link	http://codex.wordpress.org/Function_Reference/add_settings_field	Codex Reference: add_settings_field()
 * 
 * @param	string		$settingid	Unique Settings API identifier; passed to the callback function
 * @param	string		$title		Title of the setting field
 * @param	callback	$callback	Name of the callback function in which setting field markup is output
 * @param	string		$pageid		Name of the Settings page to which to add the setting field; passed from add_settings_section()
 * @param	string		$sectionid	ID of the Settings page section to which to add the setting field; passed from add_settings_section()
 * @param	array		$args		Array of arguments to pass to the callback function
 */
foreach ( $option_parameters as $option ) {
	$optionname = $option['name'];
	$optiontitle = $option['title'];
	$optiontab = $option['tab'];
	$optionsection = $option['section'];
	$optiontype = $option['type'];
	if ( 'internal' != $optiontype && 'custom' != $optiontype ) {
		add_settings_field(
			// $settingid
			'expressions_setting_' . $optionname,
			// $title
			$optiontitle,
			// $callback
			'ka_express_setting_callback',
			// $pageid
			'expressions_' . $optiontab . '_tab',
			// $sectionid
			'expressions_' . $optionsection . '_section',
			// $args
			$option
		);
	} if ( 'custom' == $optiontype ) {
		add_settings_field(
			// $settingid
			'expressions_setting_' . $optionname,
			// $title
			$optiontitle,
			//$callback
			'ka_express_setting_' . $optionname,
			// $pageid
			'expressions_' . $optiontab . '_tab',
			// $sectionid
			'expressions_' . $optionsection . '_section'
		);
	}
}


function ka_express_setting_callback( $option ) { //Callback for get_settings_field()
	$expressions_options = ka_express_get_options();
	$option_parameters = ka_express_get_option_parameters();
	$optionname = $option['name'];
	$optiontitle = $option['title'];
	$optiondescription = $option['description'];
	$fieldtype = $option['type'];
	$fieldname = 'theme_expressions_options[' . $optionname . ']';
	$input_class = $option['class'];
	
	// Output checkbox form field markup
	if ( 'checkbox' == $fieldtype ) {
		?>
		<input class="expressions_options <?php echo esc_attr($input_class); ?>"  type="checkbox" name="<?php echo esc_attr($fieldname); ?>" <?php checked( intval( $expressions_options[$optionname] ) ); ?> />
		<?php
	}
	// Output radio button form field markup
	else if ( 'radio' == $fieldtype ) {
		$valid_options = array();
		$valid_options = $option['valid_options'];
		foreach ( $valid_options as $valid_option ) {
			?>
			<input class="expressions_options <?php echo esc_attr($input_class); ?>" 
				type="radio" name="<?php echo esc_attr($fieldname); ?>" <?php checked( $valid_option['name'] == $expressions_options[$optionname] ); ?> 
				value="<?php echo intval( $valid_option['name'] ); ?>" />
			<span>
			<?php echo esc_attr($valid_option['title'] ); ?>
			<?php if ( $valid_option['description'] ) { ?>
				<span style="padding-left:5px;"><em><?php echo esc_attr( $valid_option['description'] ); ?></em></span>
			<?php } ?>
			</span>
			<br />
			<?php
		}
	}
	// Output select form field markup
	else if ( 'select' == $fieldtype ) {
		$valid_options = array();
		$valid_options = $option['valid_options'];
		?>
		<select class="expressions_options <?php echo esc_attr( $input_class ); ?>" name="<?php echo esc_attr( $fieldname ); ?>">
		<?php 
		foreach ( $valid_options as $valid_option ) {
			?>
			<option <?php selected( $valid_option == $expressions_options[$optionname] ); ?> value="<?php echo esc_attr( $valid_option ); ?>"><?php echo esc_attr( $valid_option ); ?></option>
			<?php
		}
		?>
		</select>
		<?php 
	} 
	// Output text input form field markup
	else if ( 'text' == $fieldtype ) {
		if ( $input_class == 'img' || $input_class == 'url' ) { ?>
			<input id="<?php echo esc_attr( $optionname ); ?>" 
				class="expressions_upload_image expressions_options <?php echo esc_attr( $input_class ); ?>" 
				type="text" name="<?php echo esc_attr( $fieldname ); ?>" 
				value="<?php echo esc_url( $expressions_options[$optionname] ); ?>" />
		<?php } elseif( $input_class == 'nohtml' ) { ?>	
			<input id="<?php echo esc_attr( $optionname ); ?>" 
				class="expressions_options <?php echo esc_attr( $input_class ); ?>" 
				type="text" name="<?php echo esc_attr( $fieldname ); ?>" 
				value="<?php echo esc_attr( stripslashes( $expressions_options[$optionname] )); ?>" />
		<?php } else { ?>
			<input id="<?php echo esc_attr( $optionname ); ?>" 
				class="expressions_options <?php echo esc_attr( $input_class ); ?>" 
				type="text" name="<?php echo esc_attr( $fieldname ); ?>" 
				value="<?php esc_html( stripslashes( $expressions_options[$optionname] )); ?>" />
		<?php }
	}
	// Output textarea input form field markup
	else if ( 'textarea' == $fieldtype ) { ?>
		<textarea class="expressions_options <?php echo esc_attr( $input_class ); ?>" 
			type='textarea' name="<?php echo esc_attr( $fieldname ); ?>" 
			rows='5' cols='41'><?php echo esc_textarea( stripslashes( $expressions_options[$optionname] )); ?></textarea>
	<?php }
	 
	// Output the setting description
	if ($input_class == 'img') { ?>
		<input class="expressions_upload_button" type="button" name="<?php echo esc_attr( $optionname ); ?>_add" value="Upload Image" />
	<?php } else { ?>
		<span class="description"><?php echo esc_attr( $optiondescription ); ?></span>
	<?php }
}