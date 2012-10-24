<?php
if (class_exists(WPAlchemy_MetaBox)):

  $features_mb = new WPAlchemy_MetaBox(array
  (
    'id' => '_features_meta',
    'title' => 'Features',
    'types' => array('features'),
    'template' => get_stylesheet_directory() . '/metaboxes/features-meta.php',
    'priority' => 'high'
  ));

  $bottom_cta_mb = new WPAlchemy_MetaBox(array
  (
    'id' => '_bottom_cta_meta',
    'title' => 'Bottom CTA',
    'types' => array('features'),
    'template' => get_stylesheet_directory() . '/metaboxes/bottom-cta-meta.php',
    'priority' => 'low'
  ));

  $logo_wall_mb = new WPAlchemy_MetaBox(array
  (
    'id' => 'logo_wall_meta',
    'title' => 'Logo Wall',
    'types' => array('features'),
    'template' => get_stylesheet_directory() . '/metaboxes/logo-wall-meta.php',
    'priority' => 'low'
  ));

  $home_header_mb = new WPAlchemy_MetaBox(array
  (
    'id' => '_home_header_meta',
    'title' => 'Header',
    'include_template' => array('front-page.php'),
    'template' => get_stylesheet_directory().'/metaboxes/header-meta.php',
    'lock'  => 'after_post_title',
    'hide_editor' => true
  ));

endif;