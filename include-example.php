<?php
$args = array(
  'post_type' => 'example', //カスタム投稿名
  //            'event_type' => array('newhouse','renovation'),
  //    'order' => 'ASC',
  'orderby' => 'order',
  'posts_per_page' => 9 //表示件数（ -1 = 全件 ）

);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ):
  ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick.css" media="screen">
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick-theme.css" media="screen">
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick.min.js"></script> 
<script>
	
	
jQuery(function($){

	$('.multiple-items').slick({
	infinite: true,
	slidesToShow: 4,
	dots:false,
	slidesToScroll: 1,
	centerMode: true,
	autoplay:true,
	centerPadding: '5rem',
	responsive: [
    {
      breakpoint: 1400,
      settings: {
		centerPadding: '2rem',
		slidesToShow: 3,
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
      }
    },
    {
      breakpoint: 587,
      settings: {
		centerPadding: '1rem',
        slidesToShow: 1,
      }
    },
  ]
});
});
</script> 

<!--home-event-->
<section id="home-example" class="home-content py-4 my-4 py-md-5 my-md-5 mx-fit">
<header class="content_header text-sm-center wrapper px-3 px-md-0 mb-3 mb-md-4 block">

<h2 class="ttl ">注文住宅施工事例</h2>
<a class="to_index grid pr-3 pr-xl-0 " href="/example/" title="注文住宅施工事例一覧ページヘのリンク">一覧</a>
</header>
<div class="multiple-items owl-theme posts py-3 block">
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
  <div id="post-<?php the_ID(); ?>" class="clearfix style-home-example post linkarea mx-2">
    <?php if ( is_new( WHATSNEW_TTL ) ) : ?>
    <span title="新着" class="tmb-icon new">NEW</span>
    <?php endif; ?>
    <picture class="thumbnail w100 m-0">
      <?php
      if ( function_exists( 'the_post_image' ) ) {
        if ( the_post_image( array( 480, 480, true ) ) === false ) {
          ?>
      <span class="noimg"></span>
      <?php
      }
      }
      ?>
    </picture>
    <a class="btnshine example-item-inner" href="<?php the_permalink(); ?>" title="<?php the_title_attribute( array( 'before' => '施工事例「', 'after' => '」詳細ページへ' ) ); ?>">
    <div class="inbox">
      <?php // get_template_part('cat_icon');//カテゴリーアイコン ?>
      <span class="ttl ">
      <?php the_title(); ?>
      </span> <span class="date">
      <?php the_time('Y/n/j') ?>
      </span> </div>
    </a>
    <?php edit_post_link(__('Edit'), ''); ?>
  </div>
  <!--post-->
  <?php endwhile; ?>
</div>
</section>
<!--home-event-->

<style>
.slick-dots li button {
	font-size: initial;
	color: initial;
	background: initial;
}
.slick-dots li button:before {
	content: none;
}
</style>
<?php endif; wp_reset_postdata(); ?>
