<?php
  require_once("components/db.php"); // подключаем к бд
  $result = $mysqli->query("SELECT * FROM `buyers` WHERE 1"); 
            
  for($buyers = []; $row = $result->fetch_assoc(); $buyers[] = $row);
  
  $buyers = json_encode($buyers);  
  
  exit($buyers);
  
  
  
  
  
  
  
  
  
  
  
  
  