<?php
/**
 * Registers the testimonial post type.
 *
 * This is based on the WordPress community-curated standards for common post types, taxonomies, and metadata.
 * @see https://github.com/justintadlock/content-type-standards
 *
 * @package Array Toolkit
 * @since 1.1.0
 */
function array_toolkit_testimonials_register_post_types() {

	/* Register the Testimonial post type. */

	register_post_type(
		'testimonial',
		array(
			'description'         => '',
			'public'              => true,
			'publicly_queryable'  => true,
			'show_in_nav_menus'   => false,
			'show_in_admin_bar'   => true,
			'exclude_from_search' => false,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => null,
			'menu_icon'           => 'dashicons-testimonial',
			'can_export'          => true,
			'delete_with_user'    => false,
			'hierarchical'        => false,
			'has_archive'         => 'testimonials',
			'query_var'           => 'testimonial',
			'capability_type'     => 'testimonial',
			'map_meta_cap'        => true,

			/* Capabilities. */
			'capabilities' => array(

				// meta caps (don't assign these to roles)
				'edit_post'              => 'edit_testimonial',
				'read_post'              => 'read_testimonial',
				'delete_post'            => 'delete_testimonial',

				// primitive/meta caps
				'create_posts'           => 'create_testimonials',

				// primitive caps used outside of map_meta_cap()
				'edit_posts'             => 'edit_testimonials',
				'edit_others_posts'      => 'manage_testimonials',
				'publish_posts'          => 'manage_testimonials',
				'read_private_posts'     => 'read',

				// primitive caps used inside of map_meta_cap()
				'read'                   => 'read',
				'delete_posts'           => 'manage_testimonials',
				'delete_private_posts'   => 'manage_testimonials',
				'delete_published_posts' => 'manage_testimonials',
				'delete_others_posts'    => 'manage_testimonials',
				'edit_private_posts'     => 'edit_testimonials',
				'edit_published_posts'   => 'edit_testimonials'
			),

			/* The rewrite handles the URL structure. */
			'rewrite' => array(
				'slug'       => 'testimonials',
				'with_front' => false,
				'pages'      => true,
				'feeds'      => true,
				'ep_mask'    => EP_PERMALINK,
			),

			/* What features the post type supports. */
			'supports' => array(
				'title',
				'editor',
				'author',
				'thumbnail'
			),

			/* Labels used when displaying the posts. */
			'labels' => array(
				'name'               => __( 'Testimonials',                   'array-toolkit' ),
				'singular_name'      => __( 'Testimonial',                    'array-toolkit' ),
				'menu_name'          => __( 'Testimonials',                   'array-toolkit' ),
				'name_admin_bar'     => __( 'Testimonial',                    'array-toolkit' ),
				'add_new'            => __( 'Add New',                        'array-toolkit' ),
				'add_new_item'       => __( 'Add New Testimonial',            'array-toolkit' ),
				'edit_item'          => __( 'Edit Testimonial',               'array-toolkit' ),
				'new_item'           => __( 'New Testimonial',                'array-toolkit' ),
				'view_item'          => __( 'View Testimonial',               'array-toolkit' ),
				'search_items'       => __( 'Search Testimonials',            'array-toolkit' ),
				'not_found'          => __( 'No testimonials found',          'array-toolkit' ),
				'not_found_in_trash' => __( 'No testimonials found in trash', 'array-toolkit' ),
				'all_items'          => __( 'Testimonials',                   'array-toolkit' ),
			)
		)
	);
}
add_action( 'init', 'array_toolkit_testimonials_register_post_types' );
