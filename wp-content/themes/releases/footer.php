  <?php roots_footer_before(); ?>
  <footer class="global-footer" role="contentinfo">
    <div class="global-footer-border"></div>
    <div class="container">
      <?php roots_footer_inside(); ?>
      <p class="copy">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?><span class="margin-left"><?php _e('Sales') ?>: 1-888-926- 7377</span></p>
      <?php if (wp_get_nav_menu_items('Footer Navigation')) { ?>
      <?php
      wp_nav_menu(array('theme_location' => 'footer_navigation')); ?>
      <?php } ?>
    </div>

    <?php $emailQueryVar = get_email_queryvars(); ?>
    <img id="yamalytics" width="0" height="0" class="yj-hide" src="https://www.yammer.com/images/public-site-spacer.gif<?php echo (isset($emailQueryVar) && $emailQueryVar != '') ? "?m=".$emailQueryVar : "";?>" />

  </footer>
  <?php roots_footer_after(); ?>

  <?php wp_footer(); ?>
  <?php roots_footer(); ?>
</body>
</html>