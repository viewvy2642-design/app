<?php include('connect.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Products</h1>
    <div><form action="" method="post">
        <input type="text" name="search" id="search">
        <button type="submit">Search</button>
    </form>
    <button type="button" onclick="document.location.href='new.php'">เพิ่มสินค้า</button>
    </div>
    <table style="width: 100%; border: 1px solid black;">
        <tr>
            <th>ProductID</th>
            <th>ProductName</th>
            <th>Picture</th>
            <th>Category</th>
            <th>ProductDescription</th>
            <th>Price</th>
            <th>QuantityStock</th>
        </tr>
        <?php
        $sql = "SELECT * FROM Products";
        if (isset($_POST['search']) && !empty($_POST['search'])) {
            $search = $conn->real_escape_string($_POST['search']);
            $sql .= " WHERE ProductName LIKE '%$search%' OR Category LIKE '%$search%' OR ProductDescription LIKE '%$search%'";
        }
        $result = getSql($sql);
        while ($row = $result->fetch_assoc()) {
            ?><tr>
                <td><?=$row['ProductID']?></td>
                <td><a href="edit.php?id=<?=$row['ProductID']?>"><?=$row['ProductName']?></a></td>
                <td><img src="<?=$row['Picture']?>" alt="<?=$row['ProductName']?>" width="100"></td>
                <td><?=$row['Category']?></td>
                <td><?=$row['ProductDescription']?></td>
                <td><?=$row['Price']?></td>
                <td><?=$row['QuantityStock']?></td>
              <?php
            }
            ?>
    </table>
</body>
</html>