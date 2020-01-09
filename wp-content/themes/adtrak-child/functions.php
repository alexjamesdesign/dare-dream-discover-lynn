<?php

/* ========================================================================================================================

Enqueue and register scripts the right way.

======================================================================================================================== */

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('production', get_theme_file_uri() . '/js/production-dist.js', ['jquery'], '', true);
    wp_enqueue_script('fontawesome', 'https://use.fontawesome.com/731f5cd381.js', [], '', true );
});



/* ========================================================================================================================

Add defer attribute to scripts - ADD TO THIS AS REQUIRED

======================================================================================================================== */

function add_defer_attribute($tag, $handle) {
	// add script handles to the array below
	$scripts_to_defer = array('production','adtrak-cookie','location-dynamics-front');

	foreach($scripts_to_defer as $defer_script) {
	   if ($defer_script === $handle) {
		  return str_replace(' src', ' defer src', $tag);
	   }
	}
	return $tag;
 }
 add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);



/* ========================================================================================================================

Deactivate some plugins from some pages

======================================================================================================================== */

function remove_unwanted_plugins() {
	/*
	// Turn off map other than coverage area
    if (!is_page('coverage-area')) {
        remove_action('wp_head', 'bf_head');
        remove_action('wp_footer', 'bf_footer', 30);
	}
	*/

	// Remove datepicker script - ENABLE if your form has a datepicker field!
	wp_dequeue_script('jquery-ui-datepicker');
}

add_action('wp_head', 'remove_unwanted_plugins', 1);




/* ========================================================================================================================

Deregister Certain Stylesheets

======================================================================================================================== */

function my_deregister_styles() {
	wp_deregister_style('adtrak-cookie'); // Disable separate stylesheet for cookie notice (styles can be found in footer.scss)
	wp_deregister_style('wp-block-library'); // Gutenberg related stylesheet
}
add_action('wp_print_styles', 'my_deregister_styles', 100);



/* ========================================================================================================================

Disable Gutenberg

======================================================================================================================== */

add_filter('use_block_editor_for_post', '__return_false');



/* ========================================================================================================================

Remove jQuery Migrate form front-end

======================================================================================================================== */

add_filter( 'wp_default_scripts', 'dequeue_jquery_migrate' );

function dequeue_jquery_migrate( &$scripts){
	if(!is_admin()){
		$scripts->remove( 'jquery');
		$scripts->add( 'jquery', false, array( 'jquery-core' ), '1.10.2' );
	}
}



/* ========================================================================================================================

Custom

======================================================================================================================== */

add_action('after_setup_theme', function () {

// Custom image sizes

    add_image_size( 'img-2000-650', 2000, 650, true );
	add_image_size( 'img-1200-500', 1200, 500, true );

	add_image_size( 'img-1015-1100', 1015, 1100, true );
	
	add_image_size( 'img-600-600', 600, 600, true );
	add_image_size( 'img-350-350', 350, 350, true );

	// More navs

	register_nav_menus([
		'secondary' => __('Secondary Menu', 'adtrak')
	]);

});



/* ========================================================================================================================

Allow excerpts on pages

======================================================================================================================== */

add_action( 'init', 'my_add_excerpts_to_pages' );
function my_add_excerpts_to_pages() {
     add_post_type_support( 'page', 'excerpt' );
}



/* ========================================================================================================================

Address - Stacked

======================================================================================================================== */

function address_stacked() {
	// loop through the rows of data
	while ( have_rows('site_address', 'options') ) : the_row();
		// display a sub field value
		the_sub_field('address_line', 'options');
		echo "<br/>";

	endwhile;
	the_field('site_postcode', 'option');
}

add_shortcode( 'address_stacked', 'address_stacked' );



/* ========================================================================================================================

Address - Inline

======================================================================================================================== */

function address_inline() {
	// loop through the rows of data
	while ( have_rows('site_address', 'options') ) : the_row();
		// display a sub field value
		the_sub_field('address_line', 'options');
		echo ",&nbsp;";
	endwhile;
	the_field('site_postcode', 'option');
}

add_shortcode('address_inline', 'address_inline');



/* ========================================================================================================================
 
Register Custom Post Type - Destinations
 
======================================================================================================================== */

