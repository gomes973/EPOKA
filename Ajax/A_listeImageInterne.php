<?php
include '../Passerelles/pdoImage.php';
include '../Classes/Image.php';
include '../Classes/ImageInterne.php';
include '../Passerelles/pdoConnexion.php';
include '../Librairies/Collection.php';
    $colImagInternes = PdoImage::getImagesInternes();
    
    if ($_POST['choixIMG'] == 1){
?>
<div class="form-group">
    <label>Selectionner adresse fichier</label>
    <select name="urlImgInterne" class="form-control">
        <option value="0"></option>
        <?php foreach ($colImagInternes as $value) {?>
        <option  value="<?php echo $value->get_strCodeImage();?>"><?php echo $value->get_strCodeImage();?></option>
        <?php }}?>
    </select>
</div>

