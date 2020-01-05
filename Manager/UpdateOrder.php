<?php

include 'config.php';


$id=$_POST['id'];
if(isset($id)){
$query="UPDATE `orders` SET `State` = 'Paid' WHERE `orders`.`O_id` ='".$id."'";
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