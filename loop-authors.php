<?php
/**
 * 投稿者一覧表示用テンプレート
 * loop-authors.php
 */

// 表示したいユーザーのログイン名を設定
$authers = array(
    'ieno',
    'yashiro',
    'daikuhara',
    'muneshita',
    'kiryu',
);

// 画像ファイル存在チェック用の関数
function mc_userphoto_url_or_avatar( $uid ) {
    // One User Avatar が優先される
    $avatar = get_avatar_url( $uid, array( 'size' => 300 ) );
    if ( $avatar ) {
        return $avatar;
    }

    // （旧仕様）手動アップロードファイルがある場合
    $rel = "/wp-content/uploads/userphoto/{$uid}.jpg";
    $abs = ABSPATH . ltrim( $rel, '/' );
    if ( file_exists( $abs ) ) {
        return $rel;
    }

    // 最後の fallback（Gravatar）
    return get_avatar_url( $uid );
}


// ★★★ バグ修正：$authors → $authers に統一 ★★★
foreach ( $authers as $login ) :

  // get_userdatabylogin は非推奨 → get_user_by でOK
  $user = get_user_by( 'login', $login );
  if ( ! $user instanceof WP_User ) {
    continue; // 見つからないログイン名はスキップ
  }

  $uid   = (int) $user->ID;
  $nick  = $user->nickname ? $user->nickname : $user->user_nicename;

  // 任意メタ
  $post       = get_user_meta( $uid, 'post', true );
  $division   = get_user_meta( $uid, 'division', true );
  $last_name  = get_user_meta( $uid, 'last_name', true );
  $first_name = get_user_meta( $uid, 'first_name', true );
  $kana       = get_user_meta( $uid, 'kana', true );
  $credential = get_user_meta( $uid, 'credential', true );
  $from       = get_user_meta( $uid, 'from', true );
  $desc_raw   = $user->description;

  // 表示用サニタイズ
  $post_safe       = esc_html( $post );
  $division_safe   = esc_html( $division );
  $last_name_safe  = esc_html( $last_name );
  $first_name_safe = esc_html( $first_name );
  $kana_safe       = esc_html( $kana );
  $credential_safe = esc_html( $credential );
  $from_safe       = esc_html( $from );
  $nick_safe       = esc_attr( $nick );

  $alt = trim( "{$post} / {$division} / {$last_name} {$first_name}" );
  $alt_safe = esc_attr( $alt );

  // 写真URL
  $photo_url = mc_userphoto_url_or_avatar( $uid );
  $photo_url_safe = esc_url( $photo_url );

  // 本文（html許可）
  $desc = wpautop( wp_kses_post( $desc_raw ) );
?>
<div class="user_info profil  mb-4 mb-sm-5 pb-3">
  <div class="inbox px-0">
    <figure class="photobox">
	<img class="photo <?php echo $nick_safe; ?>"
		 alt="<?php echo $alt_safe; ?>"
		 src="<?php echo esc_url( get_avatar_url( $uid, array( 'size' => 300 ) ) ); ?>">
    </figure>

    <div class="staff-meta">
      <?php if ( $post_safe ) : ?>
        <div class="staff-post"><?php echo $post_safe; ?></div>
		<?php else:?>
		  <?php if ( $division_safe ) : ?>
			<div class="staff-division"><?php echo $division_safe; ?></div>
		  <?php endif; ?>
      <?php endif; ?>
      <div class="staff-name">
        <?php echo $last_name_safe; ?>&nbsp;<?php echo $first_name_safe; ?>
      </div>
      <?php if ( $kana_safe ) : ?>
        <div class="staff-kana"><?php echo $kana_safe; ?></div>
      <?php endif; ?>
    </div>

    <label>
      <input type="checkbox" name="checkbox">
      <div class="staffpopup">
        <div class="inbox row">
          <span class="w100 col-3">
            <img class="photo <?php echo $nick_safe; ?>"
                 alt="<?php echo $alt_safe; ?>"
                 src="<?php echo $photo_url_safe; ?>">
          </span>

          <div class="userinfo_detail col-9">
            <div class="user_name">
              <div class="user_post_division">
                <?php if ( $post_safe ) : ?>
                  <span class="post"><?php echo $post_safe; ?></span>
                <?php endif; ?>
                <?php if ( $division_safe ) : ?>
                  <span class="division"><?php echo $division_safe; ?></span>
                <?php endif; ?>
              </div>
              <em class="fullname cleartype">
                <?php echo $last_name_safe; ?>&nbsp;<?php echo $first_name_safe; ?>
              </em>
              <?php if ( $kana_safe ) : ?>
                （<?php echo $kana_safe; ?>）
              <?php endif; ?>
            </div>

            <?php if ( $credential_safe ) : ?>
              <div class="credential">資格： <?php echo $credential_safe; ?></div>
            <?php endif; ?>

            <?php if ( $from_safe ) : ?>
              <div class="from">出身地： <?php echo $from_safe; ?></div>
            <?php endif; ?>

            <div class="user_description">
              <?php echo $desc; ?>
            </div>
          </div>
        </div>
      </div>
    </label>
  </div>
</div>
<?php endforeach; ?>
