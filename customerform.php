
<?php 
echo "<p class='logout'>"." <a href='logoutcus.php' title='signout'>Logout.</a>"."</p>";
?>

<?php
session_start();
 include 'crudconn.php';
// $p_id=$_GET['customerid'];
if(isset($_POST['submit'])){
	$nameofproduct=$_POST['nameofproduct'];
	$buyedfromdealer=$_POST['buyedfromdealer'];
	$description=$_POST['description'];
	$dateofpurchaase=$_POST['dateofpurchaase'];

    // Retrieve the uploaded image file
    $image = $_FILES['image'];

    // Extract information about the uploaded image
    $image_name = $image['name'];
    $image_tmp_name = $image['tmp_name'];
    $image_type = $image['type'];
    $image_size = $image['size'];
    $image_error = $image['error'];
    $cid= $_SESSION['c_id'];

    // Check if the image was uploaded without errors
    if ($image_error === UPLOAD_ERR_OK) {
        // Move the uploaded image to a permanent location
        $image_destination = '' . $image_name;
        move_uploaded_file($image_tmp_name, $image_destination);

        // Insert the image path into the database
        $sql="INSERT INTO problems (nameofproduct, buyedfromdealer, description, dateofpurchaase, image, c_id)
            VALUES ('$nameofproduct', '$buyedfromdealer', '$description', '$dateofpurchaase', '$image_destination','$cid')";

        $result=mysqli_query($conn,$sql);
        if ($result) {
                // Display success message
               header("Location:confirm.php");
               
        } else {
            die("Connection failed:".mysqli_connect_error());
        }
    } else {
        echo "Error uploading image: " . $image_error;
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

    <style>
        h2 {
            text-align: center;
            margin-top: 50px; 
            font-style: italic;
            text-decoration: underline;
        }
    </style>

    <title>Detail Of Problem</title>
</head>
<body>
    <div class="container" my-5>
        <form method="post" enctype="multipart/form-data"> <!-- enctype="multipart/form-data" is necessary for uploading files -->
            <h2>Please fill up the details</h2>
            <div class="mb-3">
    <label>Product Name</label>
    <select class="form-control" name="nameofproduct" required>
        <option value=""></option>
        <option value="Power Triller">Power Triller</option>
        <option value="Mini Triller">Mini Triller</option>
        <option value="Reaper">Reaper</option>
        <option value="Self Propelled Reaper">Self Propelled Reaper</option>
        <option value="Thresher">Thresher</option>
        <option value="Combined Mill">Combined Mill</option>
        <option value="Chaff Cutter">Chaff Cutter</option>
        <option value="Corn Seller">Corn Seller</option>
        <option value="Brush Cutter">Brush Cutter</option>
        <option value="Power Weeder">Power Weeder</option>
        <option value="Fertilizer Spray">Fertilizer Spray</option>
        <option value="Chain Saw">Chain Saw</option>
        <option value="Digger Drilling Mach">Digger Drilling Mach</option>
        <option value="Potato Planter">Potato Planter</option>
        <option value="Egg Incubator">Egg Incubator</option>
        <option value="Cow Milking Machine">Cow Milking Machine</option>
        <option value="Rotavator">Rotavator</option>
    </select>
</div>


            <div class="mb-3">
                <label>Buyed From Dealer</label>
                <input type="text"  class="form-control" placeholder="Enter buyed from details" name="buyedfromdealer" autocomplete="off"  required>
            </div>

            <div class="mb-3">
                <label>Date of Purchase</label>
                <input type="date" class="form-control" placeholder="Enter date" name="dateofpurchaase" autocomplete="off" max="<?php echo date('Y-m-d'); ?>" required>
            </div>

            <div class="mb-3">
                <label>Description</label><br>
                <textarea name="description" rows="4" class="form-control" placeholder="Enter description"></textarea>
            </div>

            <div class="mb-3">
                <label>Image</label><br>
                <input type="file" name="image" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>

       <script>
        document.addEventListener('DOMContentLoaded', function () {
            var dateInput = document.querySelector('input[name="dateofpurchaase"]');
            var today = new Date().toISOString().split('T')[0];
            dateInput.setAttribute('max', today);
        });
    </script>
</body>
</html>
