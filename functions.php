<?php
/**
 * child_7/functions.php
 */


// 子テーマのfunctions.php

//class Child_Theme_Settings extends Theme_Settings {
// ここに子テーマで追加・変更したい関数やプロパティを記述します

// 例：
// function custom_setup_theme_supports() {
//   // 子テーマ独自のテーマサポート設定を追加
//   add_theme_support( 'custom-feature' );
// }
//}


function customize_menus() {
    global $menu;
    $menu[ 19 ] = $menu[ 10 ]; //メディアの移動
    unset( $menu[ 10 ] );
}
add_action( 'admin_menu', 'customize_menus' );

//スライドショー用投稿タイプ
register_post_type(
    'slideimage', //投稿タイプ名
    array(
        'label' => 'スライドショー', //ラベル名
        'menu_icon' => 'dashicons-images-alt2',
        'labels' => array(
            'edit_item' => 'スライドを編集',
            'add_new_item' => '新しいスライドの追加',
            'add_new' => '新しいスライドの追加',
            'menu_name' => 'スライドショー' //管理画面のメニュー名
        ),
        'public' => true, //公開状態
        'query_var' => true, // スラッグでURLをリクエストできる
        'menu_position' => 2,
        'hierarchical' => false, //固定ページのように親ページを指定するならtrue
        'rewrite' => array( 'slug' => 'slideimage' ), //スラッグ名
        'has_archive' => true, //パーマリンクがデフォルト以外、アーカイブページを表示する場合はtrue
        'supports' => array(
            'title',
            'editor',
            //            'custom-fields',
            'thumbnail',
            'page-attributes',
            //            'excerpt'
        )
    )
);

register_taxonomy(
    'slidecat', //タクソノミ名
    'slideimage', //タクソノミを使う投稿タイプ名
    array(
        'rewrite' => array( 'slug' => 'slideimage' ), //投稿タイプのスラッグ
        'label' => 'スライドカテゴリー', //ラベル名
        'labels' => array(
            'menu_name' => 'カテゴリー' //管理画面のメニュー名
        ),
        'public' => true, //公開状態
        'hierarchical' => true, //カテゴリのように扱う場合はtrue
        'has_archive' => true,
        'query_var' => true,
        'show_admin_column' => true, //投稿タイプのテーブルにタクソノミーのカラムを生成
    )
);
//スライドショー専用カスタムフィールド

// カスタムフィールド追加
add_action( 'admin_menu', 'add_custom_fields' );
add_action( 'save_post', 'save_custom_fields' );

function add_custom_fields() {
    add_meta_box( 'my_sectionid', 'カスタムフィールド', 'my_custom_fields', 'slideimage' );
}

function my_custom_fields() {
    global $post;
    $slide_url = get_post_meta( $post->ID, 'slide_url', true );
    $h1 = get_post_meta( $post->ID, 'h1', true );
    $slide_target = get_post_meta( $post->ID, 'slide_target', true );
    if ( $slide_target == 1 ) {
        $slide_target_c = "checked";
    } else {
        $slide_target_c = "/";
    }

    echo '<p>スライドのリンク先URL<br />';
    echo '<input type="text" name="slide_url" value="' . esc_html( $slide_url ) . '" size="40" /></p>';
    //  echo '<p>大見出し（h1）40文字以内を推奨<br />';
    //  echo '<input type="text" name="h1" value="'.esc_html($h1).'" size="50" /></p>';
    echo '<p>新規ウィンドウで開く場合はチェック<br />';
    echo '<input type="checkbox" name="slide_target" value="1" ' . $slide_target_c . '>新規ウィンドウで開く</p>';
}

