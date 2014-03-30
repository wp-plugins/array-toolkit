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
			add_action( 'init', array( $this, 'register_portfolio_categories' ) );
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
	function register_portfolio_post_type() {

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
	function register_portfolio_categories() {

		register_taxonomy( 'categories', 'array-portfolio', array(
			'hierarchical' => true,
			'label'        => __( 'Categories', 'array-toolkit' ),
			'query_var'    => true,
			'rewrite'      => true,
		) );
	}



	/**
	 * Registers the array-slider post type
	 *
	 * @since 1.0.0
	 */

	function register_slider_post_type() {

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