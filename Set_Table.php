<?php

include 'config.php';

$R_id = $_POST['R_id'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$number = $_POST['number'];
$date = $_POST['date'];
$time = $_POST['time'];
$desc = $_POST['desc'];
if(isset($R_id)){
$query="insert into table_b(R_id,T_name,T_phone,P_number,date,time,description)"
     . " values('".$R_id."','".$name."','".$phone."','".$number."','".$date."','".$time."','".$desc."')";

$result=mysqli_query($connect,$query);
if($result){
	
	echo json_encode(array("Query"=>"sucess"));
}else
{
    echo json_encode(array("Query"=>"faild"));
    echo mysqli_error($connect);
}

}

mysqli_close($connect);
?>