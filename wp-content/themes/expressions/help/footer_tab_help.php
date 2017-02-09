<?php
/**
 * Contextual help file for Footer tab
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
 
 $html = '';
 $html .= '<h1>'.__('Expressions Footer Options','ka_express').'</h1>';
 
 $html .= '<h2>'.__('Footer Options','ka_express').'</h2>';
 
 $html .= '<p><strong>'.__('Show Footer Area','ka_express').'</strong>'; 
 $html .= ' - '.__('Uncheck this option and the footer will not be shown.','ka_express').'</p>';
 
 $html .= '<p><strong>'.__('Select footer columns','ka_express').'</strong>';
 $html .= ' - '.__('You can have a 3 or 4 column footer.','ka_express').'</p>';
 
 $html .= '<h2>'.__('Copyright Strip Options','ka_express').'</h2>';
 
 $html .= '<p><strong>'.__('Show Copyright Strip','ka_express').'</strong>'; 
 $html .= ' - '.__('Uncheck this option and the copyright strip will not be shown.','ka_express').'</p>';
 
 $html .= '<p><strong>'.__('Copyright','ka_express').'</strong>';
 $html .= ' - '.__('The copyright section is a strip at the bottom of the footer that accepts html.','ka_express').' ';
 $html .= ' '.__('Important - use single quotes for the html properties or funny things happen!','ka_express').' ';
 return $html;
 
?>