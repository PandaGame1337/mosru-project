<?php
require_once "connect.php";
$login = $_COOKIE["login"];
$result1 = $mysql->query("SELECT id FROM user where login='$login'");


if (mysqli_num_rows($result1) == 0){
    echo "net1";
    }
else {
    //ДОБАВЛЕНИЕ
    if (mysqli_num_rows($result1) > 0){

        $card1 = mysqli_fetch_array($result1);

        do {

            $id = $card1["id"];
            $id_book = $_GET["id_book"];
            $id_librarys = $_GET["id_librarys"];

            $result2 = $mysql->query("INSERT INTO `user_books` (`id_record`, `id_book`, `id_user`, `id_librarys`)
            VALUES (NULL, '$id_book', '$id', '$id_librarys')");



        } while ($card1 = mysqli_fetch_array($result1));
    }
}


header('Location: http://test.local/library/index.php');
?>




