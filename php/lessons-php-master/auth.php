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
            <form action="auth_obr.php" method="POST">
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
                <input type="submit" value="Войти" class="btn btn-primary btn-block">      
            </form>
            </div>
        </div>
    </div>
<?php
require_once("components/footer.php");
?>