<?php

include "config.php";

$O_id = $_GET['O_id'];
$GetRest = "select * from  orders where O_id like '".$O_id."' ";
 
$results = mysqli_query($connect,$GetRest);

if(!$results)
{
    echo json_encode(array("Order_Q"=>"GetOreder_Error"));
    die();
}
 
else {
    
  while ($row = mysqli_fetch_assoc($results)) {
        $name =$row['P_Delivery'];
        $phone=$row['D_Phone'];
		$state=$row['State'];
	
        
    }
    
    echo json_encode(array("Order"=>"Sucess","name"=>$name,"phone"=>$phone,"state"=>$state));
 }

?>