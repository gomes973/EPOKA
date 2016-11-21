<?php
include "../Passerelles/pdoImageInterne.php";
include "../Passerelles/pdoConnexion.php";
include "../Librairies/Collection.php";
include "../Classes/Image.php";
include "../Classes/ImageInterne.php";
?>
<!DOCTYPE html>
<html>
    <body>
        <div class="container">
            <legend>Sélection des images internes</legend>
            <form method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <label for="imageint">Image Interne :</label>
                        <select>
                        <?php
                        $imageInt = pdoImageInterne::getLesImagesInternes();
                        foreach ($imageInt as $image)
                        {
                        ?>
                            <option><?php echo $image->get_strCodeImage?></option>
                        <?php
                        }
                        ?>
                        </select>
            </form>
        </div>
    </body>
</html>