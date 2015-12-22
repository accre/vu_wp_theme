<?php
/**
 * @package WordPress
 * @subpackage vanderbilt brand
 */

get_header();
?>

<?php if (function_exists('vu_breadcrumbs')) vu_breadcrumbs(); ?>


	<h1 class="plain">Archives</h1>
		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle"><?php single_cat_title(); ?> Category</h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle"><?php the_time('F jS, Y'); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle"><?php the_time('F, Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle"><?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">Author</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">Blog Archives</h2>
 	  <?php } ?>

<div class="secmain">	

<?php while (have_posts()) : the_post(); ?>

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
		


<hr /> 


<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
		</div>
<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>No posts found.</h2>");
		}
		get_search_form();

	endif;
?>

				<!-- AddThis Button BEGIN -->
<hr class="space" />
<div class="sidebaraddthis addthis_toolbox addthis_32x32_style addthis_default_style">
    <a class="addthis_button_facebook"></a>
    <a class="addthis_button_twitter"></a>
    <a class="addthis_button_email"></a>
    <a class="addthis_button_print"></a>
    <a class="addthis_button_google"></a>
    <a class="addthis_button_compact"></a>
</div>
<!-- AddThis Button END -->


</div><!-- /secmain -->
</div><!-- /seccontent-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
