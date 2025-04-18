<?php
session_start();
require_once("components/errors.php");
require_once("components/db.php");


$result = $mysqli->query("SELECT * FROM `products` WHERE 1")->fetch_assoc();

if ($result) { 
  $_SESSION['position'] = $result['position'];
  $_SESSION['quantity'] = $result['quantity'];
  $_SESSION['price'] = $result['price'];
  $_SESSION['id'] = $result['id'];
  $_SESSION['category'] = $result['category'];
  $_SESSION['parameters'] = $result['parameters'];
  $_SESSION['description'] = $result['description'];
  $_SESSION['img'] = $result['img'];
  
  exit("<script>window.location.href = 'catalog.php'</script>");
} else {
  exit("Не удалось добавить в каталог");
}