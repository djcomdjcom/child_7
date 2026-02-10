<?php
/**
 * hublog | 記事専用CSSエディタ
 * 保存先：postmeta (_hublog_post_css)
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/* ----------------------------------------
 * 1. メタボックス追加
 * -------------------------------------- */
add_action( 'add_meta_boxes', function () {

    $post_types = ['post', 'page'];

    foreach ( $post_types as $pt ) {
        add_meta_box(
            'hublog_post_css',
            '記事専用CSS',
            'hublog_render_post_css_box',
            $pt,
            'normal',
            'default'
        );
    }
});

/* ----------------------------------------
 * 2. メタボックス描画
 * -------------------------------------- */
function hublog_render_post_css_box( $post ) {

    $css = get_post_meta( $post->ID, '_hublog_post_css', true );
    wp_nonce_field( 'hublog_post_css_save', 'hublog_post_css_nonce' );
    ?>
    <textarea
        name="hublog_post_css"
        class="hublog-post-css-editor"
        style="width:100%;min-height:240px;"
    ><?php echo esc_textarea( $css ); ?></textarea>

    <p style="margin-top:8px;color:#666;font-size:13px;">
        このCSSは <strong>この記事のみに適用</strong> されます。<br>
        推奨： <code>body.postid-<?php echo esc_html( $post->ID ); ?></code> を先頭につけてください。
    </p>
    <?php
}

/* ----------------------------------------
 * 3. 保存処理
 * -------------------------------------- */
add_action( 'save_post', function ( $post_id ) {

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! isset( $_POST['hublog_post_css_nonce'] ) ) return;
    if ( ! wp_verify_nonce( $_POST['hublog_post_css_nonce'], 'hublog_post_css_save' ) ) return;

    if ( isset( $_POST['hublog_post_css'] ) ) {
        update_post_meta(
            $post_id,
            '_hublog_post_css',
            wp_unslash( $_POST['hublog_post_css'] )
        );
    }
});

/* ----------------------------------------
 * 4. CodeMirror 読み込み（管理画面）
 * -------------------------------------- */

add_action( 'admin_enqueue_scripts', function ( $hook ) {

    if ( ! in_array( $hook, ['post.php', 'post-new.php'], true ) ) {
        return;
    }

    $settings = wp_enqueue_code_editor([
        'type' => 'text/css',
    ]);

    if ( false === $settings ) {
        return;
    }

    wp_add_inline_script(
        'code-editor',
        '(function(){
            const settings = ' . wp_json_encode( $settings ) . ';
            const init = () => {
                document.querySelectorAll(".hublog-post-css-editor").forEach(el => {
                    if (el.dataset.cmInitialized) return;
                    wp.codeEditor.initialize(el, settings);
                    el.dataset.cmInitialized = "1";
                });
            };
            document.addEventListener("DOMContentLoaded", init);
        })();'
    );
});


/* ----------------------------------------
 * 5. フロント側出力（記事単位）
 * -------------------------------------- */
add_action( 'wp_head', function () {

    if ( ! is_singular() ) return;

    $css = get_post_meta( get_the_ID(), '_hublog_post_css', true );
    if ( ! $css ) return;

    echo "\n<style id=\"hublog-post-css\">\n{$css}\n</style>\n";
});
