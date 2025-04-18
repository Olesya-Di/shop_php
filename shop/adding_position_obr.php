<?php 
session_start();
require_once("components/errors.php");
require_once("components/db.php");

if(!isset($_SESSION['isAdminb']) or !$_SESSION['isAdminb']) { // если пользователь не админ, то он не может обратиться к этой сессии. isset - переменная объявлена и отлична от null
  header("Location: gl_page.php");
}

$position = htmlspecialchars( trim($_POST['position']) );
$quantity = htmlspecialchars( trim($_POST['quantity']) );
$price = htmlspecialchars( trim($_POST['price']) );
$category = htmlspecialchars( trim($_POST['category']) );
$parameters = htmlspecialchars( trim($_POST['parameters']) );
$description = htmlspecialchars( trim($_POST['description']) );
$img = htmlspecialchars( trim($_POST['img']) );



if (empty($position) or empty($quantity) or empty($price) or empty($category) or empty($parameters) or empty($description) or empty($img)) { 
  exit("Не все поля заполнены");
}

//echo "<br> $position | $quantity | $price | $category | $parameters | $description | $img";

$result = $mysqli->query("INSERT INTO `products`(`position`, `quantity`, `price`, `category`, `parameters`, `description`, `img`) VALUES ('$position', '$quantity', '$price', '$category', '$parameters', '$description', '$img')"); 
$_SESSION['id'] = $mysqli->insert_id;

$_SESSION['position'] = $position;
$_SESSION['quantity'] = $quantity;
$_SESSION['price'] = $price;
$_SESSION['category'] = $category;
$_SESSION['parameters'] = $parameters;
$_SESSION['description'] = $description;
$_SESSION['img'] = $img;

if ($result) {
  
  exit("1");
} else {
  exit("Не удалось добавить товар");
}





