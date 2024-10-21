<?php if (get_option('profile_zeh_achievement')):?>
<div id="zeh_achievement" class="wrapper mt-5 mb-5 container-fluid">
  <div class="zeh1">
    <div  class="row">
      <div class="col-sm-3 col-md-2 col-5 mx-auto d-block"> <span class="w100 mb-3"><img class="" src="<?php bloginfo('stylesheet_directory'); ?>/images/icon_zeh@2x.png"  alt="ZEHビルダー"/></span> </div>
      <!--L-->
      <div class="col-sm-9 col-md-10 col-12">
        <h2 class="title lead text-center text-sm-left"><?php echo get_option('profile_shop_name'); ?>は
			<span class="text-nowrap">ZEH<small>※</small>の普及に努めています！</span></h2>
        <p> ＺＥＨ（ゼッチ）とは、Net Zero Energy House（ネット・ゼロ・エネルギーハウス）の略。</p>
        <p>ネットゼロエネルギー住宅とは、建物の断熱化＋機器の高効率化により、使用エネルギーを削減し、さらに、太陽光発電などの創エネルギーを用いることで、エネルギー収支がゼロになる住宅のこと。</p>
      </div>
    </div>
  </div>
  <div class="zeh2">
	  <div class="zeh3"><p class="m-0"><?php echo get_option('profile_shop_name'); ?>の
		  <span class="text-nowrap">ZEH普及実績と今後の目標</span></p></div>
    <div class="zeh4 zeh_achievement"> <?php echo wpautop(get_option('profile_zeh_achievement'));?> </div>
  </div>
</div>
<?php endif;?>