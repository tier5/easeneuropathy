<?php
/**
 * Category Page template file
 *
 * This file delivers all the comments, pingbacks, trackbacks, and the 
 * comment form when called. It is the default file called in the comments_template() call
 *
 * @package		Expressions WordPress Theme
 * @copyright	Copyright (c) 2013, Kevin Archibald
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */
global $kaex_options;
$use_font_icons = $kaex_options['kaex_use_font_icons'];
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!','ka_express') );

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','ka_express'); ?></p>
	<?php
		return;
	}
// Bottom of do not detete section
if( comments_open() ) {
 	
	$number_comments = count($wp_query->comments_by_type['comment']); ?>

	<h4 class="comments-title"><?php If($number_comments==0){ echo 'No Comments Yet';}elseif($number_comments==1){echo '1 Comment So Far';}else{echo $number_comments.' Comments';}  ?></h4>
	<div class="commentlist">
		<?php wp_list_comments('type=comment&callback=ka_express_comment&avatar_size=50&style=div'); ?>
	</div>
	
	<div class="commentnav">
	
		<?php if ( $use_font_icons == 1 ) { ?>
			<div class="left"><?php previous_comments_link('<i class="fa  fa-hand-o-left">&nbsp;</i>'.__('Older Comments','ka_express')) ?></div>
			<div class="right"><?php next_comments_link(__(' Newer Comments','ka_express').'&nbsp;<i class="fa  fa-hand-o-right"></i>') ?></div>		
		<?php } else { ?>
			<div class="left"><?php previous_comments_link() ?></div>
			<div class="right"><?php next_comments_link() ?></div>				
		<?php } ?>
	
	</div>
	
	<div class="clearfix"></div>

<?php } else {  ?>
	
	<p class="nocomments"><?php _e('Comments are closed.','ka_express'); ?></p><br/>
	
<?php }
 
if( pings_open() ) {
 	
	 if(!empty($comments_by_type['pings']) && pings_open() ) : ?>
			<h4 class="comments-title">Pings and Trackbacks (<?php echo count($wp_query->comments_by_type['pings']); ?> )</h4>
			<ul class="pingslist">
				<?php wp_list_comments('type=pings&callback=ka_express_cleanPings'); ?>
			</ul>
	<?php endif;
	
}

comment_form();