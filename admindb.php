<?php
$conn=mysqli_connect('localhost:3307','root','');
if(!$conn) {
	die("Connection failed:".mysqli_connect_error());
}
else{
	echo "connected"."<br>";
}

$sql="CREATE DATABASE myproject";
if(mysqli_query($conn,$sql)){
	echo "Database created successfully";
}
else{
	echo "Error creating database! "."<br>";
}

mysqli_close($conn);
?>