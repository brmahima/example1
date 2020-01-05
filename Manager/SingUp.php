<?php

include "config.php";

$user_name=$_POST['user_name'];
$name=$_POST['name'];
$phone=$_POST['phone'];
$password=$_POST['pass'];
$R_id=$_POST['R_id'];


$query1 = "insert into delivery(user_name,name,phone,pass,state,R_id) values ('".$user_name."','".$name."','".$phone."','".$password."','nonav','".$R_id."')";
$result=mysqli_query($connect,$query1);

if(! $result)
{
    echo json_encode(array("Query"=>"Error"));;
     echo mysqli_error($connect);
}
 else {
     
   

     echo json_encode(array("Query"=>"Sucess","connection"=>$ConState));
    
   
}


mysqli_close($connect);

?>
