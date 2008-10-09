<html>
<head>
<style>
div.featcat_style{
	padding: 10px;
}
</style>
</head>
<?php 
//Load settings, etc
$this_page = $_SERVER['PHP_SELF'].'?page='.$_GET['page'];
$num_posts = get_option("featcat_num_posts");
$title = get_option("featcat_title");
$selected_cat = get_option("featcat_category_id");

//If admin options updated (uses hidden field)
if ('process' == $_POST['stage']) {
    update_option('featcat_num_posts', $_POST['num_posts']);
    update_option('featcat_title', $_POST['title']);
    update_option('featcat_category_id', $_POST['category']);
	$num_posts = get_option("featcat_num_posts");
	$title = get_option("featcat_title");
	$selected_cat = get_option("featcat_category_id");
}

?>
<body>
<div class="featcat_style">
<h2>Featured Category Settings</h2>
<hr />
<form method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>&updated=true">
  <p>Number of posts to display:<br />
<input type="text" name="num_posts" value="<?php  echo $num_posts; ?>" />
<input type="hidden" name="stage" value="process" />
  </p>
  <p>Featured Category:<br />
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
  </p>
  <p>Title text:<br />
  <input type="text" name="title" value="<?php  echo $title; ?>" />
  </p>
  <input type="submit" name="button_submit" value="<?php _e('Update Options', 'Featured-Category') ?> &raquo;" />
</form>
</div>
</body>
</html>