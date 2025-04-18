<?php 
  session_start();
  
  require_once("components/header.php");
  require_once("components/db.php");
  
$search = htmlspecialchars( trim($_GET["q"]) );

$result = $mysqli->query("SELECT * FROM `products` WHERE `position` LIKE '%$search%'");
//for($products = []; $row = $result->fetch_assoc(); $products[] = $row);
$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}
  $title = "Поиск - $search";
?>
        


<div class="container">
  
  <div class="row justify-content-center">
    <div class="col-12">
      
      <h1 class="text-center"><a href="catalog.php"><?=$title?></a></h1>
      <div class="block-search"> <!--панель поиска--> 
      <?php if ( strlen($search) >= 3 && strlen($search) < 100 ): ?>
        <form method="GET" action=""> <!--search.php файл к которому бт обращаться форма, при нажатии на кн, параметр q то что ввел пользователь-->
          <input type="text" class="input-search" name="q" placeholder="Поиск среди товаров"/>
          <input type="submit" class="button-search" value="Поиск"/>
          
        </form>
        <?php else: ?>
          <p>Поисковое значение должно быть от 3 до 100 символов!</p>
        <?php endif; ?>
      </div>
        <table>  
          <thead>
           
          </thead>
          <tbody class="position-table">
            <?php if (empty($products)): ?>
                        <tr>
                            <td colspan="5" class="text-center">Такого товара, к сожалению нет.</td>
                        </tr>
                    <?php else: ?>
            <?php foreach($products as $product): ?>
              <tr>
                <td class="p-2"><img src="<?php echo $product['img']?>"></td> 
                <td class="td-search" "p-2" colspan="3"><?php echo $product['position']?></td> 
                <td class="p-2"><?php echo $product['price']?>руб.</td>
                <td class="p-2">
                  <button type="button" class="btn btn-light" data-id="${product.id}" onclick="addToCart(${product.id})">Купить</button>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
          </tbody>
      </table>
    </div>
  </div>
  
</div>

<script>
  function addToCart(id) {
    let formData = new FormData();
    formData.append("id", id);
    console.log(formData.get("id"));
    fetch("cart_obr.php", {
      
      method: "POST",
      body: formData,
      
    })
    
      .then(response => response.text()) 
      .then(result => { 
        alert("Товар добавлен в корзину");
        });
  }
</script>


<?php 
  require_once("components/footer.php");
?>



