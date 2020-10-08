<?php
$title = "Регистрация";
require_once("components/header.php");
//include (загрузит страницу, если в подключаемом файле есть ошибка), include_once, require (не загрузит страницу, если в подключаемом файле ошибка), require_once (используется в 90% случаев)
?>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
            <h1 class="my-4 text-center">Регистрация</h1>
            
            </div>
            <div class="col-6">
            <form action="reg_obr.php" method="POST" class="reg-form">
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
                <div class="input-group mb-3">
                 <div class="input-group-prepend">
                       <span class="input-group-text"><i class="fa fa-id-card" aria-hidden="true"></i></span>
            </div>
            
                <input type="text" class="form-control" placeholder="Введите имя" name = "name" required>
                </div>
                <div class="input-group mb-3">
                 <div class="input-group-prepend">
                       <span class="input-group-text"><i class="fa fa-book" aria-hidden="true"></i></span>
            </div>
            
                <input type="text" class="form-control" placeholder="Введите фамилию" name = "lastname" required>
                </div>
                <p>Дата рождения</p>
                <div class="input-group mb-3">
                 <div class="input-group-prepend">
                       <span class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></span>
            </div>
                <input type="date" class="form-control" name = 'birthday' required>
                </div>          
                <p class="error-message text-danger"></p>
                <input type="submit" value="Зарегистрироваться" class="btn btn-primary btn-block">      
            </form>
            <div class="alert alert-success d-none" role="alert">
                Пользователь успешно зарегистрирован 
                </div>
            </div>
        </div>
    </div>
    <script>
    let regForm = document.querySelector(".reg-form");
    regForm.onsubmit = function(event) {
        event.preventDefault();
        send();
    }
    /*function send() {
        let formData = new FormData(regForm);
        //console.log([formData.get("login"), formData.get("password"), formData.get("name")]);
        let requestLink = regForm.getAttribute("action");
        let requestMethod = regForm.getAttribute("method");
        console.log(requestLink, requestMethod);
        fetch(requestLink, {
            method: requestMethod,
            body: formData,
        })
        .then(function(response) {return response.text()})
        .then(function(result) {
            if(result == "ok") {
                showSuccessAlert(`Пользователь ${formData.get("login")} успешно зарегистрирован`);
                setTimeout(function(){
                    window.location.href = "auth.php";
                }, 3000)
            } else {
                changeErrorMessage(result);
            }
        });
        console.log("Я перед промисом?")
    }*/

    async function send() {
        let formData = new FormData(regForm);
        let requestLink = regForm.getAttribute("action");
        let requestMethod = regForm.getAttribute("method");
        let response = await fetch(requestLink, {
            method:requestMethod,
            body:formData,
        });
        let result = await response.text();
        if(result == "ok") {
            showSuccessAlert(`Пользователь ${formData.get("login")} успешно зарегистрирован`);
                setTimeout(function(){
                    window.location.href = "auth.php";
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
    function showSuccessAlert(message = "Пользователь успешно зарегистрирован") {
        let successAlert = document.querySelector(".alert-success");
        regForm.style.display = "none";
        successAlert.classList.remove("d-none");
        successAlert.innerHTML = message;
    }
    </script>
    <?php 
require_once("components/footer.php");
?>