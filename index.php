<?php
include 'db.php';

$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Shop</title>
</head>
<body>

    <h1>My Products 🛒</h1>

    <?php while($row = $result->fetch_assoc()): ?>
        <div style="margin-bottom: 20px;">
            <h2><?php echo $row['name']; ?></h2>
            <p>Price: Ksh <?php echo $row['price']; ?></p>
        </div>
    <?php endwhile; ?>

</body>
</html>