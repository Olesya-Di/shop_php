<?php
  session_start();
  $title = "Корзина";
  
  if(! isset($_SESSION['cart'])) { //если сессии нет
    $_SESSION['cart'] = array(); // то создаем ее
  }
  
 /* $styleCart  = "
    
  ";*/
  require_once("components/header.php");
  require_once("components/db.php");
  
 
?>

   <div class="container">
      <div class="row justify-content-center">
        <h1 class="text-center">Моя корзина</h1>
        
        <div class="block-search"> <!--панель поиска--> 
          <form method="GET" action="search.php?q="> <!--файл к которому бт обращаться форма, параметр q то что ввел пользователь-->
              <input type="text" class="input-search" name="q" placeholder="Поиск среди товаров"/>
              <input type="submit" class="button-search" value="Поиск"/>
          </form>
        </div>
        
        <?php $products = $_SESSION['cart']?>
        <?php foreach($products as $index => $product): ?>
          <div class="col-4 shadow">
            <p><img src="<?php echo $product['img']?>" style="max-width: 250px; max-height: 250px;" ></p>
            <p><?php echo $product['position']?></p>
            <p><?php echo $product['price']?> руб.</p>
            <button type="button" class="btn btn-light" data-id="<?= $index ?>" onclick="delFromCart(<?= $index ?>)">Удалить</button>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
        
<?php
        
?>        
  <script> 
    function delFromCart(index) {
        let formData = new FormData();
        formData.append("index", index);
        
        fetch("cart_remove.php", { // Здесь указываем путь к  обработчику
            method: "POST",
            body: formData,
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                alert("Товар удален из корзины");
                location.reload(); // Обновляем страницу для отображения изменений
            } else {
                alert("Ошибка при удалении товара");
            }
        });
    } 
  </script> 
  
  
  
<?php 
  require_once("components/footer.php");
?>