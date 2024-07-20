<?php
include 'crudconn.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>search</title>

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


.product-image {
    width: 300px; /* Adjust the width as needed */
    height: 250px; /* Maintain aspect ratio */
     border-radius: 50%;
}


  </style>

</head>
<body>
    <div class="container">
        
            <table class="table">
  <thead>
    <tr>
      <th scope="col">sl no.</th>
      <th scope="col">product</th>
      <th scope="col">name</th>
      <th scope="col">price</th>
      <th scope="col">QTY</th>
      
    </tr>
  </thead>
  <tbody>
<?php
// Check if the search query parameter is set
if(isset($_GET['query'])) {
    // Get the search query
    $search_query = $_GET['query'];

    // Perform a database query to search for items
    $sql = "SELECT * FROM items WHERE name LIKE '%$search_query%'";
   $result=mysqli_query($conn,$sql);
    if($result){
        //echo $row['nameofdealer'];
        while($row=mysqli_fetch_assoc($result)){
            $item_id=$row['item_id'];
            $img=$row['img'];
            $name=$row['name'];
            $price=$row['price'];
            $qty=$row['qty'];

            echo '<tr>
      <th scope="row">'.$item_id.'</th>
      <td><img src="' . $img . '" alt="' . $name . '" class="product-image"></td>
      <td>'.$name.'</td>
      <td>'.$price.'</td>
      <td>'.$qty.'</td>
      <td>
      <button class="btn btn-outline-success "><a href="editqty.php? updateid='.$item_id.'" class="text-dark">Edit QTY</a></button>
      </td>
     
      </tr>'
      ;
        }
    }
}


    ?>
  </tbody>
</table>

    </div>
</body>
</html>

