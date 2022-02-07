<form method="POST" enctype="multipart/form-data" class="col-12 col-sm-8 col-md-4 mt-5 pb-3 d-flex flex-column">

    <div class="text-center">

    <legend class="text-uppercase text-center titleForm">Modifications de l'album</legend>
    <p class="titleForm"><?= $detailsAlbumsArray['albumName'] ?></p>

    </div>
                                
    <div class="form-group">
        <label for="uploadFile">Choisir une nouvelle image de couverture :</label>
        <input type="file" id="uploadFile" name="uploadFile" class="form-control text-center" value="<?= $detailsAlbumsArray['uploadFile'] ?? (isset($_POST['uploadFile']) ? htmlspecialchars($_POST['uploadFile']) : '') ?>">
        <div>
            <span class="textError"><?= isset($errorMessages["uploadFile"]) ? $errorMessages["uploadFile"] : "" ?></span>
        </div>
    </div>
                
    <div class="form-group">
        <label for="albumName">Titre de l'album :</label>
        <input type="text" id="albumName" name="albumName" class="form-control text-center" placeholder="TITRE ALBUM" value="<?= $detailsAlbumsArray['albumName'] ?? (isset($_POST['albumName']) ? htmlspecialchars($_POST['albumName']) : '') ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["albumName"]) ? $errorMessages["albumName"] : "" ?></span>
        </div>
    </div>
                
    <div class="form-group">
        <label for="albumLocation">Localisation :</label>
        <input type="text" id="albumLocation" name="albumLocation" class="form-control text-center" placeholder="LOCALISATION" value="<?= $detailsAlbumsArray['albumLocation'] ?? (isset($_POST['albumLocation']) ? htmlspecialchars($_POST['albumLocation']) : '') ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["albumLocation"]) ? $errorMessages["albumLocation"] : "" ?></span>
        </div>
    </div>
                          
    <button class="btn btn-success mt-3" type="submit" name="updateAlbumBtn">SAUVEGARDER</button>
    <a type="button" href="adminSettingsAlbum.php" class="btn btn-secondary mt-3">RETOUR</a>
                
</form>