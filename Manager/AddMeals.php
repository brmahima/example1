<?php
include "config.php";

if(isset($_POST['image_name']) && isset($_POST['image']) && 
   isset($_POST['price']) && isset($_POST['desc']) )
   {
       $Image = $_POST['image'];
       $ImageName = $_POST['image_name'];
       $price = $_POST['price'];
       $desc = $_POST['desc'];
	   
	   
	   $path = "Uploads/".$ImageName.".png";
	   $status = file_put_contents($path,base64_decode($Image));
    

       $query = "INSERT INTO meals(M_name,M_price,M_desc,M_image,R_id)
       VALUES ('$ImageName', '$price', '$desc', '$path','1')";

     $result = mysqli_query($connect, $query);

    if($result > 0){
        echo "success";   
    }
    else{
        echo "failed";   
    }
}


?>