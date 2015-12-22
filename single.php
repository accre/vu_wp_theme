<?php
/**
 * @package WordPress
 * @subpackage vanderbilt brand
 */

get_header();
?>

<?php if (function_exists('vu_breadcrumbs')) vu_breadcrumbs(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<h1 class="plain"><?php the_title(); ?></h1>

<div class="secmain">	

<?php edit_post_link('<img src=http://www.vanderbilt.edu/asset/i/editthis.jpg>', '<p>', '</p>'); ?>

<p><small>Posted by <?php the_author_posts_link(); ?> on <?php the_time('l, F j, Y') ?> in  <?php the_category(', ') ?>.</small></p>

<?php // the_post_thumbnail(array(200,200), array("class" => "left")); ?>


<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>


				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
				
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


<hr class="space" />
<!-- AddThis Button END -->

	<?php comments_template(); ?>

</div><!-- /secmain -->

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

</div><!-- /seccontent-->


<?php get_sidebar(); ?>


<?php get_footer(); ?>