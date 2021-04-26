<?php

// add custom post type
add_action( 'init', 'insuranceca_custom_post_type');
// add custom taxonomy
add_action( 'init', 'insuranceca_custom_taxonomy');

function insuranceca_custom_post_type() {

	// Resources
	register_post_type( 'resources',
		array('labels' => array(
				'name' => __('Resources', 'genesis-insuranceca'), /* This is the Title of the Group */
				'singular_name' => __('Resources', 'genesis-insuranceca'), /* This is the individual type */
				'all_items' => __('All', 'genesis-insuranceca'), /* the all items menu item */
				'add_new' => __('Add New', 'genesis-insuranceca'), /* The add new menu item */
				'add_new_item' => __('Add New', 'genesis-insuranceca'), /* Add New Display Title */
				'edit' => __( 'Edit', 'genesis-insuranceca' ), /* Edit Dialog */
				'edit_item' => __('Edit', 'genesis-insuranceca'), /* Edit Display Title */
				'new_item' => __('New', 'genesis-insuranceca'), /* New Display Title */
				'view_item' => __('View', 'genesis-insuranceca'), /* View Display Title */
				'search_items' => __('Search', 'genesis-insuranceca'), /* Search Custom Type Title */
				'not_found' =>  __('Nothing found in the Database.', 'genesis-insuranceca'), /* This displays if there are no entries yet */
				'not_found_in_trash' => __('Nothing found in Trash', 'genesis-insuranceca'), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 10, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-open-folder', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> array('slug' => 'resource','with_front' => false), /* you can specify its url slug */
			'has_archive' => false, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail')
		) /* end of options */
	); /* end of register post type */


	//FAQs
	register_post_type( 'ins-faqs',
		array('labels' => array(
				'name' => __('FAQs', 'genesis-insuranceca'), /* This is the Title of the Group */
				'singular_name' => __('FAQs', 'genesis-insuranceca'), /* This is the individual type */
				'all_items' => __('All', 'genesis-insuranceca'), /* the all items menu item */
				'add_new' => __('Add New', 'genesis-insuranceca'), /* The add new menu item */
				'add_new_item' => __('Add New', 'genesis-insuranceca'), /* Add New Display Title */
				'edit' => __( 'Edit', 'genesis-insuranceca' ), /* Edit Dialog */
				'edit_item' => __('Edit', 'genesis-insuranceca'), /* Edit Display Title */
				'new_item' => __('New', 'genesis-insuranceca'), /* New Display Title */
				'view_item' => __('View', 'genesis-insuranceca'), /* View Display Title */
				'search_items' => __('Search', 'genesis-insuranceca'), /* Search Custom Type Title */
				'not_found' =>  __('Nothing found in the Database.', 'genesis-insuranceca'), /* This displays if there are no entries yet */
				'not_found_in_trash' => __('Nothing found in Trash', 'genesis-insuranceca'), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_in_admin_status_list' => true,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 10, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-format-status', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> array('slug' => 'faq','with_front' => false), /* you can specify its url slug */
			'has_archive' => false, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
      'supports' => array( 'title', 'editor', 'author', 'thumbnail')
	 	) /* end of options */ 
	); /* end of register post type */



	//Team
	register_post_type( 'team',
		array('labels' => array(
				'name' => __('Team', 'genesis-insuranceca'), /* This is the Title of the Group */
				'singular_name' => __('Team', 'genesis-insuranceca'), /* This is the individual type */
				'all_items' => __('All', 'genesis-insuranceca'), /* the all items menu item */
				'add_new' => __('Add New', 'genesis-insuranceca'), /* The add new menu item */
				'add_new_item' => __('Add New', 'genesis-insuranceca'), /* Add New Display Title */
				'edit' => __( 'Edit', 'genesis-insuranceca' ), /* Edit Dialog */
				'edit_item' => __('Edit', 'genesis-insuranceca'), /* Edit Display Title */
				'new_item' => __('New', 'genesis-insuranceca'), /* New Display Title */
				'view_item' => __('View', 'genesis-insuranceca'), /* View Display Title */
				'search_items' => __('Search', 'genesis-insuranceca'), /* Search Custom Type Title */
				'not_found' =>  __('Nothing found in the Database.', 'genesis-insuranceca'), /* This displays if there are no entries yet */
				'not_found_in_trash' => __('Nothing found in Trash', 'genesis-insuranceca'), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'public' => true,
			'publicly_queryable' => false,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 10, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-groups', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
			'rewrite'	=> array('slug' => 'faq','with_front' => false), /* you can specify its url slug */
			'has_archive' => false, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
	  'supports' => array( 'title', 'editor', 'author', 'thumbnail')
		) /* end of options */
	); /* end of register post type */

}
function insuranceca_custom_taxonomy(){

	//Types
	register_taxonomy(
        'ins-type',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
        'resources', // post type name
        array(
            'hierarchical' => true,
            'label' => 'Types', // display name
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'type',    // This controls the base slug that will display before each term
                'with_front' => false  // Don't display the category base before
            )
        )
    );

		//Topics
		register_taxonomy(
	        'ins-topic',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
	        'resources', // post type name
	        array(
	            'hierarchical' => false,
	            'label' => 'Topic', // display name
	            'query_var' => true,
	            'rewrite' => array(
	                'slug' => 'topic',    // This controls the base slug that will display before each term
	                'with_front' => false  // Don't display the category base before
	            )
	        )
	    );

		//Category FAQs
		register_taxonomy(
					'cat-faq',  // The name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
					'ins-faqs', // post type name
					array(
							'hierarchical' => true,
							'label' => 'Category', // display name
							'query_var' => true,
							'rewrite' => array(
									'slug' => 'cat-faq',    // This controls the base slug that will display before each term
									'with_front' => false  // Don't display the category base before
							)
					)
			);

}
