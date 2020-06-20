<?php
 
/**
 * Load custom classes
 */

class Config {
	/**
	 * Constructor
	 *
	 */
	function __construct() {

        add_theme_support( 'menus' );
        add_theme_support( 'post-thumbnails' );
        
        $this->add_actions();
        $this->add_filters();

		$custom_classes = array(
			'setup', 
        ); 
        
        $admin_classes = [];
        
		$this->require_classes( $custom_classes, $admin_classes ); 
	}

    function add_actions() {
        add_action( 'after_setup_theme', array( $this, 'image_resize_setup' ) ) ;
        add_action( 'wp_enqueue_scripts',  array( $this, 'partysummoner_enqueue_style' ) ); 
    }

    function add_filters() {

    }
	// load css into the website's front-end
    function partysummoner_enqueue_style() {
        wp_enqueue_style( 'partysummoner-style', get_template_directory_uri() .'/style.css' ); 
    }

	function image_resize_setup() {
		add_image_size( 'featured-size', 226, 130 );
		add_image_size( 'moreinfo-size', 60, 60, false );
	}

	/**
	 * Loads classes based on array
	 *
	 * @param  array $required_classes Array of classes (filename should match classname).
	 */
	function require_classes( $required_classes, $admin_classes ) {

		$template_folder = get_template_directory();

		foreach ( $required_classes as $required_class ) {
			$class_path = "$template_folder/inc/$required_class.php";

			if ( file_exists( $class_path ) ) {
				require( $class_path );
			}
		}

		 if ( is_admin() ) { 
			foreach ( $admin_classes as $admin_class ) { 
				$class_path = "$template_folder/inc/$admin_class.php"; 
				if ( file_exists( $class_path ) ) {
					require( $class_path );
				}
			}
			$class_path = "$template_folder/plugins/wordpress-importer/wordpress-importer.php";
			require( $class_path );
			if ( ! class_exists( 'Yikes_Custom_Taxonomy_Order' ) ) {
			$class_path = "$template_folder/plugins/simple-taxonomy-ordering/yikes-custom-taxonomy-order.php";
			require( $class_path );
			} 
		 }

	}
}

$config = new Config;
