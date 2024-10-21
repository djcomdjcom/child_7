<header id="pg-cpt1-header" class="concept_item_header pb-md-5 wrapper mt-5">
  <h1 class="ttl mt-4 py-4"><span class="ttlicon bg_key01">04</span>創業140年の歴史</h1>
  <figure class="w100"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/concept/pg-cpt3-00-img001@2x.webp" alt="創業140年の歴史"/> </figure>
</header>
<div class="text-center mb-5">
	
	
<p class="txt-ll text-500"><?php echo get_option('profile_shop_name');//屋号 ?>には社員の大工がいます。</p>
	
<p>	
それは仕事に完全な「責任」を持つため。<br>

見えなくなってしまう細部まで手抜きすることなく、丁寧に作業を進めます。<br>

将来、大工不足が深刻な業界問題になることは間違いありません。<br>

ですが、<?php echo get_option('profile_shop_name');//屋号 ?>は大工の棟梁がはじめた会社です。<br>

大工を枯らすことは決してしません。<br>

技術と想いを継承し続け、住まいに何かあればすぐ駆け付ける。<br>

そんな社員大工を抱えていることが<?php echo get_option('profile_shop_name');//屋号 ?>の一番の強みです。</p>
</div>

<div class="row container mx-auto justify-content-between px-0 pt-4 pb-5 mb-5">
  <div class="col-6">
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/concept/pg-cpt2-00-img002@2x.webp" alt="<?php echo get_option('profile_shop_name');//屋号 ?>には社員の大工がいます"/>
</div>
<div class="col-6">
<img src="<?php bloginfo('stylesheet_directory'); ?>/images/concept/pg-cpt2-00-img003@2x.webp" alt="<?php echo get_option('profile_shop_name');//屋号 ?>には社員の大工がいます"/>
</div>

</div>





<script>
jQuery(function($){
$('.concept-nav .menu-concept-nav-container > ul').addClass('row justify-content-between maxw-1100  mx-auto'); 
$('.concept-nav .menu-concept-nav-container > ul > li').addClass('col-6 col-md-3 d-block mb-4'); 
});		
</script>

<div class="concept-nav pb-md-5 text-center pt-5">
  <?php wp_nav_menu(array('theme_location'=>'concept-nav', 'fallback_cb'=>'nothing_to_do')); ?>
</div>


<!--▼▼▼施工事例▼▼▼-->
  <?php get_template_part('include', 'example');//施工事例 ?>
  <!--　home-example　▲▲▲施工事例▲▲▲-->

