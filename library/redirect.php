<?php
$id = $_GET["id"];
$genre = $_GET["genre"];
header('Location: http://test.local/library/book.php?id='. $id .'&genre='. $genre .' ');
?>
