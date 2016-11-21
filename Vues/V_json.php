<script type="text/javascript">
    var codeRev;

    function articlesParRubriques(codeNumero) {
        $.ajax({
            url: "ajax/A_generer_json.php",
            type: "POST",
            data: "codeNumero=" + codeNumero + "&codeRevue=" + codeRev,
            dataType: "html",
            success: function (data) {
                $("#fingeneration").html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }

        });
    }

    function getNumero(vlr) {
        $.ajax({
            url: "ajax/A_numero_xml.php",
            type: "POST",
            data: "codeRev=" + vlr,
            dataType: "html",
            success: function (data, textStatus, jqXHR) {
                codeRev = vlr;
                $("#listeRubriques").html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("erreur liste rubriques");
            }
        });
    }
</script>
<div class="container">
    <h2>Selectionner revue</h2>

    <form>
        <select name="liste" onchange="getNumero(this.value)">
            <option value="null">Selectionner</option>
            <?php foreach ($obRevue as $value){?>
            <option value="<?php echo $value->getCodeRevue();?>"><?php echo $value->getTitre();?></option>
            <?php }?>

        </select>
    </form>
    <div id="listeRubriques"></div>
    <div id="fingeneration"></div>
<div>
