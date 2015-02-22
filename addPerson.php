<?php
require "dbConnection.php";
require "password.php";

//Fetch Vars
$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$db = loadDatabase();
$stmt = $db->prepare('INSERT INTO user VALUES (NULL, :username, :password)');
$stmt->bindParam(':username', $username);
$stmt->bindParam(':password', $passwordHash);
$stmt->execute();

header("Location: todoLogin.php");

?>