<?php


require_once "connect.php";
$result1 = $mysql->query("SELECT  book.img,book.title, 
       author.name_author,author.surname_author, book.view,book.id_book, book.id_genre
FROM `book`, `author` WHERE book.id_author=author.id_author ORDER BY book.view DESC LIMIT 5");

$result2 = $mysql->query("SELECT book.img,book.title, 
       author.name_author,author.surname_author, book.view,book.id_book, book.id_genre
FROM `book`, `author` WHERE book.id_author=author.id_author and book.id_genre=7");

$result3 = $mysql->query("SELECT book.img,book.title, 
       author.name_author,author.surname_author, book.view,book.id_book, book.id_genre
FROM `book`, `author` WHERE book.id_author=author.id_author and book.id_genre=1");

?>

<!DOCTYPE html>
<html lang="ru">

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
    <title>Библиотека Москвы</title>
</head>

<body>
    <!-- header -->
    <header>
        <div class="main-navbar">
            <div class="navbar-top">
                <div class="navbar-top-right">
                    <a href="">
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
    <!-- end header -->
    <!-- top slider -->
    <section class="top-slider">
        <div class="slider js-topslider">
            <div class="slider-item">
                <div class="slider-title">Библиотека москвы</div>
                <div class="slider-text">Большая</div>
            </div>
            <div class="slider-item">
                <div class="slider-title">Библиотека москвы</div>
                <div class="slider-text">Большая</div>
            </div>
            <div class="slider-item">
                <div class="slider-title">Библиотека москвы</div>
                <div class="slider-text">Большая</div>
            </div>
        </div>
        
    </section>
    <!-- end top slider -->
    
    <!-- top-search -->
    <section class="top-search">
        <div class="search-content container">
            <form class="form-search" action="search.php" method="get">
                <input name="search" class="form-unput" type="text" placeholder="Название, автор" >
                <button class="button-unput-submit" type="submit">Найти</button>
            </form>
            <a class="search-link" href="catalog.php"><img src="images/book-icon.svg" alt="">Каталог</a>
          <?php
                if (!isset($_COOKIE['login']))
                {
                    echo '.<a class="search-link" href="signin.html"><img src="images/user-icon-red.svg" alt="">Кабинет пользователя</a> .';
                }
                else{
                    echo '.<a class="search-link" href="profile.php"><img src="images/user-icon-red.svg" alt="">'.$_COOKIE['login'].'</a> .';
                }
                ?>
        </div>
    </section>
    <!-- end top-search  -->
    
    <!-- content -->
    <section class="content">
        <div class="main-content container">
            <a href=""><h3 class="content-title">Популярные</h3></a>
            <div class="main-grid">
                <?php
                if (mysqli_num_rows($result1) == 0){
                echo"net";
                }
                else {
                if (mysqli_num_rows($result1) > 0) ;
                {

                $card1 = mysqli_fetch_array($result1);


                do {
                echo '
                   
                   <a href="redirect.php?id=' . $card1["id_book"] . '&genre='.$card1["id_genre"].'"><div class="main-grid-card">
                    <img class="main-grid-card__img" src="' . $card1["img"] . '" alt="">
                    <div class="main-grid-card__content">
                        <div class="main-grid-card__text">
                            <div class="main-grid-card__title">' . $card1["title"] . '</div>
                            <div class="main-grid-card__author">' . $card1["name_author"] . $card1["surname_author"] . ' </div>
                        </div>
                        <div class="main-grid-card__view">
                            <img src="images/view-icon.svg" alt="">
                            <div class="main-grid-card__view-text">'. $card1["view"].'</div>
                        </div>
                    </div>
                </div></a>
                ';
                } while ($card1 = mysqli_fetch_array($result1));
                }
                }
                ?>
            </div>
        </div>
        <div class="main-content container">
            <a href=""><h3 class="content-title">Комедии</h3></a>
            <div class="main-grid">
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
                    <img class="main-grid-card__img" src="' . $card2["img"] . '" alt="">
                    <div class="main-grid-card__content">
                        <div class="main-grid-card__text">
                            <div class="main-grid-card__title">' . $card2["title"] . '</div>
                            <div class="main-grid-card__author">' . $card2["name_author"] . $card2["surname_author"] . ' </div>
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
        <div class="main-content container">
            <a href=""><h3 class="content-title">Романы</h3></a>
            <div class="main-grid">
                <?php
                if (mysqli_num_rows($result3) == 0){
                    echo"net";
                }
                else {
                    if (mysqli_num_rows($result3) > 0) ;
                    {

                        $card3 = mysqli_fetch_array($result3);


                        do {
                            echo '
                   
                   <a href="redirect.php?id=' . $card3["id_book"] . '&genre='.$card3["id_genre"].'"><div class="main-grid-card">
                    <img class="main-grid-card__img" src="' . $card3["img"] . '" alt="">
                    <div class="main-grid-card__content">
                        <div class="main-grid-card__text">
                            <div class="main-grid-card__title">' . $card3["title"] . '</div>
                            <div class="main-grid-card__author">' . $card3["name_author"] . $card3["surname_author"] . ' </div>
                        </div>
                        <div class="main-grid-card__view">
                            <img src="images/view-icon.svg" alt="">
                            <div class="main-grid-card__view-text">'. $card3["view"].'</div>
                        </div>
                    </div>
                </div></a>
                ';
                        } while ($card3 = mysqli_fetch_array($result3));
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <!-- end content -->
</body>
<script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="js/slick.js"></script>
<script type="text/javascript" src="js/main.js"></script>

</html>
