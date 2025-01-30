<?php
// WP_Query
$args = array(
  'post_type' => 'page',
  'name' => 'home',
  'posts_per_page' => 1,
  'no_found_rows' => true,
);

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ):
  while ( $the_query->have_posts() ): $the_query->the_post();

// ここに該当のコードを挿入
?>
<section id="home-reason" class="py-3 py-md-4 mb-5 mx-fit outerwrap">
  <div class="wrapper container">
    <header class="content_header my-5">
      <h2 class="ttl mincho center">選ばれる理由</h2>
    </header>
    <?php
    $page_obj = get_page_by_path( 'home' );
    $page = get_post( $page_obj );
    $reason_items = SCF::get( 'reason', $page->ID );

    if ( $reason_items ) {
      $counter = 1; // カウンター変数を初期化
      echo '<ul class="reason-items px-3 row justify-content-center text-sm-center">';
      foreach ( $reason_items as $fields ) {
        if ( !empty( $fields[ 'rsn_ttl' ] ) ) {
          echo '<li class="reason-item d-flex d-sm-block justify-content-around py-2 py-sm-5 reason-item_' . sprintf( "%03d", $counter ) . ' ';
          if ( post_custom( 'rsn_box_css' ) ) {
            echo post_custom( 'rsn_box_css' );
          }
          echo '">';

          echo '<span class="item_bg ';

          if ( !empty( $fields[ 'rsn_box_bg_css' ] ) ) {
            echo $fields[ 'rsn_box_bg_css' ];
          }

          echo '" style="';

          if ( !empty( $fields[ 'rsn_border_color' ] ) || !empty( $fields[ 'rsn_bg_color' ] ) || !empty( $fields[ 'rsn_bg_img' ] ) ) {
            echo 'border-color:' . $fields[ 'rsn_border_color' ] . '; ';

            if ( !empty( $fields[ 'rsn_bg_img' ] ) ) {
              $image_url = wp_get_attachment_url( $fields[ 'rsn_bg_img' ] );
              echo 'background: url(' . $image_url . '); ';
            } elseif ( !empty( $fields[ 'rsn_bg_color' ] ) ) {
              echo 'background:' . $fields[ 'rsn_bg_color' ] . '; ';
            }
          }

          echo '"></span>';


          // カスタムフィールド 'rsn_ttl' の値を取得
          $rsn_ttl = $fields[ 'rsn_ttl' ];

          // ショートコードを実行してカスタムフィールドの値を表示
          $rsn_ttl = do_shortcode( $rsn_ttl );

          // カスタムフィールド 'rsn_text_color' の値を取得
          $rsn_text_color = $fields[ 'rsn_text_color' ];

          if ( !empty( $fields[ 'rsn_icon' ] ) ) {
            echo '<figure class="icon align-self-center mb-0 mb-sm-3" ';
            if ( !empty( $fields[ 'rsn_icon_color' ] ) ) {
              echo 'style="color:', $fields[ 'rsn_icon_color' ], '"';
            }
            echo '>';
            echo nl2br( $fields[ 'rsn_icon' ] ), '</figure>';
          }


          // フィールドを表示
          echo '<p class="rsn_ttl align-self-center mb-0 mb-sm-4 pr-5 pr-sm-0"';
          echo ' style="color:', esc_attr( $rsn_text_color ), '"';
          echo '>';
          echo nl2br( esc_html( $rsn_ttl ) ), '</p>';
          echo '<a class="" href="' . $fields[ 'rsn_link' ] . '" >';
          echo '<span class="btn arrow" style="';
          if ( !empty( $fields[ 'rsn_btn_color' ] ) || !empty( $fields[ 'rsn_btn_textcolor' ] ) ) {
            echo 'color:' . $fields[ 'rsn_btn_textcolor' ] . '; background-color:' . $fields[ 'rsn_btn_color' ] . '; ', '';
          }
          echo '">詳しくはこちら</span></a>';


          echo '</li>';
          $counter++; // カウンターをインクリメント
        }
      }
      echo '</ul>';
    }

    edit_post_link( __( 'Edit' ), '' );
    ?>
  </div>
</section>
<?php endwhile; ?>


<style>
	
