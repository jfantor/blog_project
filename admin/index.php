<?php
include "conn.php";
session_start();

// if(isset($_SESSION["username"])){
//     header("location: {$hostname}/admin/post.php");
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN \ LOGIN</title>
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/font-awesome.css">

</head>
<body>
    <section id="login_panel" class="login_content">
        <div class="container loginn-con">
            <div class="row login-row">
                <div class="col-md-offset-4 col-md-4">
                     

                <!-- forme starrt------- -->
            <form action="<?php $_SERVER["PHP_SELF"] ?>" method="post">
            <div class="frome-group">
                <label>user Name</label>
                <input type="text" name="user_name" class="form-control" placeholder="" required>
            </div>
            <div class="frome-group">
                <label>password</label>
                <input type="password" name="password" class="form-control" placeholder="" required>
            </div>
            <input type="submit" name="login" class="btn btn-primary" value="Login">
            </form>
            <!-- from end heare -->
            <!-- start php code -->
            <?php
                if(isset($_POST['login'])){
                    include "conn.php";
                    if(empty($_POST['user_name']) || empty($_POST["password"])){
                        echo '<div class"alert alert-denger">   ALL Finds must be entered . </div>';
                        die();
                    }else{
                        $username = mysqli_real_escape_string($conn,$_POST['user_name']);
                        $password = md5($_POST["password"]);


                        $sql = "SELECT user_id , username , role FROM user where username= '{$username}' and password= '{$password}'";

                        $result = mysqli_query($conn , $sql) or die("Query Faild.");
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                session_start();
                                $_SESSION["username"] = $row['username'];
                                $_SESSION["user_id"] = $row['user_id'];
                                $_SESSION["user_role"] = $row['role'];

                                header ( "location: {$hostname}/");
                            }
                        }else{
                            echo '< div class= "alert alert-denger"> Username and password are not matched .<?div>' ; 
                        }

                    }
                }
            ?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>