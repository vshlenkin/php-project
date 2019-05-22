<?php

$user = 'victoradmin';
$password = 'Victor_Admin_123';
$db = 'project_php';
$host = 'localhost';

$dsn = 'mysql:host='.$host.';dbname='.$db;

$pdo = new PDO($dsn, $user, $password);

?>