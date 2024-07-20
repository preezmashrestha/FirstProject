<?php
include 'crudconn.php';

// Fetch items for the dropdown
$items_query = "SELECT name, price FROM items";
$items_result = mysqli_query($conn, $items_query);
$items = [];
while ($row = mysqli_fetch_assoc($items_result)) {
    $items[] = $row;
}

if (isset($_POST['submit'])) {
    $nameofdealer = $_POST['nameofdealer'];
    $contactperson = $_POST['contactperson'];
    $address = $_POST['address'];
    $item_name = $_POST['item_name'];
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

    $sql = "INSERT INTO orderdetail (nameofdealer, contactperson, address, item_id, totalqty, totalamt, phone, dates, crud_status)
            VALUES ('$nameofdealer', '$contactperson', '$address', '$item_id', '$totalqty', '$totalamt', '$phone', '$dates', '$crud_status')";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        // Decrease the quantity in the items table
        $update_qty_sql = "UPDATE items SET qty = qty - $totalqty WHERE item_id = '$item_id'";
        $update_qty_result = mysqli_query($conn, $update_qty_sql);

        if ($update_qty_result) {
            header("Location: home.php");
        } else {
            die("Failed to update item quantity: " . mysqli_error($conn));
        }
    } else {
        die("Connection failed: " . mysqli_connect_error());
    }
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Order</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<div class="container my-5">
    <form method="post">
        <h2>Enter details</h2>
        <div class="mb-3">
            <label>Name of dealer</label>
            <input type="text" class="form-control" placeholder="Enter dealer's name" name="nameofdealer" required>
        </div>
        <div class="mb-3">
            <label>Contact person</label>
            <input type="text" class="form-control" placeholder="Enter contact person name" name="contactperson" required>
        </div>
        <div class="mb-3">
            <label>Address</label>
            <input type="text" class="form-control" placeholder="Enter address" name="address" required>
        </div>
        <div class="mb-3">
            <label>Select Item</label>
            <select class="form-control" name="item_name" id="item_name" required>
                <option value="">Select Item</option>
                <?php
                foreach ($items as $item) {
                    echo "<option value='{$item['name']}' data-price='{$item['price']}'>{$item['name']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label>QTY</label>
            <input type="text" class="form-control" placeholder="Enter quantity" name="totalqty" id="totalqty" autocomplete="off" required>
        </div>
        <div class="mb-3">
            <label>Total amount</label>
            <input type="text" class="form-control" placeholder="Enter total amount" name="totalamt" id="totalamt" autocomplete="off" readonly>
        </div>
        <div class="mb-3">
            <label>Phone no.</label>
            <input type="text" class="form-control" placeholder="Enter contact no." name="phone" required>
        </div>
        <div class="mb-3">
            <label>Date</label>
            <input type="date" class="form-control" placeholder="Enter date" name="dates" autocomplete="off" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <div class="input-group mb-3">
                <input class="form-check-input mt-0" type="radio" value="done" name="crud_status"> Done
            </div>
            <div class="input-group mb-3">
                <input class="form-check-input mt-0" type="radio" value="pending" name="crud_status"> Pending
            </div>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#item_name, #totalqty').on('change', function () {
            var selectedOption = $('#item_name option:selected');
            var price = parseFloat(selectedOption.data('price'));
            var qty = parseFloat($('#totalqty').val());

            if (!isNaN(price) && !isNaN(qty)) {
                var totalamt = (price + price * 20 /100) * qty;
                $('#totalamt').val(totalamt);
            }
        });
    });
</script>

</body>
</html>
