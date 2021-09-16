<?php

namespace WebWolf\Services;

class CustomPostType {
 
	public static $instance;

	public function __construct() {
		
		$instance = $this;
		add_action( 'init', [ $this, 'modelCPTregister' ] );
		add_action( 'init', [ $this, 'serviceCPTregister' ] );
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

	public function modelCPTregister() {

		// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Model', 'webwolf-engine' ),
			'singular_name'       => _x( 'Model', 'webwolf-engine' ),
			'menu_name'           => __( 'Model', 'webwolf-engine' ),
			'all_items'           => __( 'Wszystkie modele', 'webwolf-engine' ),
			'view_item'           => __( 'Zobacz model', 'webwolf-engine' ),
			'add_new_item'        => __( 'Dodaj model', 'webwolf-engine' ),
			'add_new'             => __( 'Dodaj nowy model', 'webwolf-engine' ),
			'edit_item'           => __( 'Edytuj model', 'webwolf-engine' ),
			'update_item'         => __( 'Aktualizuj model', 'webwolf-engine' ),
			'search_items'        => __( 'Szukaj model', 'webwolf-engine' ),
			'not_found'           => __( 'Nie znaleziono', 'webwolf-engine' ),
			'not_found_in_trash'  => __( 'Nie znaleziono w koszu', 'webwolf-engine' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'Model', 'webwolf-engine' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
			'taxonomies'          => array( 'type'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest' => true,
	 
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'model', $args );
	}

	public function serviceCPTregister() {

		// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Usługa', 'webwolf-engine' ),
			'singular_name'       => _x( 'Usługa', 'webwolf-engine' ),
			'menu_name'           => __( 'Usługa', 'webwolf-engine' ),
			'all_items'           => __( 'Wszystkie usługi', 'webwolf-engine' ),
			'view_item'           => __( 'Zobacz usługi', 'webwolf-engine' ),
			'add_new_item'        => __( 'Dodaj usługę', 'webwolf-engine' ),
			'add_new'             => __( 'Dodaj nową usługę', 'webwolf-engine' ),
			'edit_item'           => __( 'Edytuj usługę', 'webwolf-engine' ),
			'update_item'         => __( 'Aktualizuj usługę', 'webwolf-engine' ),
			'search_items'        => __( 'Szukaj usługę', 'webwolf-engine' ),
			'not_found'           => __( 'Nie znaleziono', 'webwolf-engine' ),
			'not_found_in_trash'  => __( 'Nie znaleziono w koszu', 'webwolf-engine' ),
		);
		 
	// Set other options for Custom Post Type
		 
		$args = array(
			'label'               => __( 'Usługa', 'webwolf-engine' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
			'show_in_rest' => true,
	 
		);
		 
		// Registering your Custom Post Type
		register_post_type( 'usluga', $args );
	}

}