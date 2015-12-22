<?php
/**
 * @package WordPress
 * @subpackage vanderbilt brand SIDEBAR
 */
?>

<div id="secnav">

<?php // show home button if not on homepage
if (!is_front_page()) { ?>
<p class="home"><a href="<?php bloginfo('url'); ?>">Back Home&nbsp;&nbsp;&nbsp;</a></p>
<?php } ?>

<?php 	/* Widgetized sidebar, if you have the plugin installed. */
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
<?php endif; ?>


<?php // if graphic header chosen and Wordpress Search - show search in right nav
if ( (get_option('vubrand_graphicheader') == 'true') && (get_option('vubrand_searchmethod') == 'Wordpress Search') ) { ?>
	<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/" class="round">
   <input type="text" value="SEARCH" onfocus="clearDefault(this)" name="s" id="s" class="searchfield" />
   <button class="btn" title="Submit Search">GO</button>
	</form>
	
<?php } ?>
<?php // if graphic header chosen and Wordpress Search - show search in right nav
if ( (get_option('vubrand_graphicheader') == 'true') && (get_option('vubrand_searchmethod') == 'Google Search Appliance') ) { ?>		
	<form method="get" action="http://searchvu.vanderbilt.edu/search" class="round">
	<input class="searchbox" name="q" maxlength="256" value="SEARCH" type="text" onfocus="clearDefault(this)" tabindex="1" accesskey="4"/>
	<input type="hidden" name="site" value="default_collection" />
	<input type="hidden" name="client" value="default_frontend" />
	<input type="hidden" name="proxystylesheet" value="default_frontend" />
	<input type="hidden" name="output" value="xml_no_dtd" />
	<button class="btn" title="Submit Search">GO</button>	
	</form>
<?php } ?>	


<?php 
// show homepage widgets
if ( (is_active_sidebar('home-sidebar-widgets')) && (is_front_page()) ) : dynamic_sidebar('home-sidebar-widgets'); endif; 

// show widgets - but not on home
if ( (is_active_sidebar('pages-sidebar-widgets')) && (!is_front_page()) ) : dynamic_sidebar('pages-sidebar-widgets'); endif; 

// show widgets on all
if (is_active_sidebar('all-sidebar-widgets')) : dynamic_sidebar('all-sidebar-widgets'); endif; 

// if right navigation style is chosen
if (get_option('vubrand_navstyle') == 'right') { include(TEMPLATEPATH . '/rightnav.php'); }

// is calendar tag provided and turned on
if(get_option('vubrand_calendaron') == 'true') { 

		$xslpath = get_bloginfo('stylesheet_directory')."/parse-vu-calendar.xsl";
		$caltag = get_option('vubrand_calendartag');
		 $xp = new XsltProcessor();
		  $xsl = new DomDocument;
		  // XSL displays date, time and event title
		  $xsl->load($xslpath); 
		  $xp->importStylesheet($xsl);  
		  $xml_doc = new DomDocument; 
		  // XML for group of events you want to display - 
		$xml_doc->load('http://calendar.vanderbilt.edu/calendar/rss/set/3?xtags='.$caltag);  
		  if ($html = $xp->transformToXML($xml_doc)) { 
		  	if($html!='') { 
		  	echo "<h4>Upcoming Events</h4>"; 
		  	echo "<ul>"; 
		  	echo $html; 
		  	echo "<li class='more'><a href='http://calendar.vanderbilt.edu/calendar/list?xtags=".$caltag."&amp;tagname=".bloginfo('name')."'>MORE &raquo;</a></li>"; 
		  	echo "</ul>"; 
		  	}
		  	} 
		  // else  { trigger_error('XSL transformation failed.', E_USER_ERROR); }  
  

} 

if ((get_option('vubrand_sitetype') == 'Blog')) { 
// TAG CLOUD  - turned off by default
echo '<h4>Tag Cloud</h4>'; 
echo get_my_tags(); 
}

// if is a page AND top nav chosen AND it is not the homepage - show subpages
if ( (get_option('vubrand_navstyle') == 'top') && (!is_front_page()) && (is_page()) ) { include(TEMPLATEPATH . '/rightchildpages.php'); } 

// display a news feed in the right column if its turned on for Department -- or if the site is a blog
if ((get_option('vubrand_sitetype') == 'Blog') || (get_option('vubrand_newsrightcol') == 'true')) { 
	include(TEMPLATEPATH . '/newsdisplay.php');  
	} 


if (is_active_sidebar('right-bottom-sidebar-widgets')) { 

	echo '<div class="rssnews">'; 
		dynamic_sidebar('right-bottom-sidebar-widgets'); 
	echo '</div>'; 
	
	}  
	
?>
</div><!-- /secnav -->