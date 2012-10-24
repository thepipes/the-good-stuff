<?php global $wpalchemy_media_access; ?>
<div class="custom-meta">
  <div class="row cf">
    <label>Header Image Left Offset? <small>This moves the header image 20px to the left.</small></label>
    <?php
    $metabox->the_field('header-image-offset'); ?>
    <?php $selected = ' selected="selected"'; ?>
    <select name="<?php $metabox->the_name(); ?>">
      <option value="NO" <?php if ($metabox->get_the_value() == 'NO') echo $selected; ?>>NO</option>
      <option value="YES" <?php if ($metabox->get_the_value() == 'YES') echo $selected; ?>>YES</option>
    </select>
  </div>
  <div class="row cf">
    <div class="col">
      <?php $metabox->the_field('title');?>
      <label>Title: </label>
      <input type="text" name="<?php $metabox->the_name();?>" value="<?php $metabox->the_value(); ?>" >
      <br />
      <?php $metabox->the_field('title2');?>
      <label>Title: (Second Line) </label>
      <input type="text" name="<?php $metabox->the_name();?>" value="<?php $metabox->the_value(); ?>" >
    </div>
    <div class="col">
      <?php $metabox->the_field('description');?>
      <label>Description: </label>
      <textarea cols="3" rows="4" name="<?php $metabox->the_name();?>"><?php $metabox->the_value(); ?></textarea>
    </div>
  </div>
  <div class="row cf">
    <div class="col">
      <?php $metabox->the_field('cta-button-title');?>
      <label>CTA Button Title: </label>
      <input type="text" name="<?php $metabox->the_name();?>" value="<?php $metabox->the_value(); ?>" >
    </div>
    <div class="col">
      <?php $metabox->the_field('cta-button-url');?>
      <label>CTA Button URL: </label>
      <input type="text" name="<?php $metabox->the_name();?>" value="<?php $metabox->the_value(); ?>" >
    </div>
  </div>
  <div class="row cf">
    <div class="col">
      <div class="left">
        <?php $metabox->the_field('video-thumbnail');?>
        <label>Video Thumbnail: </label>
        <?php $wpalchemy_media_access->setGroupName('thumbnail-n'. $metabox->get_the_index())->setInsertButtonLabel('Insert Thumbnail'); ?>
        <?php echo $wpalchemy_media_access->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value())); ?>
        <?php echo $wpalchemy_media_access->getButton(); ?>
      </div>
      <div class="left">
        <?php $val = $metabox->get_the_value(); ?>
        <?php if(!empty($val)) { ?>
        <p><img class="" src="<?php echo $val; ?>" /></p>
        <?php } ?>
      </div>
    </div>
    <div class="col">
      <?php $metabox->the_field('video-thumbnail-url');?>
      <label>Video URL: </label>
      <input type="text" name="<?php $metabox->the_name();?>" value="<?php $metabox->the_value(); ?>" >
    </div>
  </div>
  <div class="row cf">
    <div class="col">
      <?php $metabox->the_field('video-title');?>
      <label>Video Title: </label>
      <input type="text" name="<?php $metabox->the_name();?>" value="<?php $metabox->the_value(); ?>" >
    </div>
    <div class="col">
      <?php $metabox->the_field('video-description');?>
      <label>Video Description: </label>
      <?php
      $val =  html_entity_decode($metabox->get_the_value());
      $id = $metabox->get_the_name();
      wp_editor($val,  $id , array('media_buttons'=>false, 'textarea_rows' => '3','wpautop'=>true) );
      ?>
    </div>
  </div>
  <div class="row cf">
    <div class="col">
        <?php $metabox->the_field('cta-link-title');?>
        <label>CTA Link Title: </label>
        <input type="text" name="<?php $metabox->the_name();?>" value="<?php $metabox->the_value(); ?>" >
    </div>
    <div class="col">
      <?php $metabox->the_field('cta-link-url');?>
      <label>CTA Link URL: </label>
      <input type="text" name="<?php $metabox->the_name();?>" value="<?php $metabox->the_value(); ?>" >
    </div>
  </div>
</div>