<?php
/**
 * Title: Options customizer
 *
 * Description: Defines option fields for theme customizer.
 *
 */

// create the admin menu for the theme options page
function responsive_admin_add_customizer_page() {

	// add the Customize link to the admin menu
	add_theme_page( __( 'Customize', 'responsive' ), __( 'Customize', 'responsive' ), 'edit_theme_options', 'customize.php' );

}

// check if version is less than 3.6
if( get_bloginfo( 'version' ) < 3.6 ) {
	add_action( 'admin_menu', 'responsive_admin_add_customizer_page' );
}

function responsive_customizer_enqueue() {

	// Stylesheets
	wp_enqueue_style( 'responsive-customizer', get_template_directory_uri() . '/pro/options/lib/css/customizer.css', array(), '1.0.0.5' );

	// Javascript
	wp_enqueue_script( 'responsive-customizer', get_template_directory_uri() . '/pro/options/lib/js/customizer.js', array(), '1.0.0.5', true );

}

add_action( 'customize_controls_enqueue_scripts',  'responsive_customizer_enqueue' );

// Adding theme options to the customizer.
function responsive_customize_register( $wp_customize ) {

	/**
	 * Class Responsive_Pro_Form
	 *
	 * Creates a form input type with the option to add description and placeholders
	 *
	 */
	class Responsive_Pro_Form extends WP_Customize_Control {

		public $description = '';
		public $placeholder = '';

		public function render_content() {
			switch( $this->type ) {
				case 'text':
					?>
					<label>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
						<input type="text" <?php if( $this->placeholder != '' ): ?> placeholder="<?php echo esc_attr( $this->placeholder ); ?>"<?php endif; ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> />
						<?php if( $this->description != '' ) : ?>
							<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
						<?php endif; ?>
					</label>
					<?php
					break;
				case 'textarea':
					?>
					<label>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
						<textarea <?php if( $this->placeholder != '' ): ?> placeholder="<?php echo esc_attr( $this->placeholder ); ?>"<?php endif; ?> value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->link(); ?> style="width: 97%; height: 200px;"></textarea>
						<?php if( $this->description != '' ) : ?>
							<span class="customize-control-description"><?php echo esc_html( $this->description ); ?></span>
						<?php endif; ?>
					</label>
					<?php
					break;
			}
		}
	}

	/**
	 * Class Responsive_Pro_Skin_Selector
	 *
	 * Creates and image selector
	 *
	 */
	class Responsive_Pro_Skin_Selector extends WP_Customize_Control {

		public function render_content() {
			?>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php
			foreach( $this->choices as $value => $label ) :

				$test_skin = $this->value();
				$name      = '_customize-radio-' . $this->id;
				$selected  = ( $test_skin == $value ) ? 'of-radio-img-selected' : '';
				$file      = get_template_directory_uri() . '/pro/lib/css/skins/images/' . $value . '.png';
				?>
				<div class="images-skin-subcontainer">
					<label>
						<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link();
						checked( $test_skin, $value ); ?> style="display:none;"/>
						<img src="<?php echo esc_html( $file ); ?>" class="of-radio-img-img <?php echo esc_attr( $selected ); ?>"/>
					</label>
				</div>
			<?php
			endforeach;
		}
	}

	/**
	 * Class Responsive_Layout_Selector
	 *
	 * Creates and image selector
	 *
	 */
	class Responsive_Layout_Selector extends WP_Customize_Control {

		public function render_content() {
			?>

			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php
			foreach( $this->choices as $value => $label ) :

				$test_skin = $this->value();
				$name      = '_customize-radio-' . $this->id;
				$selected  = ( $test_skin == $value ) ? 'of-radio-img-selected' : '';
				$file      = get_template_directory_uri() . '/pro/options/lib/images/featured-area-' . $value . '.png';
				?>
				<div class="images-layout-subcontainer">
					<label>
						<input type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link();
						checked( $test_skin, $value ); ?> style="display:none;"/>
						<img src="<?php echo esc_html( $file ); ?>" class="of-radio-img-img <?php echo esc_attr( $selected ); ?>"/>
					</label>
				</div>
			<?php
			endforeach;
		}
	}

	/**
	 * LOGO UPLOAD
	 */

	/*	
	*	Below code commented to remove theme Logo Upload functionality
	*	Now it makes compatible with default WP Header Image setting only.
	*	Uploading a logo is same as upload a Header Image
	*	commented @since 1.0.2.7
	*/

	/*$wp_customize->add_section( 'responsive_logo_section', array(
		'title'    => __( 'Logo Upload', 'responsive' ),
		'type'     => 'theme_mod',
		'priority' => 34
	) );

	$wp_customize->add_setting( 'header_image' , array(
		'type' => 'image',
		'sanitize_callback' => 'responsive_pro_sanitize_upload'
	));

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logo_upload', array(
		'label'    => __( 'Logo Upload', 'responsive' ),
		'section'  => 'responsive_logo_section',
		'settings' => 'header_image'
		) 
	) );*/	


	/**
	 * CUSTOM FRONT PAGE
	 */
	$wp_customize->add_setting(
		'responsive_theme_options[front_page]',
		array(
			'default'           => 'true',
			'type'              => 'option',
			'sanitize_callback' => 'responsive_pro_checkbox_validate'
		)
	);

	$wp_customize->add_control(
		'front_page',
		array(
			'label'    => __( 'Enable custom front page', 'responsive' ),
			'section'  => 'static_front_page',
			'settings' => 'responsive_theme_options[front_page]',
			'type'     => 'checkbox',
			'priority' => 10
		)
	);

	// Featured area layout
	$wp_customize->add_setting(
		'responsive_theme_options[featured_area_layout]',
		array(
		'default'           => 'default',
		'type'              => 'option',
		'sanitize_callback' => 'responsive_pro_featured_area_layout_validate'
	)
	);

	// Featured area layout
	$wp_customize->add_control(
		new Responsive_Layout_Selector(
			$wp_customize,
			'featured_area_layout',
			array(
				'label'    => __( 'Featured Area Layouts', 'responsive' ),
				'section'  => 'static_front_page',
				'settings' => 'responsive_theme_options[featured_area_layout]',
				'type'     => 'radio',
				'choices'  => array(
					'default'            => __( 'Default', 'responsive' ),					
				),
				'priority' => 11
			)
		)
	);

	// Headline
	$wp_customize->add_setting( 'responsive_theme_options[home_headline]', array(
		'default'           => '',
		'type'              => 'option',
		'sanitize_callback' => 'responsive_pro_html_sanitize'
	) );

	// Headline
	$wp_customize->add_control( new Responsive_Pro_Form( $wp_customize, 'home_headline', array(
		'label'       => __( 'Headline', 'responsive' ),
		'section'     => 'static_front_page',
		'settings'    => 'responsive_theme_options[home_headline]',
		'type'        => 'text',
		'placeholder' => __( 'Hello, World!', 'responsive' ),
		'priority'    => 11
	) ) );

	// Sub headline
	$wp_customize->add_setting( 'responsive_theme_options[home_subheadline]', array(
		'default'           => '',
		'type'              => 'option',
		'sanitize_callback' => 'responsive_pro_html_sanitize'
	) );

	// Sub headline
	$wp_customize->add_control( new Responsive_Pro_Form( $wp_customize, 'home_subheadline', array(
		'label'       => __( 'Subheadline', 'responsive' ),
		'section'     => 'static_front_page',
		'settings'    => 'responsive_theme_options[home_subheadline]',
		'type'        => 'text',
		'placeholder' => __( 'Your H2 subheadline here', 'responsive' ),
		'priority'    => 12
	) ) );

	// Content area
	$wp_customize->add_setting( 'responsive_theme_options[home_content_area]', array(
		'default'           => '',
		'type'              => 'option',
		'sanitize_callback' => 'responsive_pro_html_sanitize'
	) );

	// Content area
	$wp_customize->add_control( new Responsive_Pro_Form( $wp_customize, 'home_content_area', array(
		'label'       => __( 'Content', 'responsive' ),
		'section'     => 'static_front_page',
		'settings'    => 'responsive_theme_options[home_content_area]',
		'type'        => 'textarea',
		'placeholder' => __( 'Your title, subtitle and this very content is editable from Theme Option. Call to Action button and its destination link as well. Image on your right can be an image or even YouTube video if you like.', 'responsive' ),
		'priority'    => 13
	) ) );

	// Call to action URL
	$wp_customize->add_setting( 'responsive_theme_options[cta_url]', array(
		'default'           => '',
		'type'              => 'option',
		'sanitize_callback' => 'responsive_pro_url_sanitize'
	) );

	// Call to action URL
	$wp_customize->add_control( new Responsive_Pro_Form( $wp_customize, 'cta_url', array(
		'label'       => __( 'Call to Action (URL)', 'responsive' ),
		'section'     => 'static_front_page',
		'settings'    => 'responsive_theme_options[cta_url]',
		'type'        => 'text',
		'placeholder' => __( 'Enter your call to action URL', 'responsive' ),
		'priority'    => 14
	) ) );

	// Call to action text
	$wp_customize->add_setting( 'responsive_theme_options[cta_text]', array(
		'default'           => '',
		'type'              => 'option',
		'sanitize_callback' => 'responsive_pro_text_sanitize'
	) );

	// Call to action text
	$wp_customize->add_control( new Responsive_Pro_Form( $wp_customize, 'cta_text', array(
		'label'       => __( 'Call to Action (Text)', 'responsive' ),
		'section'     => 'static_front_page',
		'settings'    => 'responsive_theme_options[cta_text]',
		'type'        => 'text',
		'placeholder' => __( 'Enter your call to action text', 'responsive' ),
		'priority'    => 15
	) ) );

	// Featured content
	$wp_customize->add_setting( 'responsive_theme_options[featured_content]', array(
		'default'           => '',
		'type'              => 'option',
		'sanitize_callback' => 'responsive_pro_code_sanitize'
	) );

	// Content area
	$wp_customize->add_control( new Responsive_Pro_Form( $wp_customize, 'featured_content', array(
		'label'       => __( 'Featured Content', 'responsive' ),
		'section'     => 'static_front_page',
		'settings'    => 'responsive_theme_options[featured_content]',
		'type'        => 'textarea',
		'description' => __( 'Paste your shortcode, video or image source', 'responsive' ),
		'placeholder' => '<img class="aligncenter" src="<?php get_template_directory_uri(); ?>/core/images/featured-image.png" width="440" height="300" alt="" />',
		'priority'    => 16
	) ) );

	/**
	 * CUSTOM CSS
	 */
	$wp_customize->add_section( 'responsive_custom_css', array(
		'title'    => __( 'Custom CSS', 'responsive' ),
		'priority' => 37
	) );
	$wp_customize->add_setting( 'responsive_theme_options[responsive_inline_css]', array(
		'default'           => '',
		'type'              => 'option',
		'sanitize_callback' => 'responsive_pro_code_sanitize'
	) );

	// Content area
	$wp_customize->add_control( new Responsive_Pro_Form( $wp_customize, 'responsive_inline_css', array(
		'label'    => __( 'Custom CSS', 'responsive' ),
		'section'  => 'responsive_custom_css',
		'settings' => 'responsive_theme_options[responsive_inline_css]',
		'type'     => 'textarea'
	) ) );

	//Footer Copyright text
	$wp_customize->add_section( 'footer_section', array(
		'title'                 => __( 'Footer Settings', 'responsive' ),
		'priority'              => 38
	) );
	$wp_customize->add_setting( 'responsive_theme_options[copyright_textbox]',array( 'default' => __('Default copyright text','responsive'),'sanitize_callback' => 'wp_filter_nohtml_kses', 'type' => 'option' ) );

	$wp_customize->add_control(new Responsive_Pro_Form( $wp_customize, 'res_copyright_textbox', array(
		'label'                 => __( 'Copyright text', 'responsive' ),
		'section'               => 'footer_section',
		'settings'              => 'responsive_theme_options[copyright_textbox]',
		'type'                  => 'text'
	)));

	$wp_customize->add_setting( 'responsive_theme_options[poweredby_link]', array( 'default' => 'true', 'sanitize_callback' => 'responsive_pro_checkbox_validate', 'type' => 'option' ) );
	$wp_customize->add_control('res_poweredby_link', array(
		'label'                 => __( 'Display Powered By WordPress Link', 'responsive' ),
		'section'               => 'footer_section',
		'settings'              => 'responsive_theme_options[poweredby_link]',
		'type'                  => 'checkbox'
	));
}

