<?php
header('Content-Type: text/html; charset=utf-8');
//$_GET
//$_POST
//В данном случае тег можно не закрывать
//Прописываем прием данных из панели регистрации(две супер-глобальные переменные)чтобы принять гет запрос-$_GET,чтобы принять пост запрос -$_POST
    $login = $_POST['login'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $birthday = $_POST['birthday'];

    $login = trim($login); //trim() - обрезает лишние пробелы справа и слева
    $password = trim($password);
    $name = trim($name);
    $lastname = trim($lastname);
    $birthday = trim($birthday);

    $login = htmlspecialchars($login); //htmlspecialchars() - преобразует символы в html-сущности       
    $password = htmlspecialchars($password);
    $name = htmlspecialchars($name);
    $lastname = htmlspecialchars($lastname);
    $birthday = htmlspecialchars($birthday);

    if (empty($login) || empty($password) || empty($name) || empty($lastname) || empty($birthday)) {
        exit("Не все поля заполнены");
    }

    require_once("components/db.php");

$result = $mysqli->query ("SELECT * FROM `users` WHERE `login` = '$login'");
$result = $result->fetch_assoc();


if(isset($result)) {
    exit("Такой пользователь уже существует!");
}

$password = password_hash($password, PASSWORD_BCRYPT);

$result = $mysqli->query ("INSERT INTO `users`(`login`, `password`, `name`, `lastname`, `birthday`) VALUES ('$login', '$password', '$name', '$lastname', '$birthday')");

if ($result) {
    exit("Пользователь $login успещно добавлен");
} else {
    exit("Не удалось добавить пользователя");
}


    echo "$login ! $password ! $name ! $lastname ! $birthday";


?>  