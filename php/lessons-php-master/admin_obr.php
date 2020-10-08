<?
session_start();
require_once("components/db.php");

if(!isset($_SESSION['id']) || $_SESSION['isAdmin'] == 0) {
    header("Location: lk.php");
}

$deleteID = $_GET['id'];

if (!isset($deleteID) || $deleteID == 0) {
    exit("Некорректный ID");
}

$result = $mysqli->query("SELECT * FROM `users` WHERE `id` = '$deleteID'")->fetch_assoc();
if (!isset($result) || $result['isAdmin'] == 1) {
    exit("Некорректный ID");
}

$result = $mysqli->query("DELETE FROM `users` WHERE `id`='$deleteID'");
if($result) {
    header("Location: admin.php");
} else {
    exit("Не удалось удалить пользователя");
}