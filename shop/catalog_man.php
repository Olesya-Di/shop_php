<?php 
  session_start();
  
  $title = "Товары для мужчин";
  require_once("components/header.php");
  //echo var_dump($_SESSION);
  require_once("components/db.php");


?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-12">
      <h1 class="text-center">Товары для мужчин</h1>
      <p ml="5" class="basket"><a href="cart.php">Корзина</a></p>
      <div class="block-search"> <!--панель поиска--> 
        <form method="GET" action="search.php?q="> <!--файл к которому бт обращаться форма, параметр q то что ввел пользователь-->
          <input type="text" class="input-search" name="q" placeholder="Поиск среди товаров"/>
          <input type="submit" class="button-search" value="Поиск"/>
        </form>
      </div>
        <table>  <!--class="mx-auto"-->
          <thead>
           
          </thead>
          <tbody class="position-table">
          
          </tbody>
      </table>
    </div>
  </div>
</div>



  <script>
    
  getProductsMan();
  async function getProductsMan() {
    let response = await fetch("getProductsMan.php"); // получаем данные методом get
    let products = await response.json(); // декодируем формат json в объект js
    //console.log(products[1]);
    creatTable(products);
  }
  function creatTable(products) {
    let tbody = document.querySelector(".position-table")
    for(product of products) {
      tbody.innerHTML += `
        <tr>
        
          <td class="p-2"><img src="${product.img}" style="max-width: 250px; max-height: 250px;"></td> 
          <td class="p-2" colspan="3"><a href="${product.parameters}" target="_blank">${product.position}</a></td> 
          <td class="p-2">${product.price} руб.</td>
          <td class="p-2">
        
          <button type="button" class="btn btn-light" data-id="${product.id}" onclick="addToCart(${product.id})">Купить</button>
        
        </tr>
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



