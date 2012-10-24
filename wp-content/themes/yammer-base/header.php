<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <link href="//cloud.webtype.com/css/0c8ccea4-721f-432e-8af1-682a66c0c11d.css" rel="stylesheet" type="text/css" />
  <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">
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
  <style>
    #wpadminbar {
      position:relative;
    }
    html {
      margin-top: 0px !important;
    }
  </style>
  <script type="text/javascript">var home_url = "<?php echo get_home_url();?>"</script>
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

<body id="top" <?php body_class(); ?> role="document">
<?php roots_header_before(); ?>
<header class="global-header" class="<?php global $roots_options; ?>" role="banner">
  <div class="container">
    <?php roots_header_inside(); ?>
    
      <div class="grid5" id="header-logo">
          <a href="<?php if(of_get_option('header-logo-link') != ""){ echo of_get_option('header-logo-link'); } else { echo get_home_url(); }?>">
            <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
          </a>
        </div>
      <div class="grid7 yj-fr" id="header-menu">
        <div class="search-header">
           <ul class="menu">
              <li class="login" style="margin-right: 0px;"><a href="https://help.yammer.com"><?php _e("Help Center");?></a></li>
              <li class="signup left-divider"><a href="https://www.yammer.com/"><?php _e("Yammer.com");?></a></li>
            </ul>
        </div>
      </div>

  </div>
</header>
<?php roots_header_after(); ?>
<?php if (wp_get_nav_menu_items('Sticky Menu')) { ?>
<div class="" id="sticky-nav">
  <?php wp_nav_menu(array('theme_location' => 'sticky_menu', 'menu_class' =>'menu')); ?>
</div>
<?php } ?>
<?php roots_wrap_before(); ?>
<div id="wrap" <?php if (!wp_get_nav_menu_items('Sticky Menu')) { echo 'style="margin-top:20px; top:0;"'; }?> class="<?php echo WRAP_CLASSES; //echo ' ' . sanitize_title( get_the_title(), '' ); ?>" role="document">   