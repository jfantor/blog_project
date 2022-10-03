<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>blog</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="CSS/bootstrap.min.css">
        <link rel="stylesheet" href="CSS/font-awesome.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />

    </head>
    <body>
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <ul class="header-ul">
                            <li><a href="index.php">home</a></li>
                            <?php  
                            include 'conn.php';
                                $sqli = $conns->prepare("SELECT*FROM category WHERE post > 0");
                                $sqli->execute();
                                $result=$sqli->fetchall();

                                foreach($result as $row){
                                    

                                
                                
                            ?>
                            <li><a href="sports.php?id=<?php echo $row["category_id"];?>"><?php echo $row["category_name"] ;?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="col-md-5">
                        <div class="login">
                            <?php
                            include "conn.php";

                            session_start();
                            //  $_SESSION["user_role"] ="";
                            if(isset($_SESSION["user_role"])){?>
                                <a href="admin/logout.php" class="admin-logout">Hello <?php echo $_SESSION["username"]; ?></a>
                                
                              <?php
                              }else{?>
                             <a href="admin/index.php">Login</a>
                             <a href="admin/add_user.php">sign up</a>
                            <?php
                            }
                            ?>
                            <a href="admin/add_post.php">add post</a>
                            <a href="admin/post.php">my post</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
   