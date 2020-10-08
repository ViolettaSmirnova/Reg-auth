<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Изучаем php";?></title>
</head>
<body>
    <?php
    class Animal {
        public $name;
        public $property;
    }
    function __construct($name, $property) {
        $this->name = $name;
        $this->property = $property;
    }
    function showProperty(){
        print $this->$name . $property;
    }

    $cat = new Animal("cat","feline");
    $dog = new Animal("canine");
    $wolf = new Animal("canine");
    $lion = new Animal("feline");
    $duck = new Animal("anatidae");

    var_dump ($cat);

    ?>
    </body>
</html>