// Register Advice Centre
// Register Custom Post Type
function destinations_post_type() {

	$labels = array(
	  'name'                  => _x( 'Destinations', 'Post Type General Name', 'text_domain' ),
	  'singular_name'         => _x( 'Destination', 'Post Type Singular Name', 'text_domain' ),
	  'menu_name'             => __( 'Destinations', 'text_domain' ),
	  'name_admin_bar'        => __( 'Destinations', 'text_domain' ),
	  'archives'              => __( 'Destination Archives', 'text_domain' ),
	  'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
	  'all_items'             => __( 'All Destinations', 'text_domain' ),
	  'add_new_item'          => __( 'Add New Destinations', 'text_domain' ),
	  'add_new'               => __( 'Add New', 'text_domain' ),
	  'new_item'              => __( 'New Destination', 'text_domain' ),
	  'edit_item'             => __( 'Edit Destinations', 'text_domain' ),
	  'update_item'           => __( 'Update Destinations', 'text_domain' ),
	  'view_item'             => __( 'View Destinations', 'text_domain' ),
	  'search_items'          => __( 'Search Destinations', 'text_domain' ),
	  'not_found'             => __( 'Not found', 'text_domain' ),
	  'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
	  'featured_image'        => __( 'Featured Image', 'text_domain' ),
	  'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
	  'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
	  'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
	  'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
	  'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
	  'items_list'            => __( 'Items list', 'text_domain' ),
	  'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
	  'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$rewrite = array(
		  'slug'                       => 'destinations/%destination_category_taxonomy%',
		  'with_front'                 => false,
		  'hierarchical'               => true,
	);
	$args = array(
	  'label'                 => __( 'Resource', 'text_domain' ),
	  'description'           => __( 'A hub for all resources.', 'text_domain' ),
	  'labels'                => $labels,
	  'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	  'taxonomies'            => array( 'destination_category_taxonomy' ),
	  'hierarchical'          => false,
	  'public'                => true,
	  'show_ui'               => true,
	  'show_in_menu'          => true,
	  'menu_position'         => 5,
	  'menu_icon'             => 'dashicons-media-code',
	  'show_in_admin_bar'     => true,
	  'show_in_nav_menus'     => true,
	  'can_export'            => true,
	  'has_archive'           => true,    
	  'exclude_from_search'   => false,
	  'publicly_queryable'    => true,
	  'capability_type'       => 'post',
	  'rewrite'               => $rewrite,
	);
	register_post_type( 'destinations', $args );
  
  }
  add_action( 'init', 'destinations_post_type', 0 );


/* ========================================================================================================================
    
Register Custom Taxonomy - Destinations
    
======================================================================================================================== */

// Advice Centre Taxonomy
function destination_category_taxonomy() {

	$labels = array(
	  'name'                       => _x( 'Destinations', 'Taxonomy General Name', 'text_domain' ),
	  'singular_name'              => _x( 'Destination', 'Taxonomy Singular Name', 'text_domain' ),
	  'menu_name'                  => __( 'Destinations', 'text_domain' ),
	  'all_items'                  => __( 'All Destinations', 'text_domain' ),
	  'parent_item'                => __( 'Parent Destination', 'text_domain' ),
	  'parent_item_colon'          => __( 'Parent Destination:', 'text_domain' ),
	  'new_item_name'              => __( 'New Category Name', 'text_domain' ),
	  'add_new_item'               => __( 'Add New Category', 'text_domain' ),
	  'edit_item'                  => __( 'Edit Category', 'text_domain' ),
	  'update_item'                => __( 'Update Category', 'text_domain' ),
	  'view_item'                  => __( 'View Item', 'text_domain' ),
	  'separate_items_with_commas' => __( 'Separate categories with commas', 'text_domain' ),
	  'add_or_remove_items'        => __( 'Add or remove categories', 'text_domain' ),
	  'choose_from_most_used'      => __( 'Choose from the most used categories', 'text_domain' ),
	  'popular_items'              => __( 'Popular Categories', 'text_domain' ),
	  'search_items'               => __( 'Search categories', 'text_domain' ),
	  'not_found'                  => __( 'Not Found', 'text_domain' ),
	  'no_terms'                   => __( 'No items', 'text_domain' ),
	  'items_list'                 => __( 'Items list', 'text_domain' ),
	  'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
	  'labels'                     => $labels,
	  'hierarchical'               => true,
	  'public'                     => true,
	  'show_ui'                    => true,
	  'show_admin_column'          => true,
	  'show_in_nav_menus'          => true,
	  'show_tagcloud'              => true,
	  'rewrite'                    => array( 'slug' => 'destinations', 'with_front' => false ),
	);
	register_taxonomy( 'destination_category_taxonomy', array( 'destinations' ), $args );
  
  }
  add_action( 'init', 'destination_category_taxonomy', 0 );   



