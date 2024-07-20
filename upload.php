<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    // Check if file was uploaded without errors
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is an actual image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            // Check file size
            if ($_FILES["image"]["size"] > 5000000) { // Adjust size limit as needed
                echo "Sorry, your file is too large.";
            } else {
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                } else {
                    // Move the uploaded file to the specified directory
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                        echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
            }
        } else {
            echo "File is not an image.";
        }
    } else {
        echo "No file uploaded.";
    }
}
?>
