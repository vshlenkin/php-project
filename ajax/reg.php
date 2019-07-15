<?php
$username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
$email = trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

$error = '';
if(strlen($username) <= 3) $error = 'Введите имя';
else if(strlen($email) <= 3) $error = 'Введите email';
else if(strlen($login) <= 3) $error = 'Введите логин';
else if(strlen($pass) <= 3) $error = 'Введите пароль';

if($error != '') {
  echo $error;
  exit();
 }
  
 
$hash = "Admin123";
$pass = md5($pass . $hash);

require_once '../mysql_connect.php';

$sql = 'INSERT INTO users_reg (name, email, login, password) VALUES (?, ?, ?, ?)';

$query = $pdo->prepare($sql);
$query->execute([$username, $email, $login, $pass]);

echo 'Готово';

/*dsn = 'mysql:host='.$host.';dbname='.$db;
$pdo = new PDO($dsn, $user, $password)*/


/* //=============
// Create connection
$conn = mysqli_connect($host, $user, $password, $db);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO users_reg (name, email, login, password) VALUES ('$username', '$email', '$login', '$pass')";

if (mysqli_query($conn, $sql)) {
    echo "Готово";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

//============= */

?>