<?php
include ('conn.php');

$sql="SELECT*FROM myguest";
$res=mysqli_query($conn, $sql);
$count=mysqli_num_rows($res);
header('content-type:application/json');
if($count > 0){
    while($row=mysqli_fetch_assoc($res)){
        $arr[] = $row;
    }
    echo json_encode(['status'=> true,'data'=>$arr,'result'=>'found']);
    
    
}else{
    echo json_encode(['status'=> true,'data'=>'no data found','result'=>'not']);
}
?>