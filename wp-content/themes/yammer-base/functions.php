<?php
/**
 * Roots functions
 */
function my_wpautop_correction() {	

	if( is_page() ) {		

		function my_wpautop( $pee ) {

			return wpautop($pee, 0);

		}		

		remove_filter( 'the_content', 'wpautop' );

		remove_filter( 'the_excerpt', 'wpautop' );		

		add_filter( 'the_content', 'my_wpautop' );		

		add_filter( 'the_excerpt', 'my_wpautop' );		

	}

}

add_action('pre_get_posts', 'my_wpautop_correction');

if (!defined('__DIR__')) { define('__DIR__', dirname(__FILE__)); }

require_once locate_template('/inc/Mustache.php');            // Like A Sir
require_once locate_template('/inc/util.php');            // Utility functions
require_once locate_template('/inc/config.php');          // Configuration and constants
require_once locate_template('/inc/activation.php');      // Theme activation
require_once locate_template('/inc/template-tags.php');   // Template tags
require_once locate_template('/inc/cleanup.php');         // Cleanup
require_once locate_template('/inc/scripts.php');         // Scripts and stylesheets
require_once locate_template('/inc/htaccess.php');        // Rewrites for assets, H5BP .htaccess
require_once locate_template('/inc/hooks.php');           // Hooks
require_once locate_template('/inc/actions.php');         // Actions
require_once locate_template('/inc/widgets.php');         // Sidebars and widgets
require_once locate_template('/inc/custom.php');          // Custom functions

function roots_setup() {

  // Make theme available for translation
  load_theme_textdomain('roots', get_template_directory() . '/lang');

  // Register wp_nav_menu() menus (http://codex.wordpress.org/Function_Reference/register_nav_menus)
  register_nav_menus(array(
    'primary_navigation' => __('Primary Navigation', 'roots'),
    'sales_menu' => __('Sales Menu', 'roots'),
    'sticky_menu' => __('Sticky Menu', 'roots')
  ));

  // Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size(150, 150);


  $defaults = array(
    'default-image'          => get_template_directory_uri() . '/img/yammer-logo.jpg',
    'random-default'         => false,
    'width'                  => 300,
    'height'                 => 40,
    'flex-height'            => true,
    'flex-width'             => true,
    'default-text-color'     => '',
    'header-text'            => false,
    'uploads'                => true,
    'wp-head-callback'       => '',
    'admin-head-callback'    => '',
    'admin-preview-callback' => '',
  );
  add_theme_support( 'custom-header', $defaults );

  // Add post formats (http://codex.wordpress.org/Post_Formats)
  // add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));

  // Tell the TinyMCE editor to use a custom stylesheet
  add_editor_style('css/editor-style.css');

}
add_action('after_setup_theme', 'roots_setup');

//WPAlchemy includes
include_once locate_template('/metaboxes/setup.php');
include_once locate_template('/metaboxes/specs.php');