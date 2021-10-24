<?php
require_once "connect.php";

$name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
$mail = filter_var(trim($_POST['mail']), FILTER_SANITIZE_STRING);

$mysql->query("INSERT INTO `user` (`id`,`name`, `login`, `password`, `mail`)
  VALUES ( NULL, '$name', '$login', '$password', '$mail');");
$mysql->close();

header('Location: http://test.local/library/ ');

