<?php

$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);


require_once "connect.php";

$result = $mysql->query("SELECT * FROM `user` WHERE `login` = '$login' AND `password` = '$password'");

$user = $result->fetch_assoc();

if(count($user) == 0) {
    echo "Логин или пароль введен неправильно";
    exit();
}
setcookie('login', $user['login'], time() + 3600, "/");
setcookie('password', $user['password'], time() + 3600, "/");

$mysql->close();
header('Location: http://test.local/library/ ');
exit();

