<div class="container-fluid">

<div class="row">
    <div class="col-12">
        <p class="titleForm d-flex justify-content-center font-weight-bold text-uppercase pt-4">Ajouter un Nouveau récit</p>
        <p class="valide"><?= $errorMessages["addTravelbook"] ?? '' ?></p>
        <div class="row justify-content-center">
            <div class="col-sm-8 p-3">
                <form method="post">
                    <textarea id="editor">Let's go !</textarea>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center align-items-center">
        
<form novalidate method="POST" enctype="multipart/form-data" name="addTravelbook" class="col-12 col-sm-8 col-md-4 pb-3 d-flex flex-column">

    <div class="form-group">
        <label class="text-center d-block" for="uploadFile">Image de couverture</label>
        <input type="file" id="uploadFile" name="uploadFile" aria-label="imgage récit" class="form-control text-center" value="<?= isset($_POST["uploadFile"]) ? $_POST["uploadFile"] : "" ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["uploadFile"]) ? $errorMessages["uploadFile"] : "" ?></span>
        </div>
    </div>
	
	<div class="form-group">
        <label for="titleTravelbook"></label>
        <input type="text" id="titleTravelbook" name="titleTravelbook" aria-label="titre récit" class="form-control text-center inputAdmin" placeholder="TITRE RÉCIT" value="<?= isset($_POST["titleTravelbook"]) ? htmlspecialchars($_POST["titleTravelbook"]) : "" ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["titleTravelbook"]) ? $errorMessages["titleTravelbook"] : "" ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="travelbookYear"></label>
        <input type="text" id="travelbookYear" name="travelbookYear" aria-label="année récit" class="form-control text-center inputAdmin" placeholder="ANNÉE" value="<?= isset($_POST["travelbookYear"]) ? htmlspecialchars($_POST["travelbookYear"]) : "" ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["travelbookYear"]) ? $errorMessages["travelbookYear"] : "" ?></span>
        </div>
    </div>

    <div class="form-group">
        <label class="text-center d-block" for="travelFile"></label>
        <input type="file" id="travelFile" name="travelFile" aria-label="fichier récit" class="form-control text-center" value="<?= isset($_POST["travelFile"]) ? $_POST["travelFile"] : "" ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["travelFile"]) ? $errorMessages["travelFile"] : "" ?></span>
        </div>
    </div>
    
    <button class="btn btnConnexion mx-auto w-50 mt-3" type="submit" name="addNewTravelbook">Ajouter</button>
    <div class="mt-1 d-flex justify-content-center">
    <a type="button" href="../vues/adminHome.php" class="btn btn-secondary mr-3 mt-3">retour</a>
    </div>

</form>

</div>
</div>