// カスタムフィールドの値を保存
function save_custom_fields( $post_id ) {
    if ( !empty( $_POST[ 'slide_url' ] ) )
        update_post_meta( $post_id, 'slide_url', $_POST[ 'slide_url' ] );
    else delete_post_meta( $post_id, 'slide_url' );

    if ( !empty( $_POST[ 'h1' ] ) )
        update_post_meta( $post_id, 'h1', $_POST[ 'h1' ] );
    else delete_post_meta( $post_id, 'h1' );

    if ( !empty( $_POST[ 'slide_target' ] ) )
        update_post_meta( $post_id, 'slide_target', $_POST[ 'slide_target' ] );
    else delete_post_meta( $post_id, 'slide_target' );
}
//LP用投稿タイプ
register_post_type(
    'lp', //投稿タイプ名
    array(
        'label' => 'LP', //ラベル名
        'menu_icon' => 'dashicons-megaphone',
        'labels' => array(
            'edit_item' => 'LPを編集',
            'add_new_item' => '新しいLPの追加',
            'add_new' => '新しいLPの追加',
            'menu_name' => 'LP' //管理画面のメニュー名
        ),
        'public' => true, //公開状態
        'query_var' => true, // スラッグでURLをリクエストできる
        'hierarchical' => false, //固定ページのように親ページを指定するならtrue
        'rewrite' => array( 'slug' => 'lp' ), //スラッグ名
        'has_archive' => true, //パーマリンクがデフォルト以外、アーカイブページを表示する場合はtrue
        'supports' => array(
            'title',
            'editor',
            'custom-fields',
            'thumbnail',
            'page-attributes',
            //            'excerpt'
        )
    )
);
//サンクスページ用投稿タイプ
register_post_type(
    'tnx', //投稿タイプ名
    array(
        'label' => 'サンクスページ', //ラベル名
        'menu_icon' => 'dashicons-heart',
        'labels' => array(
            'edit_item' => 'サンクスページを編集',
            'add_new_item' => '新しいサンクスページの追加',
            'add_new' => '新しいサンクスページの追加',
            'menu_name' => 'サンクスページ' //管理画面のメニュー名
        ),
        'public' => true, //公開状態
        'query_var' => true, // スラッグでURLをリクエストできる
        'hierarchical' => false, //固定ページのように親ページを指定するならtrue
        'rewrite' => array( 'slug' => 'tnx' ), //スラッグ名
        'has_archive' => true, //パーマリンクがデフォルト以外、アーカイブページを表示する場合はtrue
        'supports' => array(
            'title',
            'editor',
            'custom-fields',
            'thumbnail',
            'page-attributes',
            //            'excerpt'
        )
    )
);


