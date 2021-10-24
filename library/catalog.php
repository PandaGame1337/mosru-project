<?php

require_once "connect.php";
$result2 = $mysql->query("SELECT book.img,book.title, 
       author.name_author,author.surname_author, book.view,book.id_book, book.id_genre
FROM `book`, `author` WHERE book.id_author=author.id_author ");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="images/system-logo.png">
    <title>Каталог</title>
</head>
<body>
    <header>
        <div class="main-navbar">
            <div class="navbar-top">
                <div class="navbar-top-right">
                    <a href="index.php">
                        <!-- <img src="images/mos-logo.svg" alt=""> -->
                        <span class="mos-logo">mos.ru</span>
                        <span>Официальный сайт Мэра Москвы</span>
                    </a>
                </div>
                <div class="navbar-top-left">
                    <a href="">
                        <img src="images/user-icon.svg" alt="">
                        <span>Личный кабинет</span>
                    </a>

                </div>
            </div>
            <div class="navbar-bottom">
                <ul class="navbar-bottom-list">
                    <a href="" class="navbar-bottom-list__item">
                        <li>Новости</li>
                    </a>
                    <a href="" class="navbar-bottom-list__item">
                        <li>Афиша</li>
                    </a>
                    <a href="" class="navbar-bottom-list__item">
                        <li>Услуги</li>
                    </a>
                    <a href="" class="navbar-bottom-list__item">
                        <li>Мэр</li>
                    </a>
                    <a href="" class="navbar-bottom-list__item">
                        <li>Власть</li>
                    </a>
                    <a href="" class="navbar-bottom-list__item">
                        <li>Карта</li>
                    </a>
                    <a href="" class="navbar-bottom-list__item">
                        <li>Мой район</li>
                    </a>
                    <a href="" class="navbar-bottom-list__item">
                        <li>Инструкция</li>
                    </a>
                    <a href="" class="navbar-bottom-list__item">
                        <li>Обратная связь</li>
                    </a>
                </ul>
                <div class="navbar-bottom-search">
                    <a href=""><img src="images/search-icon.svg" alt=""></a>
                </div>
            </div>
        </div>
    </header>
    <section class="catalog">
        
        <div class="catalog-filter">
            <form class="catalog-filter-form" action="search.php" method="get">
                <div class="filter-form-unput-main">
                    <input class="filter-form-unput" type="text" placeholder="Название, автор" >
                    
                </div>
                <div class="filter-form-select-main">
                    <select class="filter-form-select">
                        <option disabled selected class="filter-form-option">Выбирите автора</option>
                        <option class="filter-form-option">Анастасия Шерр</option>
                        <option class="filter-form-option">Анастасия Шерр</option>
                        <option class="filter-form-option">Анастасия Шерр</option>
                        <option class="filter-form-option">Анастасия Шерр</option>
                      </select>
                </div>
                <div class="filter-form-select-main">
                    <select class="filter-form-select">
                        <option disabled selected class class="filter-form-option">Жанр книги</option>
                        <option class="filter-form-option">Пункт 2</option>
                        <option class="filter-form-option">Пункт 2</option>
                        <option class="filter-form-option">Пункт 2</option>
                        <option class="filter-form-option">Пункт 2</option>
                      </select>
                </div>
                <div class="filter-form-select-main">
                    <select class="filter-form-select">
                        <option disabled selected class class="filter-form-option">Вид книги</option>
                        <option class="filter-form-option">Электронная</option>
                        <option class="filter-form-option">Бумажная</option>
                      </select>
                </div>
                <button class="filter-form-submit" type="submit">Найти</button>
            </form>
        </div>
        <div class="catalog-main">
            <h1 class="name-catalog-main">Каталог</h1>
            <div class="catalog-main-list">
<?php
                if (mysqli_num_rows($result2) == 0){
                echo"net";
                }
                else {
                if (mysqli_num_rows($result2) > 0) ;
                {

                $card2 = mysqli_fetch_array($result2);


                do {
                echo '
               
                <a href="redirect.php?id=' . $card2["id_book"] . '&genre='.$card2["id_genre"].'"><div class="main-grid-card">
                    <img class="main-grid-card__img" src="'. $card2["img"].'" alt="">
                    <div class="main-grid-card__content">
                        <div class="main-grid-card__text">
                            <div class="main-grid-card__title">'. $card2["title"].'</div>
                            <div class="main-grid-card__author">' . $card2["name_author"] . $card2["surname_author"] . '</div>
                        </div>
                        <div class="main-grid-card__view">
                            <img src="images/view-icon.svg" alt="">
                            <div class="main-grid-card__view-text">'. $card2["view"].'</div>
                        </div>
                    </div>
                </div></a>
                ';
                } while ($card2 = mysqli_fetch_array($result2));
                }
                }
?>

                
            </div>

        </div>
    </section>
        
</body>
</html>
