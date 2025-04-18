<?php 
  session_start();
  
  $title = "Главная страница";
  require_once("components/header.php");
  //echo var_dump($_SESSION);
  require_once("components/db.php");
  
?>

<h1 class="text-center"><a href="catalog.php">Категории товаров</a></h1>
         
<div class="container">
  <div class="row flex-column justify-content-around">
    <div class="row">
      
      <p ml="5" class="basket"><a href="cart.php">Корзина</a></p>
      
      
      <div class="block-search"> <!--панель поиска--> 
        <form method="GET" action="search.php?q="> <!--файл в который бт обращаться форма, параметр q то что ввел пользователь-->
          <input type="text" class="input-search" name="q" placeholder="Поиск среди товаров"/>
          <input type="submit" class="button-search" value="Поиск"/>
        </form>
      </div>  
     
    <div class="col-6 left-half">
      <div class="category boy">
        <a href="http://o91999hr.beget.tech/diplom/catalog_boy.php" target="_blank"><img src="img/70.png" alt="Товары для мальчиков"></a>
        <p>Товары для мальчиков</p>
      </div>
      <div class="category man">
        <a href="http://o91999hr.beget.tech/diplom/catalog_man.php" target="_blank"><img src="img/60.png" alt="Товары для мужчин"></a>
        <p>Товары для мужчин</p>
      </div>
    </div>
    
    
    <div class="col-6 right-half">
      <div class="category woman">
        <a href="http://o91999hr.beget.tech/diplom/catalog_woman.php" target="_blank"><img src="img/50.png" alt="Товары для женщин"></a>
        <p>Товары для женщин</p>
      </div>
      <div class="category girl">
        <a href="http://o91999hr.beget.tech/diplom/catalog_girl.php" target="_blank"><img src="img/40.png" alt="Товары для девочек"></a>
        <p>Товары для девочек</p>
      </div>
    </div>
      
    </div>
  </div>
</div>



  <script>
 
</script>


<?php 
  require_once("components/footer.php");
?>



