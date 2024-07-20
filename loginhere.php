

<?php 
session_start();
$message="";
if(isset($_POST['submit'])){
	$conn=mysqli_connect('localhost:3307','root','','myproject') or die('unable to connect');
	$email=$_POST['email'];
	$password=$_POST['password'];
	$sql="SELECT * FROM users WHERE email='$email' AND password='$password' ";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_fetch_array($result);
	if(is_array($row)){
		$_SESSION['c_id']=$row['c_id'];
		$_SESSION['password']=$row['password'];
		$_SESSION['email']=$row['email'];
	}
	else{

		$message="Invalid email and password!";
	}
	}
	if(isset($_SESSION['password'])){
	 	header("Location:customerform.php");
	 }


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>sing in</title>
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

	<style type="text/css">
		.container{
			margin:50px auto ;
			max-width: 500px;
			background-color: lightgreen;
			padding: 30px;
			box-shadow: 0px 0px 10px 0px;
		}
		form{
			display: :flex;
			flex-direction: column;
			text-align: center;
			font-size: 25px;


		}
		p{
			font-size: 12px;
		}
		
	</style>
</head>
<body>

	<h1 style="color:black;text-align:center;padding-top: 110px;font-size: 50px;">
	Login </h1>
	
	<div class="container">
	<form method="post">
		Email:<br>
		<input type="text" name="email"><br>
		password:<br>
		<input type="password" name="password"><br>
		<input type="submit" name="submit" value="login" class="btn btn-light">
		<span class="error"> <?php echo $message; ?></span>
		  <p>Doesnot have an account? <a href="registration.php">Register here</a>.</p>


	</form>
</div>


</body>
</html>

