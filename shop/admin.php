<?php 
  session_start();
  $title = "Администрирование товарных позиций";
  
  $styleAdmin = "
  .table-catalog img {
    width: 50%;
      }
  ";
  
  require_once("components/header.php");
  if(!$_SESSION['isAdminb']) { 
    header("Location: gl_page.php");
  }
  
?>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <h1 class="text-center">Администрирование товарных позиций</h1>
        <button type="button" class="btn btn-primary btn-lg btn-block mb-3" onclick="addProduct()">Добавить новую позицию</button>
      
        <div class="block-search"> <!--панель поиска--> 
          <form method="GET" action="search.php?q="> <!--файл к которому бт обращаться форма, параметр q то что ввел пользователь-->
            <input type="text" class="input-search" name="q" placeholder="Поиск среди товаров"/>
            <input type="submit" class="button-search" value="Поиск"/>
          </form>
        </div>
      </div>
      
      <div class="table-catalog">
        <table border="1" class="mx-auto"> 
          <thead>
            <tr>
              <th>ID</th>
              <th>Наименование</th>
              <th>Количество</th>
              <th>Цена, руб.</th>
              <th>Категория</th>
              <th>Параметры</th>
              <th>Описание</th>
              <th>Изображение</th>
              <th colspan ="2"> Действия</th>
                
            </tr>
          </thead>
          <tbody class="products-table-body">
            
          </tbody>
        </table>
      </div>
    </div>
  </div>

<script>
  getAllProducts();
  async function getAllProducts() {
    let response = await fetch("getAllProducts.php"); // получаем данные методом get
    let products = await response.json(); // декодируем формат json в объект js
   // console.log(products);
    creatTable(products);
  }
  
  function creatTable(products) {
    let tbody = document.querySelector(".products-table-body")
    for(product of products) {
      tbody.innerHTML += `
        <tr>
        
          <td class="p-2">${product.id}</td> 
          <td class="p-2">${product.position}</td>
          <td class="p-2">${product.quantity}</td>
          <td class="p-2">${product.price}</td>
          <td class="p-2">${product.category}</td>
          <td class="p-2">${product.parameters}</td>
          <td class="p-2">${product.description}</td>
          <td class="p-2"><img src="${product.img}"></td>
          
          <td class="p-2">
            <button class="btn btn-danger" onclick="deleteProduct(${product.id}, event.target)">Удалить</button>
          </td>
          
          <td class="p-2">
            <button class="btn btn-success" onclick="changeProduct(${product.id})">Редактировать</button>
          </td>
          
        </tr>
      `;
    }
  }
  function addProduct() {
    window.location.href = 'adding_position.php'
  }
  
  function changeProduct(id) {
    let formData = new FormData();
  formData.append("id", id);
  console.log(formData.get("id"));
  fetch("card_cor_obr.php", {
    method: "POST",
    body: formData,
  })
  
    .then(response => response.text()) 
    .then(result => { 
      window.location.href = 'card_cor.php';
      });
    }  
    
  
  async function deleteProduct(id, buttonElem) {
    if (!confirm("Вы уверены, что хотите удалить позицию?")) {
    return;
  };
    let response = await fetch(`admin_obr.php?id=${id}`);
    let result = await response.text();
    alert(result);
    let tr = buttonElem.parentElement.parentElement; // обращается к родэлементу, дважды поднимаемся наверх сначала попадаем в td затем в tr
    tr.remove(); // удаляем из таблицы без перезагрузки страницы
  };
  
  
</script>


<?php 
  require_once("components/footer.php");
?>