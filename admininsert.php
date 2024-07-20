<?php

$conn=mysqli_connect('localhost:3307','root','','myproject');
if(!$conn) {
	die("Connection failed:".mysqli_connect_error());
}
$insert="INSERT INTO admin
(username,password)
VALUES
('raj shrestha','raj@1234')";
if(mysqli_query($conn,$insert)){
	echo "New record created successfully"."<br>";
}
else{
	echo "Error! ".$insert."<br>";
}
mysqli_close($conn)

?>