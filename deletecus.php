
<?php
include 'crudconn.php';


if(isset($_GET['deleteid'])){
	$p_id=$_GET['deleteid'];

	$sql="delete from problems where p_id=$p_id";
	$result=mysqli_query($conn,$sql);
	if($result){
		// echo "Deleted successufully";
		 	header("Location:viewcustomerfeed.php");
	} 
	else{
			die("Connection failed:".mysqli_connect_error());
	}
}


?>