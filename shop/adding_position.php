<?php
  session_start();
  $title = "Добавление товаров";
  $styleAddPos = "
    .modal-window {
      display: none;
    }
    
    .modal-window .background {
      position: fixed;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      background-color: rgba(0, 0, 0, .7);
    }
    .modal-window .info-window {
      position: fixed;
      width: 60%;
      top: 50%;
      left: 50%;
      background: white;
      transform: translate(-50%, -50%);
    }
  ";
  if(!$_SESSION['isAdminb']) { 
    header("Location: gl_page.php");
  }
  require_once("components/header.php"); 
  
  ?>
  
  <body>
    <h1 class="text-center mt-5">Позиция</h1>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6">
          <form action="adding_position_obr.php" method="POST" class="adding-form">
            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-sign-in" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Наименование" name="position">
            </div>
            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
              </div>
              <input type="number" class="form-control" placeholder="Количество" name="quantity">
            </div>
            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
              </div>
              <input type="number" class="form-control" placeholder="Цена, руб." name="price">
            </div>  
            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Категория" name="category" list="categories">
                <datalist id="categories">
                  <option value="boy" />
                  <option value="girl" />
                  <option value="man" />
                  <option value="woman" />
                  
                </datalist>
            </div>
            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Параметры" name="parameters">
            </div>
            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Описание" name="description">
            </div>
            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Адрес изображения" name="img">
            </div>
          
            <p class="text-danger info-text mb-2 font-weight-bold d-none"></p>
            <input type="submit" class="btn btn-primary btn-block" value="Добавить товар">
            
            
          </form>
        </div>
      </div>
    </div>
    
    <div class="modal-window">
      <div class="background"></div>
      <div class="info-window p-3">
        <h3 class="modal-title">Титул</h3>
        <hr class="my-2">
        <p class="modal-text">Lorem </p>
        <button class="btn btn-secondary float-right close-btn">ok</button>
      </div>
    </div>
   
    <script>
    
      let form = document.querySelector(".adding-form");
      form.onsubmit = function (event) {  
        event.preventDefault();
        send();
      }
      
      function send() { 
        let form = document.querySelector(".adding-form"); 
        let formData = new FormData(form); 
       
        fetch("adding_position_obr.php", { 
          method: "POST", 
          body: formData, 
        }) 
        
        .then(response => response.text()) 
        .then(result => { 
          if (result == "1") {
            showModal("Успешно!", "Товар добавлен в каталог.", function() {
              window.location.href = "card_cor.php";
            });
          } else {
            let infoText = document.querySelector(".info-text");
            infoText.classList.remove("d-none"); // коллекция классов и указываем, какой класс удалить
            infoText.innerHTML = result;
          }
        });
    }
    
    function showModal(title, text, callback = null) { // появление модального окна
      let modalWindow = document.querySelector(".modal-window");
      modalWindow.style.display = "block";
      
      let modalTitle = document.querySelector(".modal-title");
      let modalText = document.querySelector(".modal-text");
      modalTitle.innerHTML = title;       
      modalText.innerHTML = text;
      
      let closeButton = document.querySelector(".close-btn"); 
      closeButton.onclick = function() { 
        if(callback) {
          callback();
        }
        modalWindow.style.display = "none";
      }
    }
    
    </script>
  <?php
    require_once("components/footer.php");
  ?>
  
  
  
  
    