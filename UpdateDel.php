<?php

include 'config.php';


$id=$_POST['O_id'];
if(isset($id)){
$query="UPDATE `orders` SET `State` = 'delivered' WHERE `orders`.`O_id` ='".$id."'";
$result=mysqli_query($connect,$query);
if($result)
{
	 echo json_encode(array("Query"=>"sucess"));
}
}else{
    echo json_encode(array("Query"=>"faild"));
    echo mysqli_error($connect);
	}

mysqli_close($connect);

?>