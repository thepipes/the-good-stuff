<?php
/*
Template Name: Homepage
Template Description: event info template
*/
?>
<?php get_header(); ?>

<?php roots_content_before(); ?>

<?php roots_main_before(); ?>

<?php roots_loop_before(); ?>

<?php get_template_part( 'loop', 'page' );  ?>

<?php roots_loop_after(); ?>

</div><!-- /#main, closing of heading -->

<?php roots_main_after(); ?>

</div><!-- /#content, closing of heading -->

<?php roots_content_after(); ?>

<?php get_footer(); ?>
