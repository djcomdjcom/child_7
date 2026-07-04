<?php
/**
 * hublogslider.php
 *
 * @テーマ名 hublog
 * トップページ用スライドショーパーツ
 */
?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick.css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick-theme.css" media="screen" />
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/slick/slick.min.js"></script>

<script>
jQuery(function($){

  const $slider = $(".slider-wrap");
  const $slideshow = $("#slideshow");

  if (!$slider.length) {
    return;
  }

  let sliderShown = false;

  function startFadeIn() {
    // 二重実行防止
    if (sliderShown) {
      return;
    }
    sliderShown = true;

    // まず「画像準備完了」状態を付与
    $slideshow.addClass("is-image-ready");

    // ブラウザに opacity:0 の状態を確実に認識させてからフェード開始
    requestAnimationFrame(function() {
      requestAnimationFrame(function() {
        setTimeout(function() {

          // フェード開始
          $slideshow.addClass("is-image-fadein");

          // 1枚目にズームアニメーション付与
          $('.slick-slide[data-slick-index="0"] img.wp-post-image')
            .addClass("slick-animation");

        }, 80);
      });
    });
  }

  function waitFirstImageAndShow() {
    const firstImg = $slider.find('.slick-slide[data-slick-index="0"] img.wp-post-image').get(0);

    if (!firstImg) {
      startFadeIn();
      return;
    }

    function decodeAndShow() {
      // 画像の描画準備ができてから表示
      if (firstImg.decode) {
        firstImg.decode()
          .then(function() {
            startFadeIn();
          })
          .catch(function() {
            startFadeIn();
          });
      } else {
        startFadeIn();
      }
    }

    // すでに読み込み済みの場合
    if (firstImg.complete && firstImg.naturalWidth > 0) {
      decodeAndShow();
      return;
    }

    // まだ読み込み中の場合
    $(firstImg).one("load", function() {
      decodeAndShow();
    });

    // 画像エラーでもloaderを止める
    $(firstImg).one("error", function() {
      startFadeIn();
    });

    // 念のため最大2.5秒で表示
    setTimeout(function() {
      startFadeIn();
    }, 2500);
  }

  $slider
    .on("init", function () {
      waitFirstImageAndShow();
    })
    .slick({
      autoplay: true,
      infinite: true,
      fade: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      speed: 1000,
      autoplaySpeed: 4000,
      pauseOnFocus: false,
      pauseOnHover: false
    })
    .on({
      beforeChange: function (event, slick, currentSlide, nextSlide) {
        $(".slick-slide img.wp-post-image", this)
          .eq(nextSlide)
          .addClass("slick-animation");

        $(".slick-slide img.wp-post-image", this)
          .eq(currentSlide)
          .addClass("stop-animation");
      },
      afterChange: function () {
        $(".stop-animation", this)
          .removeClass("stop-animation slick-animation");
      }
    });

});
</script>

<div class="slick-slider hublogslider" id="slideshow">
  <div class="center-item slider-wrap slick posts">

    <?php
    global $post;

    $my_posts = get_posts( array(
      'post_type'      => 'slideimage',
      'posts_per_page' => 5,
      'orderby'        => 'date',
      'order'          => 'ASC'
    ) );

    $slide_count = 0;

    foreach ( $my_posts as $post ) :
      setup_postdata( $post );
      $slide_count++;

      $post_title   = get_the_title();
      $slide_url    = post_custom( 'slide_url' );
      $slide_target = get_post_meta( get_the_ID(), 'slide_target', true );

      $img_attr = array(
        'alt'      => $post_title,
        'title'    => $post_title,
        'sizes'    => '100vw',
        'decoding' => 'async',
        'class'    => 'wp-post-image'
      );

      // 1枚目は優先読み込み + Lazy Load除外
      if ( $slide_count === 1 ) {
        $img_attr['loading']       = 'eager';
        $img_attr['fetchpriority'] = 'high';
        $img_attr['decoding']      = 'sync';
        $img_attr['class']        .= ' skip-lazy no-lazy';
        $img_attr['data-no-lazy']  = '1';
      } else {
        $img_attr['loading']       = 'lazy';
        $img_attr['fetchpriority'] = 'low';
      }
    ?>

      <?php if ( $slide_url ) : ?>
        <a class="post slide-attachment" href="<?php echo esc_url( $slide_url ); ?>" title="<?php echo esc_attr( $post_title ); ?>"<?php if ( $slide_target == 1 ) : ?> target="_blank" rel="noopener"<?php endif; ?>>
      <?php else : ?>
        <span class="post slide-attachment" title="<?php echo esc_attr( $post_title ); ?>">
      <?php endif; ?>

        <?php
        if ( has_post_thumbnail() ) {
          the_post_thumbnail( 'full', $img_attr );
        }
        ?>

        <?php if ( post_custom( 'slideimage_filter_css' ) ) : ?>
          <span class="color_filter" style="<?php echo esc_attr( SCF::get( 'slideimage_filter_css' ) ); ?>"></span>
        <?php endif; ?>

        <div class="slide-text">
          <div class="d-none slide-text_title mincho"><?php the_title(); ?></div>
          <?php the_content(); ?>
        </div>

      <?php if ( $slide_url ) : ?>
        </a>
      <?php else : ?>
        </span>
      <?php endif; ?>

    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>

  </div>
