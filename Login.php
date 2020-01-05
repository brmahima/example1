<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include "config.php";


$phone = $_POST['phone'];




$query = "select *from users where phone='".$phone."'";
$result = mysqli_query($connect,$query);

if($result)
{
    while ($row = mysqli_fetch_assoc($result)) {
        $name =$row['name'];
        $pass=$row['pass'];
	
        
    }
    
    echo json_encode(array("Query"=>"Sucess","name"=>$name,"pass"=>$pass));
}
 else {

    echo json_encode(array("Query"=>"Faild"));
    echo mysqli_error($connect);
}

mysqli_free_result($result);
mysqli_close($connect);
?>
