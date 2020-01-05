<?php

require "Meals.inc";
include "config.php";

$type = $_GET['type'];
$R_id =$_GET['R_id'];
$getMeals = "select * from  Meals where `type` ='".$type."' and `R_id` ='".$R_id."' ";
 
$results = mysqli_query($connect,$getMeals);

if(!$results)
{
    echo json_encode(array("Meals_Q"=>"GetMeals_erro"));
    die();
}
 
else {
    
    setJson($results);
 }



function setJson($res)
{
   $meal = array();
   
    $i=0;
   while($row= mysqli_fetch_assoc($res))       
   {
       $meal[$i]=new Meals();
       $meal[$i]->id = $row['M_id'];
       $meal[$i]->name = $row['M_name'];
       $meal[$i]->price = $row['M_price'];
       $meal[$i]->image = "http://192.168.43.26/Rest/Manager/".$row['M_image'];
       $meal[$i]->desc = $row['M_desc'];
	    $meal[$i]->R_id = $row['R_id'];
       $i++;

   }
   
   echo json_encode(array("Meals_Q"=>"Sucess","Meals"=>$meal));
}
?>
