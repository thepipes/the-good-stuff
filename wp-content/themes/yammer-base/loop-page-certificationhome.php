<?php 
global $social_sharing; 
$social_sharing->the_meta();

?>

  <?php get_template_part( 'social', 'share-buttons' );  //Social Share buttons template?>
  <div class="grid12">
    <div class="content clearfix">
    <?php
    if (have_posts()) :
      while (have_posts()) : the_post();
        echo '<h1 class="interstatecondensedbold">' . get_the_title() . '</h1>';
        the_content();
      endwhile;
    endif;
    ?>
    </div>
  </div>

