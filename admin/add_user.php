<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD User</title>
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="../CSS/font-awesome.css">
</head>
<body>
    <?php
    if(isset($_POST["save"])){
        // include 'conn.php';

        // $role= mysqli_real_escape_string($conn,$_POST['role']);
        // echo $role ;

        include 'conn.php';


        $fname= mysqli_real_escape_string($conn,$_POST['fneme']);
        $lname= mysqli_real_escape_string($conn,$_POST['lneme']);
        $user= mysqli_real_escape_string($conn,$_POST['uneme']);
        $password= mysqli_real_escape_string($conn,md5($_POST['password']));
        $role= mysqli_real_escape_string($conn,$_POST['role']);
        echo $role ;


        $sql = "SELECT username from user where username= '{$user}'";

        $result = mysqli_query($conn,$sql) or die("Quety Falid .");

        if(mysqli_num_rows($result) > 0){
            echo "<p style='color:red;text-align:center; margin:10px 0;'>User name alredy Exists . </p>";

        }else{
            $sqli = "INSERT INTO user (first_name,last_name,username,password, role)
            values ('{$fname}','{$lname}','{$user}','{$password}','{$role}' )";
           
            if(mysqli_query($conn,$sqli)){
              


                        $sql = "SELECT user_id , username , role FROM user where username= '{$user}' and password= '{$password}'";

                        $result = mysqli_query($conn , $sql) or die("Query Faild.");
                        if(mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_assoc($result)){
                                session_start();
                                $_SESSION["username"] = $row['username'];
                                $_SESSION["user_id"] = $row['user_id'];
                                $_SESSION["user_role"] = $row['role'];

                            
                            }
                        }else{
                            echo '< div class= "alert alert-denger"> Username and password are not matched .<?div>' ; 
                        }
                header("location:{$hostname}/admin/user.php");
            }else{
                echo "<p style='color:red;text-align:center;margin:10px 0 ;'>Can't Insert User. </p>";
            }
        }

    }

    ?>


    <div id="admin-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="admin-heading">Add User</h1>
                </div>
                <div class="col-md-offset-3 col-md-6">
                    <form action="<?php  $_SERVER["PHP_SELF"] ; ?>" method="post" autocomplete='off'>
                        <div class="from-group">
                            <label>Fasrt Name</label>
                            <input type="text" name='fneme' class='form-control' placeholder= ' fast name' required>
                        </div>
                        <div class="from-group">
                            <label>last Name</label>
                            <input type="text" name='lneme' class='form-control' placeholder= ' last name' required>
                        </div>
                        <div class="from-group">
                            <label>User Name</label>
                            <input type="text" name='uneme' class='form-control' placeholder= ' User name' required>
                        </div>
                        <div class="from-group">
                            <label>password</label>
                            <input type="password" name='password' class='form-control' placeholder= ' password' required>
                        </div>
                        <div class="from-group">
                            <label>Fasrt Name</label>
                            <select name="role"  class="form-control">
                                <option value="0">normal user</option>
                                <option value="1">admin</option>
                            </select>
                        </div>
                        <input type="submit" name="save" class = "btn btn-primary" value="save">
                
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>