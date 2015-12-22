<?php
/**
 * @package WordPress
 * @subpackage vanderbilt brand
 */
get_header(); ?>

<?php // if is home page and slider option is ON
if ( (get_option('vubrand_slideron') == 'true') && (is_front_page()) ) { include(TEMPLATEPATH . '/slider.php'); } ?>	

 <?php wp_reset_query(); ?>
 
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php if (function_exists('vu_breadcrumbs')) vu_breadcrumbs(); ?>

<?php if (!is_front_page()) {  // show page title
	echo '<h1 class=plain>'; the_title(); echo '</h1>'; } ?>

<div class="secmain">	
<?php edit_post_link('<img src=http://www.vanderbilt.edu/asset/i/editthis.jpg>', '<p>', '</p>'); ?>

<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

<!-- AddThis Button BEGIN -->
<hr class="space" />
<?php if (get_option('vubrand_socialsharelinks') != 'no') { ?>
<div class="sidebaraddthis addthis_toolbox addthis_32x32_style addthis_default_style">
    <a class="addthis_button_facebook"></a>
    <a class="addthis_button_twitter"></a>
    <a class="addthis_button_email"></a>
    <a class="addthis_button_print"></a>
    <a class="addthis_button_google"></a>
    <a class="addthis_button_compact"></a>
</div>
<?php } ?>

<!-- AddThis Button END -->

</div><!-- /secmain -->

<?php endwhile; endif; ?>

</div><!-- /seccontent-->


<?php get_sidebar(); ?>


<?php get_footer(); ?>