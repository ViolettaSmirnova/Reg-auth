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
    //Переменные
    $name = "Василий";
    echo "Привет, " . $name . "!";
    //Типы данных
    $a = 42; //integer - целое число
    $b = 42.5; //float - дробное число
    $c = "Строка"; //string - строка
    $d = true; //boolean - логический тип
    $e = [1, 2, 3]; // array - массив
    //$f = new Product(); //object - объект
    $g = null; //Null - ничего
    //$h = resourse - тип данных для файлов
    $param = 100;
    $param = "сто";
    //Преобразование(приведение) типов
    //Числовое
    echo "<br>";
    $summ = "2" + "3";
    echo $summ . "<br>";
    $summ2 = 10 * "a";
    echo $summ2 . "<br>";
    $summ3 = 10 * "10 a";
    echo $summ3 . "<br>";
    //Строковое
    $a = (string)129;
    echo var_dump($a) . "<br>";//"129"
    $b = (string)true;
    echo var_dump($b) . "<br>";//"1"
    $c = (string)['Яблоко', 'Банан', 'Груша'];
    echo var_dump($c) . "<br>";//"Array
    $d = (string)null;
    echo var_dump($d) . "<br>";//""
    //Логическое
    $a = (boolean)42;
    echo var_dump($a) . "<br>"; //true
    $b = (boolean)0;
    echo var_dump($b) . "<br>"; //false
    $c = (boolean)"строка";
    echo var_dump($c) . "<br>"; //true
    $d = (boolean)"";
    echo var_dump($d) . "<br>"; //false
    $e = (boolean)null;
    echo var_dump($e) . "<br>"; //false
    $f = (boolean)"0";
    echo var_dump($f) . "<br>"; //false
    define("GREAT_MESSAGE", "Hello");
    echo GREAT_MESSAGE;
    //Операторы
    $a = 5;
    $b = 7;
    $result = $a + $b;
    $result = $a - $b;
    $result = $a / $b;
    $result = $a * $b;
    $result = $a % $b;
    $result = $a ** $b;
    //Операторы сравнения
    $a = 5;
    $b = 7;
    $result = $a > $b;
    $result = $a < $b;
    $result = $a == $b; //"5" == 5 true
    $result = $a === $b; //"5" === 5 false
    $result = $a != $b;
    $result = $a !== $b;
    //Логические операторы
    $result = ($a > $b) && ($a > 0);
    $result = ($a > $b) and ($a > 0);

    $result = ($a > $b) || ($a > 0);
    $result = ($a > $b) or ($a > 0);

    $result = !$a;// "false", 0, null, "0" = true
    ?>
    <hr>
    <?php
    //Основные конструкции
    //Условия
    /*$a = 10;
    if($a > 0) {
        echo "Число положительное";
    } else if ($a < 0) {
        echo "Число отрицательное";
    } else {
        echo "Число равно 0";
    }

    echo "<br>";
    $nominal = "180";
    switch ($nominal) {
        case '10' :
            echo "Десять рублей";
            break;
        case "5" :
            echo "Пять рублей";
            break;
        case "2" :
            echo "Два рубля";
          break;
        case "1" :
            echo "Один рубль";
            break;
        default:
            echo "Неверный номинал";
            break;
    }*/
    //Циклы
    /*echo "<br>";
    $a = 0;
    while ($a < 10) {
        echo $a . "<br>";
        $a++;
    }
    $b = 10;
    do {
        echo $b . "<br>";
        $b++;
    }    while ($b > 100);
    for ($i = 0; $i < 100; $i++) {
        echo $i . "<br>";
    }*/
    echo "<br>";
    $catalog = ["Яблоко", "Банан", "Виноград"];
    foreach ($catalog as $product) {
        echo $product . "<br>";
    }
    $catalog = [
        "shelf1" => "Яблоко", 
        "shelf2" => "Банан", 
        "shelf3" => "Виноград"
    ];
    foreach ($catalog as $key => $product) {
    echo "На полке " . $key . " лежит " . $product . "<br>";
    }
    ?>
    <table border = "1">
        <?php
        for ($i = 1; $i < 10; $i++) {
            echo "<tr>";
            for($j = 1; $j < 10; $j++) {
                echo "<td>" . $j .  "*" . $i . "=" . $i * $j . "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
    <?php 
echo var_dump( isPositive(10) );
    function isPositive($number) {
        if($number > 0) {
            return true;
        } else {
            return false;
        }
    }
    echo "<br>";
    //Области видимости
    $a = 10; // глобальная переменная, видна во всем документе
    echo $a . "<br>";
    if(true) {
        $b = 20; //Глобальная переменная
    }
    echo $b . "<br>";
    for ($i = 0; $i < 1; $i++) {
        $c = 30; //Глобальная переменная
    }
    echo $c . "<br>";
    //Все переменные внутри функции локальны
    function f() {
        $d = 40; //Локальная переменная для функции
    }
    //echo $d . "<br>" - переменная $d не видна
    $e = 50;
    function f2() {
        global $e;
        echo var_dump($e);
        $e = 10;
    }
    f2();
    echo $e;
    ?>

    //СЛЕДУЮЩИЙ УРОК
   
</body>
</html>