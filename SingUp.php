<?php

include "config.php";


$name=$_POST['name'];
$phone=$_POST['phone'];
$password=$_POST['pass'];

echo $username.$phone.$password;
$query1 = "insert into users(name,phone,pass) values ('".$name."','".$phone."','".$password."')";
$result=mysqli_query($connect,$query1);

if(! $result)
{
    echo json_encode(array("Query"=>"Sucess"));;
     echo mysqli_error($connect);
}
 else {
     
   

     echo json_encode(array("Query"=>"sucess","connection"=>$ConState));
    
   
}


mysqli_close($connect);

?>
