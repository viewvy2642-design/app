<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit Product</h1>
    <?php 
    if (!isset($_GET['id'])) {
        echo "No product ID provided.";
        exit();
    }
    $id = (int)$_GET['id'];

    if(isset($_POST['ProductName'])) {
        $ProductName = $conn->real_escape_string($_POST['ProductName']);
        $Picture = $conn->real_escape_string($_POST['Picture']);
        $Category = $conn->real_escape_string($_POST['Category']);
        $ProductDescription = $conn->real_escape_string($_POST['ProductDescription']);
        $Price = (int)$_POST['Price'];
        $QuantityStock = (int)$_POST['QuantityStock'];

        $sql = "UPDATE Products SET ProductName='$ProductName', Picture='$Picture', Category='$Category', ProductDescription='$ProductDescription', Price=$Price, QuantityStock=$QuantityStock WHERE ProductID=$id";
        
        if ($conn->query($sql) === TRUE) {
            echo "Product updated successfully";
            ?><script>
                document.location.href='index.php';
            </script><?php 
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $sql = "SELECT * FROM Products WHERE ProductID = $id";
    $result = getSql($sql);
    if ($result->num_rows === 0) {
        echo "Product not found.";
        exit();
    }
    $product = $result->fetch_assoc();  
    ?>
    <form action="" method="post">
        <div>
            <label for="ProductID">Product ID</label>
            <input type="text" name="ProductID" id="ProductID" readonly value="<?=$product['ProductID']?>">
        </div>
        <div>
            <label for="ProductName">Product Name</label>
            <input type="text" name="ProductName" id="ProductName" maxlength="50" required value="<?=$product['ProductName']?>">
        </div>
        <div>
            <label for="Picture">Picture</label>
            <input type="text" name="Picture" id="Picture" maxlength="100" value="<?=$product['Picture']?>">
        </div>
        <div>
            <label for="Category">Category</label>
            <input type="text" name="Category" id="Category" maxlength="50" required value="<?=$product['Category']?>">
        </div>
        <div>
            <label for="ProductDescription">Product Description</label>
            <input type="text" name="ProductDescription" id="ProductDescription" value="<?=$product['ProductDescription']?>">
        </div>
        <div>
            <label for="Price">Price</label>
            <input type="number" name="Price" id="Price" required value="<?=$product['Price']?>">
        </div>
        <div>
            <label for="QuantityStock">Quantity Stock</label>
            <input type="number" name="QuantityStock" id="QuantityStock" required value="<?=$product['QuantityStock']?>">
        </div>
        <button type="submit">Save</button>
        <button type="button" onclick="confirmDelete()" style="background-color: red; color: white;">Delete</button>
    </form>
    <script>
    function confirmDelete() {
        if (confirm("ยืนยันการลบสินค้านี้?")) {
            document.location.href = 'delete.php?id=<?=$id;?>';
        }
    }
    </script>
</body>
</html>