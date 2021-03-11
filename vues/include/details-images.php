<form method="POST" novalidate enctype="multipart/form-data" name="newAlbum" class="col-12 col-sm-8 col-md-4 pb-3 d-flex flex-column">
            
    <legend class="pt-3 text-uppercase text-center titleForm"></legend>
        
    <div class="form-group">
        <label class="text-center d-block" for="uploadFile">Image de couverture</label>
        <input type="file" id="uploadFile" name="uploadFile" aria-label="img" class="form-control text-center" value="<?= $detailsImages["uploadFile"] ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["uploadFile"]) ? $errorMessages["uploadFile"] : "" ?></span>
        </div>
    </div>
            
    <div class="form-group">
        <label for="titleImg"></label>
        <input type="text" id="titleImg" name="titleImg" aria-label="titleImg" class="form-control text-center inputAdmin" placeholder="TITRE ALBUM" value="<?= $detailsImages["titleImg"] ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["titleImg"]) ? $errorMessages["titleImg"] : "" ?></span>
        </div>
    </div>
        
    <div class="form-group">
        <label for="selectAlbum"></label>
        <select class="custom-select" aria-label="Galeries" id="selectAlbum" name="selectAlbum" required>
            <option disabled selected>Choisissez votre album</option>
            <?php foreach ($selectAlbumsForUpload as $value) { ?>
                <option value="<?= $value["album_ID"] ?>"><?= $value["albumName"] ?></option>
            <?php } ?>
        </select>
        <div>
            <span class="textError"><?= isset($errorMessages["selectAlbum"]) ? $errorMessages["selectAlbum"] : "" ?></span>
        </div>
    </div>
            
    <button class="btn btnConnexion mx-auto w-50 mt-3" type="submit" name="modifyAlbum" value="<?= $detailsImages["image_ID"] ?>">modifier</button>
        <div class="mt-1 d-flex justify-content-center">
            <!-- <a type="button" href="../vues/adminHome.php" class="btn btn-secondary mr-3 mt-3">retour</a> -->
        </div>
        
</form>