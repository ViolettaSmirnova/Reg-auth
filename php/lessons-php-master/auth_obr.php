<?php
session_start();// запустить начало сессии
    $login = $_POST['login'];
    $password = $_POST['password'];

    $login = htmlspecialchars(trim($login));
    $password = htmlspecialchars(trim($password));

    
    require_once("components/db.php");


    if(empty($login) || empty($password)) {
        exit("Не все поля заполнены!"); 
    }

$result = $mysqli->query ("SELECT * FROM `users` WHERE `login` = '$login'")->fetch_assoc();

if(isset($result) && password_verify($password, $result['password'])) {
    $_SESSION['id'] = $result['id'];
    $_SESSION['login'] = $result['login'];
    $_SESSION['name'] = $result['name'];
    $_SESSION['lastname'] = $result['lastname'];
    $_SESSION['birthday'] = $result['birthday'];
    $_SESSION['isAdmin'] = $result['isAdmin'];
    
    echo("Пользователь успешно вошёл!");
    exit("<script>window.location.href = 'lk.php'</script>");

} else {
    exit("Неверный логин или пароль!");
}
