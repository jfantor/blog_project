<?php
include 'header.php';
include "conn.php";
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a href="add-category.php" class="add-new">Add Categories</a>
            </div>
            <div class="col-md-12">
                <?php

                    include "conn.php";
                    
                    $limit=3;
                    if(isset($_GET['page'])){
                        $page=$_GET["page"];
                    }
                    else{
                        $page=1;
                    }
                    $offset = ($page - 1) * $limit;

                    //select query with offset and limit

                    $sql = "SELECT * FROM category order by category_id DESC LIMIT {$offset},{$limit}";
                    $result=mysqli_query($conn , $sql) or die("Quary failed .");
                    if(mysqli_num_rows($result) > 0){
                        ?>

                        <table class="category-table">
                            <thead class="c-t-head">
                                <th>S.No.</th>
                                <th>Category Name.</th>
                                <th>NO. Of Post.</th>
                                <th>Edit</th>
                                <th>Delete.</th>
                            </thead>
                            <tbody class="c-t-body">
                                <?php
                                $serial = $offset + 1;
                                 while($row = mysqli_fetch_assoc($result)){
                                ?>
                                
                                <tr>
                                    <td class='id'><?php echo $serial;?></td>
                                    <td><?php echo $row["category_name"];?></td>
                                    <td><?php echo $row["post"];?></td>
                                    <td class='edit'><a href='update-category.php?id=<?php echo $row["category_id"]; ?>'><i class= 'fa fa-edit'></i>EDIT</a></td>
                                    <td class='edit'><a href='delete_cat.php?id=<?php echo $row["category_id"]; ?>'><i class= 'fa fa-edit'></i></i>DELET</a></td>
                                </tr>
                                
                                <?php
                                 $serial++ ;
                                 }    
                                 
                                ?>
                            </tbody>
                        </table>
                        <?php

                    }else{
                        echo "<h3>NO Result Found.</h3>";
                    }
                    //select count() query for pagination

                    $sqli = "SELECT * FROM category";
                    $results=mysqli_query($conn, $sqli) or die("Query Failde.");
                    
                    if(mysqli_num_rows($results) > 0){
                        $total_records = mysqli_num_rows($results);
                        $total_pages = ceil($total_records / $limit);

                        echo "<ul class='pagination admin-pagitaion'>";
                        if($page > 1){
                            echo "<li><a href='category.php?page=".($page -1)."'>Prev</a></li>";

                        }
                        for($i = 1; $i <=$total_pages; $i++){
                            if($i==$page){
                                $active = "active";
                            }else{
                                $active = '';
                            }
                            echo '<li class="'.$active.'"><a href="category.php?page='.$i.'">'.$i.'</a></li>';
                        }
                        if($total_pages > $page){
                            echo '<li><a href="category.php?page='.($page + 1).'">Next</a></li>';
                        }
      
                        echo '</ul>';
                      

                    }
                    
                    
                    // if($total_record>$limit){
                    //     for($i; $i<=$total_page ; $i++){
                    //         if($i== $page){
                    //         $cls = "btn-primary active";
                    //     }else{
                    //         $cls="btn-primary";
                    //     }
                    //     echo "<li> <a href='category.php?page=".$i."'class='{$cls}'>$i</a></li>";
                    // }
                    // }
                    // if($total_page>$page){
                    //     echo "<li> <a href='category.php?page=".($page+1)."'>Next</a></li>";

                    // }
                    // echo "</ul>";
                ?>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>
