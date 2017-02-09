<?php
/**
 * Contextual help file for Styles tab
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
 
 $html = '';
 $html .= '<h1>'.__('Expressions Style Options','ka_express').'</h1>';

 $html .= '<h2>'.__('Skin Options','ka_express').'</h2>';
 
 $html .= '<p>'.__('Skins are predefined styles for your theme. Simply check the box if you want to use a skin and select one of the available skins.','ka_express').'</p>'; 

 $html .= '<p>'.__('If uou are using a Child Theme make sure this option is not selected.','ka_express');
 $html .= ' '.__('If you want to use the styles of a skin in your Child Theme, then copy the styles from the skin file to your child theme style.css file.','ka_express');
 $html .= ' '.__('The skin files are found in the expressions/css/ folder.','ka_express').'</p>';
 
 $html .= '<h2>'.__('Font Options','ka_express').'</h2>';
 
 $html .= '<p>'.__('You can select a font for the headers and a font for the body.','ka_express').'<br/>';
 $html .= __('There are three font options (sources) you can choose from.','ka_express').'<br/>';
 $html .= __('Start by selecting the font option, then select the font from the selected option drop down box','ka_express').'</p>'; 
 return $html;
 
?>