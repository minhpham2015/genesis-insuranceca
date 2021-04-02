<?php
function custom_post_site() {

		register_post_type( 'testimonial',
		 	// let's now add all the options for this post type
			array('labels' => array(
				'name' => __('Testimonials', 'xtrades'), /* This is the Title of the Group */
				'singular_name' => __('Testimonials', 'xtrades'), /* This is the individual type */
				'all_items' => __('All', 'xtrades'), /* the all items menu item */
				'add_new' => __('Add New', 'xtrades'), /* The add new menu item */
				'add_new_item' => __('Add New', 'xtrades'), /* Add New Display Title */
				'edit' => __( 'Edit', 'xtrades' ), /* Edit Dialog */
				'edit_item' => __('Edit', 'xtrades'), /* Edit Display Title */
				'new_item' => __('New', 'xtrades'), /* New Display Title */
				'view_item' => __('View', 'xtrades'), /* View Display Title */
				'search_items' => __('Search', 'xtrades'), /* Search Custom Type Title */
				'not_found' =>  __('Nothing found in the Database.', 'xtrades'), /* This displays if there are no entries yet */
				'not_found_in_trash' => __('Nothing found in Trash', 'xtrades'), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
				), /* end of arrays */
				'public' => false,
				'publicly_queryable' => false,
				'exclude_from_search' => false,
				'show_ui' => true,
				'query_var' => true,
				'menu_position' => 9, /* this is what order you want it to appear in on the left hand side menu */
				'menu_icon' => 'dashicons-format-status', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
				'rewrite'	=> false, /* you can specify its url slug */
				'has_archive' => false, /* you can rename the slug here */
				'capability_type' => 'post',
				'hierarchical' => false,
				/* the next one is important, it tells what's enabled in the post editor */
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'revisions','comments')
		 	) /* end of options */
		); /* end of register post type */

}
// adding the function to the Wordpress init
add_action( 'init', 'custom_post_site');
