	<?php
	if($_GET['p_id']){
		$post_id = $_GET['p_id'];
	
	 			$query="SELECT * FROM posts WHERE post_id = {$post_id}";
                $post_select_query = mysqli_query($connection, $query);

                while($row= mysqli_fetch_assoc($post_select_query)){
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_category_id = $row['post_category_id'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
					$post_content = $row['post_content'];
                    $post_tags = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_date = $row['post_date'];
				}

	}

if(isset($_POST['update_post'])){

	$post_title 	=mysqli_real_escape_string($connection,$_POST['post_title']);
	$post_category_id  	  = $_POST['post_category_id'];
	$post_author=mysqli_real_escape_string($connection,$_POST['post_author']);
	$post_status= mysqli_real_escape_string($connection,$_POST['post_status']);

	$post_image         = $_FILES['post_image']['name'];
	$post_image_temp    = $_FILES['post_image']['tmp_name'];

	$post_tags   = mysqli_real_escape_string($connection,$_POST['post_tags']);
	$post_content=mysqli_real_escape_string($connection, $_POST['post_content']);
		 

		move_uploaded_file($post_image_temp,"../images/$post_image");
		if(empty($post_image)){
			$query="SELECT * FROM posts WHERE post_id = {$post_id}";
			$select_image = mysqli_query($connection,$query);
			while($row= mysqli_fetch_assoc($select_image)){
				$post_image = $row['post_image'];
			}
			
		}
		
		$query = "UPDATE posts SET ";
		$query.= "post_title = '{$post_title}', ";
		$query.= "post_category_id = {$post_category_id}, ";
		$query.= "post_author = '{$post_author}', ";
		$query.= "post_status = '{$post_status}' , ";
		$query.= "post_image = '{$post_image}', ";
		$query.= "post_tags = '{$post_tags}', ";
		$query.= "post_date = now(),";
		$query.= "post_content = '{$post_content}'  ";
		$query.= "WHERE post_id = {$post_id} ";
		
		$update_post = mysqli_query($connection,$query);
		check_query_errors($update_post);
	}
	?>
   
   <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label  for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title" id="post_title" value="<?php echo $post_title ?>">
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
        <input type="text" class="form-control" name="post_author" id="post_author" value="<?php echo $post_author ?>">
    </div>
    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status" id="post_status" value="<?php echo $post_status ?>">
    </div>
    <div class="form-group">
        <label>Post Image</label><br>
        <img width="100" src="../images/<?php echo $post_image ?>" alt="image">
        
        <input type="file" class="form-control" name="post_image" id="post_image" accept="image/*">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" id="post_tags" value="<?php echo $post_tags ?>">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea   class="form-control" name="post_content" id="post_content" cols="30" rows="10"><?php echo $post_content ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary btn-lg" name="update_post" value="Update Post">
    </div>
    
    
</form>