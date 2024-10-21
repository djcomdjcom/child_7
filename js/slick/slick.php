<?php
/**
* slick.php
*/
?>


<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick-theme.css"/>


<?php 
$catnews = get_category_by_slug('feature_item'); //カテゴリースラッグ recommend と連動
if ( !empty($catnews) ) :
?>
<?php
$catnews_id   = ( $catnews ) ? $catnews->term_id : 0;
$catnews_name = ( $catnews ) ? $catnews->name    : 'おすすめ商品';
?>

<?php query_posts('cat=' . $catnews_id . '&showposts=12'); ?>

<?php if (have_posts()) :?>

    <section class="slider posts archive clearfix responsive">
    <?php while (have_posts()) : the_post(); ?>
    
    
    <?php //get_template_part('looppart', 'products'); ?>
    
    
    
    
    
    <article id="post-<?php the_ID(); ?>" class="post clearfix style-products">
        
        <a class="thumbnail slidecaption" href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'), the_title_attribute('echo=0')); ?>">
        
            <span class="attachment-img w100">
            <?php if ( function_exists('the_post_image') ) {
            if ( the_post_image('medium') === false ){
            ?><span class="noimg"></span><?php
            }
            } ?>
            </span><!--attachment-->
            
            <span class="caption">
            <?php the_title(); ?>
            </span>
            
        </a>
    <?php edit_post_link(__('Edit'), '', ''); ?>
    
    </article><!-- #post -->
    
    
    
    
    
    <?php endwhile; ?>
    </section>


<?php endif;  ?>

<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick.min.js"></script>


<script type="text/javascript">
$('.responsive').slick({
  autoplay: true,
  dots: true,
  infinite: true,
 speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
 arrows: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 700,
 arrows: true,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
 arrows: true,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
</script>

<?php endif;  ?>

<?php wp_reset_query(); ?>	
