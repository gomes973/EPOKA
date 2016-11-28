<?php
include '../Passerelles/pdoImage.php';
include '../Classes/Image.php';
include '../Classes/ImageInterne.php';
include '../Classes/ImageExterne.php';
include '../Passerelles/pdoConnexion.php';
include '../Librairies/Collection.php';
    $colImagInternes = PdoImage::getImagesExternes();
    
    if ($_POST['choixIMG'] == 2){
?>
<div class="form-group">
    <label>Selectionner adresse fichier Externe</label>
    <select name="urlImgExterne" class="form-control">
        <option value="0"></option>
        <?php foreach ($colImagInternes as $value) {?>
        <option  value="<?php echo $value->get_strCodeImage();?>"><?php echo $value->get_strCodeImage();?></option>
        <?php }}?>
    </select>
</div>

