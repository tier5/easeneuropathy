<?php 
/**
 * Footer Template Part File
 * 
 * Template part file that contains the site footer and
 * closing HTML body elements
 *
 * This file is called by all primary template pages
 * 
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
 	$kaex_showfooter = $kaex_options['kaex_show_footer'];
	$kaex_showcopyright = $kaex_options['kaex_show_copyright_strip'];
	$kaex_footercols = $kaex_options['kaex_footer_cols']; 
?>
	<footer>
		<div id="footer-wrap">
			<?php if ( $kaex_showfooter == 1 ) { ?>
				<div id="footer-col-wrap">
					<div class="footercol-<?php echo $kaex_footercols; ?>">
						<?php if ( !dynamic_sidebar('Footer-A') ) : ?>
							<?php _e('This column is a widget area.','ka_express'); ?><br/><span class="alert"><?php _e('Add widgets to Footer, something, anything!','ka_express'); ?></span>
						<?php endif; ?>
					</div>
					<div class="footercol-<?php echo $kaex_footercols; ?>">
						<?php if ( !dynamic_sidebar('Footer-B') ) : ?>
							<?php _e('This column is a widget area.','ka_express'); ?><br/><span class="alert"><?php _e('Add widgets to Footer, something, anything!','ka_express'); ?></span>
						<?php endif; ?>
					</div>
					<div class="footercol-<?php echo $kaex_footercols; ?>">
						<?php if ( !dynamic_sidebar('Footer-C') ) : ?>
							<?php _e('This column is a widget area.','ka_express'); ?><br/><span class="alert"><?php _e('Add widgets to Footer, something, anything!','ka_express'); ?></span>
						<?php endif; ?>
					</div>
					<?php if ( $kaex_footercols == 4 ) { ?>  	
						<div class="footercol-4">
							<?php if ( !dynamic_sidebar('Footer-D') ) : ?>
								<?php _e('This column is a widget area.','ka_express'); ?><br/><span class="alert"><?php _e('Add widgets to Footer, something, anything!','ka_express'); ?></span>
							<?php endif; ?>
						</div>
					<?php } ?>
				</div>
			<?php } ?>
			</div>
	</footer>
		
			<?php if ( $kaex_showcopyright == 1 ) { ?>
				<div class="clearfix"></div>
				<div id="copyright">
					<div id="copyright-wrap">
						<span class="copyright_c1"><?php echo stripcslashes($kaex_options['kaex_left_copyright_text']) ?></span>
						<span class="copyright_c2"><?php echo stripcslashes($kaex_options['kaex_middle_copyright_text']) ?></span>
						<span class="copyright_c3"><?php echo stripcslashes($kaex_options['kaex_right_copyright_text']) ?></span>
					</div>
				</div>
			<?php } ?>



<?php wp_footer(); ?>
</body>
</html>