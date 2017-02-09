<?php
/**
 * Contextual help file for Sidebars tab
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
 
 $html = '';
 $html .= '<h1>'.__('Expressions Sidebar Options','ka_express').'</h1>';
 
 $html .= '<h2>'.__('General Sidebar Options','ka_express').'</h2>';
 
 $html .= '<p><strong>'.__('Use full width for single posts','ka_express').'</strong>'; 
 $html .= ' - '.__('If you are using the full width blog option you can also display single posts without a sidebar.','ka_express').'</p>';
 
 $html .= '<h2>'.__('Sidebar Location Options','ka_express').'</h2>';
 
 $html .= '<p><strong>'.__('WordPress Pages','ka_express').'</strong>'; 
 $html .= ' - '.__('All standard WordPress page sidebars can be set on the left or right side.','ka_express').'</p>';
 
 $html .= '<p><strong>'.__('Custom Pages','ka_express').'</strong>'; 
 $html .= ' - '.__('If you create a new page you can select the sidebar you want and the location.','ka_express');
 $html .= ' '.__('At the bottom of the Page Edit Panel is the Expressions Page Options Meta Box.','ka_express');
 $html .= ' '.__('You can select the sidebar and the location there.','ka_express').'</p>';
 
 return $html;
 
?>