<?php //イベントバナー

$args = array(
  'post_type' => 'event_bnr', //カスタム投稿名
  'showposts' => '-1',
  'orderby' => 'menu_order',
  'order' => 'ASC',
  'tax_query' => array(
    array(
      'taxonomy' => 'bnr_type', //タクソノミーnews
      'field' => 'slug',
      'terms' => 'footer_bnr', //ターム名
      'operator' => 'NOT IN',
    ),
  ),
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ):
  ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick-theme.css" media="screen">
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick.min.js"></script> 
<script>
	
	
jQuery(function($){

	$('#inc-eventposts').slick({
	infinite: true,
	dots:false,
	slidesToShow: 4,
	slidesToScroll: 1,
	centerMode: true,
	centerPadding: '1rem',
	autoplay:true,
	responsive: [
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
});
</script> 
<!--home-event-->

  <div id="inc-eventposts" class="wrapper posts">
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <div class="post-<?php the_ID(); ?> clearfix post style-bnrs item p-1">
      <?php if (post_custom('event_bnr_url')) :?>
      <a target="<?php if (post_custom('event_bnr_target')) :?>_blank<?php endif;?>" class="btnshine w100" href="<?php echo(post_custom('event_bnr_url')) ;?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'),the_title_attribute('echo=0')); ?>">
      <?php
      if ( function_exists( 'the_post_image' ) ) {
        if ( the_post_image( array( 300, 100 ) ) === false ) {
          ?>
      <img src="<?php echo get_template_image('noimage');?>" alt="No Image" />
      <?php
      }
      }
      ?>
      </a>
      <?php else :?>
      <span class=" w100" title="<?php printf(__('Permanent Link to %s'),the_title_attribute('echo=0')); ?>">
      <?php
      if ( function_exists( 'the_post_image' ) ) {
        if ( the_post_image( array( 300, 100 ) ) === false ) {
          ?>
      <img src="<?php echo get_template_image('noimage');?>" alt="No Image" />
      <?php
      }
      }
      ?>
      </span>
      <?php endif;?>
      <?php edit_post_link(__('Edit'), ''); ?>
    </div>
    <?php endwhile; ?>
  </div>
<!--home-event-->
<?php endif; wp_reset_postdata(); ?>
