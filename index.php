<form action="insert.php" method="POST">
  <input type="text" name="name" placeholder="Product Name" required><br>
  <input type="number" name="price" step="0.01" placeholder="Price" required><br>
  <textarea name="description" placeholder="Description" required></textarea><br>
  <button type="submit">Add Product</button>
</form>

<br><hr><br>

<form action="search.php" method="GET">
  <input type="text" name="term" placeholder="Search by ID or Name">
  <button type="submit">Search</button>
</form>
