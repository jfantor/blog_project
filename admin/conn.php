<?php
$hostname = "http://localhost/news-site/blog_project/";
$conn = mysqli_connect("localhost","root","","news-site") or die("connection faild : " .mysqli_connect_error());
$conns = new pdo("mysql:host=localhost;dbname=news-site","root","");

 //var_dump($conn);
?>