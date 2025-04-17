<?php
include 'connection.php'; // Include connection file

$query = "SELECT * FROM products";
$data = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>
    <h2>Product List</h2>
    <table>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($data)) {
            echo "<tr><td>{$row['name']}</td><td>{$row['price']}</td><td>{$row['description']}</td><td><a href='update.php?id={$row['id']}'>Update</a> | <a href='delete.php?id={$row['id']}'>Delete</a></td></tr>";
        }
        ?>
    </table>
</body>
</html>
