<?php
/**
 * hublogslider.php 
 *
 * @テーマ名	hublog
 * 全てのサイドバーに表示されるパーツ
 */
?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick-theme.css" media="screen" />
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick.min.js"></script> 
<script>
	
jQuery(window).on('load', function() {
    // スライダーを最初に非表示に設定
    jQuery('#slideshow').css('opacity', 0);

    // 1秒後にフェードイン
    setTimeout(function() {
        jQuery('#slideshow').fadeTo(500, 1); // フェードイン（1000ms = 1秒）
    }, 0); // 1000ms = 1秒遅延
});

	
jQuery(function($){
	
$(".slider-wrap")
  .on("init", function () {
    $('.slick-slide[data-slick-index="0"] img.wp-post-image').addClass("slick-animation");
  })
  .slick({
    autoplay: true,
    infinite: true,
    fade: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    speed: 1000,
    autoplaySpeed: 4000,
    pauseOnFocus: false,
    pauseOnHover: false,
  })
  .on({
    // スライドが移動する前に発生するイベント
    beforeChange: function (event, slick, currentSlide, nextSlide) {
      //表示されているスライドに.slick-animationのクラスをつける
      $(".slick-slide img.wp-post-image", this).eq(nextSlide).addClass("slick-animation");
      //あとで、.slick-animationのクラスを消すための.stop-animationクラスを付ける
      $(".slick-slide img.wp-post-image", this).eq(currentSlide).addClass("stop-animation");
    },
    // スライドが移動した後に発生するイベント
    afterChange: function () {
      //見えてないスライドにはアニメーションのクラスを外す
      $(".stop-animation", this).removeClass("stop-animation slick-animation");
    },
  });	
	
	/*
	
    $('.center-item').slick({
          infinite: true,
          dots:true,
		fade: true, // フェードON
          slidesToShow: 1,
          centerMode: true, //要素を中央寄せ
          centerPadding:'0', //両サイドの見えている部分のサイズ
          autoplay:true, //自動再生
          autoplaySpeed: 6000, // スライドが動くスピード（ミリ秒）
          autoplaySpeed: 6000, // スライドが動くスピード（ミリ秒）
          speed: 1000, // fade時の切り替えのスピード
          cssEase:'ease'
     });
	 */
});


</script>

<div class="slick-slider hublogslider" id="slideshow" style="opacity: 0;">
  <div class="center-item slider-wrap slick posts">
    <?php //スライドショー
    global $post;
    $my_posts = get_posts( array(
      'post_type' => ( 'slideimage' ),
      'showposts' => '99',
      'orderby' => 'date',
      'order' => 'ASC'
    ) );
    foreach ( $my_posts as $post ): setup_postdata( $post );
    ?>
    <?php if  (post_custom('slide_url')):?>
    <a class="post slide-attachment" href="<?php echo (post_custom('slide_url')) ;?>" title="<?php the_title(); ?>"<?php if(get_post_meta(get_the_ID(),'slide_target',true)==1){ ?> target="_blank"<?php } ?>>
    <?php else:?>
    <span class="post slide-attachment " title="<?php the_title(); ?>">
    <?php endif;?>
    <?php
    $post_title = get_the_title();
    the_post_thumbnail( 'full',
      array(
        'alt' => $post_title, // altにページタイトルを指定
        'title' => $post_title // titleにページタイトルを指定
      )
    );
    ?>
<?php if ( post_custom('slideimage_filter_css') ) :?>
<span class="color_filter" style="<?php echo SCF::get('slideimage_filter_css');?>"></span>
<?php endif;?>
    <div class="slide-text mincho">
      <?php the_content(); ?>
    </div>
    <?php if  (post_custom('slide_url')):?>
    </a>
    <?php else:?>
    </span>
    <?php endif;?>
    <?php endforeach; ?>
    <?php wp_reset_query(); ?>
  </div>
</div>
<?php if ( is_user_logged_in() ) :?>
<div class="edit_slider billboard"><a target="_blank" href="/wp-admin/edit.php?post_type=slideimage">スライドショーを編集</a></div>
<style>
#slideshow{
}
#slideshow.nivoSlider.posts img.nivo-main-image{
z-index: -10;
}

