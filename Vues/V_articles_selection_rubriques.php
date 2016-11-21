<script type="text/javascript">
    var codeRev;
    
    function articlesParRubriques(codeNumero){
        $.ajax({
            url: "ajax/A_liste_articles_rubrique.php",
            type: "POST",
            data: "codeNumero=" + codeNumero + "&codeRevue=" + codeRev,
            dataType: "html",
            success: function (data) {
                $("#listeArticles").html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                 alert(errorThrown);           
            }
            
        });    
    }
    
    function getNumero(vlr){
        $.ajax({
            url: "ajax/A_numero.php",
            type: "POST",
            data: "codeRev=" + vlr,
            dataType: "html",
            success: function (data, textStatus, jqXHR) {
                codeRev = vlr; 
                $("#listeRubreiques").html(data);
                        },
            error: function (jqXHR, textStatus, errorThrown) {
                            alert("erreur liste rubriques");
                        }
        });
    }
</script>
<div class="container">
    <h2>Selection article par rubrique</h2>

    <form>
        <select name="liste" onchange="getNumero(this.value)">
            <option value="null">Selectionner</option>
            <?php foreach ($obRevue as $value){?>
            <option value="<?php echo $value->getCodeRevue();?>"><?php echo $value->getTitre();?></option>
            <?php }?>

        </select>
    </form>
        <div id="listeRubreiques"></div>
        <div id="listeArticles"></div>
</div>