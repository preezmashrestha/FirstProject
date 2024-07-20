<?php
include 'crudconn.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>view stock</title>

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

.container{
	max-height: 600px; /* Set the maximum height of the container */
    overflow-y: auto; /* Enable vertical scroll bar */
        }


  </style>



</head>
<body>
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
    <a class="nav-link " href="#">View reports</a>
  </li>
  
  

</ul>




</div>


	<div class="container">
		
			<table class="table">
  <thead>
    <tr>
      <th scope="col">sl no.</th>
      <th scope="col">Product Name</th>
      <th scope="col">Total profit</th>
      <th scope="col">Total sales QTY</th>
      
    </tr>
  </thead>
  <tbody>
    <?php


    $sql = "SELECT 
            items.item_id,
            items.name,
            SUM(orderdetail.totalqty) AS total_quantity,
            items.price,
            -- SUM(orderdetail.totalamt) / SUM(orderdetail.totalqty) AS calculated_selling_price,
            ((SUM(orderdetail.totalamt) / SUM(orderdetail.totalqty)) - items.price) / items.price * 100 AS profit_percent
        FROM 
            items
        JOIN 
            orderdetail ON items.item_id = orderdetail.item_id
        GROUP BY
            items.item_id,
            items.name,
            items.price;
";
  



    $result=mysqli_query($conn,$sql);
   

    if($result){
      //echo $row['nameofdealer'];
      while($row=mysqli_fetch_assoc($result)){
        $item_id=$row['item_id'];
        $name=$row['name'];
        $profit_percent=$row['profit_percent'];
         $total_quantity=$row['total_quantity'];

       
             

        echo '<tr>
      <th scope="row">'.$item_id.'</th>
      <td>'.$name.'</td>
      <td>'.$profit_percent.'</td>
       <td>'.$total_quantity.'</td>
      
     
      <td>
     
     
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