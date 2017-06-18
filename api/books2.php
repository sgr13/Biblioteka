<?php

require_once('src/connection.php');
require_once('src/Book.php');


if ($_SERVER['REQUEST_METHOD'] == "GET") {

    $id = $_GET['id'];

    $sql = "SELECT * FROM book WHERE id=$id";

    $result = $connection->query($sql);

    $row = $result->fetch_assoc();

    echo json_encode($row);
}