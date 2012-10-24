<?php
if (class_exists(WPAlchemy_MetaBox)):

  $social_sharing = new WPAlchemy_MetaBox(array
  (
    'id' => 'social_sharing',
    'title' => 'Social Sharing Options',
    'template' => get_stylesheet_directory() . '/metaboxes/hide-social-sharing-meta.php',
    'priority' => 'low',
    'mode' => WPALCHEMY_MODE_EXTRACT,
    'prefix' => '_social_sharing_',
    'context' => 'side'
  ));

  $social_tracking_mb = new WPAlchemy_MetaBox(array
  (
    'id' => '_social_tracking_meta',
    'title' => 'Social Tracking Meta',
    'types' => array('page', 'post'),
    'template' => get_stylesheet_directory() . '/metaboxes/social-tracking-meta.php',
    'priority' => 'low'
  ));

endif;