<?php if ( post_custom('rsnset_bg_img') ) :?>
.reason-items .reason-item .item_bg{
	background-image: : url( <?php echo post_custom('rsnset_bg_img');?>) ;
}
<?php endif;?>
	
	
<?php if ( post_custom('rsnset_bg_img', $page) ) :?>
<?php $image_id = post_custom('rsnset_bg_img');	
$image_url = wp_get_attachment_image_url($image_id, 'full'); // 'full'は画像のサイズオプションで、フルサイズの画像を取得します
;?>
#home-reason.outerwrap::before{
background: url(<?php echo esc_url($image_url); ?>);
}
	
	
<?php elseif ( post_custom('rsnset_bg') ) :?>
#home-reason.outerwrap::before{
background:<?php echo post_custom('rsnset_bg');?> ;
}
<?php endif;?>
	


	
<?php if ( post_custom('rsnset_ttl') ) :?>
#home-reason header.content_header .ttl{
color:<?php echo post_custom('rsnset_ttl');?>;
}
<?php endif;?>
<?php if ( post_custom('rsnset_icon_color') ) :?>
.reason-items .reason-item .icon {
color:<?php echo post_custom('rsnset_icon_color');?> ;}

<?php endif;?>
<?php if ( post_custom('rsnset_text_color') ) :?>
.reason-items .reason-item{color:<?php echo post_custom('rsnset_text_color');?> ;}
<?php endif;?>

<?php if ( post_custom('rsnset_btn_color') ) :?>
.reason-items .reason-item a.btn{background-color:<?php echo post_custom('rsnset_btn_color');?> ;}
<?php endif;?>

<?php if ( post_custom('rsnset_cell_bg') ) :?>
.reason-items .reason-item .item_bg{background: <?php echo post_custom('rsnset_cell_bg');?> ;}
<?php endif;?>

<?php if ( post_custom('rsnset_btn_textcolor') ) :?>
.reason-items .reason-item a.btn{color:<?php echo post_custom('rsnset_btn_textcolor');?> ;}
<?php endif;?>
	
<?php if ( post_custom('rsnset_cell_border') ) :?>
.reason-items .reason-item .item_bg{
border-color: <?php echo post_custom('rsnset_cell_border');?> ;
}
<?php endif;?>
	
<?php if ( post_custom('rsnset_btn_radius') ) :?>
.reason-items .reason-item .item_bg{
border-radius: <?php echo post_custom('rsnset_btn_radius');?> ;
}
<?php endif;?>
	<?php echo get_option('profile_shop_name');//屋号 ?>

</style>
<?php
endif;
wp_reset_postdata();
?>
<style>
.reason-items .reason-item{
	overflow: hidden;
	position: relative;
}
.reason-items .reason-item .item_bg{
background-repeat: no-repeat !important;
background-size: cover !important;
background-position:center !important;
transition: .3s;
}
	
.reason-items .reason-item .item_bg:after{
	content: "";
	display: block;
	position: absolute;
	inset:0;
	border-radius: 0.8rem;
	transition: 0.3s;
}
	
	
	
.reason-items .reason-item .item_bg[style*="url"]:after{
background: linear-gradient(to bottom, transparent 0%,  #00000030 50%,  #00000050 60%, #00000070 100%);
backdrop-filter:blur(0) brightness( 110% ) ;
-webkit-backdrop-filter: blur(0) brightness( 110% );
}
	
	
.item_bg[style*="url"] ~  .rsn_ttl ,
.item_bg[style*="url"] ~ .icon .material-icons{
color: #fff ;
text-shadow: 0 0 0.6rem #000  !important;
}
.item_bg[style*="url"] ~  a.btn{
background: #00000060 !important;
border: 1px solid #ffffff80 !important;
color: #fff !important;
backdrop-filter:blur( 5px );
-webkit-backdrop-filter: blur(5px);

}
	
.item_bg[style*="url"] ~  a.btn:before{
	color: #fff !important;
}
	
.reason-items .reason-item a.btn{
background-color: #ffffff;
transition: 0.1s;
}
.reason-items .reason-item a:hover{
  opacity: 1;
  box-shadow: 0 0 0.6rem #ffffff75;
}
</style>
