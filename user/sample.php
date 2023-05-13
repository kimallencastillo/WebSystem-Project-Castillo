<?php 

include("../db/db_connect.php");
/*$input = "2022-02-14 21:35:13";
$date = strtotime($input);
echo date('M/d/Y h:i:s', $date);*/
$query = "SELECT * FROM user_account ORDER BY created_at";
$result = mysqli_query($con, $query);
		
$type = "User";
$user = "user";
if(mysqli_num_rows($result) > 0):
    while($value = mysqli_fetch_array($result)) :
        if($user === $value['username']){
        if($value['type'] === 'User'){
            echo $value['username'];
        }
    }elseif(!$user === $value['username']){
        echo 'Not Working';
    }
    endwhile;
endif;

?>