add_action( 'customize_register', 'responsive_customize_register' );

/**
 * Create an array of font options
 *
 * @return array
 */
function responsive_pro_fonts() {
	// Create an array of fonts
	$fonts = array(
		'google'                                           => 'Google Font',
		'Arial, Helvetica, sans-serif'                     => 'Arial',
		'Arial Black, Gadget, sans-serif'                  => 'Arial Black',
		'Comic Sans MS, cursive'                           => 'Comic Sans MS',
		'Courier New, monospace'                           => 'Courier New',
		'Georgia, serif'                                   => 'Georgia',
		'Impact, Charcoal, sans-serif'                     => 'Impact',
		'Lucida Console, Monaco, monospace'                => 'Lucida Console',
		'Lucida Sans Unicode, Lucida Grande, sans-serif'   => 'Lucida Sans Unicode',
		'"Open Sans", sans-serif'                          => 'Open Sans',
		'Palatino Linotype, Book Antiqua, Palatino, serif' => 'Palatino Linotype',
		'Tahoma, Geneva, sans-serif'                       => 'Tahoma',
		'Times New Roman, Times, serif'                    => 'Times New Roman',
		'Trebuchet MS, sans-serif'                         => 'Trebuchet MS',
		'Verdana, Geneva, sans-serif'                      => 'Verdana',
		'MS Sans Serif, Geneva, sans-serif'                => 'MS Sans Serif',
		'MS Serif, New York, serif'                        => 'MS Serif'
	);

	return $fonts;
}

