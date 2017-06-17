<?php

require_once('api/src/connection.php');

$zapytanie_pobierz = "SELECT id, title FROM book";

$wynik_pobierz = mysqli_query($connection, $zapytanie_pobierz);

$pobrane_dane = array();

while ($wiersz = mysqli_fetch_row($wynik_pobierz))
{
    $pobrane_dane[] = $wiersz;
}

echo json_encode($pobrane_dane);

?>