<?php
session_start();
require_once("components/errors.php");
require_once("components/db.php");

if(!isset($_SESSION['isAdminb']) or !$_SESSION['isAdminb']) { 
  header("Location: gl_page.php");
}

$id = (int)$_GET['id']; 

if( !$id or $id == 0 ) { 
  exit("Некорректный id");
};

$result = $mysqli->query("SELECT * FROM `products` WHERE `id`='$id'")->fetch_assoc();
if(!$result) {
  exit("Позиции с таким id не существует");
};

$result = $mysqli->query("DELETE FROM `products` WHERE `id`='$id'");

if(!$result) {
  exit("Ошибка удаления позиции"); 
}
$response = "  
Позиция успешно удалена
<script>
setTimeout(function() {window.location.href = 'admin.php'}, 2000)
</script>
";
exit($response);
