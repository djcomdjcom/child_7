<?php
/**
 * flexslider.php
 *
 * @テーマ名	hublog
 * 全てのサイドバーに表示されるパーツ
 */
?>


<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick-theme.css" media="screen" />
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick.min.js"></script>

<script style="display: none">
jQuery(function() {
    jQuery('.center-item').slick({
          infinite: true,
          dots:true,
          slidesToShow: 1,
          centerMode: true, //要素を中央寄せ
          centerPadding:'400px', //両サイドの見えている部分のサイズ
          autoplay:true, //自動再生
          autoplaySpeed: 6000, // スライドが動くスピード（ミリ秒）
          autoplaySpeed: 6000, // スライドが動くスピード（ミリ秒）
          speed: 1000, // fade時の切り替えのスピード
          cssEase:'ease',

          responsive: [{
               breakpoint: 1600,
                    settings: {
					slidesToShow: 1,
					centerPadding:'200px', //両サイドの見えている部分のサイズ
               }
          },{
               breakpoint: 1280,
                    settings: {
					slidesToShow: 1,
					centerPadding:'100px', //両サイドの見えている部分のサイズ
               }
          },{
               breakpoint: 980,
                    settings: {
					slidesToShow: 1,
					centerPadding:'50px', //両サイドの見えている部分のサイズ
               }
          },{
               breakpoint: 700,
                    settings: {
					slidesToShow: 1,
					centerPadding:'10px', //両サイドの見えている部分のサイズ
               }
          }
          ]
     });
});


</script>



<section id="slideshow" class=" clearfix slick-slider " style="max-width: 1000px; margin: auto;">


<div class="center-item slick posts">


<?php //スライドショー
     global $post;
     $my_posts= get_posts(array(
			'post_type' => ('slideimage'),
			'showposts' => 99,

			'orderby' => date,
			'order' => ASC
     ));
     foreach($my_posts as $post):setup_postdata($post);
?>
<?php get_template_part('looppart', 'home-slider'); ?>
<?php endforeach; ?>
<?php wp_reset_query(); ?>


</div>
</section><!--home-bnrs-->
