<?php
$hostname = "http://localhost/news-site/blog_project/";
$conn = mysqli_connect("localhost","root","","practis-db") or die("connection faild : " .mysqli_connect_error());
$conns = new pdo("mysql:host=localhost;dbname=practis-db","root","");
?>