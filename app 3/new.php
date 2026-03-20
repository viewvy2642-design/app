<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>New Product</h1>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ProductName = $conn->real_escape_string($_POST['ProductName']);
        $Picture = $conn->real_escape_string($_POST['Picture']);
        $Category = $conn->real_escape_string($_POST['Category']);
        $ProductDescription = $conn->real_escape_string($_POST['ProductDescription']);
        $Price = (float)$_POST['Price'];
        $QuantityStock = (int)$_POST['QuantityStock'];

        $sql = "INSERT INTO Products (ProductName, Picture, Category, ProductDescription, Price, QuantityStock) VALUES ('$ProductName', '$Picture', '$Category', '$ProductDescription', $Price, $QuantityStock)";
        
        if ($conn->query($sql) === TRUE) {
            echo "New product created successfully";
            ?><script>
                document.location.href='index.php';
            </script><?php 
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
    <form action="" method="post">
        <div>
            <label for="ProductName">Product Name</label>
            <input type="text" name="ProductName" id="ProductName" maxlength="50" required>
        </div>
        <div>
            <label for="Picture">Picture</label>
            <input type="text" name="Picture" id="Picture" maxlength="100">
        </div>
        <div>
            <label for="Category">Category</label>
            <input type="text" name="Category" id="Category" maxlength="50" required>
        </div>
        <div>
            <label for="ProductDescription">Product Description</label>
            <input type="text" name="ProductDescription" id="ProductDescription">
        </div>
        <div>
            <label for="Price">Price</label>
            <input type="number" name="Price" id="Price" required>
        </div>
        <div>
            <label for="QuantityStock">Quantity Stock</label>
            <input type="number" name="QuantityStock" id="QuantityStock" required>
        </div>
        <button type="submit">Submit</button>
</body>
</html>