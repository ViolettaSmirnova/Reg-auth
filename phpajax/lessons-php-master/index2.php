<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Изучаем php";?></title>
</head>
<body>
    <?php echo "<h1>Привет, мир!</h1>";?>
    <hr>
<?php
$a = 3.14;
echo floor($a) . "<br>"; //Округление вниз
echo round($a) . "<br>"; //По мат. принципу
echo ceil($a) . "<br>"; //Округление вверх
$b = 5.42876438945497;
echo round($b, 2) . "<br>"; //Оставляем 2 цифры после запятой

$random = rand(100, 1000);
echo $random . "<br>";  

$name = "Василий";
$message1 = "Привет, $name!";
echo $message1 . "<br>";
$message2 = "Привет, $name!";
echo $message2 . "<br>";

$form = "
<form>
    <input type = 'text'>
    <input type = \"password\">
    <input type = \"submit\">
</form>
";
echo $form;
echo "<br>";

$str = "Съешь еще";
//echo $str[0]; - не получится, строки не являются массивами символов
echo mb_strlen($str); // mb - multibyte

?>
   
</body>
</html>