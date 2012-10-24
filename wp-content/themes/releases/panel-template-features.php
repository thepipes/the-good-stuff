<?php
global $features_mb, $bottom_cta_mb, $logo_wall_mb;
$features_mb->the_meta();
$bottom_cta_mb->the_meta();
$logo_wall_mb->the_meta();
?>
<div class="feature-container row" xmlns="http://www.w3.org/1999/html">
  <div class="grid2 sidebar">
    <?php get_sidebar(); ?>
  </div>
  <div class="grid10 feature-content">

    <div class="feature-content-container clearfix">
      <div class="row">
        <div class="push1 grid4 feature-title" id="feature-title">
          <?php $meta = get_post_meta(get_the_ID(), $features_mb->get_the_id(), TRUE); ?>

          <h2 class="interstatecondensedbold"><?php if($meta['feature-icon'] != ''){ ?><img src="<?php $features_mb->the_value('feature-icon');?>" alt="<?php the_title();?>" /><?php } ?><?php the_title();?></h2>
          <p><?php $features_mb->the_value('feature-detailed-description'); ?></p>
          <?php if($features_mb->get_the_value('feature-cta-title') != '' && $features_mb->get_the_value('feature-cta-url') != '') { ?>
            <a href="<?php $features_mb->the_value('feature-cta-url');?>" title="<?php $features_mb->the_value('feature-cta-title');?>"><?php $features_mb->the_value('feature-cta-title');?></a><div class="arrow-right"></div>
          <?php } ?>
        </div>
        <div class="push5 grid5 video-thumbnail">
          <a href="<?php $features_mb->the_value('feature-video-url-header'); ?>" data-module="video" title="<?php $features_mb->the_value('feature-cta-title'); ?>" class="data-videos"><div class="feature-video-thumbnail" style="background: url('<?php $img = (wp_get_attachment_image_src(get_post_thumbnail_id(),array(350,220))); echo $img[0];?>'); width:350px; height:220px;"><div class="play-button"></div></div></a>
        </div>
      </div>
    </div>
    <div class="feature-description-container">
      <?php
      $alternate =  $features_mb->get_the_value('display-alternate');
      while($features_mb->have_fields_and_multi('features')):
        $linkable = "";
        $linkable = $features_mb->get_the_value('feature-external-url');
        ?>
        <div class="row <?php echo ($features_mb->get_the_index()+1 == $features_mb->length)? 'last-feature-description' : ''; ?>" style="position: relative;">
        <?php if($alternate != 'NO'){ // Display features in alternate columns one image to the left, one to the right, etc.?>
            <div class="push1 grid4" >   <?php // Open grid4  ?>
            <?php if($features_mb->get_the_index() % 2 == 0) { ?>
              <?php if($linkable != ""){ ?><a href="<?php echo $features_mb->get_the_value('feature-external-url'); ?>" title="<?php echo $features_mb->get_the_value('feature-title'); ?>"><img src="<?php echo $features_mb->get_the_value('feature-thumbnail'); ?>" border="0" /></a><?php } else { ?><img src="<?php echo $features_mb->get_the_value('feature-thumbnail'); ?>" border="0" /><?php } ?>
            </div>  <?php // Close grid4 if %2 == 0 and open another one below?>
            <div class="grid4">  <?php // Open a second grid4 right away if %2 == 0  ?>
            <?php } ?>
          <?php // Feature text begins ?>
              <div class="feature-item">
                <h2 class="interstatecondensedbold"><?php if($linkable != ""){ ?><a href="<?php echo $features_mb->get_the_value('feature-external-url'); ?>" title="<?php echo $features_mb->get_the_value('feature-title'); ?>"><?php echo $features_mb->get_the_value('feature-title'); ?></a><?php } else { echo $features_mb->get_the_value('feature-title'); } ?></h2>
                <p><?php echo $features_mb->get_the_value('feature-description'); ?></p>
                <?php if($features_mb->get_the_value('feature-video-title') != "" && $features_mb->get_the_value('feature-video-url') != ""): ?><p><a data-module="video" href="<?php echo $features_mb->get_the_value('feature-video-url'); ?>" title="<?php echo $features_mb->get_the_value('feature-video-title'); ?>" class="bold"><?php echo $features_mb->get_the_value('feature-video-title'); ?></a><span class="circle-arrow"><span class="arrow-right"></span></span></p><?php endif; ?>
              </div>
          <?php //  Feature text ends?>
            </div>   <?php // Close grid4 ?>
           <?php if($features_mb->get_the_index() % 2 != 0) { ?> <div class="push5 grid4"><img src="<?php echo $features_mb->get_the_value('feature-thumbnail'); ?>" /></div>  <?php } ?>  <?php // Image on the right if %2 != 0 ?>
        <?php } //close the feature display as alternate. If set to NO (else) display all as a list. All images to the left and text to the right.
          else { ?>
            <div class="push1 grid4" >
              <?php if($linkable != ""){ ?><a href="<?php echo $features_mb->get_the_value('feature-external-url'); ?>" title="<?php echo $features_mb->get_the_value('feature-title'); ?>"><img src="<?php echo $features_mb->get_the_value('feature-thumbnail'); ?>" border="0" /></a><?php } else { ?><img src="<?php echo $features_mb->get_the_value('feature-thumbnail'); ?>" border="0" /><?php } ?>
            </div>
            <div class="grid4">
              <div class="feature-item">
                <h2 class="interstatecondensedbold"><?php if($linkable != ""){ ?><a href="<?php echo $features_mb->get_the_value('feature-external-url'); ?>" title="<?php echo $features_mb->get_the_value('feature-title'); ?>"><?php echo $features_mb->get_the_value('feature-title'); ?></a><?php } else { echo $features_mb->get_the_value('feature-title'); } ?></h2>
                <p><?php echo $features_mb->get_the_value('feature-description'); ?></p>
                <?php if($features_mb->get_the_value('feature-video-title') != "" && $features_mb->get_the_value('feature-video-url') != ""): ?><p><a data-module="video" href="<?php echo $features_mb->get_the_value('feature-video-url'); ?>" title="<?php echo $features_mb->get_the_value('feature-video-title'); ?>" class="bold"><?php echo $features_mb->get_the_value('feature-video-title'); ?></a><span class="circle-arrow"><span class="arrow-right"></span></span></p><?php endif; ?>
              </div>
            </div>
          <?php } ?>
        </div>
     <?php endwhile; ?>
      <?php if($features_mb->get_the_value('feature-disclaimer') != '') { ?>
      <div class="row">
        <div class="grid9 push1">
      <div class="feature-disclaimer">
        <?php echo $features_mb->get_the_value('feature-disclaimer'); ?>
      </div>
        </div>
      </div>
      <?php  } ?>
    </div>
    <?php  if($bottom_cta_mb->get_the_value('show-section') == 'YES') { ?>
    <div class="feature-footer-container clearfix">
      <div class="footer-badge"><img src="<?php $bottom_cta_mb->the_value('feature-hexagon'); ?>" alt="<?php the_title(); ?>" /></div>
      <div class="row">
        <div class="grid10 feature-footer-title interstatecondensedbold" ><h2><?php $bottom_cta_mb->the_value('section-title'); ?></h2></div>
      </div>
      <div class="row">
      <div class="grid10">
        <?php while($bottom_cta_mb->have_fields_and_multi('bottom-features')): ?>
          <div class="feature-container <?php echo ($bottom_cta_mb->get_the_index() %3  == 0)? 'first' : ''; ?>">
            <div class="feature-icon"><img src="<?php $bottom_cta_mb->the_value('feature-icon'); ?>" /></div>
            <div class="feature-description"><?php $bottom_cta_mb->the_value('feature-description'); ?></div>
          </div>
        <?php endwhile; ?>
      </div>
      </div>
      <div class="row">
        <div class="grid10 feature-footer-cta" ><a href="#" class="yj-btn yj-btn-orange"><?php $bottom_cta_mb->the_value('cta-button-title'); ?></a></div>
      </div>
    </div>
     <?php } ?>
    <?php  if($logo_wall_mb->get_the_value('show-section') == 'YES') { ?>
    <div class="feature-footer-container clearfix">
      <div class="row">
        <div class="grid10 logo-wall-title interstatecondensedbold" ><h2><?php $logo_wall_mb->the_value('section-title'); ?></h2></div>
      </div>
      <div class="row">
        <div class="grid10 logo-wall-container">
          <div class="logo-wall-innercontainer clearfix">
          <?php while($logo_wall_mb->have_fields_and_multi('logo')): ?>
           <div class="logo-wall-logo"><a href="<?php $logo_wall_mb->the_value('logo-link-url'); ?>"><img src="<?php $logo_wall_mb->the_value('logo')?>" alt="Logo" border="0"></a></div>
          <?php endwhile; ?>
          </div>
        </div>
      </div>

    </div>
    <?php } ?>
  </div>
</div>