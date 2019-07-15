<?php

$login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
$pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

$error = '';
if(strlen($login) <= 3)
    $error = 'Введите логин';
if(strlen($pass) <= 3)
    $error = 'Введите пароль';

if($error != '') { 
  echo $error;
  exit();
 }
  
 
$hash = "Admin123";
$pass = md5($pass . $hash);

require_once  '../mysql_connect.php';

$sql = 'SELECT `id` FROM `users_reg` WHERE `login` = :login && `password` = :pass';

$query = $pdo->prepare($sql);
$query->execute(['login' => $login, 'pass' => $pass]);

$user = $query->fetch(PDO::FETCH_OBJ);
if($user->id == 0) 
   echo 'Такого пользователя не существует';

   else { 
        setcookie('log', $login, time() + 3600 * 24 * 30, "/");
        echo 'Готово';
   }



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