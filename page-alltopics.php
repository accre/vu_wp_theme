<?php 
/* 
Template Name: All Topics Page
*/
get_header(); ?>
<style>
ul.taglist { float: left; width: 175px; }
.taglist img a:link, .taglist img a:visited { border-bottom: none !important; text-decoration:  none; }
</style>

<?php if (function_exists('vu_breadcrumbs')) vu_breadcrumbs(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<h1 class="plain"><?php the_title(); ?></h1>

<div class="secmain">

	<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
	<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
	<?php endwhile; endif; ?>
	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

<h2>Categories</h2>
	
	<?php
$categories = get_categories();
$categories_count = count($categories);
$percolumn = ceil($categories_count / 3);

for ($i = 0;$i < $categories_count;$i++):
    if ($i < $percolumn):
      
    $categories_left .= '
	<li><a href="'. get_category_link($categories[$i]->term_id) . '"rel="tag">' . $categories[$i]->name .'</a> <a href="http://www.addthis.com/feed.php?username=vanderbilt&amp;h1='. get_category_link($categories[$i]->term_id) .'feed&amp;t1=" alt="Subscribe using any feed reader!" target="_blank"><img src="http://news.vanderbilt.edu/i/rss.jpg" width="12" height="12" alt="Subscribe" style="border:0"/></a></li>' . "\n";
    elseif ($i >= $percolumn && $i < $percolumn*2):
    $categories_mid .= '
		<li><a href="'. get_category_link($categories[$i]->term_id) . '"rel="tag">' . $categories[$i]->name .'</a> <a href="http://www.addthis.com/feed.php?username=vanderbilt&amp;h1='. get_category_link($categories[$i]->term_id) .'feed&amp;t1=" alt="Subscribe using any feed reader!" target="_blank"><img src="http://news.vanderbilt.edu/i/rss.jpg" width="12" height="12" alt="Subscribe" style="border:0"/></a></li>' . "\n";
    elseif ($i >= $percolumn*2):
    $categories_right .= '
		<li><a href="'. get_category_link($categories[$i]->term_id) . '"rel="tag">' . $categories[$i]->name .'</a> <a href="http://www.addthis.com/feed.php?username=vanderbilt&amp;h1='. get_category_link($categories[$i]->term_id) .'feed&amp;t1=" alt="Subscribe using any feed reader!" target="_blank"><img src="http://news.vanderbilt.edu/i/rss.jpg" width="12" height="12" alt="Subscribe" style="border:0"/></a></li>' . "\n";
    endif;
endfor;
?>
<ul class="taglist">
<?php echo $categories_left; ?>
</ul>

<ul class="taglist">
<?php echo $categories_mid; ?>
</ul>

<ul class="taglist">
<?php echo $categories_right; ?>
</ul>

<hr />

	
	<h2>Tags</h2>
<?php
$tags = get_tags();
$tags_count = count($tags);
$percolumn = ceil($tags_count / 3);

for ($i = 0;$i < $tags_count;$i++):
    if ($i < $percolumn):
      
    $tag_left .= '
	<li><a href="'. get_tag_link($tags[$i]->term_id) . '"rel="tag">' . $tags[$i]->name .'</a> <a href="http://www.addthis.com/feed.php?username=vanderbilt&amp;h1='. get_tag_link($tags[$i]->term_id) .'feed&amp;t1=" alt="Subscribe using any feed reader!" target="_blank"><img src="http://news.vanderbilt.edu/i/rss.jpg" width="12" height="12" alt="Subscribe" style="border:0"/></a></li>' . "\n";
    elseif ($i >= $percolumn && $i < $percolumn*2):
    $tag_mid .= '
		<li><a href="'. get_tag_link($tags[$i]->term_id) . '"rel="tag">' . $tags[$i]->name .'</a> <a href="http://www.addthis.com/feed.php?username=vanderbilt&amp;h1='. get_tag_link($tags[$i]->term_id) .'feed&amp;t1=" alt="Subscribe using any feed reader!" target="_blank"><img src="http://news.vanderbilt.edu/i/rss.jpg" width="12" height="12" alt="Subscribe" style="border:0"/></a></li>' . "\n";
    elseif ($i >= $percolumn*2):
    $tag_right .= '
		<li><a href="'. get_tag_link($tags[$i]->term_id) . '"rel="tag">' . $tags[$i]->name .'</a> <a href="http://www.addthis.com/feed.php?username=vanderbilt&amp;h1='. get_tag_link($tags[$i]->term_id) .'feed&amp;t1=" alt="Subscribe using any feed reader!" target="_blank"><img src="http://news.vanderbilt.edu/i/rss.jpg" width="12" height="12" alt="Subscribe" style="border:0"/></a></li>' . "\n";
    endif;
endfor;
?>
<ul class="taglist">
<?php echo $tag_left; ?>
</ul>

<ul class="taglist">
<?php echo $tag_mid; ?>
</ul>

<ul class="taglist">
<?php echo $tag_right; ?>
</ul>



</div><!-- /secmain -->

</div><!-- /seccontent-->


<?php get_sidebar(); ?>
<?php get_footer(); ?>