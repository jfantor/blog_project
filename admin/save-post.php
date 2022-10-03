<?php
include "conn.php";
if(isset($_FILES['fileToUpload'])){
    $errors = array();

    $file_name = $_FILES['fileToUpload']['name'];
    $file_size = $_FILES['fileToUpload']['size'];
    $file_tmp = $_FILES['fileToUpload']['tmp_name'];
    $file_type = $_FILES['fileToUpload']['type'];
    $tmp_ext = explode('.',$file_name);
    $file_ext = end($tmp_ext);


    $extentions = array("jpeg",'jpg','png');

    if(in_array($file_ext,$extentions) ===false){
        $errors[]="This extension file not allowed , please choose jpeg , jpg , png file . ";
    }
    if($file_size > 2097152){
        $errors[]="file size must be 2md or lower .";

    }
    $new_name=time()."-".basename($file_name);
    $target = "uplode/".$new_name;

    //echo $target;

    if(empty($errors)==true){
        move_uploaded_file($file_tmp,$target);

    }else{
        print_r($errors);
        die();
    }
}

session_start();
$titel = mysqli_real_escape_string($conn,$_POST['post_title']);
$description = mysqli_real_escape_string($conn,$_POST['description']);
$category = mysqli_real_escape_string($conn,$_POST['category']);
$date = date("d M,Y");
$author = $_SESSION["user_id"];

$sql="INSERT INTO post(title,description,category,post_date,author,post_img) 
    value('{$titel}','{$description}','{$category}','{$date}',{$author},'{$new_name}');";
$sql.="UPDATE category set post=post + 1 where category_Id={$category}";

if(mysqli_multi_query($conn,$sql)){
    header("location: {$hostname}/admin/post.php");
}else{
    echo "<div class='alert alert-denger'> Query Failed . </div>";
}
?>