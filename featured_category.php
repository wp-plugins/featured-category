<?php
/*
Plugin Name: Featured Category
Plugin URI: http://clifgriffin.com/index.php/2008/10/05/featured-category/
Description: Displays a configurable list of the recent posts from a category of your choosing. This will help you highlight things such as site news, or something specific to the content you produce.
Version: 1.1
Author: Clifton H. Griffin II
Author URI: http://clifgriffin.com
*/
/*  Copyright 2008  Clifton H. Griffin II  (email : webmaster@clifgriffin.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//Activation hook function

function featcat_activation_hook()
{
	//Store settings
	add_option("featcat_title", "Recent News");
	add_option("featcat_num_posts", 5);
	add_option("featcat_category_id", 5);
	add_option("featcat_style", "<style type='text/css'>
div.featcat  {
width:inherit; 
background-color:#FFFFD9; 
border:dotted; 
border-color:#666; 
border-width:thin;
margin-bottom: 20px;
}
h3.featcat  {
margin-left:5px;
}
ul.featcat  {
}
li.featcat  {
}
A:link.featcat {
}
A:visited.featcat {
}
A:active.featcat {
}
A:hover.featcat {
}
</style>");
}

//Admin
function featcat_menu()
{
	include 'featcat_admin.php';
}
function featcat_admin_actions()
{
    add_options_page("Featured Category", "Featured Category", 10, "Featured-Category", "featcat_menu");
}

add_action('admin_menu', 'featcat_admin_actions');

//Set a global variable. We want to run it only once per page. 
function featcat_setglobal()
{
	global $featcat_is_first_run;
	$featcat_is_first_run = true;
}

add_action('init', 'featcat_setglobal');

//Where it all happens
function featcat_main()
{
	global $featcat_is_first_run;
	
	//Don't waste resources if we're not on the home page.	
	if($featcat_is_first_run == true)
	{		
		if ( is_home() ) 
		{	
			global $post;
			$temp_post = $post;
			
			//Load options	
			$category = get_option("featcat_category_id");
			$num_posts = get_option("featcat_num_posts");
			$title = get_option("featcat_title");
			
			//Make a new query object so as not to upset the loop.
			$my_query = new WP_Query("cat=".$category."&showposts=".$num_posts);

			//Let's do it		
			echo "<div class=\"featcat\">";
			if($title != "")
			{
				echo  "<h3 class=\"featcat\">".$title."</h3>";
			}

			echo "<ul class=\"featcat\" >";
			
			//We do not use The Loop (TM) because doing so creates an infinite loop as we are already in a loop.
			foreach ($my_query->posts as $cpost)
			{
				setup_postdata($cpost);
				echo "<li class=\"featcat\" >";
				echo "<a class=\"featcat\" href=\"";
				echo get_permalink($cpost->ID);
				echo "\">";
				echo $cpost->post_title;
				echo "</a>";
				echo "</li>";
			}

			echo "</ul>";
			echo  "</div>";

			$post = $temp_post;

			//Keep The_Loop from breaking
			setup_postdata($post);
			$featcat_is_first_run = false;
		}
	}
}
//Add function
add_action('loop_start', 'featcat_main');

//Make it pretty
function featcat_css() 
{
	if( is_home() )
	{
		echo stripslashes(get_option("featcat_style"));
	}
}

//Add function
add_action('wp_head', 'featcat_css');

//Installing it
register_activation_hook( __FILE__, 'featcat_activation_hook' );
?>