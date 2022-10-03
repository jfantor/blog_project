<?php
include 'header.php';
if(isset($_SESSION["user_role"])){
   
 
?>
<body>
    <div class="admint-content">
        <div class="container">
            <div class="row">
                <div class=" col-md-10">
                    <h1 class="admin-heading">All Post</h1>

                </div>
                <div class="col-md-12">
                    <?php
                
                    include "conn.php"; 
                    // include connection 
                    $limit = 3;
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }else{
                        $page = 1;
                    }
                    $offset = ($page - 1 ) * $limit;
                    
                    // session_start();
                    if($_SESSION["user_role"]=="1"){
                        $sql="SELECT post.post_id , post.title , post.description,post.post_date,
                        category.category_name,user.username,post.category FROM post 
                        LEFT JOIN category on post.category = category.category_id
                        LEFT JOIN user on post.author=user.user_id 
                        ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
                    }
                    else{
                        $sql="SELECT post.post_id,post.title,post.description,post.post_date,
                        category.category_name,user.username,post.category FROM post 
                        LEFT JOIN category on post.category = category.category_id
                        LEFT JOIN user on post.author=user.user_id
                        where post.author = {$_SESSION['user_id']} 
                        ORDER BY post.post_id DESC LIMIT {$offset},{$limit}";
                    }

                    $result = mysqli_query($conn,$sql)or die("Query Failed");

                    if(mysqli_num_rows($result) > 0){


                    ?>
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th>B.NO</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Writer</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $serial = $offset + 1;
                            while($row=mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td class="id"> <?php echo $serial; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['category_name']; ?></td>
                                <td><?php echo $row['post_date']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td class = "edit" ><a href="update-post.php?id=<?php echo $row['post_id'];?>"> <i class="fa fa-pen-to-square"></i>Edit</a> </td>
                                <td class = "edit" ><a href="delete-post.php?id=<?php echo $row['post_id'];?> &catid=<?php echo $row["category"]; ?>"> <i class= "fa fa-edit"></i>Delete</a> </td>
                            </tr>
                            <?php
                            $serial++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                    }
                    else{
                        echo '<h3?>NO Result Found . </h3>';
                    }
                    //show paginarion

                    if($_SESSION["user_role"]=='1'){
                        //select query from post table for admin

                        $sqli="SELECT * FROM post";
                    }else{
                        //select query from post table to user

                        $sqli = "SELECT *FROM post where author = {$_SESSION['user_id']}";
                    }
                    $results= mysqli_query($conn,$sqli)or die("Query Faield .");
                    
                    if(mysqli_num_rows($results) > 0){
                        $total_records = mysqli_num_rows($results);
                        
                        $total_page=ceil($total_records/$limit);

                        echo "<ul class='pagination admin-pagination'>";
                        if($page > 1){
                            
                            echo "<li><a href='post.php?page=".($page -1)."'>Prev</a></li>";
                        }
                        for($i=1;$i <=$total_page; $i++){
                            if($i== $page){
                                $active="active";
                            }
                            else{
                                $active="";
                            }
                            echo '<li class="'.$active.'"><a href="post.php?page='.$i.'">'.$i.'</a></li>';
                        }
                        if($total_page > $page){
                            echo '<li><a href="post.php?page='.($page + 1).'">Next</a></li>';
                        }
                        echo '</ul>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
 }else{
    header("Location: {$hostname}/admin/index.php");
 }
include 'footer.php'
?>