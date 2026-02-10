<?php 
function cptui_register_my_cpts_bunjo() {

	/**
	 * Post Type: 分譲.
	 */

	$labels = [
		"name" => esc_html__( "分譲", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "分譲", "custom-post-type-ui" ),
		"menu_name" => esc_html__( "分譲コンテンツ", "custom-post-type-ui" ),
		"all_items" => esc_html__( "すべての分譲コンテンツ", "custom-post-type-ui" ),
		"add_new" => esc_html__( "分譲コンテンツ追加", "custom-post-type-ui" ),
		"add_new_item" => esc_html__( "新規分譲コンテンツ", "custom-post-type-ui" ),
		"search_items" => esc_html__( "分譲コンテンツ検索", "custom-post-type-ui" ),
		"parent" => esc_html__( "分譲コンテンツ親記事（コンセプト）", "custom-post-type-ui" ),
		"parent_item_colon" => esc_html__( "分譲コンテンツ親記事（コンセプト）", "custom-post-type-ui" ),
	];

	$args = [
		"label" => esc_html__( "分譲", "custom-post-type-ui" ),
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
		"hierarchical" => true,
		"can_export" => false,
		"rewrite" => [ "slug" => "bunjo", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-admin-multisite",
		"supports" => [ "title", "editor", "thumbnail", "custom-fields", "page-attributes" ],
		"taxonomies" => [ "bunjo_role" ],
		"show_in_graphql" => false,
	];

	register_post_type( "bunjo", $args );
}

add_action( 'init', 'cptui_register_my_cpts_bunjo' );


function cptui_register_my_taxes_bunjo_role() {

	/**
	 * Taxonomy: 分譲コンテンツの役割.
	 */

	$labels = [
		"name" => esc_html__( "分譲コンテンツの役割", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "分譲コンテンツの役割", "custom-post-type-ui" ),
	];

	
	$args = [
		"label" => esc_html__( "分譲コンテンツの役割", "custom-post-type-ui" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'bunjo_role', 'with_front' => true, ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_tagcloud" => true,
		"rest_base" => "bunjo_role",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => true,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "bunjo_role", [ "bunjo" ], $args );
}
add_action( 'init', 'cptui_register_my_taxes_bunjo_role' );
;?>