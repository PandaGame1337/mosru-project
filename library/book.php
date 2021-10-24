<?php
require_once "connect.php";
$login = $_COOKIE["login"];

$id = $_GET["id"];
$genre = $_GET["genre"];
$result = $mysql->query("SELECT book.img,book.title, book.id_book, genre.name_genre, author.name_author, author.surname_author, book.id_author, type_book.type_book, librarys.adress, book.description_book, book.id_genre, record_books.id_librarys
FROM `book`, `author`, `genre`, `type_book`, `librarys`, `record_books`
WHERE book.id_book='$id' 
and book.id_author=author.id_author 
and book.id_genre=genre.id_genre 
and book.id_type=type_book.id_type_book
and book.id_book=record_books.id_book
and librarys.id_librarys=record_books.id_librarys");

$result2 = $mysql->query("SELECT book.img,book.title, 
       author.name_author,author.surname_author, book.view
FROM `book`, `author` WHERE book.id_author=author.id_author and book.id_genre='$genre'");


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
    <title>Кабинет читателя</title>
</head>
<body>
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
                    <a href="index.php">
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
    <section class="book_wrapper">
        <div class="container">
            <?php
            if (mysqli_num_rows($result) == 0){
                echo"net";
            }
            else {
                if (mysqli_num_rows($result) > 0) ;
                {

                    $card = mysqli_fetch_array($result);


                    do { ;
                        echo '
        
        <h1 class="book-title">' . $card["title"] . '</h1>
            <div class="book-content">
                <img class="book-page-img" src="' . $card["img"] . '" alt="">
                <div class="book-info">
                    <div class="book-content_wrapper">
                        <p class="book-about-info">Автор:</p>
                        <p class="book-about-answ">' . $card["name_author"] .  $card["surname_author"] . '</p>
                    </div>
                    <div class="book-content_wrapper">
                        <p class="book-about-info">Жанр:</p>
                        <p class="book-about-answ">' . $card["name_genre"] . '</p>
                    </div>
                    <div class="book-content_wrapper">
                        <p class="book-about-info">Тип:</p>
                        <p class="book-about-answ">' . $card["type_book"] . '</p>
                    </div>
                    <div class="book-content_wrapper">
                        <p class="book-about-info">Адрес библеотек:</p>
                        <p class="book-about-answ">' . $card["adress"] . '</p>
                    </div>
                </div>
            </div>
            <p class="book-description-title">Описание</p>
            <p class="book-description">' . $card["description_book"] . '</p>
            
                        
                       
            <div  id="hider" class="btn-desc">
                <a href="add.php?id_book='.$card["id_book"].'&id_librarys='. $card["id_librarys"] .'" class="auth-btn-style">Добавить</a>
            </div>';


                    } while ($card = mysqli_fetch_array($result));
                }
            }
            ?>
            <div class="main-content container">
                <a href=""><h3 class="content-title">Читайте так же</h3></a>
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
                    <a href=""><div class="main-grid-card">
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
        </div>
        <script>
            // Здесь не важно, как мы скрываем текст.
            // Также можно использовать style.display:
            document.getElementById('hider').onclick = function() {
                document.getElementById('text').hidden = true;
            }
        </script>
    </section>
</body>
</html>
