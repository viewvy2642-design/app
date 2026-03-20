<?php
// ...existing code...
$servername = "localhost";
$username = "root";
$password = "";
$database = "shop";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function getSql($sql) {
    global $conn;
    $result = $conn->query($sql);
    if ($result === false) {
        die("Error executing query: " . $conn->error);
    }
    return $result;
}
function executeSql($sql) {
    global $conn;
    if ($conn->query($sql) === false) {
        die("Error executing query: " . $conn->error);
    }
}
?>