<?php global $wpalchemy_media_access; ?>
<div class="custom-meta">
  <div class="row cf">
    <div class="col">
      <label>Feature CTA Title:</label>
      <?php $metabox->the_field('feature-cta-title'); ?>
      <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" placeholder="Go to My Feed"/>
    </div>
    <div class="col">
      <label>Feature CTA URL:</label>
      <?php $metabox->the_field('feature-cta-url'); ?>
      <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" placeholder="Yammer URL"/>
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
</div>