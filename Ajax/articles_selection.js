$('#listeRevues').prop("selectedIndex", -1);

$('#listeRevues').change(function () {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "Ajax/A_selection_revue.php",
        data: {idRevue: $('#listeRevues').val()},
        error: function (request, error) {
            console.log(request);
            console.log(error);
        },
        success: function (data) {
            $('#listeRubriques').html('');
            $('#listeArticles').html('');
            $('#listeNumeros').html('');
            $("#listeRubriques").prop('disabled', true);
            $("#listeArticles").prop('disabled', true);
            $("#btnValider").prop('disabled', true);
            for (var key in data) {
                $('#listeNumeros').append('<option value="'+key+'">'+key+'</option>');
            }
            $("#listeNumeros").prop('disabled', false);
            $('#listeNumeros').prop("selectedIndex", -1);
        }
    });
});

$('#listeNumeros').change(function () {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "Ajax/A_selection_numero.php",
        data: {codeRevue: $('#listeRevues').val(), codeNumero: $('#listeNumeros').val()},
        error: function (request, error) {
            console.log(request);
            console.log(error);
        },
        success: function (data) {
            $('#listeRubriques').html('');
            $('#listeArticles').html('');
            $("#listeArticles").prop('disabled', true);
            $("#btnValider").prop('disabled', true);
            for (var key in data) {
                $('#listeRubriques').append('<option value="'+key+'">'+data[key]+'</option>');
            }
            $("#listeRubriques").prop('disabled', false);
            $('#listeRubriques').prop("selectedIndex", -1);
            
        }
    });
});

$('#listeRubriques').change(function () {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "Ajax/A_selection_rubrique.php",
        data: {codeRevue: $('#listeRevues').val(), codeNumero: $('#listeNumeros').val(), codeRubrique: $('#listeRubriques').val()},
        error: function (request, error) {
            console.log(request);
            console.log(error);
        },
        success: function (data) {
            $('#listeArticles').html('');
            var n = 0;
            for (var key in data) {
                n++;
                $('#listeArticles').append('<option value="'+key+'">'+data[key]+'</option>');
            }
            $("#listeArticles").prop('size', n); 
            $("#listeArticles").prop('disabled', false); 
            $("#btnValider").prop('disabled', false);
        }
    });
});