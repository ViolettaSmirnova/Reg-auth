<?php
$title = "Аутентификация";
require_once("components/header.php");
//include (загрузит страницу, если в подключаемом файле есть ошибка), include_once, require (не загрузит страницу, если в подключаемом файле ошибка), require_once (используется в 90% случаев)
?>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
            <h1 class="my-4 text-center">Аутентификация</h1>
            
            </div>
            <div class="col-6">
            <form action="auth_obr.php" method="POST" class="auth-form">
            <div class="input-group mb-3">
                 <div class="input-group-prepend">
                       <span class="input-group-text"><i class="fa fa-user-circle" aria-hidden="true"></i></span>
            </div>
            
                <input type="text" class="form-control" placeholder="Введите логин" name = "login" required>
                </div>
                <div class="input-group mb-3">
                 <div class="input-group-prepend">
                       <span class="input-group-text"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
            </div>
            
                <input type="password" class="form-control" placeholder="Введите пароль" name = "password" required>
                </div>        
                <p class="error-message text-danger"></p>
                <input type="submit" value="Войти" class="btn btn-primary btn-block">      
            </form>
            <div class="alert alert-success d-none" role="alert">
                Пользователь успешно вошёл 
            </div>
        </div>
    </div>
    <script>
     let authForm = document.querySelector(".auth-form");
    authForm.onsubmit = function(event) {
        event.preventDefault();
        send();
    }
    
    async function send() {
        let formData = new FormData(authForm);
        let requestLink = authForm.getAttribute("action");
        let requestMethod = authForm.getAttribute("method");
        let response = await fetch(requestLink, {
            method:requestMethod,
            body:formData,
        });
        let result = await response.text();
        if(result == "ok") {
            showSuccessAlert(`Пользователь ${formData.get("login")} успешно вошел`);
                setTimeout(function(){
                    window.location.href = "lk.php";
                }, 3000)
            } else {
                changeErrorMessage(result);
        }
    }
    function changeErrorMessage(message) {
        if(!message) {
            message = "";
        }
        let errorMessage = document.querySelector(".error-message");
        errorMessage.innerHTML = message;
    }
    function showSuccessAlert(message = "Пользователь успешно вошёл") {
        let successAlert = document.querySelector(".alert-success");
        authForm.style.display = "none";
        successAlert.classList.remove("d-none");
        successAlert.innerHTML = message;
    }

    </script>
<?php
require_once("components/footer.php");
?>