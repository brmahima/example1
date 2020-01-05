<?php

include "config.php";

$R_id = $_GET['R_id'];
$GetRest = "select * from  orders where R_id like '".$R_id."' and state  like 'delivered' ";
 
$results = mysqli_query($connect,$GetRest);

if(!$results)
{
    echo json_encode(array("Order_Q"=>"GetOreder_Error"));
    die();
}
 
else {
  setJson($results);  
}
	function setJson($res)
{
   $order = array();
   
    $i=0;
   while($row= mysqli_fetch_assoc($res))       
   {
       $order[$i]=new Order();
       $order[$i]->O_id = $row['O_id'];
       $order[$i]->O_price = $row['O_price'];
       $order[$i]->O_del = $row['P_Delivery'];
       $order[$i]->Pay_State = $row['Pay_State'];

       $i++;

   }
   
   echo json_encode(array("Order_Q"=>"Sucess","Orders"=>$order));
  
}
class Order
{
    
     public $O_id;
     public $O_price; 
     public $O_del ; 
     public $Pay_State; 
	 
     
     
     
     function __construct() {
         
}
 }

?>