
<?php
include 'crudconn.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>view stock</title>

    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous"> -->

<style type="text/css">
    


.container {
    width: 100%;
     font-family: 'Calibri', sans-serif;
}

.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: seagreen;
    padding: 10.5px;
/*    border-radius: 10px;*/
    
}

.navbar ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

.navbar ul li {
    display: inline;
    margin-right: 20px;
    font-size: 23px; /* Adjust the font size as needed */
}

.navbar ul li a {
    text-decoration: none;
    color: white;
}
  .navbar ul li:first-child {
            margin-left: 30px; /* Increase or decrease this value as needed */
        }

.navbar form {
    display: flex;
    align-items: center;
}
.navbar ul li a:hover {
  background-color: ghostwhite;
  color: black;
}
.navbar form input[type="search"] {
    padding: 5px;
    margin-right: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

.navbar form button {
    padding: 5px 10px;
     background-color: orange;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.navbar form button:hover {
    background-color: darkorange;
}


.containerss{
    max-height: 600px; /* Set the maximum height of the container */
    overflow-y: auto; /* Enable vertical scroll bar */
     font-family: 'Calibri', sans-serif;
     font-size: 23px;
        }


.product-image {
    width: 300px; /* Adjust the width as needed */
    height: 250px; /* Maintain aspect ratio */
     border-radius: 50%;
}
   .redRow {

    color: red !important;
}


table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 15px; /* Adjust the padding value as needed */
    text-align: left; /* Align text to the left */
}

th {
    background-color: #f2f2f2; /* Optional: add background color to header cells */
    font-weight: bold; /* Make header text bold */
}

td {
    border-bottom: 1px solid #ddd; /* Optional: add border to bottom of cells */
}
th:first-child, td:first-child {
    padding-left: 100px; /* Adjust the value to increase or decrease the gap */
}



  </style>



</head>
<body>
  <img src="download.png" class="img-thumbnail" alt="imgkri"><br><br>

  
<div class="container">
    <div class="navbar">
        <ul>
            <li><a href="home.php">Orders</a></li>
            <li><a href="#">View Stocks</a></li>
            <li><a href="viewcustomerfeed.php">View customer feedbacks</a></li>
            <li><a href="report.php">View reports</a></li>
        </ul>
        <form action="search.php" method="GET">
            <input type="search" name="query" placeholder="Search">
            <button type="submit">Search</button>
        </form>
    </div>
</div>


    <div class="containerss">
        
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
    $sql="select * from items";
    $result=mysqli_query($conn,$sql);
    if($result){
        //echo $row['nameofdealer'];
        while($row=mysqli_fetch_assoc($result)){
            $item_id=$row['item_id'];
            $img=$row['img'];
            $name=$row['name'];
            $price=$row['price'];
            $qty=$row['qty'];
            if($qty > 0){
                                    $rowClass = ($qty < 50) ? 'redRow' : 'blackRow';
 
                       
                    }
                    else
                    {
                        $rowClass = 'redRow';
                    }
            
       echo "<tr class='{$rowClass}'>
                            <th scope='row'>{$item_id}</th>
                            <td><img src='{$img}' alt='{$name}' class='product-image'></td>
                            <td>{$name}</td>
                            <td>{$price}</td>
                            <td>{$qty}</td>
                            <td>
                                <button class='btn btn-outline-success'>
                                    <a href='editqty.php?updateid={$item_id}' class='text-dark'>Edit QTY</a>
                                </button>
                            </td>
                        </tr>";
      
        }
    }


    ?>
  </tbody>
</table>

    </div>


</body>
</html>
