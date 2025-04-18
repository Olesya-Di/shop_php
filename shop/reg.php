<?php
  $title = "Регистрация";
  $styleReg = "
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
  
  require_once("components/header.php"); 
?>
  <body>
    <h1 class="text-center mt-5">Регистрация покупателя</h1>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6">
         
          <form action="reg_obr.php" method="POST" class="reg-form">
            
             <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Введите имя" name="nameb">
            </div>
            
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-sign-in" aria-hidden="true"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Введите логин" name="loginb" required>
          </div>
          
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
              </div>
              <input type="password" class="form-control" placeholder="Введите пароль" name="pass">
            </div>
            
            <p class="text-danger info-text mb-2 font-weight-bold d-none">ytghfhfh</p>
              <input type="submit" class="btn btn-primary btn-block" value="Зарегистрироваться">
          </form>
        </div>
      </div>
    </div>
    
    
    <div class="modal-window">
      <div class="background"></div>
      <div class="info-window p-3">
        <h3 class="modal-title">Титул</h3>
        <hr class="my-2">
        <p class="modal-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, tenetur, eligendi? Ipsum, modi, incidunt, at nam non iusto dicta soluta atque voluptatem accusantium corrupti numquam vero neque tempore debitis alias.</p>
        <button class="btn btn-secondary float-right close-btn">Вперед за покупками!</button>
      </div>
    </div>
    <script>
      
      let form = document.querySelector(".reg-form");
      form.onsubmit = function (event) {  // на форму навешиваем событие, которое будет выполнять ф-ю send() при нажатии на кн.Зарегистрироваться
        event.preventDefault(); // прерывает станд.событие, т.е. переход на др.страницу и выполняет код, который прописан далее
        send();
      }
      
      function send() { // собирает инпуты и
        let form = document.querySelector(".reg-form"); // находим форму 
        let formData = new FormData(form); // формируем formData и передаем элемент формы, найденной на прошлой строке
       
        // console.log([formData.get("login"), formData.get("pass"), formData.get("name")]);  // get забрать append присоединяет данные  // в "" указываем то что написано в атрибутах name наших инпутов
        
         
        fetch("reg_obr.php", { // опции создаются объектом
          method: "POST", 
          body: formData, // тело самого запроса в body передаем formdata
        }) //fetch  return  response. рез-ом работы fetch б.т (возвращает) переменная response (ответ) 
        
        .then(response => response.text()) // response принимаем ответ сервера
        .then(result => { 
          if (result == "1") {
            showModal("Успех!", "Вы зарегистрированы!", function() {
              window.location.href = "gl_page.php";
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
      
      let modalTitle = document.querySelector(".modal-title"); // находим титл и текст 
      let modalText = document.querySelector(".modal-text");
      modalTitle.innerHTML = title;       //меняем титл и текст
      modalText.innerHTML = text;
      
      let closeButton = document.querySelector(".close-btn"); // находим кнопку закрыть
      closeButton.onclick = function() { // при нажатии на нее
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
  
  
  
  
    