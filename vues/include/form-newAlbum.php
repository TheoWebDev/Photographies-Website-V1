     
<form method="POST" novalidate enctype="multipart/form-data" name="newAlbum" class="col-12 col-sm-8 col-md-4 pb-3 d-flex flex-column">
            
	<legend class="pt-3 text-uppercase text-center titleForm">Créer un nouvel album</legend>
    
    <p class="valide"><?= $errorMessages["addAlbum"] ?? "" ?></p>

    <div class="form-group">
        <label class="text-center d-block" for="uploadFile">Image de couverture</label>
        <input type="file" id="uploadFile" name="uploadFile" aria-label="img" class="form-control text-center" value="<?= isset($_POST["uploadFile"]) ? htmlspecialchars($_POST["uploadFile"]) : "" ?>" required>
        <div>
            <span class="textError"><?= $errorMessages["uploadFileError"] ?? "" ?></span>
        </div>
    </div>
	
	<div class="form-group">
        <label for="titleAlbum"></label>
        <input type="text" id="titleAlbum" name="titleAlbum" aria-label="titleAlbum" class="form-control text-center inputAdmin" placeholder="TITRE ALBUM" value="<?= isset($_POST["titleAlbum"]) ? htmlspecialchars($_POST["titleAlbum"]) : "" ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["titleAlbumErrorFormat"]) ? $errorMessages["titleAlbumError"] : "" ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="albumPlace"></label>
        <input type="text" id="albumPlace" name="albumPlace" aria-label="albumPlace" class="form-control text-center inputAdmin" placeholder="LOCALISATION" value="<?= isset($_POST["albumPlace"]) ? htmlspecialchars($_POST["albumPlace"]) : "" ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["albumPlaceErrorFormat"]) ? $errorMessages["albumPlaceError"] : "" ?></span>
        </div>
    </div>
    
    <button class="btn btnConnexion mx-auto w-50 mt-3" type="submit" name="addNewAlbum">créer</button>
    <div class="mt-1 d-flex justify-content-center">
    <a type="button" href="../vues/adminHome.php" class="btn btnBackHome mr-3 mt-3">retour</a>
    </div>

</form>