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

function yammer_setup(){
  //things to do after activating the theme. Example, register new post types
}
add_action('after_setup_theme', 'yammer_setup');

//Add Shortcode to produce container with ronded borders, a title, and a learn more link constructed by attributes.
function container_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'url' => '',
    'title' => '',
    'url_text' => '',
    'container_margin'  => '',
    'clickable' => 'no',
  ), $atts ) );
  if(esc_attr($clickable)  == 'yes') {
    $clickable = 'data-module="clickable" data-url="'.esc_attr($url) .'"';
  }
  else {
    $clickable = '';
  }
  $html ='<div '. $clickable .' class="shortcode-container" style="margin:' . esc_attr($container_margin) . ';"><div class="shortcode-container-content">' . do_shortcode($content) . '</div><div class="shortcode-container-title"';
  if(esc_attr($url_text) == ""){
    $html .='style="border-bottom:0;" ';
  } 
  $html .='><h3>' . esc_attr($title) . '</h3></div>';
  if(esc_attr($url) != '' && esc_attr($url_text) != ''){ 
    $html .='<div class="shortcode-container-url"><a href="'.esc_attr($url).'">'.esc_attr($url_text).'<span class="arrow-right"></span></a></div>'; 
  }
  $html .= '</div>';
  return $html;
}
add_shortcode( 'container', 'container_shortcode' );

//Add Shortcode to produce container with ronded borders, a title, and a learn more link constructed by attributes.
function box_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'width' => '83.510638%',
    'background' => '',
    'color' => '',
  ), $atts ) );

  return '<div class="box-shortcode" style="width:'.esc_attr($width).';background-color:'.esc_attr($background).';color:'.esc_attr($color).';"><div class="box-shortcode-content clearfix">' . do_shortcode($content) . '</div></div>';
}
add_shortcode( 'greybox', 'box_shortcode' );

//Add Shortcode to produce container with borders on all 4 sides. The greybox above has borders top and bottom only with mix of grey and white.
function whitebox_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'width' => '',
    'background' => '',
    'color' => '',
    'shadow' => 'yes',
  ), $atts ) );

  if($shadow == 'yes') {
    $shadow = 'box-shadow arc-shadow';
  }
  else {
    $shadow = '';
  }

  return '<div class="whitebox-shortcode '. $shadow .'" style="width:'.esc_attr($width).';background-color:'.esc_attr($background).';color:'.esc_attr($color).';"><div class="whitebox-shortcode-content clearfix">' . do_shortcode($content) . '</div></div>';
}
add_shortcode( 'whitebox', 'whitebox_shortcode' );


//Add Shortcode to produce container with ronded borders, a title, and a learn more link constructed by attributes.
function bluebox_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'width' => '',
  ), $atts ) );

  return '<div class="bluebox-shortcode"><div class="bluebox-shortcode-content clearfix">' . do_shortcode($content) . '</div></div>';
}
add_shortcode( 'bluebox', 'bluebox_shortcode' );

//Add Shortcode to produce container with ronded borders, small by default, white background.
function quote_shortcode( $atts, $content = null ) {
  extract( shortcode_atts( array(
    'size'=>'small',
  ), $atts ) );

  return '<div class="quote-container-'.esc_attr($size).'"><div class="quote-container-content">' . do_shortcode($content) . '</div></div>';
}
add_shortcode( 'quote', 'quote_shortcode' );

//Add shortcode to display the arrow next to the links with the option to display it in different directions
function css_arrow( $atts ){
  extract( shortcode_atts( array(
    'direction' => 'right'
    ), $atts ) );

  return '<span class="section-link"><span class="arrow-'.esc_attr($direction).'"></span></span>';

}
add_shortcode( 'arrow', 'css_arrow' );

//Add shortcode to display back to top link inside the_content()
function back_to_top( $atts ){
  extract( shortcode_atts( array(
    'title' => 'Back to Top'
    ), $atts ) );

  return '<a class="back-to-top">'.esc_attr($title).'<span class="arrow-up"></span></a>';

}
add_shortcode( 'top', 'back_to_top' );

//Add shortcode to display yamkit buttons inside the_content()
function button_shortcode( $atts, $content = null ){
  extract( shortcode_atts( array(
    'url' => '',
    'color' => '',
    ), $atts ) );
  

  if(esc_attr($color) == 'orange'){
    $color = 'yj-btn-orange';
  }
  else if(esc_attr($color) == 'green'){
    $color = 'yj-btn-green';
  }

  return '<a class="yj-btn '. $color . '" href="'.esc_attr($url).'">'. do_shortcode($content) .'</a>';

}
add_shortcode( 'button', 'button_shortcode' );

//Change default button class to yamkit class
add_filter("gform_submit_button", "yammer_gform_submit_button", 10, 2);
function yammer_gform_submit_button($button, $form) {
  $m = new Mustache;
  return $m->render('<input type="submit" class="yj-btn" id="gform_submit_button_{{id}}" value="{{submit}}" />', array('id' => $form["id"], 'submit' => _('Submit')));
}


function parse_video_link($video_link) {
  // Parse link for video ID so we can rebuild the URL with the appropriate format.
  preg_match('/(\d+)/', $video_link, $matches);

  if ($matches[0] == "") {
    $ytarray=explode("/", $video_link);
    $ytendstring=end($ytarray);
    $ytendarray=explode("?v=", $ytendstring);
    $ytendstring=end($ytendarray);
    $ytendarray=explode("&", $ytendstring);
    $ytcode=$ytendarray[0];
    // You Tube Link
    $video_link = "https://www.youtube-nocookie.com/embed/".$ytcode.'?modestbranding=0&autohide=1&mode=transparent&rel=0&showinfo=0&hd=1';
  } else {
    // Vimeo Link
    $video_link = "https://player.vimeo.com/video/".$matches[0];
  }
  return $video_link;
}

// Remove Absolute URL from Images inserted via the media uploader:
add_filter('image_send_to_editor','image_to_relative',5,8);
function image_to_relative($html, $id, $caption, $title, $align, $url, $size, $alt)
{
  $sp = strpos($html,"src=") + 5;
  $ep = strpos($html,"\"",$sp);
  
  $imageurl = substr($html,$sp,$ep-$sp);
  
  $relativeurl = str_replace("http://","",$imageurl);
  $sp = strpos($relativeurl,"/");
  $relativeurl = substr($relativeurl,$sp);
  
  $html = str_replace($imageurl,$relativeurl,$html);
  
  return $html;
}
