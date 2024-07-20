

<?php 
session_start();
$message="";
if(isset($_POST['submit'])){
	$con=mysqli_connect('localhost:3307','root','','myproject') or die('unable to connect');
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql="SELECT * FROM admin WHERE username='$username' AND password='$password' ";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	if(is_array($row)){
		$_SESSION['password']=$row['password'];
		$_SESSION['username']=$row['username'];
	}
	else{
		$message="Invalid username and password!";
	}
	}
	if(isset($_SESSION['password'])){
	 	header("Location:home.php");
	 }


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>sing in</title>
	<style type="text/css">
		body{
			background-color: white;
			background-image: url("green.jpg");
			 background-size: auto;
			 background-repeat: no-repeat;
			font-style: italic;

		}
		.div2{
			
		}
		.div{
			font-size: 30px;
			background-color: black;
  			color: white;
 			opacity: .3;
			text-align: center;
			position: relative;
			
		}
		.image2 {
    	 position: absolute;
   		 left: -30px;
    	 top: -230px;
}
	</style>
</head>
<body>

	<h1 style="color:black;text-align:center;padding-top: 110px;font-size: 50px;">
	Login for sales head.</h1>
	
	<div class="div">
		<img src="download.png" class="image2" />
	<form method="post">
		username:<br>
		<input type="text" name="username"><br>
		password:<br>
		<input type="password" name="password"><br>
		<input type="submit" name="submit" value="view/login">
		<span class="error"> <?php echo $message; ?></span>

	</form>
</div>


</body>
</html>