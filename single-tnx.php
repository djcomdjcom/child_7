<?php
/**
template name: 投稿タイプTNX用 

 * single-tnx.php
 *
 * @テーマ名	hublog
 * hublog6
 * 20230202

 *
 */
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

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
