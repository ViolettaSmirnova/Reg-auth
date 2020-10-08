<?php
 session_start();                //Функция подключения к сессии
$title = "Личный кабинет";
require_once("components/header.php");

if (!isset($_SESSION['id'])) {
    exit("<script>window.location.href= 'auth.php'</script>");  
}
?>
<div class="container">
    <div class="row justify-content-center">
<div class="col-12">
<h1 class="text-center">Личный кабинет</h1>
</div>
<div class="col-6">
    <p>ID: <span><?php echo $_SESSION['id'] ?></span></p>
    <p>login: <span><?php echo $_SESSION['login'] ?></span></p>
    <p>Имя: <span><?php echo $_SESSION['name'] ?></span></p>
    <form action="lk_obr.php" method="POST" class="border p-2">
        <p>Изменить имя</p>
        <input type="text" placeholder="Введите новое значение" name="name">
        <input type="submit" class="btn btn-primary" value="Изменить">
        </form>
        <p>Фамилия: <span><?php echo $_SESSION['lastname'] ?></span></p>
        <form action="lk_obr.php" method="POST" class="border p-2">
        <p>Изменить фамилию</p>
        <input type="text" placeholder="Введите новое значение" name="lastname">
        <input type="submit" class="btn btn-primary" value="Изменить">
        </form>
        <p>Дата рождения: <span><?php echo $_SESSION['birthday'] ?></span></p>
        <form action="lk_obr.php" method="POST" class="border p-2">
        <p>Изменить дату рождения</p>
        <input type="date" placeholder="Введите новое значение" name="birthday">
        <input type="submit" class="btn btn-primary" value="Изменить">
        </form>
</div>
</div>
</div>
<?php
require_once("components/footer.php");
?>