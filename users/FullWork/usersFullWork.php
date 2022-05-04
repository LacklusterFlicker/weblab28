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

class SuperUser extends User implements iSuperUser, iAuthorizeUser
{
    static $superUserCount = 0;
    public $role;

    function __construct($name, $login, $password, $role)
    {
        $this->role = $role;
        parent::__construct($name, $login, $password);
        self::$superUserCount++;
    }

    function showInfo()
    {
        echo "Имя - {$this->name}, логин - {$this->login}, пароль - {$this->password}, роль - {$this->role}<br>";
    }

    function getInfo()
    {
        return [
            "name" => $this->name,
            "login" => $this->login,
            "password" => $this->password,
            "role" => $this->role,
        ];
    }

    function auth($login, $password)
    {
        if ($this->login == $login && $this->password == $password) {
            return true;
        }
        return false;
    }
}

abstract class UserAbstract
{
    abstract function showInfo();
}

interface iSuperUser
{
    function getInfo();
}

interface iAuthorizeUser
{
    function auth($login, $password);
}

$user1 = new User("Олег", "Oleg123", "31234");
$user2 = new User("Андрей", "Andrey321", "12345");
$user3 = new User("Егор", "Egorws", "zxczxczxc");
$user4 = new SuperUser("Данил", "Danilka0303", "03032828", "Администратор");

$user1->showInfo();
$user2->showInfo();
$user3->showInfo();
$user4->showInfo();

echo '<br>';

print_r($user4->getInfo());
echo '<br>';
echo ($user4->auth('dasdasda', 'dzxd')) ? 'true' : 'false';
echo '<br>';
echo ($user4->auth('Danilka0303', '03032828')) ? 'true' : 'false';
echo '<br>';
echo '<br>';
echo "Всего обычных пользователей: " . User::$userCount;
echo '<br>';
echo "Всего супер-пользователей: " . SuperUser::$superUserCount;
echo '<br>';
echo '<br>';
