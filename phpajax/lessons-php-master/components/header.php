<?php
session_start();
?>
<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  
    <title><?php echo $title; ?></title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="auth.php">Главная <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="lk.php">Личный кабинет</a>
      <?php if ($_SESSION['isAdmin'] == 1): ?>
        <a class="nav-item nav-link" href="admin.php">Панель администратора</a>
      <?php endif;?>
    </div>
  </div>
  <?php if(isset($_SESSION['id'])):?>
  <a href="exit.php" class="btn btn-primary">Выйти</a>
  <?php else: ?>
    <a href="auth.php" class="btn btn-primary">Войти</a>
     <a href="reg.php" class="btn btn-primary">Регистрация</a>
  <?php endif; ?>
</nav>