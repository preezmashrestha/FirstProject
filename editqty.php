
<?php
 include 'crudconn.php';
 $id=$_GET['updateid'];
 $sql="select * from items where item_id=$id";
 $result=mysqli_query($conn,$sql);
 $row=mysqli_fetch_assoc($result);

  			// $name=$row['name'];
  			// $price=$row['price'];
  			$qty=$row['qty'];
  			
if(isset($_POST['submit'])){
	// $name=$_POST['name'];
	// $price=$_POST['price'];
	$qty=$_POST['qty'];
	
  $sql = "UPDATE items SET  qty='$qty' WHERE item_id=$id";

$result=mysqli_query($conn,$sql);
if($result){
	//echo "data updated successfully";
	header("Location:viewstock.php");
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

    <title>edit</title>
  </head>
  <body>
  	<div class="container" my-5>
  		<form method="post">
  			<h2>Update</h2>
 	<!-- <div class="mb-3">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="enter dealers name" name="nameofdealer" value="<?php echo$name;?>">
	</div>

	<div class="mb-3">
    <label>price</label>
    <input type="number" class="form-control" placeholder="enter contact person name" name="contactperson" value="<?php echo$price;?>">
	</div> -->


	<div class="mb-3">
    <label>QTY</label>
    <input type="text" class="form-control" placeholder="enter quantity " name="qty" autocomplete="off" value="<?php echo$qty;?>">
	</div>

	

  <button type="submit" class="btn btn-primary" name="submit">Update</button>
  
</form>
  	</div>

  </body>
</html>