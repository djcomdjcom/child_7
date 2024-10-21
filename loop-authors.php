<?php
/**
 * 投稿者一覧表示用テンプレート
 * loop-authors.php
 */

// 表示したいユーザーのログイン名を設定
$authers = array(
	'samplea',
    'sampleb',
);

foreach ($authers as $auther) {
    // ユーザー情報を取得
    $user_info = get_user_by('login', $auther);
    if (!$user_info) {
        continue; // ユーザーが見つからなかった場合はスキップ
    }

    $userphotoid = $user_info->ID;

    // カスタムフィールドを取得
    $user_post = get_user_meta($userphotoid, 'post', true);
    $user_division = get_user_meta($userphotoid, 'division', true);
    $user_kana = get_user_meta($userphotoid, 'kana', true);
    $user_credential = get_user_meta($userphotoid, 'credential', true);
    $user_from = get_user_meta($userphotoid, 'from', true);
    ?>
    <div class="user_info clearfix profil">
        <div class="inbox">
            <figure class="photobox"><?php echo get_avatar($userphotoid, 300); ?></figure>
            <div class="staff-meta">
                <div class="staff-post"><?php echo esc_html($user_post); ?></div>
                <div class="staff-division"><?php echo esc_html($user_division); ?></div>
                <div class="staff-name"><?php echo esc_html($user_info->last_name); ?>&nbsp;<?php echo esc_html($user_info->first_name); ?></div>
                <div class="staff-kana"><?php echo esc_html($user_kana); ?></div>
            </div>
            <label>
                <input type="checkbox" name="checkbox">
                <div class="staffpopup">
                    <div class="inbox row">
                        <span class="w100 col-3"><?php echo get_avatar($userphotoid, 300); ?></span>
                        <div class="userinfo_detail col-9">
                            <div class="user_name">
                                <div class="user_post_division">
                                    <?php if ($user_post): ?>
                                        <span class="post"><?php echo esc_html($user_post); ?></span>
                                    <?php endif; ?>
                                    <?php if ($user_division): ?>
                                        <span class="division"><?php echo esc_html($user_division); ?></span>
                                    <?php endif; ?>
                                </div>
                                <em class="fullname cleartype"><?php echo esc_html($user_info->last_name); ?>&nbsp;<?php echo esc_html($user_info->first_name); ?></em>（<?php echo esc_html($user_kana); ?>）
                            </div>
                            <?php if ($user_credential): ?>
                                <div class="credential">資格：<?php echo esc_html($user_credential); ?></div>
                            <?php endif; ?>
                            <?php if ($user_from): ?>
                                <div class="from">出身地：<?php echo esc_html($user_from); ?></div>
                            <?php endif; ?>
                            <div class="user_description"><?php echo wpautop(esc_html($user_info->description)); ?></div>
                        </div>
                    </div>
                </div>
            </label>
        </div>
    </div>
    <?php
} // endforeach
?>
