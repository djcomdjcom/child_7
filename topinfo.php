<?php if (is_page('concept') || is_parent_slug() === 'concept'):?>

<header id="topinfo" class="page_header concept">
  <h1><span class="nobr"><?php echo get_option('profile_shop_name');//屋号 ?>の</span><span class="nobr">家づくりとは</span><span class="subttl">コンセプト</span></h1>
</header>


<?php elseif (is_page('recruit')):?>
<header id="topinfo" class="page_header">
  <h1> <span class="subttl">採用情報</span> <span class="ttl_img maxw-480 w100"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/pg_hdr-recruit-title@2x.png" alt="ABOUTUS" title="<?php the_title(); ?>"/> </span> </h1>
</header>
<?php elseif (is_page('staff')):?>
<header id="topinfo" class="page_header">
  <h1> <span class="subttl">スタッフ紹介</span> <span class="ttl_img maxw-480 w100"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/pg_hdr-staff-title@2x.png" alt="ABOUTUS" title="<?php the_title(); ?>"/> </span> </h1>
</header>

<?php elseif (is_page('about') || is_parent_slug() === 'about'):?>
<header id="topinfo" class="page_header">
  <h1> <span class="subttl">会社案内</span> <span class="ttl_img maxw-480 w100"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/pg_hdr-about-title@2x.png" alt="ABOUTUS" title="<?php the_title(); ?>"/> </span> </h1>
</header>

<?php elseif (is_page('order') || is_parent_slug() === 'order'):?>
<header id="topinfo" class="page_header order">
  <h1> <span class="subttl"><?php echo get_option('profile_shop_name'); ?>が選ばれる理由</span> <span class="ttl_img maxw-480 w100"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/pg_hdr-customhome-title@2x.png" alt="REASON" title="<?php the_title(); ?>"/> </span> </h1>
</header>


<header class="entry-header wrapper">
<span class="entry-title border-top-0"><span class="">
新築注文住宅 <?php echo get_option('profile_shop_name'); ?>の家づくり<?//php echo get_the_excerpt(); ?>
</span></span>
</header>

<?php elseif (is_page(array('renovation')) || is_parent_slug() === 'renovation'):?>
<header id="topinfo" class="page_header renovation">
  <h1> <span class="subttl"><?php echo get_option('profile_shop_name'); ?>が選ばれる理由</span> <span class="ttl_img maxw-480 w100"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/pg_hdr-renovation-title@2x.png" alt="RENOVATION" title="<?php the_title(); ?>"/> </span> </h1>
</header>
<header class="entry-header wrapper">
<span class="entry-title border-top-0"><span class="">
老朽化した建物を最新の設備や性能で大規模改修<?//php echo get_the_excerpt(); ?>
</span></span>
</header>


<?php elseif (is_page(array('reformwork')) || is_parent_slug() === 'reformwork'):?>
<header id="topinfo" class="page_header renovation">
  <h1> <span class="subttl"><?php echo get_option('profile_shop_name'); ?>が選ばれる理由</span> <span class="ttl_img maxw-480 w100"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/pg_hdr-reformwork-title@2x.png" alt="リフォーム工事" title="<?php the_title(); ?>"/> </span> </h1>
</header>
<header class="entry-header wrapper">
<span class="entry-title border-top-0"><span class="">
小さな工事でも<?php echo get_option('profile_shop_name'); ?>にお任せください<?//php echo get_the_excerpt(); ?>
</span></span>
</header>


<?php elseif (is_page(array('visit-reservation','kurashi','vr-houselook')) ):?>
<header id="topinfo" class="page_header reason">
</header>




<?php elseif (is_page(array('ohikiwatashi-flow','afterfollow','keiyaku-flow','iedukuri','financialplan','reformwork')) ):?>
<?php
$page = get_post( get_the_ID() );
$slug = $page->post_name;
?>
<header id="topinfo" class="page_header <?php echo $slug; ?>">
  <span class="ttl_h1"> <span class="subttl mb-3"><?php echo get_option('profile_shop_name'); ?>が選ばれる理由</span> <span class="ttl_img maxw-480 w100"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/pg_hdr-<?php echo $slug; ?>-title@2x.png" alt="<?php echo $slug; ?>" title="<?php the_title(); ?>"/> </span> </span>
</header>






<?php elseif  ( is_category(array('event'))) :?>

<?php elseif  ( is_post_type_archive(array('example000'))|| is_singular('example0000')) :?>

<header id="topinfo" class="page_header">
  <h1> <span class="subttl">施工事例</span> <span class="ttl_img maxw-480 w100"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/pg_hdr-works-title@2x.png" alt="WORKS" title="<?php the_title(); ?>"/> </span> </h1>
</header>

<?php elseif  ( is_tax('event_type',array('teireikai_little')) || is_singular('little_events')):?>


<?php endif;?>



