<?php

include 'config.php';


$items=$_POST['Items'];
$name=$_POST['name'];
$lat=$_POST['lat'];
$longi=$_POST['long'];
$phone=$_POST['phone'];
$price = $_POST['price'];
$R_id = $_POST['R_id'];
$state =$_POST['state'];
$date=date("Y-m-d");

if(isset($items)){
$query="insert into orders (name,phone,O_item,O_price,R_id,O_date,lat,longi,State,O_time)"
     . " values('".$name."','".$phone."','".$items."','".$price."','".$R_id."','".$date."','".$lat."','".$longi."','".$state."',current_time())";

$result=mysqli_query($connect,$query);

if($result)
{
	$q= "select *from orders where lat = '".$lat."'";
	$re =mysqli_query($connect,$q);
	if($re){
		$i=0;
	 while ($row = mysqli_fetch_assoc($re)) {
        $O_id =$row['O_id'];
        $time = $row['O_time'];	
         $i++;		
    }
	if($i!=0){	
	$q1= "select *from resturant where R_id = '1'";
	$res1 =mysqli_query($connect,$q1);
	if($res1){
			$j=0;
	 while ($row1 = mysqli_fetch_assoc($res1)) {
        $R_name =$row1['R_name'];
         $j++;		
    }
	if($j!=0){
		echo json_encode(array("Query"=>"sucess","R_name"=>$R_name,"O_id"=>$O_id,"time"=>$time));
	}
	
	}
	
	}
	
	}
    
}}
else
{
    echo json_encode(array("Query"=>"faild"));
    echo mysqli_error($connect);
}

mysqli_close($connect);

?>