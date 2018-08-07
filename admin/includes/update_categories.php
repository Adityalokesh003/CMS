
          <?php   
          // CATEGORY UPDATE QUERY


    if(isset($_POST['update'])){
        $cat_title=mysqli_real_escape_string($connection, $_POST['cat_title']);
        
         
        if($cat_title=="" || empty($cat_title)){

            echo "<h3 style='color:red;'>This field should not be empty</h3>";

        }else{

            $query = "UPDATE categories SET cat_title= '{$cat_title}' WHERE cat_id ={$cat_id}";
            $update_category_query = mysqli_query($connection,$query);
             
            if(!$update_category_query){
                die("QUERY FAILED".mysqli_error($connection));
            }
        }
       

        }
 
          
      ?>
            <br>    
          <form action="" method="post">
           <div class="form-group">
            <label for="cat_title">Update Category</label>
                         
        <?php // CATEGORY SELECT QUERY 
                               
           if(isset($_GET['edit'])){
                
               $query = "SELECT * FROM categories WHERE cat_id= {$cat_id}";
               $category_select_query = mysqli_query($connection, $query);
               while($row=mysqli_fetch_assoc($category_select_query)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                
                   
        ?>        
                   
           <input type="text" class="form-control" name="cat_title" id="cat_title" value="<?php if(isset($cat_title)){echo $cat_title;}?>">        
        <?php      
            }
                
           
           }
                   
        ?> 
          
      
           </div>
            <input type="submit" name="update" class="btn btn-primary" value="Update Category">
         </form>
         
       
    