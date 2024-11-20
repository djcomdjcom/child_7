<?php
/**
template name: HOME
 * @テーマ名	hublog7
 * @更新日付	2024.09.20
 *
 */
get_header();
?>
<script>
jQuery(function($){
    // ウィンドウをスクロールしたら…
    $(window).scroll(function () {
        // ウィンドウの高さを取得
        const wHeight = $(window).height();
        // スクロールした量を取得
        const wScroll = $(window).scrollTop();
            // それぞれのblockクラスに対して…
            $(".effect").each(function () {
                // それぞれのblockクラスのウィンドウからの高さを取得
                const bPosition = $(this).offset().top;
                // スクロールした量が要素の高さを上回ったら
                // その数値にウィンドウの高さを引き、最後に200pxを足す
            if (wScroll > bPosition - wHeight + 200) {
                $(this).addClass("fadeIn");
            }
        });
    });
});

/*.posts .post*/
jQuery(function($){
$('.posts .post.style-event').addClass('my-3 col-md-6 '); 
$('.posts .post.style-inc_news .thumbnail').addClass('py-0 ');
$('#home-blog .posts .post').addClass('col-sm-6 col-md-4 col-12');
$('.posts .post.style-voice').addClass('col-12 col-sm-6 col-lg-4'); 
});		
</script>

<div id="home-slider" class="mx-fit">
  <?php get_template_part('hublogslider'); ?>
</div>
<div id="home-carousel" class="maxw-1100 mx-auto my-3 py-4 px-0 px-lg-5 mx-fit">
  <?php get_template_part('inc', 'event_bnrs'); ?>
</div>
<style>
/* フェードインさせる要素 */
.effect {
    opacity: 0; /* 最初は非表示にしておく */
    transition: all 1s; /* 動きを滑らかに */
}
/* フェードイン用のクラス */
.fadeIn {
    opacity: 1;
}
</style>

<!--▼▼▼コンセプト▼▼▼-->
<section id="home-concept" class="py-5 px-3 px-xl-0 mx-fit">
  <div class="inbox wrapper text-center pb-5 mt-5">
  <header id="home-concept-header" class="content_header">
    <h2 class="ttl mincho center mb-4"><?php echo get_option('profile_shop_name');//屋号 ?>の<br class="d-sm-none">
      家づくりとは</h2>
  </header>
  <div class="text-center px-4 py-5 px-md-0">
    <p class="ttl noicon ">CONCEPT</p>
    <p class="txt-ll mb-5 mincho"> リフォーム工事から<br class="d-sm-none">
      新築注文住宅まで<br>
      高性能住宅を重視し、省エネや快適性を追求した<br>
      「住んで健康になれる」家づくりを提供しています。</p>
    <p class=" "> 自社職人と自社施工を基盤として、<br>
      ひとつ一つの家づくりにこだわって施工しています。<br>
      大小に関わらずリフォーム工事には事前調査を細かくに行い、<br>
      お客さまに最適なプランをご提案させていただいております。</p>
  </div>
  <section id="concept_item" class="">
    <ul class="row nav-item justify-content-between p-0 mb-5">
      <li class="col-12 col-md-6 col-lg-3 px-0 px-md-2 pb-md-2"> <a class="w100 btnshine" href="/concept#page_concept01" title="コンセプト「住んで健康になれる」">
        <?php
        $image_id = 10260; // メディアID
        $image_size = ( array( 640, 640, true ) ); // 画像サイズ
        $image = wp_get_attachment_image( $image_id, $image_size );
        if ( $image ) {
          echo $image;
        }
        ?>
        <div class="nav-item-inner"> <span class="ttl mincho d-block">住んで健康になれる家</span> </div>
        </a> </li>
      <li class="col-12 col-md-6 col-lg-3 px-0 px-md-2 pb-md-2"> <a class="w100 btnshine" href="/concept#page_concept01" title="コンセプト「自社職人と自社施工」">
        <?php
        $image_id = 10262; // メディアID
        $image_size = ( array( 640, 640, true ) ); // 画像サイズ
        $image = wp_get_attachment_image( $image_id, $image_size );
        if ( $image ) {
          echo $image;
        }
        ?>
        <div class="nav-item-inner"> <span class="ttl mincho d-block">自社職人<br>
          自社施工</span> </div>
        </a> </li>
      <li class="col-12 col-md-6 col-lg-3 px-0 px-md-2 pb-md-2"> <a class="w100 btnshine" href="/concept#page_concept01" title="コンセプト「耐震性・耐久性断熱効果の高い家」">
        <?php
        $image_id = 10246; // メディアID
        $image_size = ( array( 640, 640, true ) ); // 画像サイズ
        $image = wp_get_attachment_image( $image_id, $image_size );
        if ( $image ) {
          echo $image;
        }
        ?>
        <div class="nav-item-inner"> <span class="ttl mincho d-block">耐震性・耐久性<br>
          断熱効果の高い家</span> </div>
        </a> </li>
      <li class="col-12 col-md-6 col-lg-3 px-0 px-md-2 pb-md-2"> <a class="w100 btnshine" href="/concept#page_concept01" title="コンセプト「ゼロエネルギースタイル」">
        <?php
        $image_id = 10269; // メディアID
        $image_size = ( array( 640, 640, true ) ); // 画像サイズ
        $image = wp_get_attachment_image( $image_id, $image_size );
        if ( $image ) {
          echo $image;
        }
        ?>
        <div class="nav-item-inner"> <span class="ttl mincho d-block">ゼロエネルギー<br>
          スタイル</span> </div>
        </a> </li>
    </ul>
    <p class="btn  pill"> <a style="font-size: clamp(0.875rem, 0.83rem + 0.23vw, 1rem);" class="bg_key02 mx-auto" href="/concept">コンセプトページはこちら</a> </p>
    </div>
  </section>
