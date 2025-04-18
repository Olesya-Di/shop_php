<?php
session_start();

?> 
    <!doctype html>
  <html lang="ru">
    <head>
      <script src='http://code.jquery.com/jquery-2.1.1.min.js'></script>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  
      <title><?php echo $title ?></title>
      
      <style>
      
      h1 a {
      text-decoration: none;
      color: black;
      }
      a:hover {
        text-decoration: none;
      }
      a {
      text-decoration: none;
      font-weight: bold;
      color: black;
      }
      .block-search {
        margin-left: 800px;
        margin-bottom: 30px;
      }
      .category {
      margin: 30px;  
      }
      .category img {
        border-radius: 10%;
        width: 100%;
      }
      .category img:hover {
        width: 101%;
      }
      
      
        <?php echo $styleAddPos ?> 
        <?php echo $styleReg ?> 
        <?php echo $styleCatalog ?> 
        <?php echo $styleAdmin ?>
        <?php echo $styleCart ?>
        
        
      </style>
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
              <?php if($_SESSION['isAdminb']): ?>
              <a class="nav-item nav-link" href="admin_panel.php">Панель администратора</a>
              <?php endif; ?>  
            </div>
          </div>
          
          <div class="text-right mr-1"><?php echo $_SESSION['nameb'];?></div>
          
          
          <div class="buttons">
            <?php if($_SESSION['idb']): ?>  
              <a href="exit.php" class="btn btn-primary">Выйти</a>
            <?php else: ?> 
              <a href="reg.php" class="btn btn-success">Регистрация</a>
              <a href="auth.php" class="btn btn-primary">Войти</a>
            <?php endif; ?>  
          </div>
          
      
        </nav>
        
        
        
        
        
        
        
        
        