</style>

<?php endif;?>

<style>
	
.slider-wrap {
  margin: 0 auto;
  overflow: hidden;
}
.slider-wrap,
.post.slide-attachment {
height: 80vh;
}
.post.slide-attachment img.wp-post-image{
  width: 100%;
  height: 100%;
  object-fit: cover;
}
	
@keyframes fadezoom {
  0% {
transform: scale(1);
}
100% {
transform: scale(1.1);
}
}

.slick-animation {
animation: fadezoom 5s 0s forwards;
}

#home-slider{
	background: #00030;
position: relative;
}
#home-slider .edit_slider.billboard{
position: absolute;
right: 0;
top: 0;
display: inline-block;
padding: 0.5em ;
background: #fff;
border: 1px solid #ccc;
z-index: 999;
}


#home-slider.hublogslider{}
.post.slide-attachment{
position: relative;
}
.post.slide-attachment .slide-text{
position: absolute;
max-width: 1280px !important;
left:calc(50vw - 50% );
bottom: 10%;
right:0;
color: #fff;
text-shadow: 0 0 0.5em rgba(0,0,0,0.80);
width: 100vw;
/*	transform: translateY( -50%);*/
}
.post.slide-attachment .slide-text{
padding: 1em 2em;
font-size: clamp(1.063rem, 0.583rem + 2.4vw, 2.5rem);

}

@media screen and (min-width: 1279.98px) {
.post.slide-attachment .slide-text{
padding: 1em 0;
left:calc(50vw - 620px );
}
}
	
@media screen and (max-width: 991.98px) {
.slider-wrap,
.post.slide-attachment {
height: 70vh;
	overflow: hidden;
}
}
	
	
@media screen and (max-width: 767.98px) {
	
.post.slide-attachment .slide-text{
top: 50%;
transform: translateY(-50%);
right:0;
  -ms-writing-mode: tb-rl;
  writing-mode: vertical-rl;
	padding: 2em 1em;
	display: inline-block;
	height:100%;
	font-size: 3vh;
/*	text-align: center;*/
}
	.post.slide-attachment .slide-text p{}
	
	}
@media screen and (max-width: 575.98px) {
/*
.slider-wrap,
.post.slide-attachment {
height: 60vh;
}*/
.post.slide-attachment img.wp-post-image{
width: auto;
max-width: none !important;

/*margin-left:-33vh;*/
position: absolute; 
	left: 50vw;
/*transform: translateX(-50%) !important;
left: 50vw;
*/
}
@keyframes fadezoom2 {
  0% {
transform: translateX(-50%) scale(1) ;
}

100% {
transform: translateX(-50%) scale(1.1) ;
}
}

.slick-animation {
animation: fadezoom2 5s 0s forwards;
}

}
	
.color_filter{
	position: absolute;
	left: 0;
	right: 0;
	top: 0;
	bottom: 0;
	display: block;
	pointer-events: none;
	}
</style>



<div class="loader-background">
  <div class="loader"></div>
</div>

<style>
/* ローダー用のスタイル */
.loader-background {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: #fff;
  z-index: 9999;
}

.loader {
  border: 5px solid #f3f3f3; /* Light grey */
  border-top: 5px solid #999; /* Blue */
  border-radius: 50%;
  width: 2.5rem;
  height: 2.5rem;
  animation: spin 2s linear infinite;
  position: absolute;
  top: 50%;
  left: 50%;
/*  transform: translate(-50%, -50%) !important;*/
}

@keyframes spin {
  0% { transform:translate(-50%, -50%)  rotate(0deg); }
  100% { transform:translate(-50%, -50%)  rotate(360deg); }
}


</style>
<script>
document.addEventListener("DOMContentLoaded", function() {
  // ローダーを表示
  const loader = document.querySelector('.loader-background');

  // Nivo Sliderが完全に読み込まれた後に実行
  jQuery(window).on('load', function() {
    // ローダーを非表示にする
    loader.style.display = 'none';
  });
});
</script>
