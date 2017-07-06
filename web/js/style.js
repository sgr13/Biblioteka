$(document).ready(function () {
    /*WYSYŁANIE DANYCH DO BAZY*/
    $('#wyslij').click(function () {
        var wartosc_z_listy_title = $('#title').val();
        var wartosc_z_listy_author = $('#author').val();
        var wartosc_z_listy_description = $('#description').val();

        $.ajax({
            type: "POST",
            url: "api/books.php",
            data: {
                title: wartosc_z_listy_title,
                author: wartosc_z_listy_author,
                description: wartosc_z_listy_description
            },
            success: function () {
                alert("Wysłano do bazy danych");
            },
            error: function (blad) {
                alert("Wystąpił błąd");
            }
        });
    });

    /*Załadowanie wszystkich książek z bazy danych i stworzenie części tabeli*/

    function loadBooks() {
        $.ajax({
            url: 'api/books.php',
            dataType: "json",
            method: 'get',
            success: function (data) {
                var employeeTable = $('#tblEmployee tbody');
                $(data).each(function (index, emp) {
                    employeeTable.append('<tr><td>' + emp.id + '</td><td>' + emp.title +
                        '</td><td><button class="showButton" id="' + emp.id + '">Pokaż</button>' +
                        '</td><td><button class="editButton" id="' + emp.id + ' " title="' + emp.title + '" author="' + emp.author + '" description="' + emp.description + '">Edytuj</button>' +
                        '</td><td><button class="deleteButton" id="' + emp.id + '">Usuń</button></td></tr>'
                    );
                });
                // Aktywacja przycisku pokazującego szczegóły każdej książkie - dane przekazywane GET-em
                $('.showButton').click(function () {
                    $('#editBox').html('');
                    var id = $(this).attr('id');
                    $.ajax({
                        url: 'api/books.php',
                        dataType: 'json',
                        method: 'get',
                        data: {id: id},

                        success: function (data) {
                            $('#titleBox').html(data[1]);
                            $('#authorBox').html(data[2]);
                            $('#descriptionBox').html(data[3]);
                        }
                    })
                });
                //Przycisk aktywujący mozliwośc edycji - wyświetla się formularz
                $('.editButton').click(function () {
                    $('#authorBox').html('');
                    $('#titleBox').html('');
                    $('#descriptionBox').html('');
                    $('#editBox').html('');

                    $('#editBox').append(
                        '<h3>Edycja Książki</h3>' +
                        '<form>' +
                        'Tytuł:<br><input type="text" name="title"><br>' +
                        'Autor<br><input type="text" name="author"><br>' +
                        'Opis:<br><input type="text" name="description"><br></form>' +
                        '<button type="submit" id="changeButton">Zmień</button>'
                    );

                    var id = $(this).attr('id');
                    var title = $(this).attr('title');
                    var author = $(this).attr('author');
                    var description = $(this).attr('description');

                    $('input[name="title"]').val(title);
                    $('input[name="author"]').val(author);
                    $('input[name="description"]').val(description);

                    $('#changeButton').click(function () {
                        var title = $('input[name="title"]').val();
                        var author = $('input[name="author"]').val();
                        var description = $('input[name="description"]').val();
                        // Po wpisaniu nowych danych do formularza, przesłanie danych PUT-em
                        $.ajax({
                            url: 'api/books.php?id=' + id +
                            '&title=' + title +
                            '&author=' + author +
                            '&description=' + description,
                            dataType: 'json',
                            method: 'put',
                            data: {
                                id: id,
                                title: title,
                                author: author,
                                description: description
                            },
                            success: function () {
                                alert("Pomyślnie zmodyfikowałeś dane książki");
                                $('#tblEmployee tbody').html('');
                                loadBooks();
                            }
                        })

                    })
                });
                //usuwanie książek - przesłane DELETE
                $(".deleteButton").click(function () {
                    var id = $(this).attr('id');
                    $.ajax({
                        url: 'src/books.php?id=' + id,
                        type: 'DELETE',

                        success: function () {
                            alert("Pomyślnie usunąłeś książkę");
                            $('#tblEmployee tbody').html('');
                            loadBooks();
                        }
                    })

                })
            }
        })
    }
    // przy załadowaniu strony oraz podczas dodania do bazy danych nowej pozycji - ładowanie funkcji,
    // która poakzuje wszystkie pozycje z bazy danych
    loadBooks();

    $('#wyslij').click(function () {
        $('#tblEmployee tbody').html('');
        loadBooks();
    })
});
