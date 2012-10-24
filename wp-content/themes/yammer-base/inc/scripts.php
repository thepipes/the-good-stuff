<?php

function stylesheet_link_tag($file, $tabs = 0, $newline = true, $rel = 'stylesheet') {
  $indent = str_repeat("\t", $tabs);
  return $indent . '<link rel="' . $rel .'" href="' . get_template_directory_uri() . '/css' . $file . versionControl() . '">' . ($newline ? "\n" : "");
}

function roots_scripts() {

  if (is_child_theme()) {
    wp_enqueue_style('roots_child_style', get_stylesheet_uri());
  }

  if (!is_admin()) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '', '', '', false);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  wp_register_script('roots_jquery', get_template_directory_uri(). '/js/libs/jquery-1.7.2.min.js'. versionControl(), false, null, true);
  wp_register_script('jquery_reveal',get_template_directory_uri(). '/js/libs/jquery.reveal.js'. versionControl(), array('roots_jquery'), null, true);
  wp_register_script('roots_main', get_template_directory_uri(). '/js/script.js'. versionControl(), array('roots_jquery'), null, false);
  wp_enqueue_script('roots_jquery');
  wp_enqueue_script('jquery_reveal');
  wp_enqueue_script('roots_main');
}

add_action('wp_enqueue_scripts', 'roots_scripts', 100);

function roots_admin_scripts() {
  if (get_post_type()=="features" && is_admin()) {
    wp_register_script( 'roots_admin-js', get_template_directory_uri(). '/js/admin-scripts.js'. versionControl(), array('jquery'), false, true );
    wp_enqueue_script( 'roots_admin-js' );
  }
}
add_action('admin_enqueue_scripts', 'roots_admin_scripts');