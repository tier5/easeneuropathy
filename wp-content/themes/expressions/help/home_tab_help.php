<?php
/**
 * Contextual help file for Home tab
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
 
 $html = '';
 
 
 $html .= '<h1>'.__('Expressions Home Page Options','ka_express').'</h1>';
 
 $html .= '<p>'.__('Theme Demo Site : ','ka_express').'<a href="http://demo2.kevinsspace.ca/" target="_blank" >demo2.kevinsspace.ca/</a></p>';
 
 $html .= '<p>'.__('There are quite a few options for the home page. Please refer to the user documentation at the demo site.','ka_express').'<br/> ';
 $html .= __('The documentation takes you through setting up the home page step by step.','ka_express').'</p>';
 
 $html .= '<h2>'.__('Home Page Layout Options','ka_express').'</h2>';
 
 $html .= '<p>'.__('Any of the 8 layout Sections can be used in any any the 8 Areas.','ka_express');
 $html .= ' '.__('Simply select a layout option from the dropdown list.','ka_express');
 $html .= ' '.__('Then make sure that section is populated with the information you want.','ka_express').'</p>';
 
 return $html;
 
?>