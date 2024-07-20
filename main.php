
<?php
 include 'crudconn.php';
if(isset($_POST['submit'])){
	$nameofdealer=$_POST['nameofdealer'];
	$contactperson=$_POST['contactperson'];
	$address=$_POST['address'];
	$nameofparticular=$_POST['nameofparticular'];
	$qty=$_POST['qty'];
	$totalamt=$_POST['totalamt'];
	$phone=$_POST['phone'];
	$dates=$_POST['dates'];
	$status=$_POST['status'];
	

$sql="INSERT INTO crud
(nameofdealer,contactperson,address,nameofparticular,qty,totalamt,phone,dates,status)
VALUES
('$nameofdealer','$contactperson','$address','$nameofparticular','$qty','$totalamt','$phone','$dates','$status')";

$result=mysqli_query($conn,$sql);
if($result){
	//echo "data insertrd successfully";
	header("Location:displaycrud.php");
}else{
	die("Connection failed:".mysqli_connect_error());
}

	 }
 ?>
<!doctype html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">

    <title>crudoperation</title>
  </head>
  <body>
  	<div class="container" my-5>
  		<form method="post">
  			<h2>Enter details</h2>
 	<div class="mb-3">
    <label>Name of dealer</label>
    <input type="text" class="form-control" placeholder="enter dealers name" name="nameofdealer">
	</div>

	<div class="mb-3">
    <label>contact person</label>
    <input type="text" class="form-control" placeholder="enter contact person name" name="contactperson">
	</div>

	<div class="mb-3">
    <label>address</label>
    <input type="text" class="form-control" placeholder="enter address" name="address">
	</div>
    
    <div class="mb-3">
    <label>Name of particular's</label>
    <input type="text" class="form-control" placeholder="enter product name" name="nameofparticular" autocomplete="off">
	</div>

	<div class="mb-3">
    <label>QTY</label>
    <input type="text" class="form-control" placeholder="enter quantity " name="qty" autocomplete="off">
	</div>

	<div class="mb-3">
    <label>total amount</label>
    <input type="text" class="form-control" placeholder="enter total amount" name="totalamt" autocomplete="off">
	</div>

	<div class="mb-3">
    <label>phone no.</label>
    <input type="text" class="form-control" placeholder="enter contact no." name="phone">
	</div>

	<div class="mb-3">
    <label>Date</label>
    <input type="Date" class="form-control" placeholder="enter date" name="dates" autocomplete="off">
	</div>

	<div class="mb-3">
    <label>status</label>
    <div class="input-group mb-3">
    <input class="form-check-input mt-0" type="checkbox" value="Done" name="status">Done
  </div>
  	<div class="input-group mb-3">
    <input class="form-check-input mt-0" type="checkbox" value="pending" name="status">Pending
  </div>
</div>
	

  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
  	</div>

  </body>
</html>