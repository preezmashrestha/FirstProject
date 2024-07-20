
<?php
include 'crudconn.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>view customer feeds</title>
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

.product-image {
    width:100px; /* Adjust the width as needed */
    height: auto; /* Let the height adjust automatically based on the width to maintain aspect ratio */
    max-width: 100%; /* Ensure the image doesn't exceed its container's width */
    border-radius: 50%;
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
    <a class="nav-link " href="home.php" >Orders</a>
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
		
			<table class="table table-striped">
  <thead>
    <tr>
       <th scope="col">sl no.</th>
      <th scope="col">name of product</th>
      <th scope="col">buyed from</th>
      <th scope="col">description</th>
      <th scope="col">date of purchase</th>
      <th scope="col">image</th>
       <th scope="col">user name</th>
    </tr>
  </thead>
  <tbody>

  	<?php
  	$sql="select p_id, nameofproduct, buyedfromdealer, dateofpurchaase, description, image, username, users.c_id
          from problems 
          INNER JOIN users ON problems.c_id = users.c_id";
  	$result=mysqli_query($conn,$sql);
  	if($result){
  		//echo $row['nameofdealer'];
  		while($row=mysqli_fetch_assoc($result)){
        $c_id = $row['c_id'];
        $cname=$row['username'];
        $pid = $row['p_id'];
  			$name=$row['nameofproduct'];
  			$buyedfrom=$row['buyedfromdealer'];
  			$date=$row['dateofpurchaase'];
        $description=$row['description'];
        $img=$row['image'];
  			     

  			echo '<tr>
      <td>'.$pid.'</td>
      <td>'.$name.'</td>
      <td>'.$buyedfrom.'</td>
      <td>'.$description.'</td>
      <td>'.$date.'</td>
      <td><a href="' . $img . '">
      <img src="' . $img . '" alt="' . $name . '" class="product-image"></a></td>
      <td>'.$cname.'</td>
      
      
      <td>
     
      <button class="btn btn-outline-danger "  onclick="return confirmDelete()"><a href="deletecus.php? deleteid='.$pid.'" class="text-dark">Delete</a></button>
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