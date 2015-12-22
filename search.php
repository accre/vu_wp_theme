<?php
/**
 * @package WordPress
 * @subpackage vanderbilt brand
 */

get_header(); ?>

<?php if (function_exists('vu_breadcrumbs')) vu_breadcrumbs(); ?>

<h1 class="plain">Search Results</h1>

<div class="secmain">	

<h3>Search Term: <strong><?php the_search_query(); ?></strong></h3>

	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>

	<a href="<?php the_permalink() ?>">
	<?php if(has_post_thumbnail()){ the_post_thumbnail(array(150,150), array("class" => "left blogthumb")); }  else { 
	echo '<img src="'; bloginfo('stylesheet_directory'); echo '/functions/images/defaultpost.jpg" height="150" width="150" class="blogthumb left">';
	 } ?></a>

	<h3 class="posttitle"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
	<p><?php the_time('F j, Y') ?> &#8212; <?php echo get_the_excerpt(); ?></p>


<hr class="space" />

<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>

<?php else : ?>

<h2 class="center">No posts found. Try a different search?</h2>
<?php get_search_form(); ?>

<?php endif; ?>

</div><!-- /secmain -->
</div><!-- /seccontent-->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
