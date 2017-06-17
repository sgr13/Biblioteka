<!doctype html>
<html>
<?php

/*Załączenie pliku odpowiadającego za połączenie z bazą danych.*/
require_once('api/src/connection.php');

?>

<head>
    <meta charset="utf-8">
    <title>Ajax, PHP, Mysql</title>

    <link href="web/css/style.css?h=1" rel="stylesheet">


</head>

<body>
<div id="form">
    <p>Dodaj nową książkę:</p>
    <form>
        Tytuł:
        <input type="text" id="title">
        Autor:
        <input type="text" id="author">
        Opis:
        <input type="text" id="description">
        <button id="wyslij" type="button">Wyślij</button>
        <br><br>
    </form>
</div>
<hr><hr>
<div class="wykaz" style="float:left; width: 45% ">

</div>
<div id="box" style="width: 45%; float: left; margin-left: 10px" >
<h2 style="text-align: center">Szczegóły książki:</h2>
    <div id="bookInfo">

    </div>
    <div id="editBox">

    </div>
</div>

</body>
<script src="web/js/jquery.js"></script>
<script src="web/js/style.js?j=112222334"></script>
</html>