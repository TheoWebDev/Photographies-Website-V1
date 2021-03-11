<form method="POST" enctype="multipart/form-data" name="modifyImg" class="col-12 col-sm-8 col-md-4 pb-3 d-flex flex-column">

    <div class="text-center">

        <legend class="text-uppercase text-center titleForm">Modifications de l'image</legend>
        <img src="../assets/img/uploaded/<?= $detailsImages["imgUniqueID"] ?>" class="imgModifyAlbum" alt="">

    </div>

    <div class="form-group">
        <label class="text-center d-block" for="uploadFile"></label>
        <input type="file" id="uploadFile" name="uploadFile" aria-label="img" class="form-control text-center" value="<?= $detailsImages["imgUniqueID"] ?>">
        <div>
            <span class="textError"><?= isset($errorMessages["uploadFile"]) ? $errorMessages["uploadFile"] : "" ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="titleImg"></label>
        <input type="text" id="titleImg" name="titleImg" aria-label="titleImg" class="form-control text-center inputAdmin" placeholder="TITRE IMAGE" value="<?= $detailsImages["imgTitle"] ?>">
        <div>
            <span class="textError"><?= isset($errorMessages["titleImg"]) ? $errorMessages["titleImg"] : "" ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="selectAlbum"></label>
        <select name="selectAlbum" id="selectAlbum" class="custom-select" aria-label="Galeries">
            <option disabled selected>Choisissez votre album</option>
            <?php

            foreach ($selectAlbumsForUpload as $value) {

            ?>
                <option value="<?= $value['album_ID'] ?>" <?= $value["album_ID"] == $detailsImages["album_ID"] ? "selected" : "" ?>><?= $value["albumName"] ?></option>
            <?php } ?>
        </select>
        <div>
            <span class="textError"><?= isset($errorMessages["selectAlbum"]) ? $errorMessages["selectAlbum"] : "" ?></span>
        </div>
    </div>

    <div class="custom-control custom-checkbox align-self-center">
        <input type="checkbox" class="custom-control-input" value="1" <?= $detailsImages["imgSpotlight"] == 1 ? "checked" : "" ?> id="customCheck1" name="checkUne">
        <label class="custom-control-label" for="customCheck1">Photo à la une ?</label>
    </div>

    <div class="custom-control custom-checkbox align-self-center">
        <input type="checkbox" class="custom-control-input" value="1" <?= $detailsImages["imgVisibility"] == 1 ? "checked" : "" ?> id="customCheck2" name="checkAlbum">
        <label class="custom-control-label" for="customCheck2">Photo visible dans l'album ?</label>
    </div>

    <button class="btn btn-success mt-3" type="submit" name="modifyImageBtn">SAUVEGARDER</button>
    <div class="mt-1 d-flex justify-content-center">    
        <a type="button" href="adminSettingsAlbum.php" class="btn btn-secondary mr-1">RETOUR</a>
    </div>

</form>