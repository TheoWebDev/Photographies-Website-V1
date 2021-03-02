<form method="POST" class="col-12 col-sm-8 col-md-4 mt-5 pb-3 d-flex flex-column">

    <div class="text-center text-success"><i class="fas fa-user-edit p-2 logo"></i></div>
    <p class="text-center text-success text-uppercase mb-3 h3">Data modification</p>
                                
    <div class="form-group">
        <label for="uploadFile">Image de couverture</label>
        <input type="file" id="uploadFile" name="uploadFile" aria-label="uploadFile" class="form-control text-center" value="<?= $detailsPatientArray['uploadFile'] ?? (isset($_POST['uploadFile']) ? htmlspecialchars($_POST['uploadFile']) : '') ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["uploadFile"]) ? $errorMessages["uploadFile"] : "" ?></span>
        </div>
    </div>
                
    <div class="form-group">
        <label for="titleAlbum">Firstname</label>
        <input type="text" id="titleAlbum" name="titleAlbum" aria-label="titleAlbum" class="form-control text-center" placeholder="TITRE ALBUM" value="<?= $detailsPatientArray['titleAlbum'] ?? (isset($_POST['titleAlbum']) ? htmlspecialchars($_POST['titleAlbum']) : '') ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["titleAlbum"]) ? $errorMessages["titleAlbum"] : "" ?></span>
        </div>
    </div>
                
    <div class="form-group">
        <label for="albumPlace">Date of birth</label>
        <input type="text" id="albumPlace" name="albumPlace" aria-label="Date de naissance" class="form-control text-center" placeholder="LOCALISATION" value="<?= $detailsPatientArray['albumPlace'] ?? (isset($_POST['albumPlace']) ? htmlspecialchars($_POST['albumPlace']) : '') ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["albumPlace"]) ? $errorMessages["albumPlace"] : "" ?></span>
        </div>
    </div>
                          
    <button class="btn btn-success mt-3" type="submit" name="updateAlbumBtn">SAUVEGARDER</button>
    <div class="mt-1 d-flex justify-content-center">
        <a type="button" href="view-listPatients.php" class="btn btnBack mr-1">RETOUR</a>
    </div>
                
</form>