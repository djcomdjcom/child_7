<?php
/**
 * looppart-inc_blog.php
 * @テーマ名	hublog4
 */
?>
<article id="post-<?php the_ID(); ?>"  class="post clearfix style-inc_blog linkarea">
  <?php if ( is_new( WHATSNEW_TTL ) ) : ?>
  <span class="tmb-icon new">新着</span>
  <?php endif; ?>
  <span href="<?php if(post_custom('events-page_url')) :?><?php echo(post_custom('events-page_url')) ;?>" target="_blank<?php else :?><?php the_permalink(); ?><?php endif;?>" title="<?php the_title_attribute( array( 'before' => 'Permalink to: ', 'after' => '' ) ); ?>" class="thumbnail"> <span class="attachment">
  <?php
  if ( function_exists( 'the_post_image' ) ) {
    if ( the_post_image( array( 400, 400 ) ) === false ) {
      ?>
  <img src="<?php echo get_template_image('noimage');?>" width="120" height="120" alt="<?php the_title(); ?>" />
  <?php
  }
  }
  ?>
  </span> </span>
  <div class="metabox"> <span class="date py-2">
    <?php the_time('Y/n/j') ?>
    </span>
    <p class="title position-relative">
      <?php the_title(); ?>
    </p>
    <span class="todetail"><a href="<?php if(post_custom('events-page_url')) :?><?php echo(post_custom('events-page_url')) ;?>" target="_blank<?php else :?><?php the_permalink(); ?><?php endif;?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>">詳細を見る</a></span> </div>
  <!--metabox-->
  <?php edit_post_link(__('Edit'), ''); ?>
</article>
<!-- #post --> 

