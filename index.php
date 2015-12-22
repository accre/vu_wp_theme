<?php
/**
 * @package WordPress
 * @subpackage vanderbilt brand
 */

// if departmental website
if ((get_option('vubrand_sitetype') == 'Department')) { 

 		include(TEMPLATEPATH . '/page.php');
 
 } 

// if blog
else {  

get_header();
?>
		
		<div class="secmain homepage">	
		
		<?php // if is home page and slider option is ON
		if ( (get_option('vubrand_slideron') == 'true') && (is_front_page()) ) { include(TEMPLATEPATH . '/slider.php'); } ?>	
		
		<?php wp_reset_query(); ?>
		<?php while (have_posts()) : the_post(); ?>

<?php // show full posts if that is chosen in options
if(get_option('vubrand_homeposts') == 'Full') {  ?>


<div class="smalladdthis addthis_toolbox addthis_default_style" addthis:title="<?php the_title_attribute(); ?>" addthis:url="<?php the_permalink() ?>">
    <a class="addthis_button_facebook"></a>
    <a class="addthis_button_twitter"></a>
    <a class="addthis_button_email"></a>
    <a class="addthis_button_compact"></a>
</div>
		
		<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
		
		<?php the_content() ?>
			
		<p class='homecredits'><small>Posted by <?php the_author_posts_link(); ?> on <?php the_time('F j, Y') ?> in <?php the_category(', '); the_tags(', ', ', ', ''); ?></small></p>


<?php
} 
//otherwise show only excerpts
else { 
?>
		
<div class="smalladdthis addthis_toolbox addthis_default_style" addthis:title="<?php the_title_attribute(); ?>" addthis:url="<?php the_permalink() ?>">
    <a class="addthis_button_facebook"></a>
    <a class="addthis_button_twitter"></a>
    <a class="addthis_button_email"></a>
    <a class="addthis_button_compact"></a>
</div>

		<a href="<?php the_permalink() ?>">
		<?php if(has_post_thumbnail()) { the_post_thumbnail(array(150,150), array("class" => "blogthumb left")); } 
		else { echo '<img src="'; bloginfo('stylesheet_directory'); echo '/functions/images/defaultpost.jpg" height="150" width="150" class="blogthumb left">'; } 
		?></a>
		
		<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
		
		<?php the_excerpt() ?>
			
		<p class='homecredits'><small>Posted by <?php the_author_posts_link(); ?> on <?php the_time('F j, Y') ?> in <?php the_category(', '); the_tags(', ', ', ', ''); ?></small></p>
		
<?php 
} ?>


		
		<hr /> 
		
		<?php endwhile; ?>
		
		<div class="navigation">
					<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
					<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
		
		
		
		</div><!-- /secmain -->
		</div><!-- /seccontent-->
		
		<?php get_sidebar(); ?>
		<?php get_footer(); ?>



<?php // end checking for which type of site
} 
?>