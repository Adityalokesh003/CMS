                        <table class="table table-bordered table-hover" >
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Comment</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>In Response to</th>
                                <th>Date</th>
                                <th>Approve</th>
                                <th>Unapprove</th>
                                <th>Delete</th>
                            </tr>
                            
             <?php 
                $query="SELECT * FROM comments";
                $select_comments_query = mysqli_query($connection, $query);

                while($row= mysqli_fetch_assoc($select_comments_query)){
                    $comment_id = $row['comment_id'];
                    $comment_post_id = $row['comment_post_id'];
                    $comment_author = $row['comment_author'];
                    $comment_content = $row['comment_content'];
                    $comment_email = $row['comment_email'];
                    $comment_status = $row['comment_status'];
                    $comment_date = $row['comment_date'];
                ?>  
                             <tr>
                               <td><?php echo $comment_id ?></td>
                               <td><?php echo $comment_author ?></td>
                               <td><?php echo $comment_content ?></td>
              <?php 
								 
			/*$query="SELECT * FROM categories WHERE cat_id = {$post_category_id}";
			$select_category = mysqli_query($connection,$query);
			while($row= mysqli_fetch_assoc($select_category)){
				$cat_title = $row['cat_title'];*/
			
							 
			?>
<!--               <?php ?>         -->
                               <td><?php echo $comment_email ?></td>  
                               <td><?php echo $comment_status ?></td>
                               <td><?php echo $comment_post_id ?></td>
                               <td><?php echo $comment_date ?></td>
                               
                                
                               <td><a href="posts.php?source=edit_post&p_id=<?php echo  ?>">Approve</a></td>
                               <td><a href="posts.php?source=edit_post&p_id=<?php echo  ?>">Unapprove</a></td>
                               <td><a href="posts.php?delete=<?php echo  ?>">Delete</a></td>
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
  