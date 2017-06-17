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

    /*ODBIERANIE DANYCH Z BAZY - WSZYSTKO - nie działa */

    $.get( "api/books.php", function(data) {
        console.log(data);
        data.forEach(function(e) {
            var first = "<div class='omg' style='float: left'>"
                + e.id + "</div><div style='float: left'>"
                + e.title + "</div><div><button class='cos' style='width: 99px'>Usuń</button><button class='cos'>Edytuj</button>" +
                "</div><div style='clear: both'></div>";
                $(".wykaz").append(first);
        })
    }, "json");


    //mimo że w inspektorze widzi prawidłowo elementy DOM wraz z przypisanymi klasami, stworzonymi przyciskami itd.
    // to nie jestem w stanie po wykonaniu akcji np. na przycisku uzyskac jakiegokolwiek rezultatu
    //nie rozumiem o co chodzi. Kręciłem się w kółko juz chyba pół dnia wczoraj, różnymi metodami,
    // zawsze dochodzę do tego momentu i koniec

    $('.cos').on("click",function () {
        console.log("działa przycisk");
    })

});