<?php

// Custom functions

// Add Options Framework.
if ( !function_exists( 'optionsframework_init' ) ) {
  define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/options/' );
  require_once dirname( __FILE__ ) . '/options/options-framework.php';
}
if ( !function_exists( 'of_get_option' ) ) {
  function of_get_option($name, $default = false) {

    $optionsframework_settings = get_option('optionsframework');

    // Gets the unique option id
    $option_name = $optionsframework_settings['id'];

    if ( get_option($option_name) ) {
      $options = get_option($option_name);
    }

    if ( isset($options[$name]) ) {
      return $options[$name];
    } else {
      return $default;
    }
  }
}

//Add timestamp to css and js files when development mode is set to yes. Otherwise add the version number set in the theme options.
function versionControl() {
  $dev =  of_get_option('development');
  $version_num = of_get_option('production_version');
  $version = "";
  if ($dev == "YES") {
    $version = '?v=' . time();
  }
  else {
    if($version_num != ''){ $version = '?v=' . $version_num; }
  }
  return $version;
}


function features_setup(){
  register_post_type('features', array(
    'description' => 'Features custom post type',
    'show_ui' => true,
    'menu_position' => 5,
    'exclude_from_search' => false,
    'labels' => array(
      'name' => 'Features',
      'singular_name' => 'Feature',
      'add_new' => 'Add New Feature',
      'add_new_item' => 'Add New Feature',
      'edit' => 'Edit Feature',
      'edit_item' => 'Edit Feature',
      'new_item' => 'New Feature',
      'view' => 'View Feature',
      'view_item' => 'View Feature',
      'search_items' => 'Search Feature',
      'not_found' => 'No Feature Found',
      'not_found_in_trash' => 'No Features found in trash',
      'parent' => 'Parent Feature'
    ),
    'supports' => array('title', 'editor', 'revisions', 'thumbnail', 'page-attributes'),
    'public' => true,
    'rewrite' => array('slug' => '/feature', 'with_front' => true),
    'taxonomies' => array('category'),
    'menu_icon' => get_home_url() .'/wp-content/themes/releases/img/yammer-icon.png',
  ));
}

function yammer_setup(){
  features_setup();
}
add_action('after_setup_theme', 'yammer_setup');

/*
 * Add filter and function to grab email from URL param and add it to tracking pixel
 */
add_filter('query_vars', 'email_queryvars' );
function email_queryvars( $qvars )
{
  $qvars[] = 'refm';
  return $qvars;
}
function get_email_queryvars()
{
  $email =  $_GET['m_yammer'];
  $email = filter_var($email, FILTER_SANITIZE_NUMBER_INT);
  if (filter_var($email, FILTER_SANITIZE_NUMBER_INT)) {
    return $email;
  }
  else {
    return "";
  }
}
// Catch query from specific server.
function yammer_capture_response(){
  if (isset($_GET['m'])) {
    $_GET['m_yammer'] = $_GET['m'];
    unset($_GET['m']);
  }
}
add_action( 'init', 'yammer_capture_response' );