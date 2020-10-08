<?php
header('Content-Type: text/html; charset=utf-8');
$password = "12345";

$md5 = md5($password);
echo var_dump($md5);

if($md5 == md5("12345")) {
    echo "Пароли совпадают <br>";
}


$filename = "picture.jpg";
$uniqName = md5(time() . $filename) . '.jpg';

echo "<br>";

echo $uniqName . "<br>";

echo md5('240610708') . "<br>";
echo md5('QNKCDZO') . "<br>";
echo var_dump(md5('240610708') == md5('QNKCDZO'));