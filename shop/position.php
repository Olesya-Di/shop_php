<?php
  session_start();
  $title = "";
  require_once("components/header.php");
  require_once("components/db.php"); 

?>
  

  

  
<div class="container">
  <div class="row justify-content-center">
    
    <div class="col-4 cart-info"><img src="<?php echo $_SESSION['img']; ?>" alt="">
    </div>
    
    <div class="col-6">
      
      <div class="product-info m-2">
          <b>Наименование</b>
          <span><?php echo $_SESSION['position']; ?></span>
          
          
        </div>
        
        <div class="product-info m-2">
          <b>Цена</b>
          <span><?php echo $_SESSION['price']; ?> руб.</span>
          
        </div>
        
        <div class="product-info m-2">
          <b>Количество</b>
          <span><?php echo $_SESSION['quantity']; ?> шт.</span>
         
        </div>
        
        <div class="product-info m-2">
          <b>Параметры</b>
          <span><?php echo $_SESSION['parameters']; ?></span>
          
        </div>
        
        <div class="product-info m-2">
          <b>Описание</b>
          <span><?php echo $_SESSION['img']; ?></span>
          
        </div>
      
    </div>
    
      <div class="col-2">
        <p class="text-danger info-text mb-2 font-weight-bold d-none">ytghfhfh</p>
      
     
          <button class="btn btn-primary" onclick="transition()">Разместить в каталоге</button>
     <!-- <form action="gl_obr.php" method="POST" class="gl-form">  
        
      </form> --> 
      </div>
  </div>
</div>
  
 
  <script>
  
  function transition() {
    window.location.href = "catalog.php";
  }
  
  </script> 
  