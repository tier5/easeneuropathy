<?php
/**
 * Contextual help file for Social tab
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
 
 $html = '';
 $html .= '<h1>'.__('Expressions Social Theme','ka_express').'</h1>';

 $html .= '<h2>'.__('General Social Options','ka_express').'</h2>';
 
 $html .= '<p><strong>'.__('Use Social font icons','ka_express').'</strong>'; 
 $html .= ' - '.__('Font icons will be used instead of images.','ka_express').'</p>';

 $html .= '<h2>'.__('Social Links','ka_express').'</h2>';
 $html .= '<p><strong>'.__('Social Links','ka_express').'</strong>';
 $html .= ' - '.__('Input your social links here. Make sure you test the link to ensure it works.','ka_express');
 $html .= ' '.__('Social links can be added to any widgetized area by using the "Expressions Social Links Widget".','ka_express').'</p>';
 
 return $html;
 
?>