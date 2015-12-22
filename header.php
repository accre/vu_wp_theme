<?php
/**
 * @package WordPress
 * @subpackage vanderbilt brand
 */
 // what pages should we hide?
$hidethese = get_option('vubrand_hidepages');
$whichbrand = get_option('vubrand_brandbar');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php wp_title('| ', true, 'right'); ?> <?php bloginfo('name'); ?> | Vanderbilt University</title>

<?php if (is_single() || is_page() ) : if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<meta name="description" content="<?php single_post_title('', true); echo ". "; the_excerpt_rss(); ?>" />
<?php csv_tags(); ?>
<?php endwhile; endif; elseif(is_home()) : ?>
<meta name="description" content="Vanderbilt University, located in Nashville, Tennessee, is a private research university and medical center offering a full-range of undergraduate, graduate and professional degrees." />
<meta name="keywords" content="vanderbilt, vanderbilt university, commodores, nashville, tennessee" />
<?php endif; ?>

<link rel="stylesheet" type="text/css" href="http://www.vanderbilt.edu/asset/css/vustylemin.css" media="screen" />
<link rel="stylesheet" type="text/css" href="http://www.vanderbilt.edu/asset/css/print.css" media="print" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#username=vanderbilt"></script>

<?php // if is home page and slider option is ON
if ( (get_option('vubrand_slideron') == 'true') && (is_front_page()) ) { ?>
<script src="<?php bloginfo('stylesheet_directory'); ?>/nivo/jquery.nivo.slider.pack.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/nivo/slideshow.css" type="text/css" media="screen" />
	<script type="text/javascript">
		$(window).load(function() {
       		 $('#myslideshow').nivoSlider( {
				effect:'random',
                slices:1,
                animSpeed:500,
                pauseTime:4500,
                directionNav:true,
                directionNavHide:true,
                controlNav:true
       	 } );
	});
	</script>
<?php } ?>
<!--[if lt IE 9]><script src="http://ie7-js.googlecode.com/svn/version/2.1(beta3)/IE9.js"></script>
<link rel="stylesheet" type="text/css" href="http://www.vanderbilt.edu/asset/css/ie.css" media="screen" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" href="http://www.vanderbilt.edu/asset/css/ie6.css" media="screen" />
<script src="http://www.vanderbilt.edu/asset/scripts/pngie.js"></script>
<![endif]-->
<!--[if lte IE 7]>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style-ie.css" type="text/css" media="screen" />
<![endif]-->
<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/scripts.js"></script>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<?php // Custom CSS block in Theme Options Page
if ( get_option('vubrand_customcss') <> "" ) {
	$output = "<style type='text/css'><!-- \n";
	$output .= get_option('vubrand_customcss') . "\n";
	$output .= "\n --></style>\n";
	echo $output;
}
?>
<?php wp_head(); ?>
</head>
<body>
<?php 
if($whichbrand=='Vanderbilt') { $brand='vu';}
elseif($whichbrand=='Blair') { $brand='blair'; }
elseif($whichbrand=='CAS') { $brand='cas'; }
elseif($whichbrand=='Divinity') { $brand='div'; }
elseif($whichbrand=='Engineering') { $brand='eng'; }
elseif($whichbrand=='Graduate') { $brand='grad'; }
elseif($whichbrand=='Law') { $brand='law'; }
elseif($whichbrand=='Medicine') { $brand='som'; }
elseif($whichbrand=='Nursing') { $brand='son'; }
elseif($whichbrand=='Owen') { $brand='owen'; }
elseif($whichbrand=='Peabody') { $brand='peabody'; }
else { $brand='vu'; }
?>
<script type="text/javascript" src="http://www.vanderbilt.edu/asset/<?php echo $brand;?>brandbar.js"></script>


<div id="content">

<?php // if top navigation style is chosen
if (get_option('vubrand_graphicheader') == 'true') { ?> 
<div class="graphicheader clear" style="background: #<?php echo get_option('vubrand_headercolor'); ?>; ">
	<div class="container">
	<a href="<?php bloginfo('url'); ?>"><img src="<?php echo get_option('vubrand_headerimage'); ?>" width="950" border="0"/></a>
	</div>
</div>

<?php } else // use text header
 { ?> 
 
<div class="header clear">
	<div class="container"> 
		<h1 class="plain"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
		
<?php // if Wordpress Search chosen
if (get_option('vubrand_searchmethod') == 'Wordpress Search') { ?>
	<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/" class="round">
   <input type="text" value="SEARCH" onfocus="clearDefault(this)" name="s" id="s" class="searchfield" />
   <button class="btn" title="Submit Search">GO</button>
	</form>	
<?php } else { ?>
	<form method="get" action="http://searchvu.vanderbilt.edu/search" class="round">
	<input class="searchbox" name="q" maxlength="256" value="SEARCH" type="text" onfocus="clearDefault(this)" tabindex="1" accesskey="4"/>
	<input type="hidden" name="site" value="default_collection" />
	<input type="hidden" name="client" value="default_frontend" />
	<input type="hidden" name="proxystylesheet" value="default_frontend" />
	<input type="hidden" name="output" value="xml_no_dtd" />
	<button class="btn" title="Submit Search">GO</button>	
	</form>
<?php } ?>	

	</div> 
</div> 

<?php // end header choice
} ?>


<?php // if top navigation style is chosen
if (get_option('vubrand_navstyle') == 'top') { ?> 
<div id="sitenavigation" class="clearfix">
 <div class="container"> 
 
 	 <?php // are we using a manually built menu or auto building it 
	 	$menutype = get_option('vubrand_menusource');
	 	$whichmenu = get_option('vubrand_menuname');
	 if($menutype=='Manual') {
	 	wp_nav_menu(array('container'=>'false', 'menu'=>$whichmenu, 'sort_column' => 'menu_order', 'menu_id' => 'sitenav' ) ); 
	 } else { 
	 			echo '<ul id="sitenav">'; 
	 			
	 			if ((get_option('vubrand_sitetype') == 'Blog')) { 
	 					echo '<li><a href="#">Topics</a><ul>'; 
	 						wp_list_categories('orderby=name&title_li=');
	 					echo '</ul></li>';
	 			}
	 			
	 			
	 			wp_list_pages('title_li=&exclude='.$hidethese.'&depth=2');
	 			echo "</ul>"; 
	 }
	 ?>	
	 
</div>
</div>
<?php } ?>

<div class="container"> 
    <div id="seccontent">