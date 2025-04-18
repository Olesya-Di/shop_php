<?php
  session_start();
  
  if(!$_SESSION['isAdminb']) { 
    header("Location: gl_page.php");
  }
  $title = "Изменение позиции";
  require_once("components/header.php");
  //echo var_dump($_SESSION);
  
?>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <h1 class="text-center">Изменение позиции</h1>
       
        <div class="product-info m-2">
          <b>ID</b>
          <span><?php echo $_SESSION['id']; ?></span>
        </div>
        
        <div class="product-info m-2">
          <b>Наименование</b>
          <span><?php echo $_SESSION['position']; ?></span>
          
          <form action="card_cor_obr.php" method="POST" class="d-inline-block">
            <input type="text" name="position">
            <input type="submit" class="btn btn-dark" value="Изменить">
          </form>
        </div>
        
        <div class="product-info m-2">
          <b>Количество</b>
          <span><?php echo $_SESSION['quantity']; ?></span>
          <form action="card_cor_obr.php" method="POST" class="d-inline-block">
            <input type="text" name="quantity">
            <input type="submit" class="btn btn-dark" value="Изменить">
          </form>
        </div>
        
        <div class="product-info m-2">
          <b>Цена</b>
          <span><?php echo $_SESSION['price']; ?></span>
          <form action="card_cor_obr.php" method="POST" class="d-inline-block">
            <input type="text" name="price">
            <input type="submit" class="btn btn-dark" value="Изменить">
          </form>
        </div>
        
        <div class="product-info m-2">
          <b>Категория</b>
          <span><?php echo $_SESSION['category']; ?></span>
          <form action="card_cor_obr.php" method="POST" class="d-inline-block">
            <input type="text" name="category">
            <input type="submit" class="btn btn-dark" value="Изменить">
          </form>
        </div>
        
        <div class="product-info m-2">
          <b>Параметры</b>
          <span><?php echo $_SESSION['parameters']; ?></span>
          <form action="card_cor_obr.php" method="POST" class="d-inline-block">
            <input type="text" name="parameters">
            <input type="submit" class="btn btn-dark" value="Изменить">
          </form>
        </div>
        
        <div class="product-info m-2">
          <b>Описание</b>
          <span><?php echo $_SESSION['description']; ?></span>
          <form action="card_cor_obr.php" method="POST" class="d-inline-block">
            <input type="text" name="description">
            <input type="submit" class="btn btn-dark" value="Изменить">
          </form>
        </div>
        
        <div class="product-info m-2">
          <b>Дополнительно</b>
          <span><?php echo $_SESSION['img']; ?></span>
          <form action="card_cor_obr.php" method="POST" class="d-inline-block">
            <input type="text" name="img">
            <input type="submit" class="btn btn-dark" value="Изменить">
            <br/>
            
          </form>
        </div>
        
        <!-- <form action="card_cor_obr.php" method="POST" class="d-inline-block"> -->
         <div class="product-info m-2">
           <button type="submit" class="btn btn-primary" onclick="postProduct()">Разместить</button>
         </div> 
        <!-- </form> -->
        
        
      </div>
    </div>
  </div>
  <script>
 
  async function deleteProduct(id, buttonElem) {
    if (!confirm("Вы уверены, что хотите удалить позицию?")) {
    return;
  };
    let response = await fetch(`card_obr.php?id=${id}`);
    let result = await response.text();
    alert(result);
    
  };
  
  function postProduct() {
    window.location.href = 'gl.php';
  };
  </script>
<?php
  require_once("components/footer.php");
?>
