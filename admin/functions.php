        
<?php //ADD CATEGORY QUERY


function insert_categories(){
    global $connection;
    if(isset($_POST['submit'])){
        $cat_title= mysqli_real_escape_string($connection,$_POST['cat_title']);
        if($cat_title=="" || empty($cat_title)){

            

        }else{

            $query = "INSERT INTO categories(cat_title)VALUE('{$cat_title}')";
            $insert_category_query = mysqli_query($connection,$query);
            header("Location: categories.php");
            if(!$insert_category_query){
                die("QUERY FAILED".mysqli_eror($connection));
            }
        }

    }
    
    
}




function find_all_categories(){
    global $connection;
        
     $query="SELECT * FROM categories";
                $select_categories_sidebar = mysqli_query($connection, $query);

                while($row= mysqli_fetch_assoc($select_categories_sidebar)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
    ?>  
                               
                <tr>
                   <td><?php echo $cat_id ?></td>
                   <td><?php echo $cat_title ?></td>
                   <td><a href="categories.php?delete=<?php echo $cat_id?>">Delete</a></td>
                   <td><a href="categories.php?edit=<?php echo $cat_id?>">Edit</a></td>
                </tr>
                                
        <?php 
            } 
    
}



function delete_categories(){
    global $connection;
    if(isset($_GET['delete'])){
       $the_cat_id = $_GET['delete'];
       $query = "DELETE FROM categories WHERE cat_id= {$the_cat_id}";
       $category_delete_query = mysqli_query($connection, $query);
       header("Location: categories.php");
    }

    
}


function check_query_errors($result){
    global $connection;
    if(!$result){
        die("QUERY FAILED ".mysqli_error($connection));
    }
}

        ?>