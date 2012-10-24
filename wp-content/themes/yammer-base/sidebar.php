<nav>
  <ul class="menu">
    <?php if (wp_get_nav_menu_items('Primary Navigation')) { ?>
    <?php wp_nav_menu(array('theme_location' => 'primary_navigation', 'items_wrap' => '%3$s')); ?>
    <?php } ?>
  </ul>
</nav>
<?php dynamic_sidebar('sidebar-primary'); ?>