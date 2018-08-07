<?php include 'includes/admin_header.php'?>
    <div id="wrapper">
       
        <!-- Navigation -->
        <?php include 'includes/admin_navigation.php'?>
          
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Admin Page
                            <small>Author</small>
                        </h1>
  
                        <div class="col-lg-6">
                           <?php insert_categories();?>
                             
                            <form action="categories.php" method="post">
                               <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input type="text" class="form-control" name="cat_title" id="cat_title">
                               </div>
                                <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                               
                            </form>
            <?php
                // Update and include query
            if(isset($_GET['edit'])){
                $cat_id = $_GET['edit'];

                include "includes/update_categories.php";
            }
            ?>
                        </div>
                       <!--  add category from -->
                       <div class="col-lg-6">
                           <table class="table table-bordered table-hover">
                               <tr>
                                   <th>Category ID</th>
                                   <th>Category Title</th>
                                    
                               </tr>
                             
                <?php //CATEGORY SELECT QUERY 
                find_all_categories(); 
                ?>
                 <?php // CATEGORY DELETE QUERY 
                delete_categories();
                ?>
                           </table>
                       </div> 
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

   <?php include 'includes/admin_footer.php'  ;

 
?>