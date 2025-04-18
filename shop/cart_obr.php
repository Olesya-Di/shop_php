<?php
session_start();
require_once("components/errors.php");
require_once("components/db.php");

  ?>

<?php

$productId = $_POST['id'];

$result = $mysqli->query("SELECT * FROM `products` WHERE `id`='$productId'")->fetch_assoc();

if ($result) {
  $_SESSION['cart'][] = [id => $result['id'], position => $result['position'], price => $result['price'], img => $result['img'] ];

  
  
 
} else {
  exit("Не удалось добавить в корзину");
}







?>