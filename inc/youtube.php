<?php 

// youtube動画掲載
function cptui_register_my_cpts_video() {

	/**
	 * Post Type: YouTube.
	 */

	$labels = [
		"name" => esc_html__( "YouTube", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "YouTube", "custom-post-type-ui" ),
        "all_items" => __( "すべてのYouTube動画", "custom-post-type-ui" ),
        "add_new_item" => __( "YouTube動画の追加", "custom-post-type-ui" ),
        "add_new" => __( "YouTube動画の追加", "custom-post-type-ui" ),
        "edit_item" => __( "YouTube動画の編集", "custom-post-type-ui" ),
        "new_item" => __( "新規YouTube動画", "custom-post-type-ui" ),
        "view_item" => __( "YouTube動画を表示", "custom-post-type-ui" ),
        "view_items" => __( "YouTube動画を表示", "custom-post-type-ui" ),
        "search_items" => __( "YouTube動画を検索", "custom-post-type-ui" ),
	];


	$args = [
		"label" => esc_html__( "YouTube", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"can_export" => true,
		"rewrite" => [ "slug" => "video", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-video-alt3",
		"supports" => [ "title", "thumbnail", "custom-fields" ],
		"show_in_graphql" => false,
	];

	register_post_type( "video", $args );
}

add_action( 'init', 'cptui_register_my_cpts_video' );




// ---------------------------
// カスタムフィールド「動画URL」を追加（投稿タイプ video 用）
// ---------------------------
function add_video_url_meta_box() {
    add_meta_box(
        'video_url_meta_box',
        '動画URL',
        'render_video_url_meta_box',
        'video', // 投稿タイプ名
        'normal',
        'default'
    );
}

add_action('add_meta_boxes', 'add_video_url_meta_box');

function render_video_url_meta_box($post) {
    $video_url = get_post_meta($post->ID, 'video_url', true);
    wp_nonce_field('save_video_url_meta_box', 'video_url_meta_box_nonce');
    echo '<input type="text" name="video_url" value="' . esc_attr($video_url) . '" size="80" />';
}

function save_video_url_meta_box($post_id) {
    if (!isset($_POST['video_url_meta_box_nonce']) || !wp_verify_nonce($_POST['video_url_meta_box_nonce'], 'save_video_url_meta_box')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;

    if (isset($_POST['video_url'])) {
        update_post_meta($post_id, 'video_url', sanitize_text_field($_POST['video_url']));
    }
}
add_action('save_post', 'save_video_url_meta_box');


// ---------------------------
// YouTube動画のサムネイル画像をアイキャッチに設定（初回投稿時）
// ---------------------------
function set_featured_image_from_youtube($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (wp_is_post_revision($post_id)) return;
    if (has_post_thumbnail($post_id)) return;

    $video_url = get_post_meta($post_id, 'video_url', true);
    if (!$video_url) return;

    if (preg_match('/youtu\.be\/([^\?\/]+)/', $video_url, $matches)) {
        $video_id = $matches[1];
    } elseif (preg_match('/v=([^\&]+)/', $video_url, $matches)) {
        $video_id = $matches[1];
    } else {
        return;
    }

    $thumbnail_url = 'https://img.youtube.com/vi/' . $video_id . '/hqdefault.jpg';

    $image_id = media_sideload_image($thumbnail_url, $post_id, null, 'id');
    if (!is_wp_error($image_id)) {
        set_post_thumbnail($post_id, $image_id);
    }
}
add_action('save_post', 'set_featured_image_from_youtube');

// ---------------------------
// 16:9 比率のサムネイル画像サイズを追加（例: 320x180）
// ---------------------------
add_image_size('youtube-thumb', 320, 180, true);


// クイック編集フォームに「動画URL」フィールドを追加
function add_video_url_quick_edit($column_name, $post_type) {
    if ($column_name !== 'video_url' || $post_type !== 'video') return;

    ?>
    <fieldset class="inline-edit-col-right">
        <div class="inline-edit-col">
            <label>
                <span class="title">動画URL</span>
                <span class="input-text-wrap">
                    <input type="text" name="video_url" class="video_url" value="">
                </span>
            </label>
        </div>
    </fieldset>
    <?php
}
add_action('quick_edit_custom_box', 'add_video_url_quick_edit', 10, 2);

// カラムに video_url を追加（表示用）
function add_video_url_column($columns) {
    $columns['video_url'] = '動画URL';
    return $columns;
}
add_filter('manage_video_posts_columns', 'add_video_url_column');

function show_video_url_column($column_name, $post_id) {
    if ($column_name === 'video_url') {
        echo esc_html(get_post_meta($post_id, 'video_url', true));
    }
}
add_action('manage_video_posts_custom_column', 'show_video_url_column', 10, 2);

// クイック編集の保存処理
function save_video_url_quick_edit($post_id) {
    if (!current_user_can('edit_post', $post_id)) return;
    if (isset($_POST['video_url'])) {
        update_post_meta($post_id, 'video_url', sanitize_text_field($_POST['video_url']));
    }
}
add_action('save_post_video', 'save_video_url_quick_edit');

// クイック編集時にJavaScriptで値を埋め込む
function quick_edit_video_url_admin_js() {
    global $pagenow, $typenow;
    if ($pagenow !== 'edit.php' || $typenow !== 'video') return;
    ?>
    <script>
    jQuery(function($) {
        // クイック編集の「編集」クリック時に値をフィールドに入れる
        $(document).on('click', '.editinline', function() {
            var post_id = $(this).closest('tr').attr('id').replace("post-", "");
            var video_url = $('#inline_' + post_id + ' .video_url_inline').text();
            $('input[name="video_url"]', '.inline-edit-row').val(video_url);
        });
    });
    </script>
    <?php
}
add_action('admin_footer', 'quick_edit_video_url_admin_js');

// クイック編集で使う hidden フィールドデータを追加（非表示だがJSで使う）
function add_video_url_inline_data($post) {
    if ($post->post_type !== 'video') return;
    $video_url = get_post_meta($post->ID, 'video_url', true);
    echo '<div class="video_url_inline" style="display:none;">' . esc_html($video_url) . '</div>';
}
add_action('quick_edit_custom_box', 'add_video_url_inline_data', 10, 2);
add_action( 'init', 'cptui_register_my_cpts' );

;?>