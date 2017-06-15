<?php
require_once 'config.php';

$connection = new mysqli(dbHost, dbUser, dbPassword, dbName);

if ($connection->connect_errno) {
    die("Can not connect to Database: " . $connection->connect_error);
}