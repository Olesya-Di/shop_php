<?php
  session_start();
  
  if(!$_SESSION['isAdminb']) { 
    header("Location: gl_page.php");
  }
  require_once("components/header.php");
  $title = "Панель администратора";
  

?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-12">
      <h1 class="text-center">Панель администратора</h1>
      <button type="button" class="btn btn-primary btn-lg btn-block" onclick="adminProducts()">Администрирование товарных позиций</button>
      <button type="button" class="btn btn-secondary btn-lg btn-block" onclick="adminBuyers()">Администрирование покупателей</button>
    </div>
  </div>
</div>
      
      

<script>
  function adminProducts() {
    window.location.href = 'admin.php'
  }
  function adminBuyers() {
    window.location.href = 'admin_buyers.php'
  }
  
</script>