</div>

<?php if ( is_user_logged_in() ) : ?>
  <div class="edit_slider billboard">
    <a target="_blank" href="/wp-admin/edit.php?post_type=slideimage">スライドショーを編集</a>
  </div>
<?php endif; ?>

<style>
/* Slick標準のローディング表示を無効化 */
.slick-loading .slick-list {
  background: none !important;
}

.slick-loading .slick-track {
  visibility: visible !important;
}

#home-slider {
  position: relative;
  background: #f7f5f2;
  overflow: hidden;
}

#home-slider .edit_slider.billboard {
  position: absolute;
  right: 0;
  top: 0;
  display: inline-block;
  padding: 0.5em;
  background: #fff;
  border: 1px solid #ccc;
  z-index: 999;
}

#slideshow {
  position: relative;
  background: #f7f5f2;
  opacity: 1;
}

.slider-wrap {
  margin: 0 auto;
  overflow: hidden;
}

.slider-wrap,
.post.slide-attachment {
  height: 80vh;
  min-height: 560px;
}

.post.slide-attachment {
  position: relative;
  display: block;
  background: #f7f5f2;
  overflow: hidden;
}

/* 画像は最初は透明 */
.post.slide-attachment img.wp-post-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  opacity: 0;
  transition: opacity 1.2s ease;
  will-change: opacity;
}

/* 表示中のスライド画像だけフェード表示 */
#slideshow.is-image-fadein .slick-current .post.slide-attachment img.wp-post-image,
#slideshow.is-image-fadein .slick-current.post.slide-attachment img.wp-post-image {
  opacity: 1;
}

/* Slick初期化前の直下画像にも対応 */
#slideshow.is-image-fadein .slider-wrap > .post.slide-attachment:first-child img.wp-post-image {
  opacity: 1;
}

/* ヒーロー内loader */
#slideshow::after {
  content: "";
  position: absolute;
  left: 50%;
  top: 50%;
  width: 28px;
  height: 28px;
  margin-left: -14px;
  margin-top: -14px;
  border: 3px solid rgba(50, 25, 14, .15);
  border-top-color: rgba(50, 25, 14, .55);
  border-radius: 50%;
  animation: hublogSliderLoading .8s linear infinite;
  z-index: 4;
  opacity: 1;
  transition: opacity .4s ease;
  pointer-events: none;
}

/* 画像フェード開始後にloaderを消す */
#slideshow.is-image-fadein::after {
  opacity: 0;
}

@keyframes hublogSliderLoading {
  to {
    transform: rotate(360deg);
  }
}

.color_filter {
  position: absolute;
  left: 0;
  right: 0;
  top: 0;
  bottom: 0;
  display: block;
  pointer-events: none;
  z-index: 1;
}

/* テキスト */
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

/* 表示中スライドのテキストをフェードイン */
#slideshow.is-image-fadein .slick-current .slide-text,
#slideshow.is-image-fadein .slick-current.post.slide-attachment .slide-text {
  opacity: 1;
  transform: translateY(0);
}


/* ズームアニメーション */
@keyframes fadezoom {
  0% {
    transform: scale(1.08);
  }
  100% {
    transform: scale(1.0);
  }
}

.slick-animation {
  animation: fadezoom 5s 0s forwards;
}

/* Slick dots */
#slideshow .slick-dots {
  z-index: 5;
}


@media screen and (max-width: 575.98px) {
  .slider-wrap,
  .post.slide-attachment {
    height: 70vh;
    min-height: 420px;
  }

  .post.slide-attachment img.wp-post-image {
    width: auto;
    max-width: none !important;
    position: absolute;
    left: 50vw;
  }

  @keyframes fadezoom2 {
    0% {
      transform: translateX(-50%) scale(1);
    }
    100% {
      transform: translateX(-50%) scale(1.1);
    }
  }

  .slick-animation {
    animation: fadezoom2 5s 0s forwards;
  }
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
</style>