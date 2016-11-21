<script type="text/javascript">
    
    function articlesParRubriques(revue){
        
        $.ajax({
            url: "ajax/A_selection_rubrique_de_revue.php",
            type: "POST",
            data: "codeRevue=" + revue,
            dataType: "html",
            success: function (data) {
                $("#listeArticles").html(data);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                 alert(errorThrown);           
            }
            
        });
            
    }
</script>

<h2>Selection article par rubrique</h2>

<form>
    <select name="liste" onchange="articlesParRubriques(this.value)">
        
        <?php foreach ($obRevue as $value){?>
        <option value="<?php echo $value->getCodeRevue();?>"><?php echo $value->getTitre();?></option>
        <?php }?>
        
    </select>
    <div id="listeArticles">
        
    </div>
</form>