<?
session_start();
if (!isset($_SESSION['id']) || $_SESSION['isAdmin'] == 0) {
    exit("Недостаточно прав");
}
require_once("components/db.php");

$result = $mysqli->query("SELECT `id`, `login`, `name`, `lastname`, `birthday`, `isAdmin` FROM `users` WHERE 1");
for($users = []; $row = $result->fetch_assoc(); $users[] = $row);

$response = json_encode($users);
exit($response);
