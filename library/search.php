<?php
require_once "connect.php";
$search = $_GET["search"];
$result = $mysql->query("SELECT book.img,book.title, book.id_book, book.id_genre, author.name_author, book.id_author 
FROM `book`, `author` 
WHERE book.id_author=author.id_author 
and book.title 
like '%$search%' 
or book.id_author=author.id_author 
and author.name_author 
like '%$search%'");
?>

<div class="main-content container">
            <a href=""><h3 class="content-title">Популярные</h3></a>
            <div class="main-grid">
                <?php
                if (mysqli_num_rows($result) == 0){
                echo"net";
                }
                else {
                if (mysqli_num_rows($result) > 0) ;
                {

                $card = mysqli_fetch_array($result);


                do {
                echo '
                   
                   <a href=""><div class="main-grid-card">
                    <img class="main-grid-card__img" src="' . $card["img"] . '" alt="">
                    <div class="main-grid-card__content">
                        <div class="main-grid-card__text">
                            <div class="main-grid-card__title">' . $card["title"] . '</div>
                            <div class="main-grid-card__author">' . $card["name_author"] . $card["surname_author"] . ' </div>
                        </div>
                        <div class="main-grid-card__view">
                            <img src="images/view-icon.svg" alt="">
                            <div class="main-grid-card__view-text">'. $card["view"].'</div>
                        </div>
                    </div>
                </div></a>
                ';
                } while ($card   = mysqli_fetch_array($result));
                }
                }
                ?>
            </div>
        </div>
