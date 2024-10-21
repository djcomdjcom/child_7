<?php
/**
 * flexslider.php 
 *
 * @テーマ名	hublog
 * 全てのサイドバーに表示されるパーツ
 */
?>
<script type="text/javascript">
jQuery(window).load(function() {
    jQuery('#slideshow').nivoSlider({
        effect: 'sliceDown,sliceDownLeft,sliceUp,boxRandom,boxRain,boxRainReverse', // 画像切り替え時のアニメーション
		slices: 15, // For slice animations
        boxCols: 8, // For box animations
        boxRows: 4, // For box animations
        animSpeed: 500, // アニメーション速度(ms)
        pauseTime: 3000, // 画像切り替えまでの時間(ms)
        startSlide:0, // 初めに表示する画像（1枚目～表示：0）
        directionNavHide:true, // マウスホバー時のみdirectionNavを表示
        controlNav:true, // コントロールナビの表示
        controlNavThumbs:false, // コントロールナビに画像サムネイルを使用
        keyboardNav:true, // スライドをキーボードで操作
        pauseOnHover: true, // マウスホバー時に切り替えを一時停止
        manualAdvance: false, // 自動スライドしない
        captionOpacity:0.8, // キャプションの透過度
        prevText: 'Prev', // 前ボタンの名前
        nextText: 'Next', // 次ボタンの名前
        randomStart: false, // 最初に表示する画像をランダムに
        beforeChange: function(){}, // スライド切り替え前のコールバック関数
        afterChange: function(){}, // スライド切り替え後のコールバック関数
        slideshowEnd: function(){}, //　全ての画像を表示した後のコールバック関数
        lastSlide: function(){}, // 最後の画像が表示された後スライドショーをSTOP
        afterLoad: function(){} // スライドのロードが完了したときのコールバック関数
    });
});
</script>

<div class="nivoSlider posts slidetest001" id="slideshow">
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
  <a class="w100" href="<?php echo (post_custom('slide_url')) ;?>" title="<?php the_title(); ?>"<?php if(get_post_meta(get_the_ID(),'slide_target',true)==1){ ?> target="_blank"<?php } ?>>
  <?php //the_post_thumbnail(array(1200, 630, true)); ?>
  <?php
  $post_title = get_the_title();
  the_post_thumbnail( 'full',
    array(
      'alt' => $post_title, // altにページタイトルを指定
      'title' => $post_title // titleにページタイトルを指定
    )
  );
  ?>
  </a>
  <?php else:?>
  <span class="w100">
  <?php
  $post_title = get_the_title();
  the_post_thumbnail( 'full',
    array(
      'alt' => $post_title, // altにページタイトルを指定
      'title' => $post_title // titleにページタイトルを指定
    )
  );
  ?>
  <?php // the_post_thumbnail(array(1200, 630, true)); ?>
  </span>
  <?php endif;?>
  <?php endforeach; ?>
  <?php wp_reset_query(); ?>
</div>
<?php if ( is_user_logged_in() ) :?>
<div class="edit_slider nivo"><a target="_blank" href="/wp-admin/edit.php?post_type=slideimage">スライドショーを編集</a></div>
<style>
	
#home-slider{
	position: relative;
}
#home-slider .edit_slider.nivo{
	position: absolute;
	right: 0;
	top: 0;
	display: inline-block;
	padding: 0.5em ;
	background: #fff;
	border: 1px solid #ccc;
	z-index: 999;
}
	
</style>
<?php endif;?>
<style>
#slideshow{
display:none;
}
#slideshow.nivoSlider.posts img.nivo-main-image{
z-index: -10;
}

</style>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/js/nivo/nivo-slider.css" media="screen" />
<script src="<?php bloginfo('stylesheet_directory'); ?>/js/nivo/jquery.nivo.slider.pack.js"></script> 
<script type="text/javascript">
    jQuery(window).load(function() {
		jQuery('#slideshow').fadeIn(800); //★ここに追記（JavaScript）
        jQuery('#slideshow').nivoSlider();
    });
</script> 
