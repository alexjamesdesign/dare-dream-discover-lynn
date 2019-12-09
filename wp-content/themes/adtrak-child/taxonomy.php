<?php
/**
 * The template for rendering anything not caught by other file as well
 * as the loop for any blog posts. In theory this is a "fallback" file. 
 * @author  Adtrak
 * @package AdtrakChild
 * @version 1.0.0
 */
?>

<?php
    get_header();
?>

<!--<p class="title">Destinations Taxo php</p>-->

<?php include locate_template('parts/term-specific-posts.php'); ?>

<?php get_footer(); ?>