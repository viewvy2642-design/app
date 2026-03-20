<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (!isset($_GET['id'])) {
        echo "No product ID provided.";
        exit();
    }
    $id = (int)$_GET['id']; 
    $sql = "DELETE FROM Products WHERE ProductID = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Product deleted successfully";
        ?><script>
            document.location.href='index.php';
        </script><?php 
        exit();
    } else {
        echo "Error deleting product: " . $conn->error;
    }
    ?>
</body>
</html>