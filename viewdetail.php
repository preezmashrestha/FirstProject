
<?php
 include 'crudconn.php';
 $p_id=$_GET['customerid'];


 $sql="select * from problem ";
 $result=mysqli_query($conn,$sql);
 
 while($row=mysqli_fetch_assoc($result)){

  			$nameofproduct=$row['nameofproduct'];
  			$buyedfromdealer=$row['buyedfromdealer'];
  			$dateofpurchaase=$row['dateofpurchaase'];
  			$description=$row['description'];
  			$image=$row['image'];
  			$c_id=$row['c_id'];


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
  			<h2>Update..</h2>
 	<div class="mb-3">
    <label>Name of product</label>
    <input type="text" class="form-control" placeholder="enter dealers name" name="nameofproduct" value="<?php echo$nameofproduct;?>">
	</div>

	<div class="mb-3">
    <label>Buyed from dealer</label>
    <input type="text" class="form-control" placeholder="enter contact person name" name="buyedfromdealer" value="<?php echo$buyedfromdealer;?>">
	</div>

	<div class="mb-3">
    <label>Date Of Purchased</label>
    <input type="Date" class="form-control" placeholder="enter date" name="dateofpurchaase" autocomplete="off" value="<?php echo$dateofpurchaase;?>">
	</div>

	<div class="mb-3">
    <label>Description</label>
    <input type="text" class="form-control" placeholder="enter contact person name" name="description" value="<?php echo$description;?>">
	</div>

		<div class="mb-3">
    <label>image</label>
    <img src="' . $image . '"  class="product-image">
	</div>
	
  
</div>
	

  <button type="submit" class="btn btn-primary" name="submit">Update</button>
  
</form>
  	</div>

  </body>
</html>