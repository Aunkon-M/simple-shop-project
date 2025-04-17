<?php
include 'connection.php'; // Include connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get data from form
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productDescription = $_POST['productDescription'];
    $productImage = $_FILES['productImage']['name'];
    
    // Move uploaded image to the images folder
    move_uploaded_file($_FILES['productImage']['tmp_name'], "images/" . $productImage);

    // SQL Query to insert product
    $query = "INSERT INTO products (name, price, description, image) 
              VALUES ('$productName', '$productPrice', '$productDescription', '$productImage')";
    $run = mysqli_query($con, $query);

    if ($run) {
        header("Location: list.php");
    } else {
        echo "Product insertion failed.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
</head>
<body>
    <h2>Add New Product</h2>
    <form action="create.php" method="post" enctype="multipart/form-data">
        <label for="productName">Product Name</label>
        <input type="text" name="productName" id="productName" required><br><br>

        <label for="productPrice">Price</label>
        <input type="number" name="productPrice" id="productPrice" required><br><br>

        <label for="productDescription">Description</label>
        <textarea name="productDescription" id="productDescription" required></textarea><br><br>

        <label for="productImage">Product Image</label>
        <input type="file" name="productImage" id="productImage" required><br><br>

        <input type="submit" value="Create Product">
    </form>
</body>
</html>
