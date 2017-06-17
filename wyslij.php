<?php
//
///*Załączenie pliku odpowiadającego za połączenie z bazą danych.*/
//require_once('api/src/connection.php');
//require_once('api/src/Book.php');
//
//if ($_SERVER['REQUEST_METHOD']  == "POST") {
//    /*Przypisanie danych wysłanych przez skrypt.js do zmiennej*/
//    $title = $_POST['title'];
//    $author = $_POST['author'];
//    $description = $_POST['description'];
//
//    $title = htmlentities($title);
//    $author = htmlentities($author);
//    $description = htmlentities($description);
//
//    $book = new Book();
//    $book->create($connection, $title, $author, $description);
//
//    $zapytanie_wyslij = "INSERT INTO book (title, author, description) VALUES ('$title', '$author', '$description')";
//
//}
