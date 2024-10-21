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
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/owlcarousel/assets/owl.theme.default.min.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/owlcarousel/assets/owl.carousel.min.css" media="screen" />
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/owlcarousel/owl.carousel.min.js"></script> 
<script type="text/javascript">
jQuery(function($){

  $('#inc-eventposts .owl-carousel').owlCarousel({

							loop: true,
							nav: true,
							navSpeed: 800,
							dots: false,
							dotsSpeed: 800,
							lazyLoad: true,
							autoplay: true,
							autoplayHoverPause: true,
							autoplayTimeout: 3000,
							autoplaySpeed:  800,
							margin: -1,
							stagePadding:0,
							freeDrag: false,
							mouseDrag: false,
							touchDrag: true,
							slideBy: 1,
							fallbackEasing: "linear",
							responsiveClass: true,
							navText: [ "previous", "next" ],
							responsive:{
							0:{items: 1,stagePadding: 80,},
							576:{items: 3},
							1000:{items: 4}
                                
                            },
                            autoHeight: false
                        });
                        $('.owl-carousel').on("mousewheel", ".owl-stage", function(e) {
                if (e.deltaY > 0) {
                   $('.owl-carousel').trigger("next.owl");
                } else {
                    $('.owl-carousel').trigger("prev.owl");
                }
                e.preventDefault();
            });
	
	
                    });
                
</script> 

<!--home-event-->

<section class="wrapper" id="inc-eventposts">
  <div class="owl-carousel owl-theme posts">
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
</section>
<!--home-event-->
<?php endif; wp_reset_postdata(); ?>
