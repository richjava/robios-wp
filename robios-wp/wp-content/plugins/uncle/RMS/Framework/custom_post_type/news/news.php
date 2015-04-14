<?php
add_action( 'init', 'register_news_post_type' );
function register_news_post_type() {
   register_post_type( 'news',
		array(
			'labels' => array(
				'name'			=> __('Our News',"rms"),
				'singular_name' => __('Our News',"rms"),
				'add_new'		=> __('Add News',"rms"),
				'add_new_item'	=> __('Add News',"rms"),
				'edit_item'		=> __('Edit News',"rms"),
				'new_item'		=> __('New News',"rms"),
				'not_found'		=> __('No News found',"rms"),
				'not_found_in_trash' => __('No News found in Trash',"rms"),
				'menu_name'		=> __('Our News',"rms"),
			),
			'description' => 'Lastest happenings with your business.',
			'public' => true,
			'show_in_nav_menus' => true,
			'supports' => array(
				'title',
				'thumbnail',
				'editor',
				'page-attributes',
			),
			'show_ui' => true,
			'show_in_menu' => true,
			'menu_position' => 37,
			'has_archive' => true,
                        'menu_icon' => 'dashicons-megaphone',
			'query_var' => true,
			'rewrite' => array('slug' => 'news'),
			'capability_type' => 'post',
			'map_meta_cap'=>true
			
		)
	);
	
	add_custom_taxonomies_news();
	
}
function add_custom_taxonomies_news() {
	register_taxonomy('news', 'news', array(
		'hierarchical' => true,
		'labels' => array(
			'name' => _x( 'Our News', 'taxonomy general name',"rms" ),
			'singular_name' => _x( 'News', 'taxonomy singular name' ,"rms"),
			'search_items' =>  __( 'Search News' ,"rms"),
			'all_items' => __( 'All News' ,"rms"),
			'parent_item' => __( 'Parent News' ,"rms"),
			'parent_item_colon' => __( 'Parent News:' ,"rms"),
			'edit_item' => __( 'Edit News' ,"rms"),
			'update_item' => __( 'Update News' ,"rms"),
			'add_new_item' => __( 'Add New News' ,"rms"),
			'new_item_name' => __( 'New News' ,"rms"),
			'menu_name' => __( 'News Catagory' ,"rms"),
		),
		'rewrite' => array(
			'slug' => 'news', 
			'with_front' => false, 
			'hierarchical' => true 
		)
		
	));
}