/************************************************************************************************************/
/********************************************* VALIDATION ***************************************************/
/************************************************************************************************************/

/**
 * Validates the Default Layout
 *
 * @param $input select
 *
 * @return string
 */
function responsive_pro_default_layout_validate( $input ) {
	// An array of valid results
	$valid = responsive_get_valid_layouts();

	if( array_key_exists( $input, $valid ) ) {
		return $input;
	}
	else {
		return '';
	}
}

/**
 * Validates the featured area Layout
 *
 * @param $input select
 *
 * @return string
 */
function responsive_pro_featured_area_layout_validate( $input ) {
	// An array of valid results
	$valid = responsive_get_valid_featured_area_layouts();

	if( array_key_exists( $input, $valid ) ) {
		return $input;
	} else {
		return '';
	}
}

/**
 * Validates the Skins
 *
 * @param $input select
 *
 * @return string
 */
function responsive_pro_skin_validate( $input ) {
	// An array of valid results
	$valid = array(
		'default'  => 'Default',
		'blue'     => 'Blue',
		'darkblue' => 'Dark Blue',
		'black'    => 'Black',
		'green'    => 'Green',
		'orange'   => 'Orange',
		'pink'     => 'Pink',
		'red'      => 'Red',
		'purple'   => 'Purple',
		'yellow'   => 'Yellow',
		'rust'     => 'Rust',
		'teal'     => 'Teal'
	);

	if( array_key_exists( $input, $valid ) ) {
		return $input;
	}
	else {
		return '';
	}
}

