<?php
/**
 * looppart-headline.php
 */
?>
<article id="post-<?php the_ID(); ?>" class="post clearfix style-headline">
  <?php if ( is_new( WHATSNEW_TTL ) ) : ?>
	<span class="tmb-icon new">新着</span>
	<?php endif; ?>
	<span class="title">
	<a href="<?php if(post_custom('events-page_url')) :?><?php echo(post_custom('events-page_url')) ;?>" target="_blank<?php else :?><?php the_permalink(); ?><?php endif;?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>">
	<?php the_title(); ?>
	</a>
	</span>
	<span class="date"> 掲載日：
	<?php the_time('Y/n/j') ?>
	</span>
  <?php edit_post_link(__('Edit'), '', ''); ?>
</article>
<!-- #post --> 

