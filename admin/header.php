
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../CSS/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
         crossorigin="anonymous" referrerpolicy="no-referrer" />
         <link rel="stylesheet" href="../CSS/bootstrap.min.css">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <ul class="header-ul">
                            <li><a href="../index.php">home</a></li>
                            <li><a href="../sports.php">Sports</a></li>
                            <li><a href="../sports.php">Entertainment</a></li>
                            <li><a href="../sports.php">Politics</a></li>
                            <li><a href="../sports.php">Health</a></li>
                        </ul>
                    </div>
                    <div class="col-md-5">
                        <div class="login">
                            <?php
                            include "conn.php";
                            session_start();
                            // session_reset();
                            if(isset($_SESSION["user_role"]))
                            {?>
                                <a href="logout.php" class="admin-logout">Hello <?php echo $_SESSION["username"]; ?></a>
                                
                              <?php
                              }else{?>
                             <a href="index.php">Login</a>
                             <a href="add_user.php">sign up</a>
                            <?php
                            }
                            ?>
                            <a href="add_post.php">add post</a>
                            <a href="post.php">my post</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="control-penel">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ul class="penel-ul">
                            <li><a href="post.php">post</a></li>
                            <?php if($_SESSION['user_role'] == 1){ ?>
                            <li><a href="category.php">Category</a></li>
                            <li><a href="user.php">User</a></li>
                            <?php
                            }?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        
    
