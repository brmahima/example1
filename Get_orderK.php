<?php

include "config.php";

//$RestId = $_GET['R_id'];
$GetRest = "select * from  orders where State like 'in Kitchen' ";
 
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
       $order[$i]=new OrderDel();
       $order[$i]->id = $row['O_id'];
       $order[$i]->items = $row['O_item'];
       $i++;

   }
   
   echo json_encode(array("Order_Q"=>"Sucess","Orders"=>$order));
   mysqli_close($connect);
}
class OrderDel
{
    
     public $id;
     public $items;  
   	 
     
     
     
     function __construct() {
         
}}
?>