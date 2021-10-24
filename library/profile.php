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
    <title>Кабинет читателя</title>
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
        <section class="ticket_wrapper">
            <div class="container">
                <h1 class="ticket-title">Кабинет читателя</h1>
                <div class="ticket-img"></div>
                <div class="ticket-info">
                    <div class="ticket-info-content"> 
                        <p class="ticket-info-title">Единый читательский билет</p>
                        <p class="ticket-info-text">Чтобы посмотреть данные о заказах, добавьте читательский билет.</p>
                        <a href="#" class="auth-btn-style">Добавить</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="top-search">
            <div class="search-content container">
                <form class="form-search" method="get">
                    <input class="form-unput" type="text" placeholder="Название, автор" >
                    <button class="button-unput-submit" type="submit">Найти</button>
                </form>
                <a class="search-link" href="signin.html"><img src="images/book-icon.svg" alt="">Каталог</a>
                <a class="search-link" href="profile.php"><img src="images/user-icon-red.svg" alt="">Имя пользователя</a>
            </div>
        </section>
        <div class="main-content container">
            <a href=""><h3 class="content-title">Ваша библиотека</h3></a>
            <div class="main-grid">
                <?php
                $login = $_COOKIE["login"];
                require_once "connect.php";
                $result9 = $mysql->query("SELECT user_books.id_book, book.img, book.title, author.name_author,author.surname_author, 
                book.view,book.id_book, book.id_genre 
                From `user_books`, `book`, `author` 
                WHERE user_books.id_user = (SELECT id FROM user WHERE login='$login') 
                and user_books.id_book=book.id_book 
                and book.id_author=author.id_author");


                if (mysqli_num_rows($result9) == 0){
                    echo"net";
                }
                else {
                    if (mysqli_num_rows($result9) > 0) ;
                    {

                        $card9 = mysqli_fetch_array($result9);


                        do {
                            echo '
                <a href=""><div class="main-grid-card">

                    <img class="main-grid-card__img" src="' . $card9["img"] . '" alt="">
                    <div class="main-grid-card__content">
                        <div class="main-grid-card__text">
                            <div class="main-grid-card__title">' . $card9["title"] . '</div>
                            <div class="main-grid-card__author">' . $card9["name_author"] . $card9["surname_author"] . '</div>
                        </div>
                        <div class="main-grid-card__view">
                            <img src="images/view-icon.svg" alt="">
                            <div class="main-grid-card__view-text">' . $card9["view"] .'</div>
                        </div>
                    </div>
                </div></a>
                ';
        } while ($card9 = mysqli_fetch_array($result9));
    }
}
?>
            </div>
        </div>
        <section class="profile-rec">
            <div class="main-content container">
                <a href=""><h3 class="content-title profile-style">Ваши рекомендации</h3></a>

                <?php
                $result7 = $mysql->query("SELECT user_books.id_book, book.img, book.title, author.name_author,author.surname_author, 
                book.view,book.id_book, book.id_genre, MAX(book.id_genre), COUNT(book.id_genre)
                From `user_books`, `book`, `author` 
                WHERE user_books.id_user = (SELECT id FROM user WHERE login='$login')
                and user_books.id_book=book.id_book 
                and book.id_author=author.id_author
                GROUP BY (book.id_genre)
                order by rand()
                limit 5");

if (mysqli_num_rows($result7) == 0){
    echo"net";
}
else {
    if (mysqli_num_rows($result7) > 0) ;
    {

        $card7 = mysqli_fetch_array($result7);


        do {
            $id_book = $card7["id_book"];
            $book_title = $card7["title"];
            $author_name = $card7["name_author"];
            $author_surname = $card7["surname_author"];
            $book_genre_id = $card7["id_genre"];
            $json = '{"id_book":"'.$id_book.'",'.'"book_title":"'.$book_title.'",'.'"author_name":"'.$author_name.'",'.'"author_surname":"'.$author_surname.'",'.'"book_genre_id":"'.$book_genre_id.'"}';
            $file = fopen('user_rec.json','w+');
            fwrite($file, $json);
            fclose($file);










            echo '
            <div class="main-grid">
                    <a href=""><div class="main-grid-card">
                        <img class="main-grid-card__img" src="'. $card7["img"].'" alt="">
                        <div class="main-grid-card__content">
                            <div class="main-grid-card__text">
                                <div class="main-grid-card__title">'. $card7["title"].'</div>
                                <div class="main-grid-card__author">' . $card7["name_author"] . $card7["surname_author"] . '</div>
                            </div>
                            <div class="main-grid-card__view">
                                <img src="images/view-icon.svg" alt="">
                                <div class="main-grid-card__view-text">'. $card7["view"].'</div>
                            </div>
                        </div>
                    </div></a>
            ';
        } while ($card7 = mysqli_fetch_array($result7));
    }
}



                ?>


                </div>
            </div>
        </section>
</body>
</html>
