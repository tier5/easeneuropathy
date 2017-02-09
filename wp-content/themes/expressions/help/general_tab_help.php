<?php
/**
 * Contextual help file for General tab
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
 
 $html = '';
 
 $html .= '<h1>'.__('Expressions WordPress Theme','ka_express').'</h1>';
 $html .= '<p>'.__('Author Site : ','ka_express').'<a href="http://www.kevinsspace.ca/expressions-wordpress-theme/" target="_blank" >www.kevinsspace.ca/expressions-wordpress-theme/</a></p>';
 $html .= '<p>'.__('Theme Demo Site : ','ka_express').'<a href="http://demo2.kevinsspace.ca/" target="_blank" >demo2.kevinsspace.ca/</a></p>';
 $html .= '<p>'.__('If you try the theme and end up using it, visit the author or demo site to show your appreciation and make a donation.','ka_express').'</p>';
 $html .= '<p>'.__('Detailed documentation is available at the demo site','ka_express').'</p>';
 
 $html .= '<h1>'.__('Expressions General Options','ka_express').'</h1>';
 
 $html .= '<h2>'.__('General Options','ka_express').'</h2>';
 
 $html .= '<p><strong>'.__('Email address for contact page','ka_express').'</strong>'; 
 $html .= ' - '.__('"Settings" => "General" email is used if left blank.','ka_express').'</p>';
 
 $html .= '<p><strong>'.__('Show Favicon','ka_express').'</strong>';
 $html .= ' - '.__('You will need to create a favicon.png 16px x 16px image and place it in the theme root folder.','ka_express').'</p>';
 
 $html .= '<p><strong>'.__('Include Captcha in Comments Form','ka_express').'</strong>';
 $html .= ' - '.__('Check to include a Expressions captcha in the comments form.','ka_express');
 
 $html .= '<p><strong>'.__('Include Captcha in Contact Form','ka_express').'</strong>';
 $html .= ' - '.__('Check to include a Expressions captcha in the Contact Page.','ka_express');
 
 $html .= '<p><strong>'.__('Use color caption option','ka_express').'</strong>';
 $html .= ' - '.__('You can also use a color captcha option, if the black and white captcha is giving you problems try his one.','ka_express').'</p>';
 
 $html .= '<p><strong>'.__('Nivo Slider Transition Effect','ka_express').'</strong>';
 $html .= ' - '.__('Select from 10 slider actions.','ka_express').'</p>';
 
 $html .= '<p><strong>'.__('Nivo Slider Pause Time','ka_express').'</strong>';
 $html .= ' - '.__('Time between start of next slide','ka_express').'</p>';
 
 $html .= '<p><strong>'.__('Nivo Slider Transition Time','ka_express').'</strong>';
 $html .= ' - '.__('Time to change slides','ka_express').'</p>';
 
 $html .= '<h2>'.__('Post Options','ka_express').'</h2>';
 
 $html .= '<p><strong>'.__('Use font icons','ka_express').'</strong>';
 $html .= ' - '.__('This option will use font icons in the post meta, and enables list options.','ka_express');
 $html .= ' '.__('Try it out and see what you think, it\'s very cool.','ka_express').'</p>';
 
 $html .= '<p><strong>'.__('Display Post Format icons','ka_express').'</strong>';
 $html .= ' - '.__('Expressions uses all post formats.','ka_express');
 $html .= ' '.__('Selecting this option displays a identifying Post Format icon to the left of each post.','ka_express').'</p>';
 
 $html .= '<p><strong>'.__('Use Post Format font icons','ka_express').'</strong>';
 $html .= ' - '.__('Select this to use a font icon instead of an image icon.','ka_express').'</p>';

 $html .= '<p><strong>'.__('Include author name in blog posts','ka_express').'</strong>';
 $html .= ' - '.__('If selected the author is displayed in the post meta.','ka_express').'</p>';
 
 $html .= '<p><strong>'.__('Include date in blog posts','ka_express').'</strong>';
 $html .= ' - '.__('If selected the date is displayed in the post meta.','ka_express').'</p>';
 
 $html .= '<p><strong>'.__('Include categories in blog posts','ka_express').'</strong>';
 $html .= ' - '.__('If selected the categories are displayed in the post meta.','ka_express').'</p>';
 
 $html .= '<p><strong>'.__('Include tags in blog posts','ka_express').'</strong>';
 $html .= ' - '.__('If selected the tags are displayed in the post meta.','ka_express').'</p>';
 
 $html .= '<h2>'.__('jQuery Options','ka_express').'</h2>';
 
 $html .= '<p><strong>'.__('Disable colorbox.js plugin','ka_express').'</strong>';
 $html .= ' - '.__('Colorbox is a jQuery plugin used to present gallery photos and single images when selected.','ka_express');
 $html .= ' '.__('You can disable colorbox.js if you are using a different plugin, or are needing to troubleshoot a jQuery problem.','ka_express').'</p>';
 
 $html .= '<p><strong>'.__('Disable fitvids.js plugin','ka_express').'</strong>';
 $html .= ' - '.__('Fitvids is a jQuery plugin used to make embedded video responsive.','ka_express');
 $html .= ' '.__('You can disable fitvids.js if you are using a different colorbox plugin, or are needing to troubleshoot a jQuery problem.','ka_express').'</p>';
 
 $html .= '<p><strong>'.__('Disable responsive post images','ka_express').'</strong>';
 $html .= ' - '.__('This plugin converts images in Expressions so they are responsive, something that is not done directly in WordPress.','ka_express');
 $html .= ' '.__('It may cause issues with certain plugins so try it out and see that it works and see how you like it.','ka_express');
 $html .= ' '.__('You can disable it here if you don\'t like it or are needing to troubleshoot a jQuery problem.','ka_express').'</p>';
 
 $html .= '<h2>'.__('Responsive Options','ka_express').'</h2>';
 
 $html .= '<p><strong>'.__('Mobile Friendly Design','ka_express').'</strong>';
 $html .= ' - '.__('You can choose to disable mobile friendly design, not recommended, but some folks want this option.','ka_express').'</p>';
  
 return $html;
 
?>