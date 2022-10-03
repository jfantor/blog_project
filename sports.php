<?php
include "header.php";

include "conn.php"; 
                    // include connection 
                    $limit = 6;
                    if(isset($_GET['page'])){
                        $page = $_GET['page'];
                    }else{
                        $page = 1;
                    }
                    $offset = ($page - 1 ) * $limit;
                    $cat_id = $_GET['id'];
                    
                    // session_start();
                        $sql="SELECT post.post_id , post.post_img , post.title , post.description,post.post_date,
                        category.category_name,user.username,post.category FROM post 
                        LEFT JOIN category on post.category = category.category_id
                        LEFT JOIN user on post.author=user.user_id  where category_id= '{$cat_id}'
                        ORDER BY post.post_id  DESC LIMIT {$offset},{$limit} ";

                    

                    $result = mysqli_query($conn,$sql)or die("Query Failedhhhhhhhhhhhhh");

                    if(mysqli_num_rows($result) > 0){
                            $serial = $offset + 1;
                            while($row=mysqli_fetch_assoc($result)){

?>

<div class="container">
    <div class="row">
        
        <div class="col-md-6 blog-div">
            <div class="blog-item">
                <div class="containe">
                    <div class="row">
                        <div class="col-md-6 blog-img">
                            <img src="admin/uplode/<?php echo $row['post_img'];?>" alt="bloge img">
                        </div>
                        <div class="col-md-6 textaria">
                            <h1 class="titel-heading"><?php echo $row['title'] ; ?></h1>
                            <a href="admin/category.pnp"><i class="fa fa-tags"></i></i><?php echo $row['category_name'];?></a>
                            <a href="admin/category.pnp"><i class="fa fa-user"></i><?php echo $row['username'];?></a>
                            <a href="admin/category.pnp"><i class="fa fa-calendar"></i><?php echo $row['post_date'];?></a>
                            <p class='discriptoin'><?php echo $row['description'] ;?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
                    $serial++;
                }
                    }
                    else{
                        echo '<h3?>NO Result Found . </h3>';
                    }
                    //show paginarion

                    // if(isset($_SESSION["user_role"])){
                    //     if(($_SESSION["user_role"] == '1')){
                    //         //select query from post table for admin
    
                    //         $sqli="SELECT * FROM post";
                    //     }else{
                    //         //select query from post table to user
    
                    //         $sqli = "SELECT *FROM post where author = {$_SESSION['user_id']}";
                    //     }
                    //     $results= mysqli_query($conn,$sqli)or die("Query Faield .");
                    // }else{
                        $sqli = "SELECT * FROM post where category= '{$cat_id}' ";
                        $results = mysqli_query($conn,$sqli);
                    // }
                    
                    if(mysqli_num_rows($results) > 0){
                        $total_records = mysqli_num_rows($results);
                        
                        $total_page=ceil($total_records/$limit);

                        echo "<ul class='pagination admin-pagination'>";
                        if($page > 1){
                            echo "<li><a href='index.php?page=".($page -1)."'>prev</a></li>";
                        }
                        for($i=1;$i <=$total_page; $i++){
                            if($i== $page){
                                $active="active";
                            }
                            else{
                                $active="";
                            }
                            echo '<li class="'.$active.'"><a href="index.php?page='.$i.'">'.$i.'</a></li>';
                        }
                        if($total_page > $page){
                            echo '<li><a href="index.php?page='.($page + 1).'">Next</a></li>';
                        }
                        echo '</ul>';
                    }
                    ?>
    </div>
</div>

<?php

include "footer.php";
?>