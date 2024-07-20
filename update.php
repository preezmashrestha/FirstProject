<?php
include 'crudconn.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM orderdetail WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$nameofdealer = $row['nameofdealer'];
$contactperson = $row['contactperson'];
$address = $row['address'];
$item_id = $row['item_id'];
$totalqty = $row['totalqty'];
$totalamt = $row['totalamt'];
$phone = $row['phone'];
$dates = $row['dates'];
$crud_status = $row['crud_status'];

if (isset($_POST['submit'])) {
    $nameofdealer = $_POST['nameofdealer'];
    $contactperson = $_POST['contactperson'];
    $address = $_POST['address'];
    $item_name = $_POST['item_name']; // Updated name for the dropdown
    $totalqty = $_POST['totalqty'];
    $totalamt = $_POST['totalamt'];
    $phone = $_POST['phone'];
    $dates = $_POST['dates'];
    $crud_status = $_POST['crud_status'];

    // Fetch item_id based on the selected item_name
    $item_id_query = "SELECT item_id FROM items WHERE name = '$item_name'";
    $item_id_result = mysqli_query($conn, $item_id_query);
    $item_id_row = mysqli_fetch_assoc($item_id_result);
    $item_id = $item_id_row['item_id'];

    $sql = "UPDATE orderdetail SET nameofdealer='$nameofdealer', contactperson='$contactperson', address='$address', item_id='$item_id', totalqty='$totalqty', totalamt='$totalamt', phone='$phone', dates='$dates', crud_status='$crud_status' WHERE id=$id";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: home.php");
    } else {
        die("Connection failed: " . mysqli_connect_error());
    }
}

// Fetch items for the dropdown
$items_query = "SELECT name FROM items";
$items_result = mysqli_query($conn, $items_query);
$items = [];
while ($row = mysqli_fetch_assoc($items_result)) {
    $items[] = $row['name'];
}

// Fetch current item name based on item_id
$current_item_query = "SELECT name FROM items WHERE item_id = $item_id";
$current_item_result = mysqli_query($conn, $current_item_query);
$current_item_row = mysqli_fetch_assoc($current_item_result);
$current_item_name = $current_item_row['name'];
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <form method="post">
            <h2>Update..</h2>
            <div class="mb-3">
                <label>Name of dealer</label>
                <input type="text" class="form-control" placeholder="Enter dealer's name" name="nameofdealer" value="<?php echo $nameofdealer; ?>">
            </div>
            <div class="mb-3">
                <label>Contact person</label>
                <input type="text" class="form-control" placeholder="Enter contact person name" name="contactperson" value="<?php echo $contactperson; ?>">
            </div>
            <div class="mb-3">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Enter address" name="address" value="<?php echo $address; ?>">
            </div>
            <div class="mb-3">
                <label>Select Item</label>
                <select class="form-control" name="item_name" required>
                    <option value="">Select Item</option>
                    <?php
                    foreach ($items as $item) {
                        $selected = ($item == $current_item_name) ? 'selected' : '';
                        echo "<option value='$item' $selected>$item</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label>QTY</label>
                <input type="text" class="form-control" placeholder="Enter quantity" name="totalqty" autocomplete="off" value="<?php echo $totalqty; ?>">
            </div>
            <div class="mb-3">
                <label>Total amount</label>
                <input type="text" class="form-control" placeholder="Enter total amount" name="totalamt" autocomplete="off" value="<?php echo $totalamt; ?>">
            </div>
            <div class="mb-3">
                <label>Phone no.</label>
                <input type="text" class="form-control" placeholder="Enter contact no." name="phone" value="<?php echo $phone; ?>">
            </div>
            <div class="mb-3">
                <label>Date</label>
                <input type="date" class="form-control" placeholder="Enter date" name="dates" autocomplete="off" value="<?php echo $dates; ?>">
            </div>
            <div class="mb-3">
                <label>Status</label>
                <div class="input-group mb-3">
                    <input class="form-check-input mt-0" type="radio" value="done" name="crud_status" <?php if ($crud_status == 'done') echo 'checked'; ?>> Done
                </div>
                <div class="input-group mb-3">
                    <input class="form-check-input mt-0" type="radio" value="pending" name="crud_status" <?php if ($crud_status == 'pending') echo 'checked'; ?>> Pending
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>
</html>
