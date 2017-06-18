<?php

require_once('src/connection.php');
require_once('src/Book.php');


if ($_SERVER['REQUEST_METHOD'] === "PUT") {
    if (isset($_GET['id']) && isset($_GET['title']) && isset($_GET['author']) && isset($_GET['description'])) {

        $id = $_GET['id'];
        $title = $_GET['author'];
        $title = $_GET['title'];
        $description = $_GET['description'];

        $sql = "UPDATE book SET title='$title', author='$author', description='$description' WHERE id=$id";

        $result = $connection->query($sql);

    }
}