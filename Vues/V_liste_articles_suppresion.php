<!-- 
    Gomes
    Dylan

    View permettant la suppression d'un article
-->
<div class="container">
    <table class="table">
        <tr class="row">
            <th>Titre article</th>
            <th>Chapeau</th>
            <th>Lien</th>
            <th>Nom</th>
            <th>Prénom</th>            
        </tr>
        <?php foreach ($ListeObjArticles as $value) {?>
        <tr class="row">
            <td><?php echo $value->getTitreArticle();?></td>
            <td><?php echo $value->getChapeau();?></td>
            <td><?php echo $value->getLienFichierContenu();?></td>
            <td><?php echo $value->getPigiste()->getNom();?></td>
            <td><?php echo $value->getPigiste()->getPrenom();?></td>
            <td><a href="index.php?uc=gerer_numero&action=supprimer_article&id=<?php echo $value->getNumArticle();?>"><input type="button" value="Supprimer" /></a></td>
        </tr>
        <?php }?>
    </table>
</div>