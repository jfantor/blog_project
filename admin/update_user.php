<?php
include 'header.php';
include "conn.php";

// $user_id = $_GET['id'];

$sqli=$conns->prepare("SELECT*FROM user where user_id= :a");
$sqli->bindparam(':a',$_GET["id"]);
$sqli->execute();
$result=$sqli->fetchall();
// var_dump($result);
if(isset($_POST["save"])){
    $sql=$conns->prepare("UPDATE `user` SET first_name = :a , last_name = :b , username = :c , role = :d 
     WHERE user_id = :e ");
    $sql->bindparam(':a',$_POST['fneme']);
    $sql->bindparam(':b',$_POST["lneme"]);
    $sql->bindparam(':c',$_POST["uneme"]);
    $sql->bindparam(':d',$_POST["role"]);
    $sql->bindparam(':e',$_POST["user_id"]);
    $sql->execute();
    header("location: {$hostname}/admin/user.php");
}

?>
<div class="container up-user">
    <div class="row">
        <div class="col-md-offset-3 col-md-6">
            <h1 class="user-heading">Update User</h1>
        </div>
        <div class="col-md-offset-3 col-md-6">
            <?php foreach($result as $row){ ?>
            <form action="update_user.php" class="user-input" method="post">
                        
                      <div class="form-group">
                          <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['user_id'];  ?>">
                      </div>
                        <div class="from-group">
                            <label>Fasrt Name</label>
                            <input type="text" name='fneme' class='form-control' value = '<?php echo $row["first_name"] ; ?>' >
                        </div>
                        <div class="from-group">
                            <label>last Name</label>
                            <input type="text" name='lneme' class='form-control' value= '<?php echo $row["last_name"];?>' required>
                        </div>
                        <div class="from-group">
                            <label>User Name</label>
                            <input type="text" name='uneme' class='form-control' value= '<?php echo $row["username"];?>' required>
                        </div>
                        <div class="from-group">
                            <label>Fasrt Name</label>
                            <select name="role"  class="form-control">
                            <?php
                              if($row['role'] == 1){
                                echo "<option value='0'>normal User</option>
                                      <option value='1' selected>Admin</option>";
                              }else{
                                echo "<option value='0' selected>normal User</option>
                                      <option value='1'>Admin</option>";
                              }
                            ?>
                            </select>
                        </div>
                        <input type="submit" name="save" class = "btn btn-primary" value="save">
                

            </form>
            <?php } ?>
        </div>
    </div>
</div>




<?php 
include 'footer.php';
?>
