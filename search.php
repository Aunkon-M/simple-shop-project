<?php
include "db.php";

$term = $_GET['term']; // could be name or id

$sql = "SELECT * FROM products WHERE name LIKE '%$term%' OR id='$term'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "🆔 ID: " . $row["id"] . "<br>Name: " . $row["name"] . "<br>Price: $" . $row["price"] . "<br>Description: " . $row["description"] . "<hr>";
  }
} else {
  echo "❌ No product found!";
}
?>
