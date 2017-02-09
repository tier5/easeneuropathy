<?php
/**
 * Custom styles file
 *
 * This file is called by functions.php and loads the user selections for background and text colors
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
?>
<?php
	global $kaex_options;
	$kaex_options = ka_express_get_options(); 
	if($kaex_options['kaex_use_skin'] && $kaex_options['kaex_use_skin'] == true){
		switch($kaex_options['kaex_select_skin']) {
			case "Black" :
				if( !function_exists( 'kaex_black_style' ) ) {
					function kaex_black_style () {
						wp_register_style( 'kaex_black_skin',get_template_directory_uri() . '/css'.'/black-skin.css',array(),false,'all' );
						wp_enqueue_style('kaex_black_skin');
					}
					add_action('wp_print_styles','kaex_black_style',11); 
				}	
				break;	
			case "Blue" :
				if( !function_exists( 'kaex_blue_style' ) ) {
					function kaex_blue_style () {
						wp_register_style( 'kaex_blue_skin',get_template_directory_uri() . '/css'.'/blue-skin.css',array(),false,'all' );
						wp_enqueue_style('kaex_blue_skin');
					}
					add_action('wp_print_styles','kaex_blue_style',11);
				}
				break;
			case "Gray" :
				if( !function_exists( 'kaex_gray_style' ) ) {
					function kaex_gray_style () {
						wp_register_style( 'kaex_gray_skin',get_template_directory_uri() . '/css'.'/gray-skin.css',array(),false,'all' );
						wp_enqueue_style('kaex_gray_skin');
					}
					add_action('wp_print_styles','kaex_gray_style',11); 
				}
				break;
			case "Block Brown" :
				if( !function_exists( 'kaex_block_brown_style' ) ) {
					function kaex_block_brown_style () {
						wp_register_style( 'kaex_block_brown_skin',get_template_directory_uri() . '/css'.'/block-brown-skin.css',array(),false,'all' );
						wp_enqueue_style('kaex_block_brown_skin'); 
					}
					add_action('wp_print_styles','kaex_block_brown_style',11);
				}
				break;						
			case "Block Gray" :
				if( !function_exists( 'kaex_block_gray_style' ) ) {
					function kaex_block_gray_style () {
						wp_register_style( 'kaex_block_gray_skin',get_template_directory_uri() . '/css'.'/block-gray-skin.css',array(),false,'all' );
						wp_enqueue_style('kaex_block_gray_skin');
					}
					add_action('wp_print_styles','kaex_block_gray_style',11); 
				}
				break;		
		}
	}
?>