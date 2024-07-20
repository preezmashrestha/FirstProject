
<?php
include 'crudconn.php';


if(isset($_GET['deleteid'])){
	$id=$_GET['deleteid'];

	$sql="delete from orderdetail where id=$id";
	$result=mysqli_query($conn,$sql);
	if($result){
		// echo "Deleted successufully";
		 	header("Location:home.php");
	}
	else{
			die("Connection failed:".mysqli_connect_error());
	}
}


?>