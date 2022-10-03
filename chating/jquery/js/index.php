<?php
$url="http://localhost/news-site/blog_project/chating/jquery/index.php";
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

$result=curl_exec($ch);
curl_close($ch);
$result=json_decode($result,true);
// echo '<pre>' ;
// print_r($result);
if(isset($result['status'])){
    if($result['status']==true){
        if(isset($result['result'])){
            if($result['result']==true){
                
                ?>
                <table>
                    <tr>
                        <td>ID</td>
                        <td>frist name</td>
                        <td>last name</td>
                        <td>email</td>
                        <td>date</td>
                    </tr>
                    <?php
                        foreach($result['data'] as $list){
                            echo "<tr> 
                                    <td>".$list['id']."</td>
                                    <td>".$list['firstname']."</td>
                                    <td>".$list['lastname']."</td>
                                    <td>".$list['email']."</td>
                                    <td>".$list['reg_date']."</td>
                                </tr>
                            
                            ";
                        }
                    ?>
                </table>```````````````````
                
                <?php
            }else{
                echo $result["data"];
            }
        }
    }else{

    }
}else{
    echo 'API is not working';
}
?>