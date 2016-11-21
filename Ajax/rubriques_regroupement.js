$.ajax({
    type: "POST",
    dataType: "json",
    url: "Ajax/A_selection_numero.php",
    data: {codeRevue: codeRevue, codeNumero: 1},
    error: function (request, error) {
        console.log(request);
        console.log(error);
    },
    success: function (data) {
        $('input[type=checkbox]').each(function () {
            if (data[$(this).val()] !== undefined) {
                $(this).prop('checked', true);
            }

        });
    }
});

$("#formulaire").submit(function (event) {
    if (($(":checkbox:checked").length) === 0)
    {
        $("#alerte").fadeIn(100);
        event.preventDefault();
    }
});

$('#listeNumeros').change(function () {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "Ajax/A_selection_numero.php",
        data: {codeRevue: codeRevue, codeNumero: $('#listeNumeros').val()},
        error: function (request, error) {
            console.log(request);
            console.log(error);
        },
        success: function (data) {
            $('input[type=checkbox]').prop('checked', false);
            $('input[type=checkbox]').each(function () {
                if (data[$(this).val()] !== undefined) {
                    $(this).prop('checked', true);
                }

            });
        }
    });
});
