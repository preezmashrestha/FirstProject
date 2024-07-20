
<?php
include 'crudconn.php';
?>

<?php 
echo "<p class='class'>"." <a href='logout.php' title='signout'>Logout.</a>"."</p>";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>crud operation</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">

  <style type="text/css">
    .box{
  background-color: seagreen;
  overflow: hidden;
}
.box a {
  float: left;
  color: white;
  text-align: center;
  text-decoration: none;
  font-size: 20px;
}
.box a:hover {
  background-color: ghostwhite;
  color: black;
}

.box a:focus {
  background-color: darkgreen;
  color: white;
}
  </style>

</head>
<body>
  <img src="download.png" class="img-thumbnail" alt="imgkri"><br><br>

  
  <div class="box">
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " aria-current="page" href="#" >Orders</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="#" >View Stocks</a>
  </li>
   <li class="nav-item">
    <a class="nav-link " href="#" >View customer feedbacks</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="#">View reports</a>
  </li>
  
</ul>
</div>


	<div class="container">
		<button class="btn btn-outline-success my-5"><a href="main.php" class="text-dark">Add Order</a>
			</button>
			<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">sl no.</th>
      <th scope="col">Name of Dealer</th>
      <th scope="col">Contact Person</th>
      <th scope="col">Address</th>
      <th scope="col">Name of Particular's</th>
      <th scope="col">QTY</th>
      <th scope="col">Total Amount</th>
      <th scope="col">Phone No.</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>

  	<?php
  	$sql="select * from crud";
  	$result=mysqli_query($conn,$sql);
  	if($result){
  		//echo $row['nameofdealer'];
  		while($row=mysqli_fetch_assoc($result)){
  			$id=$row['id'];
  			$nameofdealer=$row['nameofdealer'];
  			$contactperson=$row['contactperson'];
  			$address=$row['address'];
  			$nameofparticular=$row['nameofparticular'];
  			$qty=$row['qty'];
  			$totalamt=$row['totalamt'];
  			$phone=$row['phone'];
  			$dates=$row['dates'];
  			$status=$row['status'];

  			echo '<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$nameofdealer.'</td>
      <td>'.$contactperson.'</td>
      <td>'.$address.'</td>
      <td>'.$nameofparticular.'</td>
      <td>'.$qty.'</td>
      <td>'.$totalamt.'</td>
      <td>'.$phone.'</td>
      <td>'.$dates.'</td>
      <td>'.$status.'</td>
      <td>
      <button class="btn btn-outline-success "><a href="" class="text-dark">Edit</a></button>
      <button class="btn btn-outline-success "><a href="" class="text-dark">Delete</a></button>
      </td>
      </tr>'
      ;
  		}
  	}


  	?>
  </tbody>
</table>

	</div>

</body>
</html>