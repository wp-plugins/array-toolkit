<?php
/**
 * Custom post types and taxonomies
 *
 * @package Array Toolkit
 * @since 1.0.0
 */


class Array_Toolkit_Post_Types {

	public function __construct() {

		// Theme support
		add_action( 'init', array( $this, 'theme_support' ), 1 );

	}


	/**
	 * Hooks in custom content registration depending on theme support
	 *
	 * @since 1.0.0
	 */
	function theme_support() {

		// Register portfolio support if the theme adds support
		if( current_theme_supports( 'array_themes_portfolio_support' ) ) {
			add_action( 'init', array( $this, 'register_portfolio_post_type' ) );
			add_action( 'init', array( $this, 'register_portfolio_taxonomies' ) );
		}

		// Register slider support if the theme adds support
		if( current_theme_supports( 'array_themes_slider_support' ) ) {
			add_action( 'init', array( $this, 'register_slider_post_type' ) );
		}
	}


	/**
	 * Registers array-portfolio post type
	 *
	 * @since 1.0
	 */
	public static function register_portfolio_post_type() {

		$portfolio_labels = array(
			'name'          => __( 'Portfolio Items', 'array-toolkit' ),
			'singular_name' => __( 'Portfolio', 'array-toolkit' ),
		);

		$portfolio_args = array(
			'labels'      => $portfolio_labels,
			'public'      => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-images-alt2',
			'rewrite'     => array( 'slug' => 'portfolio-item' ),
			'supports'    => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'category', 'custom-fields', 'post-formats', 'comments' ),
		);

		register_post_type( 'array-portfolio', $portfolio_args );
	}


	/**
	 * Registers categories custom taxonomy
	 *
	 * @since 1.0.0
	 */
	public static function register_portfolio_taxonomies() {

		register_taxonomy( 'categories', 'array-portfolio', array(
			'hierarchical' => true,
			'label'        => __( 'Categories', 'array-toolkit' ),
			'query_var'    => true,
			'rewrite'      => true,
		) );


		/* Register the Portfolio Tag taxonomy. */
		register_taxonomy(
			'portfolio_tag',
			array( 'array-portfolio' ),
			array(
				'public'            => true,
				'show_ui'           => true,
				'show_in_nav_menus' => true,
				'show_tagcloud'     => true,
				'show_admin_column' => true,
				'hierarchical'      => false,
				'query_var'         => 'portfolio_tag',

				/* The rewrite handles the URL structure. */
				'rewrite' => array(
					'slug'         => 'portfolio/tag',
					'with_front'   => false,
					'hierarchical' => false,
					'ep_mask'      => EP_NONE
				),

				/* Labels used when displaying taxonomy and terms. */
				'labels' => array(
					'name'                       => __( 'Project Tags',                   'array-toolkit' ),
					'singular_name'              => __( 'Project Tag',                    'array-toolkit' ),
					'menu_name'                  => __( 'Tags',                           'array-toolkit' ),
					'name_admin_bar'             => __( 'Tag',                            'array-toolkit' ),
					'search_items'               => __( 'Search Tags',                    'array-toolkit' ),
					'popular_items'              => __( 'Popular Tags',                   'array-toolkit' ),
					'all_items'                  => __( 'All Tags',                       'array-toolkit' ),
					'edit_item'                  => __( 'Edit Tag',                       'array-toolkit' ),
					'view_item'                  => __( 'View Tag',                       'array-toolkit' ),
					'update_item'                => __( 'Update Tag',                     'array-toolkit' ),
					'add_new_item'               => __( 'Add New Tag',                    'array-toolkit' ),
					'new_item_name'              => __( 'New Tag Name',                   'array-toolkit' ),
					'separate_items_with_commas' => __( 'Separate tags with commas',      'array-toolkit' ),
					'add_or_remove_items'        => __( 'Add or remove tags',             'array-toolkit' ),
					'choose_from_most_used'      => __( 'Choose from the most used tags', 'array-toolkit' ),
					'not_found'                  => __( 'No tags found',                  'array-toolkit' ),
					'parent_item'                => null,
					'parent_item_colon'          => null,
				)
			)
		);
	}



	/**
	 * Registers the array-slider post type
	 *
	 * @since 1.0.0
	 */

	public static function register_slider_post_type() {

		$slider_labels = array(
			'name'          => __( 'Slider Items', 'array-toolkit' ),
			'singular_name' => __( 'Slide', 'array-toolkit' ),
		);

		$slider_args = array(
			'labels'      => $slider_labels,
			'public'      => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-image-flip-horizontal',
			'rewrite'     => array( 'slug' => 'array-slide' ),
			'supports'    => array( 'title', 'thumbnail' ),
		);

		register_post_type( 'array-slider', $slider_args );
	}

}

$array_toolkit_post_types = new Array_Toolkit_Post_Types;