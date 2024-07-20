<?php
$conn=mysqli_connect('localhost:3307','root','','myproject');
if(!$conn) {
	die("Connection failed:".mysqli_connect_error());
}
$table="CREATE TABLE admin
(

username VARCHAR(30) NOT NULL,
password CHAR(60) NOT NULL

)";
if(mysqli_query($conn,$table)){
	echo "Table has been created successfully"."<br>";
}
else{
	echo "Error creating table! "."<br>";
}
?>