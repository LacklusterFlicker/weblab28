<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.class.php';
});

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
