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
<hr>
<hr>
<div style="float: left; width: 45%; margin-left: 5%">
    <h2 style="text-align: center">Lista Książek:</h2>
    <table id="tblEmployee" border="1" style="border-collapse: collapse">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Akcja</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>

</table>
<div id="box" style="width: 35%; float: left; margin-left: 10px">
    <h2 style="text-align: center">Szczegóły książki:</h2>

    <div id="bookInfo" style="width: 100%">
        <div style="width: 100%; font-size: 150%; font-style: italic; text-align: center" id="titleBox"></div>
        <div style="width: 100%; font-weight: 700; text-align: center" id="authorBox"></div>
        <div id="descriptionBox"></div>
    </div>
    <div id="editBox">

    </div>
</div>

</body>
<script src="web/js/jquery.js"></script>
<script src="web/js/style.js?j=112222334"></script>
</html>