</section>
<!--　home-concept　▲▲▲コンセプト▲▲▲--> 

<!--▼▼▼施工事例▼▼▼-->
<?php get_template_part('include', 'example');//施工事例 ?>
<!--　home-example　▲▲▲施工事例▲▲▲--> 
<!--▼▼▼施工事例▼▼▼-->
<?php get_template_part('include', 'reform');//リフォーム事例 ?>
<!--　home-example　▲▲▲施工事例▲▲▲--> 

<!--▼▼▼インフォエリア▼▼▼-->
<div id="home-infoarea" class=" wrapper container mx-auto px-0 mb-5 ">
  <section id="home-news" class="home-content pt-5 pb-4 mb-4 mb-md-5 px-0 px-md-3 mx-auto">
    <header class="content_header text-sm-center mb-3 mb-md-4 maxw-1000 mx-auto">
      <h2 class="ttl mincho">ニュース<span class="txt-s">＆</span>トピックス</h2>
      <a class="to_index" href="/category/news" title="ニュース＆トピックス一覧ページヘのリンク">一覧</a> </header>
    <?php
    $args = array(
      'post_type' => 'post',
      'category_name' => 'news',
      'posts_per_page' => 3,
    );
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ):
      ?>
    <div class="posts px-0 px-md-3 maxw-1000 mx-auto">
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <?php //get_template_part('looppart', 'headline'); ?>
      <?php get_template_part('looppart', 'headline'); ?>
      <?php endwhile; ?>
    </div>
    <?php endif; wp_reset_postdata(); ?>
  </section>
  
  <!--home-news-->
  <section id="home-event" class="home-content wrapper py-4 py-md-5 ">
    <header class="content_header text-sm-center mb-3 mb-md-4">
      <h2 class="ttl mincho">近日イベントのご案内</h2>
      <a class="to_index" href="/category/event" title="イベント情報">一覧</a> </header>
    <?php
    $args = array(
      'post_type' => 'post',
      'category_name' => 'event',
      'posts_per_page' => 4,
    );
    $the_query = new WP_Query( $args );
    if ( $the_query->have_posts() ):
      ?>
    <div class="posts row justify-content-between  mx-auto">
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <?php get_template_part('looppart', 'event'); ?>
      <?php endwhile; ?>
    </div>
    <?php endif; wp_reset_postdata(); ?>
  </section>
  <!--home-event--> 
</div>

<!--▼▼▼選ばれる理由▼▼▼-->

<?php get_template_part('include', 'reason');//選ばれる理由 ?>

<!--　home-infoarea　▲▲▲インフォエリア▲▲▲-->

<section id="home-voice" class="home-content wrapper py-4 py-md-5 ">
  <header class="content_header text-sm-center mb-3 mb-md-4">
    <h2 class="ttl mincho">お客様の声</h2>
    <a class="to_index" href="/voice/" title="お客様の声">一覧</a> </header>
  <?php
  $args = array(
    'post_type' => 'voice',
    'posts_per_page' => 4,
  );
  $the_query = new WP_Query( $args );
  if ( $the_query->have_posts() ):
    ?>
  <div class="posts row justify-content-left  mx-auto">
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <?php get_template_part('looppart', 'voice'); ?>
    <?php endwhile; ?>
  </div>
  <?php endif; wp_reset_postdata(); ?>
