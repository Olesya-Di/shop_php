<?php 
session_start();
require_once("components/errors.php");
require_once("components/db.php");
// $_POST $_GET

// echo var_dump($_POST); ассоциативный массив, который м-о вызывать по ключам
$loginb = htmlspecialchars( trim($_POST['loginb']) );
$pass = htmlspecialchars( trim($_POST['pass']) );
$nameb = htmlspecialchars( trim($_POST['nameb']) );

if ( empty($loginb) or empty($pass) or empty($nameb) ) { // проверка на пустое поле
  exit("Не все поля заполнены");
}

$pass = password_hash($pass, PASSWORD_BCRYPT);

$result = $mysqli->query("SELECT * FROM `buyers` WHERE `loginb`='$loginb'");
$result = $result->fetch_assoc(); 

if ($result) { 
  exit("Такой пользователь уже существует");
}

$result = $mysqli->query("INSERT INTO `buyers`(`loginb`, `passwordb`, `nameb`) VALUES ('$loginb', '$pass', '$nameb')"); // при успешной регистрации пользователь появляется в БД
$_SESSION['idb'] = $mysqli->insert_id;

$_SESSION['loginb'] = $loginb;
$_SESSION['nameb'] = $nameb;

if ($result) {
  exit("1");
} else {
  exit("Не удалось добавить пользователя");
}













