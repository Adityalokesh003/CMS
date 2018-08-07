                        <table class="table table-bordered table-hover" >
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Post Category Name</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                            </tr>
                            
             <?php 
                $query="SELECT * FROM posts";
                $select_posts_query = mysqli_query($connection, $query);

                while($row= mysqli_fetch_assoc($select_posts_query)){
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_category_id = $row['post_category_id'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_date = $row['post_date'];
                ?>  
                             <tr>
                               <td><?php echo $post_id ?></td>
                               <td><?php echo $post_author ?></td>
                               <td><?php echo $post_title ?></td>
              <?php 
								 
			$query="SELECT * FROM categories WHERE cat_id = {$post_category_id}";
			$select_category = mysqli_query($connection,$query);
			while($row= mysqli_fetch_assoc($select_category)){
				$cat_title = $row['cat_title'];
			
							 
			?>
                               <td><?php echo $cat_title ?></td>  
                               
                       <?php }?>        
                               <td><?php echo $post_status ?></td>
                               <td><img width="100" src="../images/<?php echo $post_image ?>" alt="image"></td>
                               <td><?php echo $post_tags ?></td>
                               <td><?php echo $post_comment_count ?></td>
                               <td><?php echo $post_date ?></td>
                               <td><a href="posts.php?source=edit_post&p_id=<?php echo $post_id?>">Edit</a></td>
                               <td><a href="posts.php?delete=<?php echo $post_id?>">Delete</a></td>
                             </tr>
                   <?php }?>
                  
                    
                         </table>
                         
             <?php 
                if(isset($_GET['delete'])){
                           
                   $post_id = $_GET['delete'];
                   $query="DELETE FROM posts WHERE post_id = {$post_id}";
                   $post_delete_query = mysqli_query($connection, $query);
                           //check_query_errors($post_delete_query);
                           //header("refresh:0;url=posts.php");
                           header("Location: posts.php");
                         
                }     
                            
                            
                    ?>
  