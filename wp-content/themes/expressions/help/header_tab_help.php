<?php
/**
 * Contextual help file for Header tab
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
 
 $html = '';
 $html .= '<h1>'.__('Expressions Header Options','ka_express').'</h1>';

 $html .= '<h2>'.__('General Options','ka_express').'</h2>';
 
 $html .= '<p><strong>'.__('Show LOGO','ka_express').'</strong>'; 
 $html .= ' - '.__('To use a logo this box must be checked and you need to have a logo uploaded using Appearance => Header.','ka_express');
 $html .= ' '.__('Detailed documentation available at the Expressions demo site show you how to do this.','ka_express').'</p>';
 
 $html .= '<p><strong>'.__('Center LOGO','ka_express').'</strong>';
 $html .= ' - '.__('For a centered logo click "Show Logo" and "Center Logo", for left side logo select "Show Logo" and unselect "Center Logo"','ka_express').'</p>';
 
 $html .= '<p><strong>'.__('Show Blog Title','ka_express').'</strong>';
 $html .= ' - '.__('The Title will be centered in the header and come from "Settings" => "General" => "Title"','ka_express').'</p>';
 
 $html .= '<p><strong>'.__('Show Blog Description','ka_express').'</strong>';
 $html .= ' - '.__('The Description will be centered in the header and come from "Settings" => "General" => "Tagline"','ka_express').'</p>';
 
 $html .= '<h2>'.__('Header Menu Options','ka_express').'</h2>';
 
 $html .= '<p><strong>'.__('Menu border options','ka_express').'</strong>';
 $html .= ' - '.__('The menu can have no border, full border or just a border for the menu (center option only)','ka_express').'</p>';
 
 $html .= '<p><strong>'.__('Header menu location','ka_express').'</strong>';
 $html .= ' - '.__('Place the menu left, center or right.','ka_express').'</p>';
 
 $html .= '<h2>'.__('Other Header Options','ka_express').'</h2>'; 
 
 $html .= '<p><strong>'.__('Right Header Area : Widgetized Area','ka_express').'</strong>';
 $html .= ' - '.__('In Appearance=>Widgets you will find the Right Header Area.','ka_express'); 
 $html .= ' '.__('This is where you can add social links or a phone number.','ka_express'); 
 $html .= ' '.__('See the user documentation at the demo site for detailed instructions.','ka_express').'</p>';
 
 $html .= '<p><strong>'.__('Left Header Area : Widgetized Area','ka_express').'</strong>';
 $html .= ' - '.__('In Appearance=>Widgets you will find the Left Header Area.','ka_express'); 
 $html .= ' '.__('This widgetized area is only available if you have unchecked "Show LOGO", "Show Blog Title", and "Show Blog Description".','ka_express'); 
 $html .= ' '.__('This option gives you both the left and right areas in the header as widgetized.','ka_express').'</p>';
 
 $html .= '<p><strong>'.__('Full Width Banner','ka_express').'</strong>';
 $html .= ' - '.__('You can also use a full width banner in Expressions.','ka_express'); 
 $html .= ' '.__('You must have the Left Header Area activated as explained above.','ka_express'); 
 $html .= ' '.__('Upload a full width 960px image, no more that 320 px high using Appearance=>Header.','ka_express').'</p>';
 
 return $html;
 
?>