<?php include "header.php"
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Category</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="cat" class="form-control" placeholder="category name" required>
                    </div>
                    <input type="submit" value="save" class="btn btn_primary" name='save' required>
                </form>
                <?php
                    if(isset($_POST['save'])){
                        include "conn.php";
                        $category = mysqli_real_escape_string($conn, $_POST["cat"]);
                         
                        //query for check input value exists in category

                        $sqli = "SELECT category_name FROM category where category_name='{$category}'";
                        $result= mysqli_query($conn, $sqli);
                        if(mysqli_num_rows($result) > 0){
                            echo "<P style='color:red;text-align:center; margin:10px 0';> Category Altedy exists . </p>";

                        }else{
                            $sql= "INSERT INTO category(category_name) value ('{$category}')";

                            if(mysqli_query($conn,$sql)){
                                header("location: {$hostname}/admin/category.php");

                            }else{
                                echo "<P style= 'color:red;text-align:center;margin:10px 0'>Query Faield. </p>";
                            }
                        }
                    }
                    
                ?>
            </div>
        </div>
    </div>
</div>



<?php include "footer.php"?>