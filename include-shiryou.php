<article class="include-shiryou wrapper pb-5 container-fluid">
  <div class="inbox p-2 px-md-4 pt-md-3 pb-md-0 ">
    <div class=" row no-gutters align-item-end text-center justify-content-around" >
      <div class="col-md-3 col-8 order-md-1">
        <p class="w100"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/inc_shiryou-ttl@2x.png" alt="CONTACT US"/></p>
      </div>
      <div class="inc_shiryou-img01 col-md-3 col-3 order-md-4">
        <div class="w100 maxw-180 center"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/inc_shiryou-img01.png" alt=""/> </div>
      </div>
      <div class="contact-tel col-md-6 col-12 order-md-2"> <span class="profile_inquiry_tel">
        <?php
        $profile_inquiry_tel = ( get_option( 'profile_inquiry_tel' ) ) ? get_option( 'profile_inquiry_tel' ) : get_option( 'profile_main_tel' );
        if ( !empty( $profile_inquiry_tel ) ): ?>
        &nbsp;<span class="telnum display-2"><?php echo $profile_inquiry_tel; ?>&nbsp;</span>
        <?php
        endif;
        ?>
        </span>
        <p>
          <?php if (get_option('profile_opening_hours')) :?>
          <span class="profile_opening_hours text-nowrap px-1" > 営業時間 <?php echo (get_option('profile_opening_hours')) ;?> </span>
          <?php endif;?>
          <?php if (get_option('profile_holiday')) :?>
          <span class="profile_holiday text-nowrap px-1"> 定休日 <?php echo (get_option('profile_holiday')) ;?> </span>
          <?php endif;?>
        </p>
        <div class="w100"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/inc_shiryou-btn@2x.png" alt="資料請求/お問い合わせ"/> </div>
      </div>
      
      <!--contact-tel--> 
      
    </div>
  </div>
</article>
<!--home-shiryou--> 
