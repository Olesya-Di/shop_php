<?
session_start();
session_destroy(); // уничтожаем сессию
header("location: gl_page.php");