<form novalidate method="POST" enctype="multipart/form-data" name="uploadImg" class="col-12 col-sm-8 col-md-4 pb-3 d-flex flex-column">
            
	<legend class="pt-3 text-uppercase text-center titleForm">Ajouter une nouvelle image</legend>

    <div class="form-group">
        <label class="text-center d-block" for="uploadFile"></label>
        <input type="file" id="uploadFile" name="uploadFile" aria-label="img" class="form-control text-center" value="<?= isset($_POST["uploadFile"]) ? htmlspecialchars($_POST["uploadFile"]) : "" ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["uploadFile"]) ? $errorMessages["uploadFile"] : "" ?></span>
        </div>
    </div>
	
	<div class="form-group">
        <label for="titleImg"></label>
        <input type="text" id="titleImg" name="titleImg" aria-label="titleImg" class="form-control text-center inputAdmin" placeholder="TITRE IMAGE" value="<?= isset($_POST["titleImg"]) ? htmlspecialchars($_POST["titleImg"]) : "" ?>" required>
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

    <div class="custom-control custom-checkbox align-self-center">
        <input type="checkbox" class="custom-control-input" id="customCheck1" name="checkUne">
        <label class="custom-control-label" for="customCheck1">Photo à la une ?</label>
    </div>

    <div class="custom-control custom-checkbox align-self-center">
        <input type="checkbox" class="custom-control-input" id="customCheck2" name="checkAlbum">
        <label class="custom-control-label" for="customCheck2">Photo visible dans l'album ?</label>
    </div>
    
    <button class="btn btnConnexion mx-auto w-50 mt-3" type="submit" name="addNewImageBtn">Ajouter</button>
    <div class="mt-1 d-flex justify-content-center">
        <a type="button" href="../vues/adminHome.php" class="btn btnBackHome mr-3 mt-3">retour</a>
    </div>

</form>