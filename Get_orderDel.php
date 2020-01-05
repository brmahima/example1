<?php

include "config.php";

//$RestId = $_GET['R_id'];
$GetRest = "select * from  orders where State like 'delivary' ";
 
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
       $order[$i]->name = $row['name'];
       $order[$i]->phone = $row['phone'];
       $order[$i]->price = $row['O_price'];
	   $order[$i]->lat = $row['lat'];
	   $order[$i]->longi = $row['longi'];
       $i++;

   }
   
   echo json_encode(array("Order_Q"=>"Sucess","Orders"=>$order));
  
}
class OrderDel
{
    
     public $id;
     public $name; 
     public $phone ; 
     public $lat; 
	 public $longi;
     public $price; 	 
     
     
     
     function __construct() {
         
}}
?>