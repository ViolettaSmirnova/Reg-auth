<?
session_start();
header('Content-Type: text/html; charset=utf-8');
require_once("components/db.php");
$userID = $_SESSION['id'];

foreach($_POST as $key=>$value) {
    changeData($key, $value);
}

function changeData($columnKey,  $newValue) {
    global $userID, $mysqli;
    if ($columnKey == "login" || $columnKey == "password" || $columnKey == "id") {
        exit("Нельзя изменить эти данные");
    }
    $result = $mysqli->query("UPDATE `users` SET `$columnKey`='$newValue' WHERE `id`='$userID' ");
    if($result) {
        $_SESSION[$columnKey] = $newValue;
        exit("Изменения внесены");
    } else {
        exit("Не удалось изменить данные");
    }
}