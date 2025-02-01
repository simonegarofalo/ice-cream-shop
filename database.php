<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "birra_garofalo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    exit("Connection failed: " . $conn->connect_error);
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$trattamentodati = isset($_POST['trattamentodati']) ? 1 : 0;


$stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, trattamentodati) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssi", $firstname, $lastname, $email, $trattamentodati);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

header("Location: index.html");
exit();
?>