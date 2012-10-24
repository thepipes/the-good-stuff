<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <link href="//cloud.webtype.com/css/0c8ccea4-721f-432e-8af1-682a66c0c11d.css" rel="stylesheet" type="text/css" />
  <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" />
  <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-2.5.3.min.js"></script>
  <?php roots_head(); ?>
  <?php
  if (of_get_option('development') == "YES") {
    $styles .= '<link rel="stylesheet/less" type="text/css" href="' . get_template_directory_uri() . '/css/yammer/yammer.less'. versionControl() .'">';
    $styles .= '<script src="' . get_template_directory_uri() . '/js/libs/less-1.3.0.min.js'. versionControl() .'" type="text/javascript"></script>';
  }
  else {
    $styles .= '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . '/css/yammer/yammer.css'. versionControl() .'">';
  }
  echo $styles;
  ?>
  <?php wp_head(); ?>
  <?php
  /** FOR DEV REASONS ONLY> THIS OVERRIDE THE DEFAULT OPTIONS FOR GRID 960 BOOKMARKLET */
  if(of_get_option('development') == "YES") {
  ?>
  <script type="text/javascript">
    var gOverride = {
      urlBase: 'http://gridder.andreehansson.se/releases/latest/',
      gColor: '#FF0000',
      gColumns: 12,
      gOpacity: 0.20,
      gWidth: 10,
      pColor: '#C0C0C0',
      pHeight: 15,
      pOffset: 0,
      pOpacity: 0.55,
      center: true,
      gEnabled: true,
      pEnabled: true,
      invert:true,
      setupEnabled: true,
      fixFlash: true,
      size: 960
    };
  </script>
   <?php
  }
    /** END OF 960 BOOKMARKLET** */
    ?>
</head>

<body <?php body_class(); ?> role="document">
  <?php roots_header_before(); ?>
  <header class="global-header" class="<?php global $roots_options; ?>" role="banner">
    <div class="container">
      <?php roots_header_inside(); ?>
      <div class="row">
        <div class="grid4">
          <a href="<?php echo get_home_url(); ?>">
            <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
          </a>
        </div>
        <div class="grid8">
          <div class="search-header">
            <ul class="menu">
              <?php if (wp_get_nav_menu_items('Sales Menu')) { ?>
              <?php wp_nav_menu(array('theme_location' => 'sales_menu', 'items_wrap' => false)); ?>
              <?php } ?>

              <li class="login" style="margin-right: 0px;"><a href="#"><?php _e("Log In");?></a></li>
              <li class="signup left-divider"><a href="#" class="yj-btn yj-btn-orange"><?php _e("Sign Up");?></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </header>
  <?php roots_header_after(); ?>

  <?php roots_wrap_before();
  if(is_front_page()){ ?>
    <div class="home-header-bg" <?php if(of_get_option('homepage-header-bg') != "") {echo 'style="background:url('. of_get_option('homepage-header-bg') .') no-repeat top;"'; } ?>></div>
  <?php }  ?>
  <div id="wrap" class="<?php echo WRAP_CLASSES; //echo ' ' . sanitize_title( get_the_title(), '' ); ?>" role="document">