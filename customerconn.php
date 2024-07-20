<?php
$conn=mysqli_connect('localhost:3307','root','','customer');
if(!$conn) {
	die("Connection failed:".mysqli_connect_error());
}
?>