<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              #
 * @since             1.0.0
 * @package           Deals
 *
 * @wordpress-plugin
 * Plugin Name:       Deals
 * Plugin URI:        deals
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            shubham
 * Author URI:        #
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       deals
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}


/*
* Creating a function to create CPT
*/
 
function custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Deals', 'Post Type General Name', 'helloelemetor' ),
        'singular_name'       => _x( 'Deal', 'Post Type Singular Name', 'helloelemetor' ),
        'menu_name'           => __( 'Deals', 'helloelemetor' ),
        'parent_item_colon'   => __( 'Parent Deal', 'helloelemetor' ),
        'all_items'           => __( 'All Deals', 'helloelemetor' ),
        'view_item'           => __( 'View Deal', 'helloelemetor' ),
        'add_new_item'        => __( 'Add New Deal', 'helloelemetor' ),
        'add_new'             => __( 'Add New', 'helloelemetor' ),
        'edit_item'           => __( 'Edit Deal', 'helloelemetor' ),
        'update_item'         => __( 'Update Deal', 'helloelemetor' ),
        'search_items'        => __( 'Search Deal', 'helloelemetor' ),
        'not_found'           => __( 'Not Found', 'helloelemetor' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'helloelemetor' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'Deals', 'helloelemetor' ),
        'description'         => __( 'Deal news and reviews', 'helloelemetor' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
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
     
    // Registering  Custom Post Type
    register_post_type( 'Deals', $args );
 
}
 
/* Hook into the 'init' action so that the function
*/
 
add_action( 'init', 'custom_post_type', 0 );





/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'DEALS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-deals-activator.php
 */
function activate_deals() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-deals-activator.php';
	Deals_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-deals-deactivator.php
 */
function deactivate_deals() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-deals-deactivator.php';
	Deals_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_deals' );
register_deactivation_hook( __FILE__, 'deactivate_deals' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-deals.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_deals() {

	$plugin = new Deals();
	$plugin->run();

}
run_deals();

