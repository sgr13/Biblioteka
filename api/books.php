<?php

require_once('src/connection.php');
require_once('src/Book.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $title = mysqli_real_escape_string($connection, $_POST['title']);
    $author = mysqli_real_escape_string($connection, $_POST['author']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $book = new Book();
    $book->create($connection, $title, $author, $description);
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $id = intval($id);
        $book = Book::loadFromDB($connection, $id);
        $book = (array)$book;

        foreach ($book as $value) {
            $array[] = $value;
        }
        echo json_encode($array);

    } else {

        $sql = "SELECT * FROM book";
        $result = $connection->query($sql);
        $books = [];

        while ($row = $result->fetch_assoc()) {
            $books[] = $row;
        }
        echo json_encode($books);
    }
}

if ($_SERVER['REQUEST_METHOD'] === "PUT") {
    if (isset($_GET['id']) && isset($_GET['title']) && isset($_GET['author']) && isset($_GET['description'])) {

        $id = intval($_GET['id']);
        $title = $_GET['title'];
        $author = $_GET['author'];
        $description = $_GET['description'];
        $book = Book::loadFromDB($connection, $id);

        if ($book->updae($connection, $title, $author, $description)) {
            $array['status'] = "Success";
        } else {
            $array['status'] = "Error";
        }
        echo json_encode($array);
    }
}

if ($_SERVER['REQUEST_METHOD'] == "DELETE") {

    $id = $_GET['id'];
    $id = intval($id);
    $book = Book::loadFromDB($connection, $id);

    if ($book->deleteFromDB($connection)) {
        $array['status'] = "Success";
    } else {
        $array['status'] = "Error";
    }
    echo json_encode($array);
}
