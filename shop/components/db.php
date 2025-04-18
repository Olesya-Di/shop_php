<?php
$dbhost = "localhost"; 
$dbuser = "o91999hr_users"; 
$dbpass = ""; 
$dbname = ""; 
$mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname); 
$mysqli->set_charset("utf-8"); 

if ($mysqli->connect_error) { 
  die("Не удалось подключиться к БД ".$mysqli->connect_error); 
}