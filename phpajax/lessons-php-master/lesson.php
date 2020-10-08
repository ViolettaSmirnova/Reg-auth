<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo "Изучаем php";?></title>
</head>
<body>
//СЛЕДУЮЩИЙ УРОК
    <?php
    echo "<br>";
    class Dog{
        protected $name;
        public $weight;

        function __construct($name, $weight) {
            $this->name = $name;
            $this->weight = $weight;
        }
        function bark(){
            if($this->weight < 10){
                print "tyaf-tyaf";
            } else {
                print "gav-gav";
            }
        }
    }
    $bobik = new Dog("Bobik", 19);
    $sharik = new Dog("Sharik", 9);

    class showDog extends Dog{
        public $owner;

        function __construct($name, $weight, $owner) {
            parent::__construct($name, $weight);
            $this->owner = $owner;
        }
        function bark(){
            print $this->name;
            parent::bark();
            print "woof-woof";
        }
        function dance(){
           
            print $this->name . " - is dancing";
        }
    }
    
    $dancer = new showDog("Dancer", 15, "Bob");
    /*$dog->name = "Bobik";
    $dog->weight = 19;

    $dog2 = new Dog();*/

    /*$sharik->name = "Sharik";
    $sharik->weight = 9;*/

    print_r($bobik);
    print "<br>";
    var_dump($sharik);
    echo "<br>";
    var_dump($dancer);

    echo "<br>";
    $bobik->bark();
    echo "<br>";
    $sharik->bark();
    echo "<br>";
    $dancer->dance();
    echo "<br>";
    $dancer->bark();


    home($dancer);
    home($bobik);
    home($sharik);
    
    function home(Dog $dog){
        $dog->bark();
        print "<br>";
        /*if($dog instanceof ShowDog{
            $dog->dance();
            print "<br>";
        }*/
        
    }
    ?>
    </body>
</html>