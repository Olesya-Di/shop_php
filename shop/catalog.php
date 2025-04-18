<?php 
  session_start();
  
 
  $styleCatalog = "
  .position-text {
    margin-left: 50px;
  }
  ";
  
  require_once("components/header.php");
  require_once("components/db.php");
  $title = "Каталог товаров";
  
?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col-12">
      
      <h1 class="text-center">Все товары</h1>
      <p ml="5" class="basket"><a href="cart.php">Корзина</a></p>
      <div class="block-search"> <!--панель поиска--> 
        <form method="GET" action="search.php?q="> <!--файл к которому бт обращаться форма, параметр q то что ввел пользователь-->
          <input type="text" class="input-search" name="q" placeholder="Поиск среди товаров"/>
          <input type="submit" class="button-search" value="Поиск"/>
        </form>
      </div>
      
    
      <form action="cart.php" method="POST" class="adding-form">
        <table> 
          <thead>
           
          </thead>
          <tbody class="position-table">
          
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>

<script>


getAllProducts();
  async function getAllProducts() {
    let response = await fetch("getAllProducts.php"); // получаем данные методом get
    let products = await response.json(); // декодируем формат json в объект js
  
    creatTable(products);
  }
  function creatTable(products) {
    let tbody = document.querySelector(".position-table")
    for(product of products) {
      tbody.innerHTML += `
      <form action="cart_obr.php" method="POST" class="adding-form">
        <tr>
        
          <td>
            <div>
              <img src="${product.img}" style="max-width: 250px; max-height: 250px;"> 
            </div>
          </td>
          
          <td>
            <div class="position-text">
           ${product.position}</a>
            </div>
          </td> 
          
          <td>
            <div>
            ${product.price} руб.
            </div> 
          </td>
          
          <td>  
          <button type="button" class="btn btn-light" data-id="${product.id}" onclick="addToCart(${product.id})">Купить</button>
          </td> 
          
        </tr>
      </form>
         `;
    }
  }  
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



