<?php

class Goose extends Birds
{
    public static $animal_goose = 0;

    function tryToFly()
    {
        echo "Гусь *топ-топ*<br>";
    }

    function say()
    {
        echo "Кря<br>";
    }

    function __construct()
    {
        (++self::$animal_goose);
        self::tryToFly();
    }
}

class Turkey extends Birds
{
    public static $animal_turkey = 0;

    function tryToFly()
    {
        echo "Индюк *топ-топ*<br>";
    }

    function say()
    {
        echo "Бип-бип<br>";
    }

    function __construct()
    {
        (++self::$animal_turkey);
        self::tryToFly();
    }
}

class Horse extends Animal
{
    public static $animal_horse = 0;
    function walk()
    {
        echo "Лошадь *топ-топ*<br>";
    }
    function say()
    {
        echo "Прррф<br>";
    }
    function __construct()
    {
        (++self::$animal_horse);
        self::walk();
    }
}

class Cow extends Animal
{
    public static $animal_cow = 0;
    function walk()
    {
        echo "Корова *топ-топ*<br>";
    }
    function say()
    {
        echo "Муу-у-у<br>";
    }
    function __construct()
    {
        (++self::$animal_cow);
        self::walk();
    }
}

class Pig extends Animal
{
    public static $animal_pig = 0;
    function walk()
    {
        echo "Свинья *топ-топ*<br>";
    }
    function say()
    {
        echo "Хрюю-ю<br>";
    }
    function __construct()
    {
        (++self::$animal_pig);
        self::walk();
    }
}
class Chicken extends Birds
{
    public static $animal_chicken = 0;
    function tryToFly()
    {
        echo "Курица *топ-топ*<br>";
    }
    function say()
    {
        echo "Ко-ко-ко<br>";
    }
    function __construct()
    {
        (++self::$animal_chicken);
        self::tryToFly();
    }
}

class Farm
{
    public $animals = [];

    public function addAnimal(Animal $animal)
    {
        array_push($this->animals, $animal);

        foreach ($this->animals as $animal) {
            $animal->walk();
        }
    }

    public function rollCall()
    {

        foreach ($this->animals as $animal) {
            $animal->say();
        }
    }
}

class BirdFarm
{
    public $birds = [];

    public function addBird(Birds $bird)
    {
        array_push($this->birds, $bird);

        foreach ($this->birds as $bird) {
            $bird->tryToFly();
        }
    }

    public function rollCall()
    {

        foreach ($this->birds as $bird) {
            $bird->say();
        }
    }
}

class Farmer
{
    function addAnimal(Farm $farm, Animal $animal)
    {
    }
    function rollCall(Farm $farm)
    {
    }
}

abstract class Animal
{
    abstract function walk();
    abstract function say();
}

abstract class Birds
{
    abstract function tryToFly();
    abstract function say();
}

$cow = new Cow();
$pig1 = new Pig();
$pig2 = new Pig();
$chicken = new Chicken();
$turkey1 = new Turkey();
$turkey2 = new Turkey();
$turkey3 = new Turkey();
$horse1 = new Horse();
$horse2 = new Horse();
$goose = new Goose();

$farm = new Farm();
$birdfarm = new BirdFarm();
echo '<br>';
echo 'Перекличка: ';

$farm->rollCall();
$birdfarm->rollCall();
