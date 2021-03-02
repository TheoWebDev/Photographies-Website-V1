    
<form method="POST" novalidate enctype="multipart/form-data" name="newAlbum" class="col-12 col-sm-8 col-md-4 pb-3 d-flex flex-column">
            
	<legend class="pt-3 text-uppercase text-center titleForm"></legend>
    
    <p class="valide"><?= $errorMessages["addAlbum"] ?? '' ?></p>

    <div class="form-group">
        <label class="text-center d-block" for="uploadFile">Image de couverture</label>
        <input type="file" id="uploadFile" name="imgAlbum" aria-label="img" class="form-control text-center" value="<?= $detailsAlbumsArray["imgAlbum"] ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["imgAlbum"]) ? $errorMessages["imgAlbum"] : "" ?></span>
        </div>
    </div>
	
	<div class="form-group">
        <label for="titleAlbum"></label>
        <input type="text" id="titleAlbum" name="titleAlbum" aria-label="titleAlbum" class="form-control text-center inputAdmin" placeholder="TITRE ALBUM" value="<?= $detailsAlbumsArray["titleAlbum"] ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["titleAlbum"]) ? $errorMessages["titleAlbum"] : "" ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="albumPlace"></label>
        <input type="text" id="albumPlace" name="albumPlace" aria-label="albumPlace" class="form-control text-center inputAdmin" placeholder="LOCALISATION" value="<?= $detailsAlbumsArray["albumPlace"] ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["albumPlace"]) ? $errorMessages["albumPlace"] : "" ?></span>
        </div>
    </div>
    
    <button class="btn btnConnexion mx-auto w-50 mt-3" type="submit" name="modifyAlbum" value="<?= $detailsAlbumsArray["album_ID"] ?>">modifier</button>
    <div class="mt-1 d-flex justify-content-center">
    <!-- <a type="button" href="../vues/adminHome.php" class="btn btn-secondary mr-3 mt-3">retour</a> -->
    </div>

</form>