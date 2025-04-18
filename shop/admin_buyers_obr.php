<?php
session_start();
require_once("components/errors.php");
require_once("components/db.php");

if(!isset($_SESSION['isAdminb']) or !$_SESSION['isAdminb']) { // если пользователь не админ, то он не может обратиться к этой сессии. isset - переменная объявлена и отлична от null
  header("Location: gl_page.php");
}

$idb = (int)$_GET['idb']; 



if( !$idb or $idb == 0 ) { 
  exit("Некорректный id");
};

$result = $mysqli->query("SELECT * FROM `buyers` WHERE `idb`='$idb'")->fetch_assoc();
if(!$result) {
  exit("Пользователя с таким id не существует");
};

if( $result['isAdminb'] ) {
  exit("недостаточно прав"); 
}

$result = $mysqli->query("DELETE FROM `buyers` WHERE `idb`='$idb'");

if(!$result) {
  exit("Ошибка удаления пользователя");
}
$response = "  
Пользователь успешно удален
<script>
setTimeout(function() {window.location.href = 'admin.php'}, 2000)
</script>
";
exit($response);
