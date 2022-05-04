<?php
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
