<div class="home-menu">
  <ul class="menu px-0">
    <?php
    wp_nav_menu( array(
      'container' => '',
      'items_wrap' => '%3$s',
      'theme_location' => 'global-navi',
    ) );
    ?>
	  
      <?php get_template_part('include', 'snslink');//SNSボタン ?>	  
  </ul>
</div>
