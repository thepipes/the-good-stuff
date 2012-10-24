<?php global $wpalchemy_media_access; ?>
<div class="custom-meta">
  <div class="row cf">
    <div class="col">
    	 <label>Hide share buttons?</label>
    <?php
    $metabox->the_field('hide-share-buttons'); ?>
    <?php $selected = ' selected="selected"'; ?>
    <select name="<?php $metabox->the_name(); ?>">
      <option value="NO" <?php if ($metabox->get_the_value() == 'NO') echo $selected; ?>>NO</option>
      <option value="YES" <?php if ($metabox->get_the_value() == 'YES') echo $selected; ?>>YES</option>
    </select>
    </div>
  </div>
</div>