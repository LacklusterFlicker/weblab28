<?php
class User extends UserAbstract
{
    static $userCount = 0;
    public $name, $login, $password;

    function __construct($name, $login, $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        self::$userCount++;
    }

    function showInfo()
    {
        echo "Имя - {$this->name}, логин - {$this->login}, пароль - {$this->password}<br>";
    }

    function __destruct()
    {
        echo "Пользователь {$this->login} удален<br>";
    }
}
