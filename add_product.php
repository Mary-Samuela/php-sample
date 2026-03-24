<?php
// Show errors for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include database connection
include 'db.php';

// Check if form was submitted
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    
    // Handle image upload
    $image = $_FILES['image']['name'];
    $target = "images/" . basename($image);

    // Insert into database
    $sql = "INSERT INTO products (name, price, image) VALUES ('$name', $price, '$image')";
    
    if ($conn->query($sql) === TRUE) {
        // Move uploaded image to the images folder
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
        echo "<p style='color:green'>Product added successfully!</p>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>

<h1>Add a New Product 🛒</h1>

<form method="POST" enctype="multipart/form-data">
    <label>Product Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Price:</label><br>
    <input type="number" name="price" required><br><br>

    <label>Image:</label><br>
    <input type="file" name="image" required><br><br>

    <input type="submit" name="submit" value="Add Product">
</form>

<p><a href="index.php">Go back to Products List</a></p>

</body>
</html>