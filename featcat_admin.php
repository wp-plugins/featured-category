<html>
<head>
<style>
div.featcat_style{
	padding: 10px;
}
div.featcat_style{
	padding: 5px;
	background: #EBEBEB;
	margin: 10px;
	width:600px;
	font-family: Calibri,Helvetica,Arial,sans-serif;
	float: left; 
}
div.banner{
	padding 5px;
	margin-left: 10px;
	margin-top: 15px;
	font-family: Calibri,Helvetica,Arial,sans-serif;
}
h1{
	margin: 0;
}
h2{
	margin: 0;
}
</style>
</head>
<?php 
//Load settings, etc
$this_page = $_SERVER['PHP_SELF'].'?page='.$_GET['page'];
$num_posts = get_option("featcat_num_posts");
$title = get_option("featcat_title");
$selected_cat = get_option("featcat_category_id");
$widget_style = get_option("featcat_style");

//If admin options updated (uses hidden field)
if ('process' == $_POST['stage']) {
    update_option('featcat_num_posts', $_POST['num_posts']);
    update_option('featcat_title', $_POST['title']);
    update_option('featcat_category_id', $_POST['category']);
	update_option('featcat_style', $_POST['style']);
	
	$num_posts = get_option("featcat_num_posts");
	$title = get_option("featcat_title");
	$selected_cat = get_option("featcat_category_id");
	$widget_style = get_option("featcat_style");
}
?>
<body>
<div class="banner"><h1>Featured Category 1.1 Settings</h1></div>
<form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>&updated=true">
<div class="featcat_style">
<h2>Settings</h2>
<h3>These are rather important.</h3>
  <div style="float:left"><strong>Number of posts to display:</strong><br/>
<input type="text" name="num_posts" value="<?php  echo $num_posts; ?>" />
<input type="hidden" name="stage" value="process" />
  </div>
  <div style="float:left; padding-left:10px;"><strong>Featured Category:</strong><br />
    <label>
      <select name="category" id="category">
      <?php
		$categories=  get_categories(); 
	  	foreach ($categories as $cat) {
			if($selected_cat == $cat->cat_ID) {
				$option = '<option selected="selected" value="'.$cat->cat_ID.'">';
			}
			else {
				$option = '<option value="'.$cat->cat_ID.'">';
			}
		$option .= $cat->cat_name;
		$option .= ' ('.$cat->cat_ID.')';
		$option .= '</option>';
		echo $option;
		}
	  ?>
	  </select>
    </label>
  </div>
  <div style="clear:both;"><p><strong>Title text: (leave blank if you do not want to display a title heading)</strong><br />
  <input type="text" name="title" size="65" value="<?php  echo $title; ?>" />
  </p></div>
  <p><strong>Style Sheet</strong><br />
<textarea name="style" cols="70" rows="15" id="style"><?php  echo stripslashes($widget_style); ?></textarea>
  </p>
  <input type="submit" name="button_submit" value="<?php _e('Update Options', 'Featured-Category') ?> &raquo;" />
</form>
<h3>Styling Tips</h3>
<h4>Modifying the way the widget displays fairly easy if you know CSS. Here are some ideas to get you started.</h4>
<p>By default, Featured Category displays the requested posts in a bullet point list. Don't let this fool you though. You can control exactly how this is displayed using CSS.</p>
<p>For instance, if you wanted to display the links horizontally instead of vertically you could go to the li.featcat portion of the CSS file and add this:</p>
		
<pre>li.featcat  {
display:inline;
}</pre> 

<p>By default, li elements are displayed with block formatting meaning each element is displayed on a separate line. Setting the display attribute to inline changes this behavior.</p>

<p>If you would prefer to not display the posts in a box, you can remove the background and border related attributes from the main CSS block div.featcat.</p>

<p>To demonstrate that there are no limits, it is also possible to use abolute positioning to put the div anywhere on the page you wish. While this typically isn't a good idea (most sites you fluid layouts), it is still an option. To do this you could specify something like this:
<pre>div.featcat{
position:absolute;
left:0;
top:0;
width:inherit; 
background-color:#FFFFD9; 
border:dotted; 
border-color:#666; 
border-width:thin;
margin-bottom: 20px;
}
</pre>
<p>While I am no CSS ninja, I have attempted to provide a default template the gives you the flexibility of being able to have specific control over how the plugin looks and feels without doing any hacks. </p>
		<p>I hope you found this useful.</p>
		<p>Regards,<br>
		  Clifton Griffin
		</p>
</div>
</body>
</html>