<?php 
    include '../Passerelles/pdoImage.php';
    include '../Classes/Image.php';
    include '../Classes/ImageInterne.php';
    include '../Classes/ImageExterne.php';
    include '../Passerelles/pdoConnexion.php';
    include '../Librairies/Collection.php';
    include '../Classes/Banque.php';
    include '../Passerelles/pdoBanque.php';
    $colImgExt = pdoBanque::getLesImagesBanque($_REQUEST['choixBanque']);
?>

<div class="form-group">
    <label>Selectionner image externe</label>
    <select name="imgExt" class="form-control" onchange="aperçu(this.value)">
        <option value="0"></option>
        <?php foreach ($colImgExt as $value) {?>
        <option value="<?php echo $value->get_strCodeImage();?>"><?php echo $value->get_strCodeImage();?></option>
        <?php }?>
    </select>
</div>
