$(document).ready(function () {
    /*WYSYŁANIE DANYCH DO BAZY - Działa prawidłowo*/
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
                        '</td><td><button class="editButton" id="' + emp.id + '">Edytuj</button>' +
                        '</td><td><button class="deleteButton" id="' + emp.id + '">Usuń</button></td></tr>'
                    );
                });

                $('.showButton').click(function () {
                    var id = $(this).attr('id');
                    console.log("ok");
                    console.log(id);
                    $.ajax({
                        url: 'api/books.php',
                        dataType: 'json',
                        method: 'get',
                        data: {id: id},

                        success: function (data) {
                            console.log("chujek");
                        }

                    })
                })
            }
        })
    }

    loadBooks();

    $('#wyslij').click(function () {
        $('#tblEmployee tbody').html('');
        loadBooks();
    })

});