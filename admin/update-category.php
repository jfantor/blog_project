<?php
include "header.php";
include 'conn.php';

$cat_id = $_GET['id'];
$sql=$conns->prepare("SELECT*FROM category  WHERE category_id ='{$cat_id}'");
$sql->execute();
$result=$sql->fetchall();

//var_dump($result);
?>
<div class="container">
    <div class="row">
        <?php foreach($result as $row){?>
        <form action="<?php $_SERVER['PHP_SELF']; ?>"  method="post">
            <div class="form-group">
                <input type="hidden" name="cat-id" class="form-control" value="<?php echo $row['category_id'];?>">
            </div>
            <div class="form-group">
                <input type="text" name="cat" class="form-control" value="<?php echo $row['category_name'] ;?>">
            </div>
            <input type="submit" name="save" value="save update">
        </form>
        <?php
        }
        if(isset($_POST['save'])){


            $email = $_POST['cat'];
            $stmt = $conns->prepare("SELECT * FROM category WHERE category_name=?");
            $stmt->execute([$email]); 
            $user = $stmt->fetch();
            if ($user) {
                echo "data faound";
            } else {
                $up_sql=$conns->prepare("UPDATE category SET category_name = :b WHERE category_id=:a");
                $up_sql->bindparam(':a',$_POST['cat-id']);
                $up_sql->bindparam(':b',$_POST['cat']);
                $up_sql->execute();
                
                header ("location:category.php");
            } 
              
        }
        ?>
    </div>
</div>


<?php
include "footer.php";
?>
  

