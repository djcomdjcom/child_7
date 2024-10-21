<?php
/**
template name: 投稿タイプLP用 

 * single-lp.php
 *
 * hublog6
 * 20230202

 *
 */
//詳細は「/html/lp_sample.php」参照

//「code-fbpixel.php」←ピクセルタグ設置用ファイル
//投稿タイプ「LP」「TNX」で自動的に＜/header＞下に読み込まれる
//ピクセルIDを「外観＞会社情報＞Facebookピクセルタグ(id（数字部分のみ）)に入力しておく
//　※ピクセルタグの仕様が変更になったら「code-fbpixel.php」を修正する
get_header();
?>
<?php the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('hentry'); ?>>
  <?php the_content(); ?>
  <?php //インクルードセクション
  $the_page = get_page( get_the_ID() );
  $include_html_dir = STYLESHEETPATH . '/html/';
  $include_html_file = $include_html_dir . $the_page->post_name;
  if ( file_exists( $include_html_file . '.php' ) ) {
    include $include_html_file . '.php';
  } elseif ( file_exists( $include_html_file . '.html' ) ) {
    include $include_html_file . '.html';
  }
  ?>
</article>
<!-- .entry-content -->

<?php //get_template_part('hublog-inquiry',''); //問い合わせフック ?>
<footer class="entry-utility page">
  <div class="entry-meta updated author"> <span class="date updated">
    <?php the_time('Y/n/j') ?>
    </span> <span class="author vcard">投稿者：<span class="fn">
    <?php the_author(); ?>
    </span></span> </div>
  <!--entry-meta-->
  <?php edit_post_link( __( 'Edit', 'twentytwelve' ), '<span class="edit-link">', '</span>' ); ?>
</footer>
<!-- .entry-utility -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
