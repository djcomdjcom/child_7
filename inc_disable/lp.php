<?php 
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


;?>