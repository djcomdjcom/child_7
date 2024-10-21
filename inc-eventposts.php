


	<?php query_posts( array(
    'post_type' => 'event_bnr', //カスタム投稿名
		'order'=>'ASC',
		'orderby'=>'menu_order',
    'posts_per_page' => '4'
)); ?>
<?php if(have_posts()): ?>

<?php
// プラグイン　 Jetpack > パフォーマンスおよびスピード > (無効にする)画像の遅延読み込みを有効にする
 ?>



					<!--home-event-->
					<script type="text/javascript">
					jQuery(function($){
					    $('.inc-eventposts').slick({
					          infinite: true,
					          dots:true,
					          slidesToShow: 3,
					          centerMode: true, //要素を中央寄せ
					          centerPadding:'0px', //両サイドの見えている部分のサイズ
					          autoplay:true, //自動再生

					          responsive: [{
					               breakpoint: 1600,
					                    settings: {
										slidesToShow: 3,
										centerPadding:'0px', //両サイドの見えている部分のサイズ
					               }
					          },{
					               breakpoint: 1280,
					                    settings: {
										slidesToShow: 3,
										centerPadding:'0px', //両サイドの見えている部分のサイズ
					               }
					          },{
					               breakpoint: 980,
					                    settings: {
										slidesToShow: 2,
										centerPadding:'0px', //両サイドの見えている部分のサイズ
					               }
					          },{
					               breakpoint: 700,
					                    settings: {
										slidesToShow: 1,
										centerPadding:'0px', //両サイドの見えている部分のサイズ
					               }
					          }
					          ]
					     });
					});

					</script>




					<section class="clearfix wrapper slick-slider" id="inc-eventposts">

								<div class="posts inc-eventposts slick">
										<?php while (have_posts()) : the_post(); ?>

											<article id="post-<?php the_ID(); ?>" class="clearfix post">


											<?php if (post_custom('event_bnr_url')) :?>
											<a target="_blank" class=" w100" href="<?php echo(post_custom('event_bnr_url')) ;?>" rel="bookmark" title="<?php printf(__('Permanent Link to %s'),the_title_attribute('echo=0')); ?>">

											<?php if ( function_exists('the_post_image') ) {
												if ( the_post_image('large') === false ){
													?><img src="<?php echo get_template_image('noimage');?>" alt="No Image" /><?php
												}
											} ?>

											</a>
											<?php else :?>

											<span class=" w100" title="<?php printf(__('Permanent Link to %s'),the_title_attribute('echo=0')); ?>">
											<?php if ( function_exists('the_post_image') ) {
												if ( the_post_image('large') === false ){
													?><img src="<?php echo get_template_image('noimage');?>" alt="No Image" /><?php
												}
											} ?>

											</span>
											<?php endif;?>

											<?php edit_post_link(__('Edit'), ''); ?>
											</article>

										<?php endwhile; ?>
									</div>



					</section>
										<!--home-event-->

					<?php wp_reset_query(); ?>


<?php endif; ?>
