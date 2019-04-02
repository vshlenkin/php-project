<?php
$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
$email = trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

if(strlen($username) <= 3)
exit();
if(strlen($email) <= 3)
exit();
if(strlen($login) <= 3)
exit();
if(strlen($pass) <= 3)
exit();

$hash = "Dlglhfgdgd123";
$pass = md5($pass . $hash);

$user = 'victoradmin';
$password = 'Victor_Admin_123';
$db = 'testing';
$host = 'localhost';

//=============
// Create connection
$conn = mysqli_connect($host, $user, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO users (name, email, login, pass) VALUES ('$username', '$email', '$login', '$pass')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

//=============

?>