<?php
global $home_header_mb, $features_mb;
$home_header_mb->the_meta();
?>

<div class="feature-container row">

    <?php
    if($home_header_mb->get_the_value('header-image-offset')== 'YES'){
      $attr = array(
        'style'	=> "margin-left:-20px;"
      );
    }
    else {
      $attr ='';
    }
    //get_the_post_thumbnail(get_the_id(), 'home-header', $attr);
    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(),'home-header');
    ?>
  <div class="grid12 home-header" style="background: url(<?php echo $thumb[0]?>) no-repeat;">
  <div class="row">
    <div class="push6 grid5 page-header uppercase">
      <h2 class="interstatecondensedbold"><?php $home_header_mb->the_value('title'); ?></h2>
      <h1 class="interstatecondensedbold"><?php $home_header_mb->the_value('title2'); ?></h1>
    </div>
    <div class="push6 grid5 page-header-description">
      <?php $home_header_mb->the_value('description'); ?>
    </div>
    <?php if($home_header_mb->get_the_value('cta-button-title') != "" && $home_header_mb->get_the_value('cta-button-url') != ""): ?>
    <div class="push6 grid4 cta-button">
      <a href="<?php $home_header_mb->the_value('cta-button-url'); ?>" class="yj-btn yj-btn-orange"><?php $home_header_mb->the_value('cta-button-title'); ?></a>
    </div>
    <?php endif; ?>
    <?php if($home_header_mb->get_the_value('video-thumbnail') != ""): ?>
    <div class="push6 grid4 video-thumbnail">
      <a href="<?php $home_header_mb->the_value('video-thumbnail-url'); ?>" data-module="video" title="<?php $home_header_mb->the_value('video-title'); ?>" class="data-videos" description="<?php $home_header_mb->the_value('video-description'); ?>" cta="true"><img id="video-thumbnail-img" src="<?php $home_header_mb->the_value('video-thumbnail'); ?>" ><div class="play-button-home"></div></a>
    </div>
    <?php endif; ?>
    <?php if($home_header_mb->get_the_value('cta-link-title') != "" && $home_header_mb->get_the_value('cta-link-url') != ""): ?>
    <div class="push6 grid4 cta-link">
      <a href="<?php $home_header_mb->the_value('cta-link-url'); ?>" class="bold"><?php $home_header_mb->the_value('cta-link-title'); ?> <span class="arrow-right"></span></a>
    </div>
    <?php endif; ?>
  </div>
  </div>
  <?php
    $args = array(
      'post_type' => 'features',
      'numberposts' => -1,
      'orderby' => 'menu_order',
      'order' => 'ASC'
    );
    $posts = get_posts($args);
  $counter = 0;
  ?>
  <div class="home-features clearfix">
  <?php foreach ($posts as $post=>$value) {
    $counter++;
    $meta = get_post_meta($value->ID, $features_mb->get_the_id(), TRUE); ?>
    <div class="<?php echo ($counter == 2)? 'push1' : ''?> grid5 featured-features <?php echo ($counter == 3)? 'clear' : ''?>">
      <h2 class="uppercase interstatecondensedbold"><?php if($meta['feature-icon'] != ''): ?><img src="<?php echo $meta['feature-icon'];?>" id="<?php echo strtolower(str_replace(" ", "-", $value->post_title)) ;?>"><?php endif; echo $value->post_title; ?></h2>
      <div class="feature-thumbnail-container" data-module="clickable" data-url="<?php echo get_permalink($value->ID);?>">

        <div  class="feature-thumbnail" style="background-image: url('<?php echo $meta['homepage-feature-thumbnail']; ?>'); "></div>
        <p><?php echo $value->post_content;?></p>
        <a href="<?php echo get_permalink($value->ID);?>" class="bold "><?php _e("LEARN MORE");?></a>

      </div>
    </div>
  <?php
  if($counter == 3) $counter = 1;
  } ?>
  </div>
</div>
   <?php /*
<div id="myModal" class="reveal-modal">
  <iframe src="http://player.vimeo.com/video/44686557/?wmode=transparent" width="600" height="338" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
  <h1 class="interstatecondensedbold">Modal Title</h1>
  <p>Any content could go in here.</p>
  <a class="close-reveal-modal">&#215;</a>
</div>
           */ ?>