<?php
include "header.php";
?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add post</title>
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/font-awesome.css">
</head>
<body> -->
<div id="admin-contaier">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Post</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- ------form start -------- -->
                <form action="save-post.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="post_title">Title</label>
                        <input type="text" name="post_title" class="form-control" autocomplete= "off" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripton</label>
                        <textarea type="textarea" name="description" class="form-control" autocomplete= "off" rows="6" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="category">Descripton</label>
                        <select name="category" id="category" class="form-control">
                            <option disabled selected>Select category</option>
                            <?php
                                include "conn.php";
                                $sql="SELECT * FROM category";
                                $result= mysqli_query($conn,$sql) or die("Query faild");
                                    if(mysqli_num_rows($result) > 0){
                                        while($row=mysqli_fetch_assoc($result)){
                                    echo "<option value='{$row['category_id']}'>{$row['category_name']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="uplode-file">post image</label>
                        <input type="file" name="fileToUpload"   required>
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="save" required>
                    
                </form>
                <!-- ------form end -------- -->

            </div>
        </div>
    </div>
</div>   
</body>
</html>