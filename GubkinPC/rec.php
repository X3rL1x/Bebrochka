<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Obr";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$sql = "INSERT INTO Obrsv1 (name, email, message) VALUES ('$name', '$email', '$message')";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "Данные успешно добавлены в базу данных!";
} else {
    echo "Ошибка при добавлении данных в базу данных.";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
header('Location: index.html');
exit;
?>