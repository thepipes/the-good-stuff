<?php global $wpalchemy_media_access; ?>
<div class="custom-meta">
  <div class="row cf">
    <div class="col">
      <label>Header CTA Title:</label>
      <?php $metabox->the_field('feature-cta-title'); ?>
      <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" placeholder="Go to My Feed"/>
    </div>
    <div class="col">
      <label>Header CTA URL:</label>
      <?php $metabox->the_field('feature-cta-url'); ?>
      <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" placeholder="Yammer URL"/>
    </div>
  </div>
  <div class="row cf">
    <div class="col">
      <label>Header Video Title:</label>
      <?php $metabox->the_field('feature-video-title-header'); ?>
      <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" placeholder=""/>
    </div>
    <div class="col">
      <label>Header Video URL:</label>
      <?php $metabox->the_field('feature-video-url-header'); ?>
      <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" placeholder=""/>
    </div>
  </div>
  <div class="row cf">
    <div class="col">
      <label>Feature Homepage Image: </label>
      <?php $metabox->the_field('homepage-feature-thumbnail'); ?>
      <?php $wpalchemy_media_access->setGroupName('homepage-feature-thumnail'. $metabox->get_the_index())->setInsertButtonLabel('Insert Thumbnail'); ?>
      <?php echo $wpalchemy_media_access->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value())); ?>
      <?php echo $wpalchemy_media_access->getButton(); ?>
    </div>
    <div class="col">
      <?php $val = $metabox->get_the_value(); ?>
      <?php if(!empty($val)) { ?>
      <img class="icon-preview" src="<?php echo $val; ?>" />
      <?php } ?>
    </div>
  </div>
  <div class="row cf">
    <div class="col">
      <label>Feature Icon: </label>
      <?php $metabox->the_field('feature-icon'); ?>
      <?php $wpalchemy_media_access->setGroupName('icon-n'. $metabox->get_the_index())->setInsertButtonLabel('Insert Icon'); ?>
      <?php echo $wpalchemy_media_access->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value())); ?>
      <?php echo $wpalchemy_media_access->getButton(); ?>
    </div>
    <div class="col">
      <?php $val = $metabox->get_the_value(); ?>
      <?php if(!empty($val)) { ?>
      <img class="icon-preview" src="<?php echo $val; ?>" />
      <?php } ?>
    </div>
  </div>
  <div class="row cf">
    <div class="col">
      <label>Video Thumbnail: </label>
      <?php $metabox->the_field('feature-video-thumbnail'); ?>
      <?php $wpalchemy_media_access->setGroupName('videothumbnail-n'. $metabox->get_the_index())->setInsertButtonLabel('Insert Thumbnail'); ?>
      <?php echo $wpalchemy_media_access->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value())); ?>
      <?php echo $wpalchemy_media_access->getButton(); ?>
    </div>
    <div class="col">
      <?php $val2 = $metabox->get_the_value('feature-video-thumbnail'); ?>
      <?php if(!empty($val2)) { ?>
      <img class="icon-preview" src="<?php echo $val2; ?>" />
      <?php } ?>
    </div>
  </div>
  <div class="row cf">
    <label>Feature Detailed Description</label>
    <?php $metabox->the_field('feature-detailed-description'); ?>
    <?php
    $val =  html_entity_decode($metabox->get_the_value());
    $id = $metabox->get_the_name();
    wp_editor($val,  $id , array('media_buttons'=>false, 'textarea_rows' => '3','wpautop'=>true) );
    ?>
  </div>
  <hr>
  <div class="row cf">
    <div class="col">
      <label>Show as alternate list? <small>If set to yes, image and text positions will alternate. First image on the left, second image on the right, etc.</small></label>
    <?php
    $metabox->the_field('display-alternate'); ?>
    <?php $selected = ' selected="selected"'; ?>
    <select name="<?php $metabox->the_name(); ?>">
      <option value="YES" <?php if ($metabox->get_the_value() == 'YES') echo $selected; ?>>YES</option>
      <option value="NO" <?php if ($metabox->get_the_value() == 'NO') echo $selected; ?>>NO</option>
    </select>

    </div>
  </div>
  <div class="row cf">

      <label>Add Feature Item</label>
      <fieldset>

      <?php
      while($metabox->have_fields_and_multi('features')): ?>
        <?php $metabox->the_group_open(); ?>

        <div class="row cf">
          <div class="col">
            <label>Title:</label>
            <?php $metabox->the_field('feature-title'); ?>
            <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" placeholder="Feature item name (e.g. Improved Top Conversations)"/>
            <a href="#" class="dodelete button">Remove This Feature</a>
          </div>
          <div class="col">
            <label>Description:</label>
            <?php $metabox->the_field('feature-description'); ?>
            <textarea name="<?php $metabox->the_name(); ?>" rows="3"><?php $metabox->the_value(); ?></textarea>
          </div>
        </div>
        <div class="row cf">
          <div class="col">
            <label>Feature Thumbnail: </label>
            <?php $metabox->the_field('feature-thumbnail'); ?>
            <?php $wpalchemy_media_access->setGroupName('thumbnail-n'. $metabox->get_the_index())->setInsertButtonLabel('Insert Thumbnail'); ?>
            <?php echo $wpalchemy_media_access->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value())); ?>
            <?php echo $wpalchemy_media_access->getButton(); ?>
          </div>
          <div class="col">
            <?php $val = $metabox->get_the_value(); ?>
            <?php if(!empty($val)) { ?>
            <img class="icon-preview" src="<?php echo $val; ?>" />
            <?php } ?>
          </div>
        </div>
        <div class="row cf">

          <div class="col">
            <label>Feature or External URL:</label>
            <?php $metabox->the_field('feature-external-url'); ?>
            <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" placeholder=""/>
          </div>
        </div>
        <div class="row cf">
          <div class="col">
            <label>Video URL Title:</label>
            <?php $metabox->the_field('feature-video-title'); ?>
            <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" placeholder="Watch how to use My Feed"/>
          </div>
          <div class="col">
            <label>Video URL:</label>
            <?php $metabox->the_field('feature-video-url'); ?>
            <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" placeholder=""/>
          </div>
        </div>
        <br/>
        <hr>
        <?php $metabox->the_group_close(); ?>

      <?php endwhile; ?>
      <p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-features button">Add Feature Item</a></p>

      </fieldset>

  </div>
  <div class="row cf">
    <label>Feature Disclaimers</label>
    <?php $metabox->the_field('feature-disclaimer'); ?>
    <?php
    $val =  html_entity_decode($metabox->get_the_value());
    $id = $metabox->get_the_name();
    wp_editor($val,  $id , array('media_buttons'=>false, 'textarea_rows' => '3','wpautop'=>true) );
    ?>
  </div>
</div>