<?php



include "config.php";


$user = $_POST['user'];




$query = "select * from manager where user_name='".$user."'";
$result = mysqli_query($connect,$query);

if($result)
{
	while($row = mysqli_fetch_assoc($result)){
		
	$name=$row['name'];
	$pass=$row['pass'];
	$R_id=$row['R_id'];
	}
    echo json_encode(array("Query"=>"Sucess","name"=>$name,"pass"=>$pass,"R_id"=>$R_id));
}
 else {

    echo json_encode(array("Query"=>"Faild"));
    echo mysqli_error($connect);
}

mysqli_free_result($result);
mysqli_close($connect);
?>
