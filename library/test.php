<?php
require_once "connect.php";
$result = $mysql->query("SELECT book.img,book.title, book.id_book, book.id_genre, author.name_author, book.id_author 
FROM `book`, `author` WHERE book.id_author=author.id_author");


if (mysqli_num_rows($result) == 0){
    echo"net";
}
else {
    if (mysqli_num_rows($result) > 0) ;
    {

        $card = mysqli_fetch_array($result);


        do {
            echo '
        
        <p>' . $card["title"] . '</p>
        <p>' . $card["name_author"] . '</p>
        <img src="' . $card["img"] . '">
';
        } while ($card = mysqli_fetch_array($result));
    }
}
