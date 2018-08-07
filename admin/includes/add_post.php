<?php
if(isset($_POST['create_post'])){
     
    
    $post_title =mysqli_real_escape_string($connection,$_POST['post_title']);
	$post_category_id    = $_POST['post_category_id'];
	$post_author=mysqli_real_escape_string($connection,$_POST['post_author']);
	$post_status = mysqli_real_escape_string($connection,$_POST['post_status']);

	$post_image          = $_FILES['post_image']['name'];
	$post_image_temp     = $_FILES['post_image']['tmp_name'];

	$post_tags     = mysqli_real_escape_string($connection,$_POST['post_tags']);
	$post_content=mysqli_real_escape_string($connection, $_POST['post_content']);
	
    $post_date           = date('d-m-y');
    $post_comment_count  = 4;
    
    move_uploaded_file($post_image_temp,"../images/$post_image");
    
    $query = "INSERT INTO posts(post_title,post_category_id,post_author,post_status,post_image,post_tags,post_content,post_date,post_comment_count)";
    $query .= "VALUES('{$post_title}',{$post_category_id}, '{$post_author}', '{$post_status}', '{$post_image}', '{$post_tags}', '{$post_content}', now(),  {$post_comment_count})";
    
    $post_create_query = mysqli_query($connection,$query);
    check_query_errors($post_create_query);
    
      
}
 
?>
   
 
   
   <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title" id="post_title">
    </div>
    <div class="form-group">
      	<h3 style="display:inline;"> <label class="label label-info" for="post_category">Select Post Category</label></h3>&nbsp;
        <select name="post_category_id"  id="post_category">
        <?php 
			$query="SELECT * FROM categories";
                $select_categories_by_id = mysqli_query($connection, $query);
			   check_query_errors($select_categories_by_id);
                while($row= mysqli_fetch_assoc($select_categories_by_id)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
			?>
			
			<option value="<?php echo $cat_id ?>"><?php echo $cat_title ?></option>
			
			
			<?php	} ?>
	 
        </select>
    </div>
    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" class="form-control" name="post_author" id="post_author">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status" id="post_status">
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" class="form-control" name="post_image" id="post_image" accept="image/*">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" id="post_tags">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea   class="form-control" name="post_content" id="post_content" cols="30" rows="10"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-lg" name="create_post" value="Publish Post">
    </div>
    
    
</form>