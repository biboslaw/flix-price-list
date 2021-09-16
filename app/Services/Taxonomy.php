<?php

namespace WebWolf\Services;

class Taxonomy {
 
	public static $instance;

	public function __construct() {
		
		$instance = $this;
		add_action( 'init', [ $this, 'typeTaxonomyRegister' ] );

	}

	/**
	 * Create and return instance
	 *
	 * @return WebWolf_engine
	 */
	public static function instance() {

		if ( self::$instance === null ) {

			self::$instance = new self();

		}

		return self::$instance;
	}

	public function typeTaxonomyRegister() {

		// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Rodzaj sprzętu', 'webwolf-engine' ),
			'singular_name'       => _x( 'Rodzaj sprzętu', 'webwolf-engine' ),
			'menu_name'           => __( 'Rodzaj sprzętu', 'webwolf-engine' ),
			'all_items'           => __( 'Wszystkie rodzaje strzętów', 'webwolf-engine' ),
			'add_new_item'        => __( 'Dodaj rodzaj sprzętu', 'webwolf-engine' ),
			'edit_item'           => __( 'Edytuj rodzaj sprzętu', 'webwolf-engine' ),
			'update_item'         => __( 'Aktualizuj rodzaj sprzętu', 'webwolf-engine' ),
			'search_items'        => __( 'Szukaj rodzaj sprzętu', 'webwolf-engine' ),
		);
		 
	// Set other options for Custom Post Type
		 
	$args   = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'device-type' ),
	);
		 
		// Registering your Custom Post Type
		register_taxonomy( 'device-types', [ 'model' ], $args );
	}

}