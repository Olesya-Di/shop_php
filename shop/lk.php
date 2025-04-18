<?php
  session_start();
  if(!$_SESSION['idb']) {
    header("location: auth.php");
  }
  $title = "Личный кабинет";
  require_once("components/header.php");
  // echo var_dump($_SESSION);
?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-8">
        <h1 class="text-center">Личный кабинет</h1>
        
        <div class="user-info">
          <b>ID</b>
          <span><?php echo $_SESSION['idb']; ?></span>
        </div>
        
        <div class="user-info my-2">
          <b>Login</b>
          <span><?= $_SESSION['loginb']; ?></span>  <!--сокращенная запись вместо echo-->
        </div>
        
        <div class="user-info my-2">
          <b>Имя</b>
          <span><?php echo $_SESSION['nameb']; ?></span>
          <form action="lk_obr.php" method="POST" class="d-inline-block">
            <input type="text" name="nameb">
            <input type="submit" class="btn btn-dark" value="Изменить">
          </form>
        </div>
       
      </div>
    </div>
  </div>
  
<?php
  require_once("components/footer.php");
?>
<?php
?>