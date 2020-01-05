<?php



include "config.php";


$user = $_POST['user'];




$query = "select *from delivery where user_name='".$user."'";
$result = mysqli_query($connect,$query);

if($result)
{
	$queryi="UPDATE `delivery` SET `State` = 'av' WHERE `delivery`.`user_name` ='".$user."'";
	mysqli_query($connect,$queryi);
    while ($row = mysqli_fetch_assoc($result)) {
        $name =$row['name'];
        $pass=$row['pass'];
	
        
    }
    
    echo json_encode(array("Query"=>"Sucess","name"=>$name,"pass"=>$pass));
}
 else {

    echo json_encode(array("Query"=>"Faild"));
    echo mysqli_error($connect);
}

mysqli_free_result($result);
mysqli_close($connect);
?>
