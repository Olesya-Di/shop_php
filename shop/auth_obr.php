<?php 
session_start(); 
require_once("components/errors.php");
require_once("components/db.php");

$loginb = htmlspecialchars( trim($_POST['loginb']) );
$pass = htmlspecialchars( trim($_POST['pass']) );

if (empty($loginb) or empty($pass)) {
  exit("не все поля заполнены");
}

$result = $mysqli->query("SELECT * FROM `buyers` WHERE `loginb`='$loginb'");
$result = $result->fetch_assoc();

if ($result and password_verify($pass, $result['passwordb']) ) { 
  $_SESSION['idb'] = $result['idb'];
  $_SESSION['loginb'] = $result['loginb'];
  $_SESSION['nameb'] = $result['nameb'];
  $_SESSION['isAdminb'] = $result['isAdminb'];
  
  exit("1");
} else {
  exit("Неверный логин или пароль");
}

echo "$login $pass";