  <?php
  require_once("components/header.php");
  $title = "Аутентификация";
  
  ?>
  <body>
    <h1 class="text-center mt-5">Аутентификация</h1>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-6">
          <form action="auth_obr.php" method="POST" class="auth-form">
            
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
            
            <p class="text-danger info-text mb-2 font-weight-bold d-none"></p>
            
            <input type="submit" class="btn btn-primary btn-block" value="Войти">
          </form>
          
        </div>
      </div>
    </div>
    <script>
      "use strict"
      let form = document.querySelector(".auth-form");
      
      form.onsubmit = function(event) {
        event.preventDefault(); // прерываем стандартное обновление страницы
        send();
      }
      
      async function send() { 
        let form = document.querySelector(".auth-form");
        let formData = new FormData(form);
        let response = await fetch("auth_obr.php", { // результат работы феттча бт записан в респонс
          method: "POST",
          body: formData,
        });
        let result = await response.text();
        if (result == "1") {
          window.location.href = "gl_page.php";
        } else {
          let infoText = document.querySelector(".info-text");
          infoText.classList.remove("d-none");
          infoText.innerHTML = result;
        }
      }
      
    </script>
  <?php
    require_once("components/footer.php");
  ?>