/**
 * Inject term slug into custom post type permastruct.
 * 
 * @link   http://wordpress.stackexchange.com/a/5313/1685
 * 
 * @param  string  $link
 * @param  WP_Post $post 
 * @return array
 */

function wpse_5308_post_type_link( $link, $post ) {
    if ( $post->post_type === 'destinations' ) {
        if ( $terms = get_the_terms( $post->ID, 'destination_category_taxonomy' ) )
            $link = str_replace( '%destination_category_taxonomy%', current( $terms )->slug, $link );
    }

    return $link;
}

add_filter( 'post_type_link', 'wpse_5308_post_type_link', 10, 2 );



// add_filter('post_link', 'rudr_post_type_permalink', 20, 3);
// add_filter('post_type_link', 'rudr_post_type_permalink', 20, 3);
 
// function rudr_post_type_permalink($permalink, $post_id, $leavename) {
 
// 	$post_type_name = 'destinations'; // post type name, you can find it in admin area or in register_post_type() function
// 	$post_type_slug = 'destinations'; // the part of your product URLs, not always matches with the post type name
// 	$tax_name = 'destination-categories'; // the product categories taxonomy name
 
// 	$post = get_post( $post_id );
 
// 	if ( strpos( $permalink, $post_type_slug ) === FALSE || $post->post_type != $post_type_name ) // do not make changes if the post has different type or its URL doesn't contain the given post type slug
// 		return $permalink;
 
//         $terms = wp_get_object_terms( $post->ID, $tax_name ); // get all terms (product categories) of this post (product)
 
 
//         if ( !is_wp_error( $terms ) && !empty( $terms ) && is_object( $terms[0] ) ) // rewrite only if this product has categories
//         	$permalink = str_replace( $post_type_slug, $terms[0]->slug, $permalink );
 
// 	return $permalink;
// }
 
 
// add_filter('request', 'rudr_post_type_request', 1, 1 );
 
// function rudr_post_type_request( $query ){
// 	global $wpdb;
 
// 	$post_type_name = 'product'; // specify your own here
// 	$tax_name = 'product_cat'; // and here
 
// 	$slug = $query['attachment']; // when we change the post type link, WordPress thinks that these are attachment pages
 
// 	// get the post with the given type and slug from the database
// 	$post_id = $wpdb->get_var(
// 		"
// 		SELECT ID
// 		FROM $wpdb->posts
// 		WHERE post_name = '$slug'
// 		AND post_type = '$post_type_name'
// 		"
// 	);
 
// 	$terms = wp_get_object_terms( $post_id, $tax_name ); // our post should have the terms
 
 
// 	if( isset( $slug ) && $post_id && !is_wp_error( $terms ) && !empty( $terms ) ) : // change the query
 
// 		unset( $query['attachment'] );
// 		$query[$post_type_name] = $slug;
// 		$query['post_type'] = $post_type_name;
// 		$query['name'] = $slug;
 
// 	endif;
 
// 	return $query;
// }


/* ========================================================================================================================
    
Pagination
    
======================================================================================================================== */

function misha_my_load_more_scripts() {
 
	global $wp_query; 
 
	// In most cases it is already included on the page and this line can be removed
	wp_enqueue_script('jquery');
 
	// register our main script but do not enqueue it yet
	wp_register_script( 'my_loadmore', get_stylesheet_directory_uri() . '/myloadmore.js', array('jquery') );
 
	// now the most interesting part
	// we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
	// you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
	wp_localize_script( 'my_loadmore', 'misha_loadmore_params', array(
		'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
		'posts' => json_encode( $wp_query->query_vars ), // everything about your loop is here
		'current_page' => get_query_var( 'paged' ) ? get_query_var('paged') : 1,
		'max_page' => $wp_query->max_num_pages
	) );
 
 	wp_enqueue_script( 'my_loadmore' );
}
 
add_action( 'wp_enqueue_scripts', 'misha_my_load_more_scripts' );