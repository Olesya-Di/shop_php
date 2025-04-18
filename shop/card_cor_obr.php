<?
session_start();
require_once("components/errors.php");
require_once("components/db.php");
//echo var_dump($_POST);

if(!isset($_SESSION['isAdminb']) or !$_SESSION['isAdminb']) { 
  header("Location: gl_page.php");
}
$productId = $_SESSION['id'];

foreach($_POST as $key=>$value) { 
  changeDate($key, $value);
} 

function changeDate($key, $newValue) { 
  global $productId, $mysqli;
  if($key == "id") {
    exit("Нельзя изменять эти данные");
  }
  
  $result = $mysqli->query("UPDATE `products` SET `$key`='$newValue' WHERE `id`='$productId'"); 
    if($result) {
      $_SESSION[$key] = $newValue;
      $rasponse = "
      <script>
        window.location.href = 'card_cor.php'
      </script>
      ";
      exit($rasponse);
    } else {
      exit("Не удалось изменить данные"); 
    }
}

$result = $mysqli->query("SELECT * FROM `products` WHERE `id`='$id'")->fetch_assoc();
if(!$result) {
  exit("Позиции с таким id не существует");
};


$result = $mysqli->query("DELETE FROM `products` WHERE `id`='$id'");

if(!$result) {
  exit("Ошибка удаления позиции"); //если не удалось удалить
}
$response = "  
Позиция успешно удалена
<script>
setTimeout(function() {window.location.href = 'adding_position.php'}, 2000)
</script>
";
exit($response);

