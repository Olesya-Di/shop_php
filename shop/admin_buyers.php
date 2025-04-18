<?php 
  session_start();
  
  if(!$_SESSION['isAdminb']) { 
    header("Location: gl_page.php");
  }
  
  require_once("components/header.php");
  $title = "Администрирование покупателей";
  
  
?>

<div class="container">
  <div class="row justify-content-center"> 
    <div class="col-12">
      <h1 class="text-center">Администрирование покупателей</h1>
      
      <table border="1" class="mx-auto"> 
        <thead>
          <tr>
            <th>ID</th>
            <th>login</th>
            <th>Имя</th>
            
            <th colspan ="3"> Действия</th>
            
          </tr>
        </thead>
        <tbody class="buyers-table-body">
        
        
        
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  getAllBuyers();
  async function getAllBuyers() {
    let response = await fetch("getAllBuyers.php"); // получаем данные методом get
    let buyers = await response.json(); // декодируем формат json в объект js
    // console.log(buyers);
    creatTable(buyers);
  }
  
  function creatTable(buyers) {
    let tbody = document.querySelector(".buyers-table-body")
    for(buyer of buyers) {
      tbody.innerHTML += `
        <tr>
          <td class="p-2">${buyer.idb}</td> 
          <td class="p-2">${buyer.loginb}</td>
          <td class="p-2">${buyer.nameb}</td>
          
          <td class="p-2">
            <button class="btn btn-danger" onclick="deleteBuyer(${buyer.idb}, event.target)">Удалить</button>
          </td>
         
        </tr>
      `;
    }
  }
  async function deleteBuyer(idb, buttonElem) {
    if (!confirm("Вы уверены, что хотите удалить пользователя?")) {
    return;
  };
    let response = await fetch(`admin_buyers_obr.php?idb=${idb}`);
    let result = await response.text();
    alert(result);
    let tr = buttonElem.parentElement.parentElement; 
    tr.remove();
  };
  
  
</script>


<?php 
  require_once("components/footer.php");
?>