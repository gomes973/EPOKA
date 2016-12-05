<?php
//Gomes Dylan
include '../Passerelles/pdoImage.php';
include '../Classes/Image.php';
include '../Classes/ImageInterne.php';
include '../Classes/ImageExterne.php';
include '../Passerelles/pdoConnexion.php';
include '../Librairies/Collection.php';
include '../Classes/Banque.php';
include '../Passerelles/pdoBanque.php';
    $colBanques = pdoBanque::getLesBanques();
    
if ($_POST['choixIMG'] == 2){
?>
<div class="form-group">
    <label>Selectionner banque image</label>
    <select name="banque" class="form-control" onchange="afficheImgExt(this.value)">
        <option value="0"></option>
        <?php foreach ($colBanques as $value) {?>
        <option value="<?php echo $value->get_intCodeBanque();?>"><?php echo $value->get_strResume();?></option>
        <?php }}?>
    </select>
</div>



