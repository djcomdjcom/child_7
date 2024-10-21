<!--▼▼▼リフォーム事例▼▼▼-->
<section id="clm_posts" class="clm_posts pt-1 pb-5 mb-5">
  <div class="container wrapper">
	  
<?php
$clm_post_type = post_custom('clm-post_type') ;
$clm_taxonomy = post_custom('clm-taxonomy') ;
$clm_term = post_custom('clm-term') ;
$clm_author = post_custom('clm-author') ;
$clm_showpost = post_custom('clm-showpost') ;
$clm_looppart = post_custom('clm-looppart') ;
//$clm_looppart_css = post_custom('clm-looppart_css') ;
;?>


	  <?php if ( post_custom('clm-ttl') ) :?>
	  
	  <?php  echo ( post_custom('clm-ttl') )  ;?>

<?php endif;?>

	  
	  
<script>
jQuery(function(){
jQuery('#clm_posts .posts .post').addClass('<?php echo post_custom('clm-looppart_css') ;?>');
});
</script>
	  
	  
    <?php
    $args = array(
        'post_type' => $clm_post_type, //カスタム投稿名
        $clm_taxonomy => array($clm_term),
        //    'order' => 'ASC',
        'orderby' => 'order',
		'author' => $clm_author,
        'posts_per_page' => $clm_showpost //表示件数（ -1 = 全件 ）
    );
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ):
      ?>
    <div class="posts row justify-content-start">
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <?php get_template_part('looppart', $clm_looppart ); ?>
      <?php endwhile; ?>
    </div>
    <?php endif; wp_reset_postdata(); ?>
  </div>
</section>
<!--　home-example　▲▲▲リフォーム事例▲▲▲--> 
