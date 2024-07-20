
<?php
include 'crudconn.php';
?>

<?php 
echo "<p class='logout'>"." <a href='logout.php' title='signout'>Logout.</a>"."</p>";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HomePage</title>
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

.logout {
    position: fixed;
    top: 10px; /* Adjust the distance from the top as needed */
    right: 10px; /* Adjust the distance from the right as needed */
    padding: 10px;
   
    border-radius: 5px; /* Add rounded corners */

}
.logout {
    color: black !important;
    text-decoration: none !important;
}


.logout:hover {
     background-color: darkgreen;
  color: black;
}


  </style>

</head>
<body>
  <script>
function confirmDelete() {
    return confirm('Are you sure you want to delete this item?');
}
</script>

  <img src="download.png" class="img-thumbnail" alt="imgkri"><br><br>

  
  <div class="box">
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link " aria-current="page" href="#" >Orders</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="viewstock.php" >View Stocks</a>
  </li>
   <li class="nav-item">
    <a class="nav-link " href="viewcustomerfeed.php" >View customer feedbacks</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="report.php">View reports</a>
  </li>
  
</ul>
</div>


	<div class="container">
		<button class="btn btn-outline-success my-5"><a href="addorder.php" class="text-dark">Add Order</a>
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
  	$sql="select od.*, it.name from items it, orderdetail od where it.item_id=od.item_id";
  	$result=mysqli_query($conn,$sql);
  	if($result){
  		//echo $row['nameofdealer'];
  		while($row=mysqli_fetch_assoc($result)){
  			$id=$row['id'];
  			$nameofdealer=$row['nameofdealer'];
  			$contactperson=$row['contactperson'];
  			$address=$row['address'];
  			$name=$row['name'];
  			$totalqty=$row['totalqty'];
  			$totalamt=$row['totalamt'];
  			$phone=$row['phone'];
  			$dates=$row['dates'];
  			$crud_status=$row['crud_status'];

  			echo '<tr>
      <th scope="row">'.$id.'</th>
      <td>'.$nameofdealer.'</td>
      <td>'.$contactperson.'</td>
      <td>'.$address.'</td>
      <td>'.$name.'</td>
      <td>'.$totalqty.'</td>
      <td>'.$totalamt.'</td>
      <td>'.$phone.'</td>
      <td>'.$dates.'</td>
      <td>'.$crud_status.'</td>
      <td>
      <button class="btn btn-outline-success "><a href="update.php? updateid='.$id.'" class="text-dark">Edit</a></button>
      <button class="btn btn-outline-danger " onclick="return confirmDelete()"><a href="delete.php? deleteid='.$id.'"class="text-dark">Delete</a></button>
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