</section>
<!--home-voice--> 

<!--▼▼▼代表あいさつとスタッフ紹介▼▼▼-->
<section id="home-greeting" class="pb-4 ">
  <div class="wrapper"> 
    
    <!--▼▼▼代表あいさつ▼▼▼-->
    <section id="president" class="pb-5"> <a href="/message" class="w100"> <img src="<?php bloginfo('stylesheet_directory'); ?>/images/hm-bnr-president@2x.webp" alt="代表あいさつ"/> </a> </section>
    
    <!--　home-greeting　▲▲▲代表あいさつ▲▲▲--> 
    <!--▼▼▼スタッフ紹介▼▼▼-->
    
    <section id="home-staff" class="my-5 home-content">
      <header class="content_header text-sm-center mb-4 mb-md-5 ">
        <h2 class="ttl mincho">スタッフ紹介</h2>
        <a class="to_index staff" href="/staff">More</a> </header>
      <div class="flexbox pb-4">
        <?php get_template_part('loop-authors'); ?>
        <div class="staff-list d-none"> <a class="w100" href="/recruit"><img class="pt-2 photo" alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/images/staff-topage.png"></a> </div>
      </div>
    </section>
    <!--　home-staff　▲▲▲スタッフ紹介▲▲▲--> 
    
  </div>
</section>
<!--　home-greeting　▲▲▲代表あいさつとスタッフ紹介▲▲▲-->

<section id="home-blog" class="home-content mx-fit outerwrap mb-5">
  <div class="wrapper container py-4 py-md-5 ">
    <header class="content_header text-sm-center mb-4 mb-md-5">
      <h2 class="ttl mincho">ブログ</h2>
      <a class="to_index" href="/category/blog">一覧</a> </header>
    <?php query_posts('category_name=blog&posts_per_page=3'); ?>
    <div class="posts row justify-content-start">
      <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part('looppart', 'inc_blog'); ?>
      <?php endwhile; ?>
    </div>
    <?php wp_reset_query(); ?>
  </div>
</section>
<section id="hajimetenavi" class="navi text-center pt-4 pt-md-5 mb-5">
  <header class="content_header wrapper container mb-4 mb-md-5">
    <h2 class="ttl mincho">お客様の状況に応じて<br>
      アクションをお選びください</h2>
  </header>
  <div class="wrapper container pb-5">
    <ul class="row nav-item justify-content-between x-0 px-0 ">
      <li class="col-sm-6 col-md-3 mb-1" ><a class="w100" href="/online_sumai"><img class="p-1" src="<?php echo get_stylesheet_directory_uri(); ?>/images/hajimete_bnr-soudankai@2x.webp" alt="住まいの無料相談会">
        <div class="nav-item-inner"> <span class="ttl mincho d-block">住まいの無料相談会</span> </div>
        </a></li>
      <li class="col-sm-6 col-md-3 mb-1" ><a class="w100" href="/online_meeting"><img class="p-1" src="<?php echo get_stylesheet_directory_uri(); ?>/images/hajimete_bnr-ol_meet@2x.webp" alt="オンライン打ち合わせ">
        <div class="nav-item-inner"> <span class="ttl mincho d-block">オンライン打ち合わせ</span></div>
        </a></li>
      <li class="col-sm-6 col-md-3 mb-1" ><a class="w100" href="/kenngakukai"><img class="p-1" src="<?php echo get_stylesheet_directory_uri(); ?>/images/hajimete_bnr-kengakukai@2x.webp" alt="構造完成見学会">
        <div class="nav-item-inner"> <span class="ttl mincho d-block">構造完成見学会</span></div>
        </a></li>
      <li class="col-sm-6 col-md-3 mb-1" ><a class="w100" href="/offer?title=<?php if ( is_home() || is_front_page() ) {  echo ('トップページ');} else {echo get_the_title();}?>"><img class="p-1" src="<?php echo get_stylesheet_directory_uri(); ?>/images/hajimete_bnr-shiryou@2x.webp" alt="資料請求">
        <div class="nav-item-inner"> <span class="ttl mincho d-block">資料請求</span></div>
        </a></li>
    </ul>
  </div>
</section>
<?php // get_template_part('include', 'contact'); ?>
<div class="container">
  <?php get_template_part('include', 'zeh'); ?>
</div>
<?php get_footer(); ?>
