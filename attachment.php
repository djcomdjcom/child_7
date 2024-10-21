<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="robots" content="noindex">
<title><?php
	if ( is_home() || is_front_page() ) {
		bloginfo( 'name' ); 
	} else {
		wp_title(' | ',true,'right');
		bloginfo('name');
	}
?></title>

<?php
// 添付元(投稿、ページなど)のある添付ファイルページの場合、添付元にリダイレクト
if ( $post->post_parent ) {
    wp_redirect( get_permalink( $post->post_parent ), 301 );
}
// 添付元のない添付ファイルページの場合、トップページにリダイレクト
else {
    wp_redirect( home_url(), 302 );
}
?>



<?php get_footer(); ?>