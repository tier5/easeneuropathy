<?php
/**
 * Contextual help file for FAQ tab
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
 
 $html = '';
 $html .= '<h2>'.__('Expressions Faq','ka_express').'</h2>';
 
 $html .= '<h3>'.__('Where is the documentation for the theme?','ka_express').'</h3>'; 
 $html .= '<p>'.__('Full documentation is available at','ka_express').' <a href="http://demo2.kevinsspace.ca" target="_blank" >demo2.kevinsspace.ca</a></p>';
 
 $html .= '<h3>'.__('When I make a change in my child theme, nothing happens?','ka_express').'</h3>'; 
 $html .= '<p>'.__('You likely are using a skin.','ka_express');
 $html .= ' '.__('Go to the Styles tab in Expression Options and disable the skin.','ka_express');
 $html .= ' '.__('If you want to use the skin\'s styles as a starting point, go to the css/ folder and copy the styles over to your child theme.','ka_express').'</p>';
 
 $html .= '<h3>'.__('I can\'t get the feature slider to work?','ka_express').'</h3>'; 
 $html .= ' '.__('It can be a bit confusing, go to the user docs under the Static Home Page-Feature Section.','ka_express');
 $html .= ' '.__('The feature slider uses posts that have a feature image installed with a specific post category like Feature_1.','ka_express');
 $html .= ' '.__('Then when you set up your page make sure you select the feature you want and select the category you have used for the posts.','ka_express');
 $html .= ' '.__('This is done in the Expressions Page Options section below the content section of the new page edit panel.','ka_express').'</p>';
 
 $html .= '<h3>'.__('I want to make changes to the theme but I don\'t know where to start?','ka_express').'</h3>'; 
 $html .= ' '.__('Use a child theme, that way your changes will be saved when the theme is updated.','ka_express');
 $html .= ' '.__('The WordPress.org site has instructions on child themes.','ka_express');
 $html .= ' '.__('I have also done a blog on child themed for Expressions.','ka_express');
 $html .= ' '.__('Visit the author site.','ka_express').'</p>';
 
 return $html;
 
?>