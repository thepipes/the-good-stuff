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
      <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" placeholder=""/>
    </div>


  </div>
  <div class="row cf">

  <label>Add Logos to the Logo Wall</label>
<fieldset>

<?php
    while($metabox->have_fields_and_multi('logo')): ?>
      <?php $metabox->the_group_open(); ?>
      <div class="row cf">
        <div class="col">
          <label>Logo: </label>
          <?php $metabox->the_field('logo'); ?>
          <?php $wpalchemy_media_access->setGroupName('logo-n'. $metabox->get_the_index())->setInsertButtonLabel('Insert Logo'); ?>
          <?php echo $wpalchemy_media_access->getField(array('name' => $metabox->get_the_name(), 'value' => $metabox->get_the_value())); ?>
          <?php echo $wpalchemy_media_access->getButton(); ?>
          <a href="#" class="dodelete button">Remove This Logo</a>
        </div>
        <div class="col">
          <?php $val = $metabox->get_the_value(); ?>
          <?php if(!empty($val)) { ?>
          <img class="icon-preview" src="<?php echo $val; ?>" />
          <?php } ?>
        </div>
      </div>
      <div class="row cf">
        <label>Logo Link URL:</label>
        <?php $metabox->the_field('logo-link-url'); ?>
        <input type="text" name="<?php $metabox->the_name(); ?>" value="<?php $metabox->the_value(); ?>" placeholder=""/>
      </div>
      <br/>
      <hr>
      <?php $metabox->the_group_close(); ?>

      <?php endwhile; ?>
      <p style="margin-bottom:15px; padding-top:5px;"><a href="#" class="docopy-logo button">Add Logo</a></p>

  </div>
</div>