function cptui_register_my_cpts() {

    /**
     * Post Type: 施工事例.
     */

    $labels = array(
        "name" => __( "施工事例", "custom-post-type-ui" ),
        "singular_name" => __( "施工事例", "custom-post-type-ui" ),
        "menu_name" => __( "施工事例（新築・リノベ）", "custom-post-type-ui" ),
        "all_items" => __( "すべての施工事例", "custom-post-type-ui" ),
        "add_new_item" => __( "施工事例の追加", "custom-post-type-ui" ),
        "add_new" => __( "新規施工事例の追加", "custom-post-type-ui" ),
        "edit_item" => __( "施工事例の編集", "custom-post-type-ui" ),
        "new_item" => __( "新規施工事例", "custom-post-type-ui" ),
        "view_item" => __( "施工事例を表示", "custom-post-type-ui" ),
        "view_items" => __( "施工事例を表示", "custom-post-type-ui" ),
        "search_items" => __( "施工事例を検索", "custom-post-type-ui" ),
        "archives" => __( "施工事例", "custom-post-type-ui" ),
    );

    $args = array(
        "label" => __( "施工事例", "custom-post-type-ui" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "delete_with_user" => false,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => "example",
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => array( "slug" => "example", "with_front" => true ),
        "query_var" => true,
        "menu_position" => 7,
        "menu_icon" => "dashicons-admin-multisite",
        "supports" => array( "title", "editor", "thumbnail", "excerpt", "custom-fields", "author" ),
        //    "taxonomies" => array( "ex_cat","category" ),
        "taxonomies" => array( "ex_cat" ),
    );

    register_post_type( "example", $args );

    /**
     * Post Type: リフォーム事例.
     */

    $labels = array(
        "name" => __( "リフォーム事例", "custom-post-type-ui" ),
        "singular_name" => __( "リフォーム事例", "custom-post-type-ui" ),
        "archives" => __( "リフォーム", "custom-post-type-ui" ),

        "menu_name" => __( "リフォーム事例", "custom-post-type-ui" ),
        "all_items" => __( "すべてのリフォーム事例", "custom-post-type-ui" ),
        "add_new_item" => __( "リフォーム事例の追加", "custom-post-type-ui" ),
        "add_new" => __( "新規リフォーム事例", "custom-post-type-ui" ),
        "edit_item" => __( "リフォーム事例の編集", "custom-post-type-ui" ),
        "new_item" => __( "新規リフォーム事例", "custom-post-type-ui" ),
        "view_item" => __( "リフォーム事例を表示", "custom-post-type-ui" ),
        "view_items" => __( "リフォーム事例を表示", "custom-post-type-ui" ),
        "search_items" => __( "リフォーム事例を検索", "custom-post-type-ui" ),
    );

    $args = array(
        "label" => __( "リフォーム事例", "custom-post-type-ui" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "delete_with_user" => false,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => "reform",
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => array( "slug" => "reform", "with_front" => true ),
        "query_var" => true,
        "menu_position" => 8,
        "menu_icon" => "dashicons-hammer",
        "supports" => array( "title", "editor", "thumbnail", "custom-fields", "author" ),
        //    "taxonomies" => array( "reform_cat","category" ),
        "taxonomies" => array( "reform_cat" ),
    );

    register_post_type( "reform", $args );


    /**
     * Post Type: お客様の声事例.
     */

    $labels = array(
        "name" => __( "お客様の声", "custom-post-type-ui" ),
        "singular_name" => __( "お客様の声", "custom-post-type-ui" ),
        "archives" => __( "お客様の声", "custom-post-type-ui" ),

        "menu_name" => __( "お客様の声", "custom-post-type-ui" ),
        "all_items" => __( "すべてのお客様の声", "custom-post-type-ui" ),
        "add_new_item" => __( "お客様の声の追加", "custom-post-type-ui" ),
        "add_new" => __( "新規お客様の声", "custom-post-type-ui" ),
        "edit_item" => __( "お客様の声の編集", "custom-post-type-ui" ),
        "new_item" => __( "新規お客様の声", "custom-post-type-ui" ),
        "view_item" => __( "お客様の声を表示", "custom-post-type-ui" ),
        "view_items" => __( "お客様の声を表示", "custom-post-type-ui" ),
        "search_items" => __( "お客様の声を検索", "custom-post-type-ui" ),

    );

    $args = array(
        "label" => __( "お客様の声", "custom-post-type-ui" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "delete_with_user" => false,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => "voice",
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => true,
        "rewrite" => array( "slug" => "voice", "with_front" => true ),
        "query_var" => true,
        "menu_position" => 9,
        "menu_icon" => "dashicons-format-chat",
        "supports" => array( "title", "editor", "thumbnail", "custom-fields", "author" ),
        //    "taxonomies" => array( "voice_cat","category" ),
        "taxonomies" => array( "voice_cat" ),
    );

    register_post_type( "voice", $args );


    /**
     * Post Type: コラム.
     */

    $labels = [
        "name" => esc_html__( "コラム", "custom-post-type-ui" ),
        "singular_name" => esc_html__( "コラム", "custom-post-type-ui" ),
    ];

    $args = [
        "label" => esc_html__( "コラム", "custom-post-type-ui" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "show_in_rest" => true,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "rest_namespace" => "wp/v2",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "delete_with_user" => false,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "can_export" => false,
        "rewrite" => [ "slug" => "column", "with_front" => true ],
        "query_var" => true,
        "menu_position" => 3,
        "menu_icon" => "dashicons-admin-customizer",
        "supports" => [ "title", "editor", "thumbnail", "excerpt", "custom-fields", "revisions", "author" ],
        "taxonomies" => [ "column_cat" ],
        "show_in_graphql" => false,
    ];

    register_post_type( "column", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );


function cptui_register_my_taxes() {


    /**
     * Taxonomy: 施工事例の種別.
     */

    $labels = array(
        "name" => __( "施工事例の種別", "custom-post-type-ui" ),
        "singular_name" => __( "施工事例の種別", "custom-post-type-ui" ),
        "menu_name" => __( "施工事例の種別", "custom-post-type-ui" ),
    );

    $args = array(
        "label" => __( "施工事例の種別", "custom-post-type-ui" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'ex_cat', 'with_front' => true, ),
        "show_admin_column" => true,
        "show_in_rest" => false,
        "rest_base" => "ex_cat",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
    );
    register_taxonomy( "ex_cat", array( "example" ), $args );

    /**
     * Taxonomy: リフォーム種別.
     */

    $labels = array(
        "name" => __( "リフォーム種別", "custom-post-type-ui" ),
        "singular_name" => __( "リフォーム種別", "custom-post-type-ui" ),
    );

    $args = array(
        "label" => __( "リフォーム種別", "custom-post-type-ui" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'reform_cat', 'with_front' => true, ),
        "show_admin_column" => true,
        "show_in_rest" => false,
        "rest_base" => "reform_cat",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
    );
    register_taxonomy( "reform_cat", array( "reform" ), $args );


    /**
     * Taxonomy: お客様の声種別.
     */

    $labels = array(
        "name" => __( "お客様の声種別", "custom-post-type-ui" ),
        "singular_name" => __( "お客様の声種別", "custom-post-type-ui" ),
    );

    $args = array(
        "label" => __( "お客様の声種別", "custom-post-type-ui" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'voice_cat', 'with_front' => true, ),
        "show_admin_column" => true,
        "show_in_rest" => false,
        "rest_base" => "voice_cat",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
    );
    register_taxonomy( "voice_cat", array( "voice" ), $args );


    /**
     * Taxonomy: バナー種別.
     */

    $labels = array(
        "name" => __( "バナー種別", "custom-post-type-ui" ),
        "singular_name" => __( "バナー種別", "custom-post-type-ui" ),
    );

    $args = array(
        "label" => __( "バナー種別", "custom-post-type-ui" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => array( 'slug' => 'bnr_type', 'with_front' => true, ),
        "show_admin_column" => true,
        "show_in_rest" => false,
        "rest_base" => "bnr_type",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "show_in_quick_edit" => true,
    );
    register_taxonomy( "bnr_type", array( "event_bnr" ), $args );

    /**
     * Taxonomy: コラムカテゴリー.
     */

    $labels = [
        "name" => esc_html__( "コラムカテゴリー", "custom-post-type-ui" ),
        "singular_name" => esc_html__( "コラムカテゴリー", "custom-post-type-ui" ),
    ];


    $args = [
        "label" => esc_html__( "コラムカテゴリー", "custom-post-type-ui" ),
        "labels" => $labels,
        "public" => true,
        "publicly_queryable" => true,
        "hierarchical" => true,
        "show_ui" => true,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "query_var" => true,
        "rewrite" => [ 'slug' => 'column_cat', 'with_front' => true, 'hierarchical' => true, ],
        "show_admin_column" => true,
        "show_in_rest" => true,
        "show_tagcloud" => false,
        "rest_base" => "column_cat",
        "rest_controller_class" => "WP_REST_Terms_Controller",
        "rest_namespace" => "wp/v2",
        "show_in_quick_edit" => true,
        "sort" => true,
        "show_in_graphql" => false,
    ];
    register_taxonomy( "column_cat", [ "column" ], $args );
}

add_action( 'init', 'cptui_register_my_taxes' );


function cptui_register_my_cpts_event_bnr() {

    /**
     * Post Type: イベントバナー.
     */

    $labels = array(
        "name" => __( "イベントバナー", "custom-post-type-ui" ),
        "singular_name" => __( "イベントバナー", "custom-post-type-ui" ),
    );

    $args = array(
        "label" => __( "イベントバナー", "custom-post-type-ui" ),
        "labels" => $labels,
        "description" => "",
        "public" => true,
        "publicly_queryable" => true,
        "show_ui" => true,
        "delete_with_user" => false,
        "show_in_rest" => false,
        "rest_base" => "",
        "rest_controller_class" => "WP_REST_Posts_Controller",
        "has_archive" => false,
        "show_in_menu" => true,
        "show_in_nav_menus" => true,
        "exclude_from_search" => false,
        "capability_type" => "post",
        "map_meta_cap" => true,
        "hierarchical" => false,
        "rewrite" => array( "slug" => "event_bnr", "with_front" => true ),
        "query_var" => true,
        "menu_position" => 6,
        "menu_icon" => "dashicons-images-alt",
        "supports" => array( "title", "thumbnail", "custom-fields" ),
    );

    register_post_type( "event_bnr", $args );
}

add_action( 'init', 'cptui_register_my_cpts_event_bnr' );


// カスタムフィールド追加
add_action( 'admin_menu', 'add_custom_fields2' );
add_action( 'save_post', 'save_custom_fields2' );

function add_custom_fields2() {
    add_meta_box( 'my_sectionid', 'カスタムフィールド', 'my_custom_fields2', 'event_bnr' );
}

function my_custom_fields2() {
    global $post;
    $event_bnr_url = get_post_meta( $post->ID, 'event_bnr_url', true );

    $footer_bnr_col = get_post_meta( $post->ID, 'footer_bnr_col', true );

    $event_bnr_target = get_post_meta( $post->ID, 'event_bnr_target', true );
    if ( $event_bnr_target == 1 ) {
        $event_bnr_target_c = "checked";
    } else {
        $event_bnr_target_c = "/";
    }


    echo '<p>バナーのリンク先URL<br />';
    echo '<input type="text" name="event_bnr_url" value="' . esc_html( $event_bnr_url ) . '" size="40" /></p>';
    echo '<p>新規ウィンドウで開く場合はチェック<br />';
    echo '<input type="checkbox" name="event_bnr_target" value="1" ' . $event_bnr_target_c . '>新規ウィンドウで開く</p>';

    echo '<hr>以下フッターバナーのみの設定';

    echo '<p>CSS class<br>';
    echo '<input type="text" name="footer_bnr_col" value="' . esc_html( $footer_bnr_col ) . '" size="40" /></p>';
    echo '<p>入力なしの場合（ デフォ値）「col-12 col-sm-6 col-lg-3」<br>
＝スマホで1行あたりの表示数 1 個、タブレットで1行あたりの表示数 2 個、PCで1行あたりの表示数 4 個<br />例）スマホで1行あたりの表示数 1 個、タブレット以上で 3 個表示の場合は「col-12 col-md-4」<br>';
}

// カスタムフィールドの値を保存
function save_custom_fields2( $post_id ) {
    if ( !empty( $_POST[ 'event_bnr_url' ] ) )
        update_post_meta( $post_id, 'event_bnr_url', $_POST[ 'event_bnr_url' ] );
    else delete_post_meta( $post_id, 'event_bnr_url' );

    if ( !empty( $_POST[ 'footer_bnr_col' ] ) )
        update_post_meta( $post_id, 'footer_bnr_col', $_POST[ 'footer_bnr_col' ] );
    else delete_post_meta( $post_id, 'footer_bnr_col' );

    if ( !empty( $_POST[ 'event_bnr_target' ] ) )
        update_post_meta( $post_id, 'event_bnr_target', $_POST[ 'event_bnr_target' ] );
    else delete_post_meta( $post_id, 'event_bnr_target' );

}


// カスタム投稿タイプのサムネイルカラムを追加
function add_thumbnail_column_to_custom_post_types($columns) {
    $columns['thumbnail'] = __('サムネイル');
    return $columns;
}

// サムネイル画像を表示
function show_thumbnail_column_in_custom_post_types($column_name, $post_id) {
    if ($column_name === 'thumbnail') {
        if (has_post_thumbnail($post_id)) {
            echo get_the_post_thumbnail($post_id, array(120, 80));
        } else {
            echo 'サムネイルなし';
        }
    }
}

// カスタム投稿タイプ一覧にサムネイルを追加するフィルターを適用
add_filter('manage_voice_posts_columns', 'add_thumbnail_column_to_custom_post_types');
add_filter('manage_example_posts_columns', 'add_thumbnail_column_to_custom_post_types');
add_filter('manage_reform_posts_columns', 'add_thumbnail_column_to_custom_post_types');

// カスタム投稿タイプのサムネイルカラムに値を表示
add_action('manage_voice_posts_custom_column', 'show_thumbnail_column_in_custom_post_types', 10, 2);
add_action('manage_example_posts_custom_column', 'show_thumbnail_column_in_custom_post_types', 10, 2);
add_action('manage_reform_posts_custom_column', 'show_thumbnail_column_in_custom_post_types', 10, 2);




add_action( 'init', 'cptui_register_my_cpts' );
function menu_setup() {
    register_nav_menus( array(
        'global-navi' => 'グローバルナビ',
        'f1' => 'フッターメニュー1',
        'f2' => 'フッターメニュー2',
        'f3' => 'フッターメニュー3',
        'f4' => 'フッターメニュー4',
        'f5' => 'フッターメニュー5',
        'f6' => 'フッターメニュー6',
        'concept-nav' => 'コンセプト',
        'order-nav' => '注文住宅',
        'renov-nav' => 'リノベーション',
        'reform-nav' => 'リフォーム',
    ) );
}
add_action( 'after_setup_theme', 'menu_setup' );

add_filter( 'emoji_svg_url', '__return_false' );

//親ページを持つ子ページの場合、親ページのスラッグを取得
function is_parent_slug() {
    global $post;
    if ( $post->post_parent ) {
        $post_data = get_post( $post->post_parent );
        return $post_data->post_name;
    }
}
//親ページ判別
function is_child( $slug = "" ) {
    if ( is_singular() ): //投稿ページのとき（固定ページ含）
        global $post;
    if ( $post->post_parent ) { //現在のページに親がいる場合
        $post_data = get_post( $post->post_parent ); //親ページの取得
        if ( $slug != "" ) { //$slugが空じゃないとき
            if ( is_array( $slug ) ) { //$slugが配列のとき
                for ( $i = 0; $i <= count( $slug ); $i++ ) {
                    if ( $slug[ $i ] == $post_data->post_name || $slug[ $i ] == $post_data->ID || $slug[ $i ] == $post_data->post_title ) { //$slugの中のどれかが親ページのスラッグ、ID、投稿タイトルと同じのとき
                        return true;
                    }
                }
            } elseif ( $slug == $post_data->post_name || $slug == $post_data->ID || $slug == $post_data->post_title ) { //$slugが配列ではなく、$slugが親ページのスラッグ、ID、投稿タイトルと同じのとき
                return true;
            } else {
                return false;
            }
        } else { //親ページは存在するけど$slugが空のとき
            return true;
        }
    } else { //親ページがいない
        return false;
    }
    endif;
}
//管理画面記事一覧でサムネイル表示

add_theme_support( 'post-thumbnails', array( 'post', 'example', 'reform' ) );
set_post_thumbnail_size( 120, 80, true );

function manage_posts_columns( $columns ) {
    $columns[ 'thumbnail' ] = __( 'Thumbnail' );
    return $columns;
}

function add_column( $column_name, $post_id ) {

    //アイキャッチ取得 array(サイズ,サイズ)
    if ( 'thumbnail' == $column_name ) {
        $thum = get_the_post_thumbnail( $post_id, array( 150, 150 ), 'thumbnail' );
    }

    //使用していない場合「なし」を表示
    if ( isset( $thum ) && $thum ) {
        echo $thum;
    } else {
        echo __( 'None' );
    }
}
add_filter( 'manage_posts_columns', 'manage_posts_columns' );
add_action( 'manage_posts_custom_column', 'add_column', 10, 2 );

// 文字制御
add_filter( 'wpcf7_validate_text', 'wpcf7_validate_kana', 11, 2 );
add_filter( 'wpcf7_validate_text*', 'wpcf7_validate_kana', 11, 2 );

function wpcf7_validate_kana( $result, $tag ) {
    $tag = new WPCF7_Shortcode( $tag );
    $name = $tag->name;
    $value = isset( $_POST[ $name ] ) ? trim( wp_unslash( strtr( ( string )$_POST[ $name ], "\n", " " ) ) ) : "";

    // 'c-kana' または 'kana' の場合
    if ( $name === "c-kana" || $name === "kana" ) {
        // ひらがな以外だった場合
        if ( !preg_match( "/^[ぁ-ゞー]+$/u", $value ) ) {
            $result->invalidate( $tag, "全角ひらがなで入力してください。" );
        }
    }
    return $result;
}


//ショートコードでphpファイルを呼び出し
function my_php_Include( $params = array() ) {
    extract( shortcode_atts( array( 'file' => 'default' ), $params ) );
    ob_start();
    include( STYLESHEETPATH . "/$file.php" );
    return ob_get_clean();
}
add_shortcode( 'myphp', 'my_php_Include' );


//公開期限設定
function shortcode_timelimit( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'start' => null,
        'end' => null,
    ), $atts ) );
    $starttime = strtotime( $start );
    $endtime = strtotime( $end );
    if ( $starttime == null && $endtime == null ) {
        return $content;
    } elseif ( $starttime == null ) {
        if ( date_i18n( "U" ) < $endtime ) {
            return $content;
        }
    } elseif ( $endtime == null ) {
        if ( date_i18n( "U" ) > $starttime ) {
            return $content;
        }
    } else {
        if ( date_i18n( "U" ) > $starttime && date_i18n( "U" ) < $endtime ) {
            return $content;
        }
    }
}
add_shortcode( 'timelimit', 'shortcode_timelimit' );

// メタボックスの追加
add_action( 'admin_menu', 'add_css_metabox' );

function add_css_metabox() {
    add_meta_box( 'custom_css', 'カスタムCSS', 'create_add_css', array( 'post', 'page', 'voice', 'example' ) );
}

/*admin-styleCSS追加*/
function custom_editor_settings() {
    add_editor_style( 'admin-style.css' );
}
add_filter( 'admin_init', 'custom_editor_settings' );


//ADD QUICKTAG 投稿タイプ追加
add_filter( 'addquicktag_post_types', 'my_addquicktag_post_types' );

function my_addquicktag_post_types( $post_types ) {
    $post_types[] = 'example';
    $post_types[] = 'voice';
    $post_types[] = 'reform';
    $post_types[] = 'staff';
    $post_types[] = 'column';
    return $post_types;
}

//wp-block-library(ブロックエディタ用CSS)読み込み停止
function remove_unuse_css() {
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'remove_unuse_css', 9999 );

//dashiconCSS　非ログイン時無効
if ( !is_user_logged_in() ) {
    add_action( 'wp_print_styles', 'my_deregister_styles', 100 );

    function my_deregister_styles() {
        //wp_deregister_style( 'amethyst-dashicons-style' );
        wp_deregister_style( 'dashicons' );
    }
}
//comment-replyの読み込みを停止
function stop_comment_reply_js_queue() {
    if ( ( is_single() && comments_open() && get_option( 'thread_comments' ) ) ) {
        wp_enqueue_script( 'comment-reply' );
    } else {
        wp_deregister_script( 'comment-reply' );
    }
}
add_action( 'wp_footer', 'stop_comment_reply_js_queue' );


// プロフィールに任意のフィールドを追加するサンプル
function add_profile_sample_fields( $user ) {
    ?>
<div style="background: #fff; padding: 1em;">
<h2>
  <?php _e( 'スタッフ紹介ページ表示項目（上位版）' ); ?>
</h2>
<table class="form-table">
  <tr>
    <th><label for="message">
        <?php _e( '「メッセージ」「こんな人」' ); ?>
      </label>
      <br>
      <small>プロフィールページのヘッダ見出し</small></th>
    <td><textarea name="message" id="message" cols="30" rows="5" placeholder="<?php _e( '（例）&#13;自分自身が働く喜びを感じながら、&#13;“働く喜び”が感じられる人と家を&#13;つくりたい' ); ?>"><?php echo esc_attr( get_the_author_meta( 'message', $user->ID ) ); ?></textarea></td>
  </tr>
  <tr>
    <th><label for="skills">
        <?php _e( 'スキル・できること' ); ?>
      </label>
      <br>
      <small>項目ごとに改行</small></th>
    <td><textarea name="skills" id="skills" cols="30" rows="5" placeholder="<?php _e( '（例）&#13;建築設計&#13;商品開発&#13;建築コンサルティング' ); ?>"><?php echo esc_attr( get_the_author_meta( 'skills', $user->ID ) ); ?></textarea></td>
  </tr>
  <tr>
    <th><label for="credentials">
        <?php _e( '所有資格' ); ?>
      </label>
      <br>
      <small>項目ごとに改行</small></th>
    <td><textarea name="credentials" id="credentials" cols="30" rows="5" placeholder="<?php _e( '（例）&#13;一級建築士&#13;１級建築施工管理技士&#13;宅地建物取引士' ); ?>"><?php echo esc_attr( get_the_author_meta( 'credentials', $user->ID ) ); ?></textarea></td>
  </tr>
  <tr>
    <th><label for="text-sample">
        <?php _e( 'テキスト' ); ?>
      </label></th>
    <td><input type="text" name="text-sample" id="text-sample" value="<?php echo esc_attr( get_the_author_meta( 'text-sample', $user->ID ) ); ?>" class="regular-text" placeholder="<?php _e( 'テキストフィールドのサンプル' ); ?>" /></td>
  </tr>
  <tr>
    <th><label for="select-sample">
        <?php _e('セレクト' ); ?>
      </label></th>
    <td><select name="select-sample" id="select-sample">
        <option value="">選択</option>
        <option value="A" <?php selected( get_user_meta( $user->ID, 'select-sample', true ), 'A' ); ?>>A</option>
        <option value="B" <?php selected( get_user_meta( $user->ID, 'select-sample', true ), 'B' ); ?>>B</option>
        <option value="C" <?php selected( get_user_meta( $user->ID, 'select-sample', true ), 'C' ); ?>>C</option>
      </select></td>
  </tr>
  <tr>
    <th><?php _e( 'チェックボックス' ); ?></th>
    <td><label>
        <input type="checkbox" name="checkbox-sample" value="1" <?php checked( get_user_meta( $user->ID, 'checkbox-sample', true ), '1' ); ?> />
        Yes </label></td>
  </tr>
  <tr>
    <th><?php _e( 'ラジオボタン' ); ?></th>
    <td><fieldset>
        <label>
          <input type="radio" name="radio-sample" value="A" <?php checked( get_user_meta( $user->ID, 'radio-sample', true ), 'A' ); ?> />
          A </label>
        <label>
          <input type="radio" name="radio-sample" value="B" <?php checked( get_user_meta( $user->ID, 'radio-sample', true ), 'B' ); ?> />
          B </label>
      </fieldset></td>
  </tr>
</table>
<?php
}


// ユーザープロフィール編集画面にフィールドを追加する
add_action( 'show_user_profile', 'add_profile_sample_fields' );

// 自分のプロフィール編集画面にフィールドを追加する
add_action( 'edit_user_profile', 'add_profile_sample_fields' );


// 追加した任意のフィールドを保存するサンプル
function update_profile_sample_fields( $user_id ) {
    // 現在のユーザーに[$user_id]を編集する権限があることを確認
    if ( !current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }

    // 追加した任意の各フィールドを保存用に配列化（カスタムフィールドのキー名と値）
    $meta_keys = array(
        'text-sample' => $_POST[ 'text-sample' ],
        'message' => $_POST[ 'message' ],
        'skills' => $_POST[ 'skills' ],
        'credentials' => $_POST[ 'credentials' ],

        'select-sample' => $_POST[ 'select-sample' ],
        'checkbox-sample' => $_POST[ 'checkbox-sample' ],
        'radio-sample' => $_POST[ 'radio-sample' ]
    );

    // [$user_id]のユーザーメタを作成または更新
    foreach ( $meta_keys as $key => $value ) {
        update_user_meta( $user_id, $key, $value );
    }

    // 1つの場合は以下の1行で完了
    # update_user_meta( $user_id, 'text-sample', $_POST['text-sample'] );

    return true;
}

// ユーザー自身のプロフィール編集画面の更新に保存アクションを追加する
add_action( 'personal_options_update', 'update_profile_sample_fields' );

// ユーザープロフィール編集画面の更新に保存アクションを追加する
add_action( 'edit_user_profile_update', 'update_profile_sample_fields' );


//本体ギャラリーCSS停止
//add_filter( 'use_default_gallery_style', '__return_false' );

//yarppのCSSを読み込まない

function remove_editor_permissions() {
    $role = get_role('editor');
    // 編集者からカテゴリーの追加、編集、削除の権限を削除
    $role->remove_cap('manage_categories');
}
add_action('admin_init', 'remove_editor_permissions');