<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "stok"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['Username'];
$password = $_POST['Password'];

$stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['username'] = $username;
    header("Location: dashboard.php");
    exit();
} else {
    echo "Password Salah !!";
}

$stmt->close();
$conn->close();
?>