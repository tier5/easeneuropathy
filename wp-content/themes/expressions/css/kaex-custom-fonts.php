<?php
/**
 * Custom fonts file
 *
 * This file is called by functions.php and loads the user selections for fonts
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
?>
<?php 
 /* Get the user choices for the theme options */
$kaex_options = ka_express_get_options();
?>
<?php 
	if($kaex_options['kaex_header_font_option'] && $kaex_options['kaex_header_font_option'] == 'google web fonts'){
		$header_font = $kaex_options['kaex_google_header_font'];
		switch ($header_font) {
			case "Cabin, Helvetica, Arial, sans-serif" :
				echo '<link href="http://fonts.googleapis.com/css?family=Cabin:400,400italic" rel="stylesheet" type="text/css">';
				break;
			case "Raleway, Helvetica, Arial, sans-serif" :
				echo '<link href="http://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">';
				break;
			case "Allerta, Helvetica, Arial, sans-serif" :
				echo '<link href="http://fonts.googleapis.com/css?family=Allerta" rel="stylesheet" type="text/css">';
				break;
			case "Arvo, Georgia, Times, serif" :
				echo '<link href="http://fonts.googleapis.com/css?family=Arvo:400,400italic,700,700italic" rel="stylesheet" type="text/css">';
				break;
			case "Molengo, Georgia, Times, serif" :
				echo '<link href="http://fonts.googleapis.com/css?family=Molengo" rel="stylesheet" type="text/css">';
				break;
			case "Lekton, Helvetica, Arial, sans-serif" :
				echo '<link href="http://fonts.googleapis.com/css?family=Lekton:400,400italic" rel="stylesheet" type="text/css">';
				break;
			case "'Droid Serif', Georgia, Times, serif" :
				echo '<link href="http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic" rel="stylesheet" type="text/css">';
				break;
			case "'Droid Sans', Helvetica, Arial, sans-serif" :
				echo '<link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet" type="text/css">';
				break;
			case "Corben, Georgia, Times, serif" :
				echo '<link href="http://fonts.googleapis.com/css?family=Corben" rel="stylesheet" type="text/css">';
				break;
			case "Nobile, Helvetica, Arial, sans-serif" :
				echo '<link href="http://fonts.googleapis.com/css?family=Nobile:400,400italic,700,700italic" rel="stylesheet" type="text/css">';
				break;
			case "Ubuntu, Helvetica, Arial, sans-serif" :
				echo '<link href="http://fonts.googleapis.com/css?family=Ubuntu:400,400italic" rel="stylesheet" type="text/css">';
				break;
			case "Vollkorn, Georgia, Times, serif" :
				echo '<link href="http://fonts.googleapis.com/css?family=Vollkorn:400,400italic" rel="stylesheet" type="text/css">';
				break;
		}
	} elseif($kaex_options['kaex_header_font_option'] && $kaex_options['kaex_header_font_option'] == '@font-face web fonts') {
		$header_font = $kaex_options['kaex_fontface_header_font'];
		switch ($header_font) {
			case 'Artifika, Georgia, Times, serif' :
				?>
					<style type="text/css" >
						@font-face {
					    font-family: Artifika;
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Artifika/Artifika-Regular-webfont.eot');
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Artifika/Artifika-Regular-webfont.eot?#iefix') format('embedded-opentype'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Artifika/Artifika-Regular-webfont.woff') format('woff'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Artifika/Artifika-Regular-webfont.ttf') format('truetype'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Artifika/Artifika-Regular-webfont.svg#MyndraineRegular') format('svg');
					    font-weight: normal;
					    font-style: normal;
					   }
					</style>
				<?php 					
			break;
			case "'Bitstream Vera', Helvetica, Arial, sans-serif" :
				?>
					<style type="text/css" >
						@font-face {
					    font-family: 'Bitstream Vera';
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Bitstream-Vera-Sans/Vera-webfont.eot');
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Bitstream-Vera-Sans/Vera-webfont.eot?#iefix') format('embedded-opentype'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Bitstream-Vera-Sans/Vera-webfont.woff') format('woff'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Bitstream-Vera-Sans/Vera-webfont.ttf') format('truetype'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Bitstream-Vera-Sans/Vera-webfont.svg#MyndraineRegular') format('svg');
					    font-weight: normal;
					    font-style: normal;
					   }
					</style>
				<?php 					
			break;
			case "'Gentium Basic', Georgia, Times, serif" :
				?>
					<style type="text/css" >
						@font-face {
					    font-family: 'Gentium Basic';
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Gentium-Basic/GenBasR-webfont.eot');
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Gentium-Basic/GenBasR-webfont.eot?#iefix') format('embedded-opentype'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Gentium-Basic/GenBasR-webfont.woff') format('woff'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Gentium-Basic/GenBasR-webfont.ttf') format('truetype'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Gentium-Basic/GenBasR-webfont.svg#MyndraineRegular') format('svg');
					    font-weight: normal;
					    font-style: normal;
					   }
					</style>
				<?php 					
			break;
			case 'Josefin, Georgia, Times, serif' :
				?>
					<style type="text/css" >
						@font-face {
					    font-family: Josefin;
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Josefin/JosefinSlab-Regular-webfont.eot');
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Josefin/JosefinSlab-Regular-webfont.eot?#iefix') format('embedded-opentype'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Josefin/JosefinSlab-Regular-webfont.woff') format('woff'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Josefin/JosefinSlab-Regular-webfont.ttf') format('truetype'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Josefin/JosefinSlab-Regular-webfont.svg#MyndraineRegular') format('svg');
					    font-weight: normal;
					    font-style: normal;
					   }
					</style>
				<?php 					
			break;
			case "'Lobster Two', Georgia, Times, serif" :
				?>
					<style type="text/css" >
						@font-face {
					    font-family: 'Lobster Two';
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Lobster-Two/LobsterTwo-Regular-webfont.eot');
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Lobster-Two/LobsterTwo-Regular-webfont.eot?#iefix') format('embedded-opentype'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Lobster-Two/LobsterTwo-Regular-webfont.woff') format('woff'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Lobster-Two/LobsterTwo-Regular-webfont.ttf') format('truetype'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Lobster-Two/LobsterTwo-Regular-webfont.svg#MyndraineRegular') format('svg');
					    font-weight: normal;
					    font-style: normal;
					   }
					</style>
				<?php 					
			break;					
			case "'Old Standard', Georgia, Times, serif" :
				?>
					<style type="text/css" >
						@font-face {
					    font-family: 'Old Standard';
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Old-Standard/OldStandard-Regular-webfont.eot');
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Old-Standard/OldStandard-Regular-webfont.eot?#iefix') format('embedded-opentype'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Old-Standard/OldStandard-Regular-webfont.woff') format('woff'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Old-Standard/OldStandard-Regular-webfont.ttf') format('truetype'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Old-Standard/OldStandard-Regular-webfont.svg#MyndraineRegular') format('svg');
					    font-weight: normal;
					    font-style: normal;
					   }
					</style>
				<?php 					
			break;		
			case "'PT Serif', Georgia, Times, serif":
					?>
						<style type="text/css" >
							@font-face {
						    font-family: 'PT Serif';
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/PT-Serif/PTF55F-webfont.eot');
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/PT-Serif/PTF55F-webfont.eot?#iefix') format('embedded-opentype'),
						         url('<?php echo get_template_directory_uri(); ?>/fonts/PT-Serif/PTF55F-webfont.woff') format('woff'),
						         url('<?php echo get_template_directory_uri(); ?>/fonts/PT-Serif/PTS55F-webfont.ttf') format('truetype'),
						         url('<?php echo get_template_directory_uri(); ?>/fonts/PT-Serif/PTF55F-webfont.svg#PTSerifRegular') format('svg');
						    font-weight: normal;
						    font-style: normal;
						   }
						</style>
					<?php 
				break;
			case "'PT Sans', Helvetica, Arial, sans-serif":
				?>
					<style type="text/css" >
						@font-face {
					    font-family: 'PT Sans';
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/PT-Sans/PTS55F-webfont.eot');
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/PT-Sans/PTS55F-webfont.eot?#iefix') format('embedded-opentype'),
					         url('<?php echo get_template_directory_uri(); ?>/fonts/PT-Sans/PTS55F-webfont.woff') format('woff'),
					         url('<?php echo get_template_directory_uri(); ?>/fonts/PT-Sans/PTS55F-webfont.ttf') format('truetype'),
					         url('<?php echo get_template_directory_uri(); ?>/fonts/PT-Sans/PTS55F-webfont.svg#PTSansRegular') format('svg');
					    font-weight: normal;
					    font-style: normal;
					   }
					</style>
				<?php 
			break;
			case "'Puritan 2.0', Helvetica, Arial, sans-serif" :
				?>
					<style type="text/css" >
						@font-face {
					    font-family: 'Puritan 2.0';
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Puritan-2.0/Puritan_Regular-webfont.eot');
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Puritan-2.0/Puritan_Regular-webfont.eot?#iefix') format('embedded-opentype'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Puritan-2.0/Puritan_Regular-webfont.woff') format('woff'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Puritan-2.0/Puritan_Regular-webfont.ttf') format('truetype'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Puritan-2.0/Puritan_Regular-webfont.svg#MyndraineRegular') format('svg');
					    font-weight: normal;
					    font-style: normal;
					   }
					</style>
				<?php 					
			break;	
			case "'Qumpellka 12', Georgia, Times, serif" :
				?>
					<style type="text/css" >
						@font-face {
					    font-family: 'Qumpellka 12';
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Qumpellkano12/QumpellkaNo12-webfont.eot');
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Qumpellkano12/QumpellkaNo12-webfont.eot?#iefix') format('embedded-opentype'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Qumpellkano12/QumpellkaNo12-webfont.woff') format('woff'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Qumpellkano12/QumpellkaNo12-webfont.ttf') format('truetype'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Qumpellkano12/QumpellkaNo12-webfont.svg#MyndraineRegular') format('svg');
					    font-weight: normal;
					    font-style: normal;
					   }
					</style>
				<?php 					
			break;
			case "'Source Code Pro', Courier, 'Courier New', sans-serif" :
				?>
					<style type="text/css" >
						@font-face {
					    font-family: 'Source Code Pro';
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Source-Code-Pro/SourceCodePro-Regular-webfont.eot');
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Source-Code-Pro/SourceCodePro-Regular-webfont.eot?#iefix') format('embedded-opentype'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Source-Code-Pro/SourceCodePro-Regular-webfont.woff') format('woff'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Source-Code-Pro/SourceCodePro-Regular-webfont.ttf') format('truetype'),
							 url('<?php echo get_template_directory_uri(); ?>/fonts/Source-Code-Pro/SourceCodePro-Regular-webfont.svg#MyndraineRegular') format('svg');
					    font-weight: normal;
					    font-style: normal;
					   }
					</style>
				<?php 					
			break;				
			case "Titillium, Helvetica, Arial, sans-serif":
				?>
					<style type="text/css" >
						@font-face {
					    font-family: 'Titillium';
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Titillium/TitilliumText25L003-webfont.eot');
					    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Titillium/TitilliumText25L003-webfont.eot?#iefix') format('embedded-opentype'),
					         url('<?php echo get_template_directory_uri(); ?>/fonts/Titillium/TitilliumText25L003-webfont.woff') format('woff'),
					         url('<?php echo get_template_directory_uri(); ?>/fonts/Titillium/TitilliumText25L003-webfont.ttf') format('truetype'),
					         url('<?php echo get_template_directory_uri(); ?>/fonts/Titillium/TitilliumText25L003-webfont.svg#TitilliumText25L400wt') format('svg');
					    font-weight: normal;
					    font-style: normal;
					   }
					</style>
				<?php 
			break;
		}
	}else {
		$header_font = $kaex_options['kaex_standard_header_font'];
	}
	if($kaex_options['kaex_body_font_option'] && $kaex_options['kaex_body_font_option'] == 'google web fonts'){
		$body_font = $kaex_options['kaex_google_body_font'];
		if( $header_font != $body_font ) {
			switch ($body_font) {
				case "Cabin, Helvetica, Arial, sans-serif" :
					echo '<link href="http://fonts.googleapis.com/css?family=Cabin:400,400italic" rel="stylesheet" type="text/css">';
					break;
				case "Raleway, Helvetica, Arial, sans-serif" :
					echo '<link href="http://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">';
					break;
				case "Allerta, Helvetica, Arial, sans-serif" :
					echo '<link href="http://fonts.googleapis.com/css?family=Allerta" rel="stylesheet" type="text/css">';
					break;
				case "Arvo, Georgia, Times, serif" :
					echo '<link href="http://fonts.googleapis.com/css?family=Arvo:400,400italic,700,700italic" rel="stylesheet" type="text/css">';
					break;
				case "Molengo, Georgia, Times, serif" :
					echo '<link href="http://fonts.googleapis.com/css?family=Molemgo" rel="stylesheet" type="text/css">';
					break;
				case "Lekton, Helvetica, Arial, sans-serif" :
					echo '<link href="http://fonts.googleapis.com/css?family=Lekton:400,400italic" rel="stylesheet" type="text/css">';
					break;
				case "'Droid Serif', Georgia, Times, serif" :
					echo '<link href="http://fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700,700italic" rel="stylesheet" type="text/css">';
					break;
				case "'Droid Sans', Helvetica, Arial, sans-serif" :
					echo '<link href="http://fonts.googleapis.com/css?family=Droid+Sans:400,700" rel="stylesheet" type="text/css">';
					break;
				case "Corben, Georgia, Times, serif" :
					echo '<link href="http://fonts.googleapis.com/css?family=Corben" rel="stylesheet" type="text/css">';
					break;
				case "Nobile, Helvetica, Arial, sans-serif" :
					echo '<link href="http://fonts.googleapis.com/css?family=Nobile:400,400italic,700,700italic" rel="stylesheet" type="text/css">';
					break;
				case "Ubuntu, Helvetica, Arial, sans-serif" :
					echo '<link href="http://fonts.googleapis.com/css?family=Ubuntu:400,400italic" rel="stylesheet" type="text/css">';
					break;
				case "Vollkorn, Georgia, Times, serif" :
					echo '<link href="http://fonts.googleapis.com/css?family=Vollkorn:400,400italic" rel="stylesheet" type="text/css">';
					break;
			}
		}
	} elseif ($kaex_options['kaex_body_font_option'] && $kaex_options['kaex_body_font_option'] == '@font-face web fonts'){
		$body_font = $kaex_options['kaex_fontface_body_font'];
		if( $header_font != $body_font ) {
			switch ($body_font) {
				case 'Artifika, Georgia, Times, serif' :
					?>
						<style type="text/css" >
							@font-face {
						    font-family: Artifika;
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Artifika/Artifika-Regular-webfont.eot');
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Artifika/Artifika-Regular-webfont.eot?#iefix') format('embedded-opentype'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Artifika/Artifika-Regular-webfont.woff') format('woff'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Artifika/Artifika-Regular-webfont.ttf') format('truetype'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Artifika/Artifika-Regular-webfont.svg#MyndraineRegular') format('svg');
						    font-weight: normal;
						    font-style: normal;
						   }
						</style>
					<?php 					
				break;
				case "'Bitstream Vera', Helvetica, Arial, sans-serif" :
					?>
						<style type="text/css" >
							@font-face {
						    font-family: 'Bitstream Vera';
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Bitstream-Vera-Sans/Vera-webfont.eot');
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Bitstream-Vera-Sans/Vera-webfont.eot?#iefix') format('embedded-opentype'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Bitstream-Vera-Sans/Vera-webfont.woff') format('woff'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Bitstream-Vera-Sans/Vera-webfont.ttf') format('truetype'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Bitstream-Vera-Sans/Vera-webfont.svg#MyndraineRegular') format('svg');
						    font-weight: normal;
						    font-style: normal;
						   }
						</style>
					<?php 					
				break;
				case "'Gentium Basic', Georgia, Times, serif" :
					?>
						<style type="text/css" >
							@font-face {
						    font-family: 'Gentium Basic';
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Gentium-Basic/GenBasR-webfont.eot');
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Gentium-Basic/GenBasR-webfont.eot?#iefix') format('embedded-opentype'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Gentium-Basic/GenBasR-webfont.woff') format('woff'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Gentium-Basic/GenBasR-webfont.ttf') format('truetype'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Gentium-Basic/GenBasR-webfont.svg#MyndraineRegular') format('svg');
						    font-weight: normal;
						    font-style: normal;
						   }
						</style>
					<?php 					
				break;
				case 'Josefin, Georgia, Times, serif' :
					?>
						<style type="text/css" >
							@font-face {
						    font-family: Josefin;
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Josefin/JosefinSlab-Regular-webfont.eot');
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Josefin/JosefinSlab-Regular-webfont.eot?#iefix') format('embedded-opentype'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Josefin/JosefinSlab-Regular-webfont.woff') format('woff'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Josefin/JosefinSlab-Regular-webfont.ttf') format('truetype'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Josefin/JosefinSlab-Regular-webfont.svg#MyndraineRegular') format('svg');
						    font-weight: normal;
						    font-style: normal;
						   }
						</style>
					<?php 					
				break;
				case "'Lobster Two', Georgia, Times, serif" :
					?>
						<style type="text/css" >
							@font-face {
						    font-family: 'Lobster Two';
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Lobster-Two/LobsterTwo-Regular-webfont.eot');
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Lobster-Two/LobsterTwo-Regular-webfont.eot?#iefix') format('embedded-opentype'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Lobster-Two/LobsterTwo-Regular-webfont.woff') format('woff'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Lobster-Two/LobsterTwo-Regular-webfont.ttf') format('truetype'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Lobster-Two/LobsterTwo-Regular-webfont.svg#MyndraineRegular') format('svg');
						    font-weight: normal;
						    font-style: normal;
						   }
						</style>
					<?php 					
				break;					
				case "'Old Standard', Georgia, Times, serif" :
					?>
						<style type="text/css" >
							@font-face {
						    font-family: 'Old Standard';
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Old-Standard/OldStandard-Regular-webfont.eot');
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Old-Standard/OldStandard-Regular-webfont.eot?#iefix') format('embedded-opentype'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Old-Standard/OldStandard-Regular-webfont.woff') format('woff'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Old-Standard/OldStandard-Regular-webfont.ttf') format('truetype'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Old-Standard/OldStandard-Regular-webfont.svg#MyndraineRegular') format('svg');
						    font-weight: normal;
						    font-style: normal;
						   }
						</style>
					<?php 					
				break;		
				case "'PT Serif', Georgia, Times, serif":
						?>
							<style type="text/css" >
								@font-face {
							    font-family: 'PT Serif';
							    src: url('<?php echo get_template_directory_uri(); ?>/fonts/PT-Serif/PTF55F-webfont.eot');
							    src: url('<?php echo get_template_directory_uri(); ?>/fonts/PT-Serif/PTF55F-webfont.eot?#iefix') format('embedded-opentype'),
							         url('<?php echo get_template_directory_uri(); ?>/fonts/PT-Serif/PTF55F-webfont.woff') format('woff'),
							         url('<?php echo get_template_directory_uri(); ?>/fonts/PT-Serif/PTS55F-webfont.ttf') format('truetype'),
							         url('<?php echo get_template_directory_uri(); ?>/fonts/PT-Serif/PTF55F-webfont.svg#PTSerifRegular') format('svg');
							    font-weight: normal;
							    font-style: normal;
							   }
							</style>
						<?php 
					break;
				case "'PT Sans', Helvetica, Arial, sans-serif":
					?>
						<style type="text/css" >
							@font-face {
						    font-family: 'PT Sans';
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/PT-Sans/PTS55F-webfont.eot');
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/PT-Sans/PTS55F-webfont.eot?#iefix') format('embedded-opentype'),
						         url('<?php echo get_template_directory_uri(); ?>/fonts/PT-Sans/PTS55F-webfont.woff') format('woff'),
						         url('<?php echo get_template_directory_uri(); ?>/fonts/PT-Sans/PTS55F-webfont.ttf') format('truetype'),
						         url('<?php echo get_template_directory_uri(); ?>/fonts/PT-Sans/PTS55F-webfont.svg#PTSansRegular') format('svg');
						    font-weight: normal;
						    font-style: normal;
						   }
						</style>
					<?php 
				break;
				case "'Puritan 2.0', Helvetica, Arial, sans-serif" :
					?>
						<style type="text/css" >
							@font-face {
						    font-family: 'Puritan 2.0';
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Puritan-2.0/Puritan_Regular-webfont.eot');
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Puritan-2.0/Puritan_Regular-webfont.eot?#iefix') format('embedded-opentype'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Puritan-2.0/Puritan_Regular-webfont.woff') format('woff'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Puritan-2.0/Puritan_Regular-webfont.ttf') format('truetype'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Puritan-2.0/Puritan_Regular-webfont.svg#MyndraineRegular') format('svg');
						    font-weight: normal;
						    font-style: normal;
						   }
						</style>
					<?php 					
				break;	
				case "'Qumpellka 12', Georgia, Times, serif" :
					?>
						<style type="text/css" >
							@font-face {
						    font-family: 'Qumpellka 12';
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Qumpellkano12/QumpellkaNo12-webfont.eot');
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Qumpellkano12/QumpellkaNo12-webfont.eot?#iefix') format('embedded-opentype'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Qumpellkano12/QumpellkaNo12-webfont.woff') format('woff'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Qumpellkano12/QumpellkaNo12-webfont.ttf') format('truetype'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Qumpellkano12/QumpellkaNo12-webfont.svg#MyndraineRegular') format('svg');
						    font-weight: normal;
						    font-style: normal;
						   }
						</style>
					<?php 					
				break;
				case "'Source Code Pro', Courier, 'Courier New', sans-serif" :
					?>
						<style type="text/css" >
							@font-face {
						    font-family: 'Source Code Pro';
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Source-Code-Pro/SourceCodePro-Regular-webfont.eot');
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Source-Code-Pro/SourceCodePro-Regular-webfont.eot?#iefix') format('embedded-opentype'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Source-Code-Pro/SourceCodePro-Regular-webfont.woff') format('woff'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Source-Code-Pro/SourceCodePro-Regular-webfont.ttf') format('truetype'),
								 url('<?php echo get_template_directory_uri(); ?>/fonts/Source-Code-Pro/SourceCodePro-Regular-webfont.svg#MyndraineRegular') format('svg');
						    font-weight: normal;
						    font-style: normal;
						   }
						</style>
					<?php 					
				break;				
				case "Titillium, Helvetica, Arial, sans-serif":
					?>
						<style type="text/css" >
							@font-face {
						    font-family: 'Titillium';
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Titillium/TitilliumText25L003-webfont.eot');
						    src: url('<?php echo get_template_directory_uri(); ?>/fonts/Titillium/TitilliumText25L003-webfont.eot?#iefix') format('embedded-opentype'),
						         url('<?php echo get_template_directory_uri(); ?>/fonts/Titillium/TitilliumText25L003-webfont.woff') format('woff'),
						         url('<?php echo get_template_directory_uri(); ?>/fonts/Titillium/TitilliumText25L003-webfont.ttf') format('truetype'),
						         url('<?php echo get_template_directory_uri(); ?>/fonts/Titillium/TitilliumText25L003-webfont.svg#TitilliumText25L400wt') format('svg');
						    font-weight: normal;
						    font-style: normal;
						   }
						</style>
					<?php 
				break;
			}
		}
	} else {
		$body_font = $kaex_options['kaex_standard_body_font'];
	}
?>
<style type="text/css" >
	<?php if( $header_font != 'default' ) { ?>
		h1, h2, h3, h4, h5, h6 {font-family:<?php echo $header_font; ?>;}
	<?php } ?>
	<?php if( $body_font != 'default' ) { ?>
		body {font-family:<?php echo $body_font; ?>;}
	<?php } ?>
</style>