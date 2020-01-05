<?php

include "config.php";

//$RestId = $_GET['R_id'];
$GetRest = "select * from  resturant ";
 
$results = mysqli_query($connect,$GetRest);

if(!$results)
{
    echo json_encode(array("Rest_Q"=>"GetRest_error"));
    die();
}
 
else {
    
    setJson($results);
 }



function setJson($res)
{
   $rest = array();
   
    $i=0;
   while($row= mysqli_fetch_assoc($res))       
   {
       $rest[$i]=new Rest();
       $rest[$i]->R_id = $row['R_id'];
       $rest[$i]->R_name = $row['R_name'];
       $rest[$i]->R_image = "http://192.168.43.26/Rest/Rest_Image/".$row['R_image'];
       $rest[$i]->R_desc = $row['R_detials'];
       $i++;

   }
   
   echo json_encode(array("Rest_Q"=>"Sucess","Rest"=>$rest));
}
class Rest
{
    
     public $id;
     public $name; 
     public $image ; 
     public $desc; 
     
     
     
     function __construct() {
         
}}
?>
