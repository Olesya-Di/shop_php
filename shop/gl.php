<?php
  session_start();
  
  if(!$_SESSION['isAdminb']) { 
    header("Location: gl_page.php");
  }
 // $title = "размещение";
  //require_once("components/header.php");
  require_once("components/db.php"); ?>
  
   <!doctype html>
  <html lang="ru">
    <head>
      
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  
       <title>размещение</title>
  
    <!--<style>
    .modal-window {
      display: none;
    }    
    .modal-window .background {
      position: fixed;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      background-color: rgba(0, 0, 0, .7);
    }
    .modal-window .info-window {
      position: fixed;
      width: 80%;
      top: 50%;
      left: 50%;
      background: white;
      transform: translate(-50%, -50%);
    }
  
      </style>-->
    </head>
    <body> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="gl_page.php">Главная страница</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link active" href="lk.php">Личный кабинет</a>
             
              <a class="nav-item nav-link" href="admin.php">Панель администратора</a>
              
            </div>
          </div>
          
          <div class="text-right mr-1"></div>
          </div>
          
          <div class="buttons">
            <?php if($_SESSION['idb']): ?>  
              <a href="exit.php" class="btn btn-primary">Выйти</a>
            <?php else: ?> 
              <a href="reg.php" class="btn btn-success">Регистрация</a>
              <a href="auth.php" class="btn btn-primary">Войти</a>
            <?php endif; ?>  
          </div>
          
      
        </nav>
  
  <img src="" alt="">
  
<div class="container">
  <div class="row justify-content-center">
    
    <div class="col-4 cart-info"><img src="<?php echo $_SESSION['img']; ?>" alt="">
    </div>
    
    <div class="col-6">
      
      <div class="product-info m-2">
          <b>Наименование</b>
          <span><?php echo $_SESSION['position']; ?></span>
          
          
        </div>
        
        <div class="product-info m-2">
          <b>Цена</b>
          <span><?php echo $_SESSION['price']; ?> руб.</span>
          
        </div>
        
        <div class="product-info m-2">
          <b>Количество</b>
          <span><?php echo $_SESSION['quantity']; ?> шт.</span>
         
        </div>
        
        <div class="product-info m-2">
          <b>Параметры</b>
          <span><?php echo $_SESSION['parameters']; ?></span>
          
        </div>
        
        <div class="product-info m-2">
          <b>Описание</b>
          <span><?php echo $_SESSION['img']; ?></span>
          
        </div>
      
    </div>
    
      <div class="col-2">
        <p class="text-danger info-text mb-2 font-weight-bold d-none">ytghfhfh</p>
      
     
          <button class="btn btn-primary" onclick="transition()">Разместить в каталоге</button>
     <!-- <form action="gl_obr.php" method="POST" class="gl-form">  
        
      </form> --> 
      </div>
  </div>
</div>
  
 
  <script>
  
  function transition() {
    window.location.href = "catalog.php";
  }
  
  </script> 
  
  
 <!-- Optional JavaScript -->
 <script src='http://code.jquery.com/jquery-2.1.1.min.js'></script>
 <script src="script.js"></script>
    <script src="https://use.fontawesome.com/46ff1dfbc9.js"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>