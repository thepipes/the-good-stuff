<?php global $wpalchemy_media_access; ?>
<div class="custom-meta">
  <div class="row cf">
    Show this section?
    <?php
    $metabox->the_field('show-section'); ?>
    <?php $selected = ' selected="selected"'; ?>
    <select name="<?php $metabox->the_name(); ?>">
      <option value="NO" <?php if ($metabox->get_the_value() == 'NO') echo $selected; ?>>NO</option>
      <option value="YES" <?php if ($metabox->get_the_value() == 'YES') echo $selected; ?>>YES</option>
    </select>
  </div>
  <div class="row cf">
    <div class="col">
      <label>Section Title:</label>
      <?php $metabox->the_field('section-title'); ?>
      <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" placeholder="3 ways to use My Feed"/>
    </div>
    <div class="col">
      <label>CTA Button Title:</label>
      <?php $metabox->the_field('cta-button-title'); ?>
      <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" placeholder="Try it on Yammer"/>
    </div>

  </div>
  <div class="row cf">
    <div class="col">
      <label>Footer Badge (Hexagon): </label>
      <?php $metabox->the_field('feature-hexagon'); ?>
      <?php $wpalchemy_media_access->setGroupName('hexagon'. $metabox->get_the_index())->setInsertButtonLabel('Insert Icon'); ?>
      <?php echo $wpalchemy_media_access->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value())); ?>
      <?php echo $wpalchemy_media_access->getButton(); ?>
      <?php $val = $metabox->get_the_value(); ?>
      <?php if(!empty($val)) { ?>
      <img class="icon-preview" src="<?php echo $val; ?>" />
      <?php } ?>
    </div>
  </div>
  <div class="row cf">

  <label>Add Section Items</label>
      <fieldset>
      <?php
      while($metabox->have_fields_and_multi('bottom-features')): ?>
        <?php $metabox->the_group_open(); ?>

        <div class="row cf">
          <div class="col cf">
            <label>Description:</label>
            <?php $metabox->the_field('feature-description'); ?>
            <textarea name="<?php $metabox->the_name(); ?>" rows="3"><?php $metabox->the_value(); ?></textarea>
          </div>
          <div class="col">
            <label>Feature Icon: </label>
            <?php $metabox->the_field('feature-icon'); ?>
            <?php $wpalchemy_media_access->setGroupName('icon-n'. $metabox->get_the_index())->setInsertButtonLabel('Insert Icon'); ?>
            <?php echo $wpalchemy_media_access->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value())); ?>
            <?php echo $wpalchemy_media_access->getButton(); ?>
            <?php $val = $metabox->get_the_value(); ?>
            <?php if(!empty($val)) { ?>
            <img class="icon-preview" src="<?php echo $val; ?>" />
            <?php } ?>
          </div>
          <div class="col">
            <br />
            <a href="#" class="dodelete button">Remove This Feature</a>
          </div>
        </div>
        <br/>
        <hr>
        <?php $metabox->the_group_close(); ?>

        <?php endwhile; ?>
        <p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-bottom-features button">Add Feature Item</a></p>

      </fieldset>
</div>

</div>
