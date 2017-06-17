<?php

/*Załączenie pliku odpowiadającego za połączenie z bazą danych.*/
require_once('src/connection.php');
require_once('src/Book.php');

if ($_SERVER['REQUEST_METHOD']  == "POST") {
    /*Przypisanie danych wysłanych przez skrypt.js do zmiennej*/
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];

    $title = htmlentities($title);
    $author = htmlentities($author);
    $description = htmlentities($description);

    $book = new Book();
    $book->create($connection, $title, $author, $description);

}

if ($_SERVER['REQUEST_METHOD'] == "GET") {

    // na chwilę obecna nie wykorzystuję klasy Book - i tak nie działa prawidłowo, problem leży po stroonie js.

    $sql = "SELECT id,title FROM book";

    $result = $connection->query($sql);

    $books = [];

    while ($row = $result->fetch_assoc()) {
        $books[] = $row;
    }

    echo json_encode( $books );
}
