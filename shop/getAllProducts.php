<?php
  require_once("components/db.php"); // подключаем к бд
  $result = $mysqli->query("SELECT * FROM `products` WHERE 1"); 
            
  for($products = []; $row = $result->fetch_assoc(); $products[] = $row);
  
  $products = json_encode($products);  
  
  exit($products);
  
  
  
  
  
  
  
  
  
  
  
  
  