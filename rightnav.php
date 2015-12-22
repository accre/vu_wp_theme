<?php
/**
 * @package WordPress
 * @subpackage vanderbilt brand - RIGHT NAVIGATION CHOICE
 */

// show initial nav on front page
?>


<?php // are we using a manually built menu or auto building it 
	 	$menutype = get_option('vubrand_menusource');
	 	$whichmenu = get_option('vubrand_menuname');
	 	
	 // if manual menu -- pull it
	 if($menutype=='Manual') {
	 	wp_nav_menu(array('container'=>'false', 'menu'=>$whichmenu, 'sort_column' => 'menu_order') ); 
	 } 
	 
	 // otherwise automatically generate the menu
	 else { 
	 			// if its the front page -- generate the auto menu of top level pages
	 			if (is_front_page()) {	 			
			 			echo '<h4>Explore</h4><ul>'; 	 			
				 			wp_list_pages('title_li=&exclude='.$hidethese.'&depth=1');
			 			echo "</ul>"; 	
	 			}
	 			// if its an internal page -- pull the child pages
	 			else { 
		 			include(TEMPLATEPATH . '/rightchildpages.php');
		 			
	 			}
	 }
	 ?>	