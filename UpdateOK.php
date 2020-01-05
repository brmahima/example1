<?php

include 'config.php';


$id=$_POST['id'];
$q1 = "select *from delivery where state = 'av'";
$res1 = mysqli_query($connect,$q1) or die (mysql_error());


if($res1){
	$i=0;
	 while ($row = mysqli_fetch_assoc($res1)) {
        $name =$row['name'];
        $user = $row['user_name'];	
		$phone =$row['phone'];
		
         $i++;		
    }
	if($i!=0){
	$query="UPDATE `orders` SET `State` = 'delivary', P_Delivery = '".$name."', D_Phone = '".$phone."' WHERE `orders`.`O_id` ='".$id."'";

$result=mysqli_query($connect,$query);
if($result)
{
	$queryi="UPDATE `delivery` SET `State` = 'nonav' WHERE `delivery`.`user_name` ='".$user."'";
	mysqli_query($connect,$queryi);
    echo json_encode(array("Query"=>"sucess"));
}
else
{
    echo json_encode(array("Query"=>"faild"));
    echo mysqli_error($connect);
	}}
}



mysqli_close($connect);

?>