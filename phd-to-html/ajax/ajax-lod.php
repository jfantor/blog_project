<?php
include "conn.php";

$sql = "SELECT * FROM user";
$result= mysqli_query($conn,$sql) or die("SQL Query Failed .");

if(mysqli_num_rows($result))

?>