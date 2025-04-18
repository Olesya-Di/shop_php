<?
session_start();
require_once("components/errors.php");
require_once("components/db.php");
// echo var_dump($_POST);
$userId = $_SESSION['idb'];

foreach($_POST as $key=>$value) { // перебираем массив POST $key - name, lastname и birthday - $value значение
  changeDate($key, $value);
} 

function changeDate($key, $newValue) { // $key - name, lastname и birthday - $newvalue - новое измененное значение
  global $userId, $mysqli;
  if($key == "loginb" or $key == "idb") {
    exit("Нельзя изменять эти данные");
  }
  // echo "Ключ: $key Новое значение: $newValue ID: $userId";
  $result = $mysqli->query("UPDATE `buyers` SET `$key`='$newValue' WHERE `idb`='$userId'"); // если $_POST прийдет name ==> SET `name` = 'Иван'
    // $_POST['birthday'] => SET `birthday` новое значение
    if($result) {
      $_SESSION[$key] = $newValue;
      $rasponse = "
      Изменения внесены
      <script>
        setTimeout(function() { window.location.href = 'lk.php'}, 2000)
      </script>
      ";
      exit($rasponse);
    } else {
      exit("Не удалось изменить данные"); // появится в случае неправильно составленного запроса update.
    }
}