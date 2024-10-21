
<div class="include-contact row maxw-1170  mx-auto px-0 py-2 my-5 bg_key02">
  <div class="col-lg-5 text-center align-self-center">
    <p class="lead my-4 mx-auto">お気軽にどうぞご相談ください</p>
    <p class="w100 maxw-260 mx-auto"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo-footer02@2x.png" width="740" height="166" alt="<?php echo get_option('profile_shop_name');//屋号 ?>会社ロゴ"/></p>
  </div>
  <div class="col-lg-7 align-self-center text-center text-lg-left">
    <ul class="row container mx-auto px-0 justify-content-center justify-content-lg-start">
      <li class="to_shiryou text-nowrap col-12 col-md-6 btn"> <a class="d-block col_key01" href="/offer?title=<?php if ( is_home() || is_front_page() ) {  echo ('トップページ');} else {echo get_the_title();}?>
">資料請求はこちら</a> </li>
      <li class="to_inquiry text-nowrap col-12 col-md-4 btn"> <a class="d-block bg_key01" href="/inquiry?title=<?php if ( is_home() || is_front_page() ) {  echo ('トップページ');} else {echo get_the_title();}?>
">お問い合わせ</a> </li>
    </ul>
	  
    <div class="row container mx-auto px-0">
      <div class="col-lg-5 align-self-center">
		  <span class="profile_inquiry_tel text-nowrap">
        <?php
        $profile_inquiry_tel = ( get_option( 'profile_inquiry_tel' ) ) ? get_option( 'profile_inquiry_tel' ) : get_option( 'profile_main_tel' );
        if ( !empty( $profile_inquiry_tel ) ): ?>
        &nbsp;<span class="telnum "><?php echo $profile_inquiry_tel; ?>&nbsp;</span>
        <?php
        endif;
        ?>
        </span> </div>
      <div class="col-lg-7 align-self-center">
        <?php if (get_option('profile_opening_hours')) :?>
        <div class="profile_opening_hours  px-1" > 営業時間 <?php echo (get_option('profile_opening_hours')) ;?> </div>
        <?php endif;?>
        <?php if (get_option('profile_holiday')) :?>
        <div class="profile_holiday px-1"> 定休日 <?php echo (get_option('profile_holiday')) ;?> </div>
        <?php endif;?>
      </div>
    </div>
  </div>
</div>

<!--include-contact--> 