/**
 * Sanitizes the url input
 *
 * @param $input url
 *
 * @return string
 */
function responsive_pro_url_sanitize( $input ) {

	$input = esc_url( $input );

	return $input;
}

/**
 * Strips tags and html from input
 *
 * @param $input text
 *
 * @return string
 */
function responsive_pro_text_sanitize( $input ) {

	// Remove tags etc
	$input = sanitize_text_field( $input );

	return $input;
}

/**
 * Sanitizes to allow basic html through, same as WP posts
 *
 * @param $input html
 *
 * @return string
 */
function responsive_pro_html_sanitize( $input ) {

	// Strips disallowed tags and balances them in case any have been left off
	$input = wp_kses_post( force_balance_tags( $input ) );

	return $input;
}

/**
 * Sanitizes iframe code etc by stripping slashes
 *
 * @param $input code e.g. iframe
 *
 * @return string
 */
function responsive_pro_code_sanitize( $input ) {

	$input = wp_kses_stripslashes( $input );

	return $input;
}

/**
 * Validates checkbox inputs.
 *
 * @param $input checkbox
 *
 * @return 1 or 0
 */
function responsive_pro_checkbox_validate( $input ) {

	$input = ( $input == 1 ? 1 : 0 );

	return $input;
}

/* Menu Background */
function responsive_pro_sanitize_background( $input ) {
	
	$output = apply_filters( 'cyberchimps_sanitize_hex', $input );

	return $output;
}
add_filter( 'responsive_pro_sanitize_background', 'responsive_pro_sanitize_background' );

function cyberchimps_sanitize_hex( $hex, $default = '' ) {

	if( sanitize_hex_color( $hex ) ) {
		return $hex;
	}

	return $default;
}

/*Header Image Uploader*/
function responsive_pro_sanitize_upload( $input ) {
	$output   = '';
	$filetype = wp_check_filetype( $input );

	// check if gravatar has been set as an image
	if( strpos( $input, 'gravatar' ) ) {
		$output = $input;
	}
	elseif( $filetype["ext"] ) {
		$output = $input;
	}

	return $output;
}

add_filter( 'responsive_pro_sanitize_upload', 'responsive_pro_sanitize_upload' );
