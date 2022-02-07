<form method="POST" enctype="multipart/form-data" class="col-12 col-sm-6 pb-3">

    <legend class="titleForm d-flex justify-content-center pt-4">Écrire un Nouveau récit</legend>

    <div class="form-group">
        <textarea id="editor" value="<?= isset($_POST["tinyContent"]) ? ($_POST["tinyContent"]) : "" ?>" name="tinyContent"></textarea>
        <div>
            <span class="textError"><?= isset($errorMessages["tinyContent"]) ? $errorMessages["tinyContent"] : "" ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="tinyName"></label>
        <input type="text" id="tinyName" name="tinyName" aria-label="tinyName" class="form-control text-center inputAdmin" placeholder="TITRE RÉCIT" value="<?= isset($_POST["tinyName"]) ? htmlspecialchars($_POST["tinyName"]) : "" ?>" required>
        <div>
            <span class="textError"><?= isset($errorMessages["tinyName"]) ? $errorMessages["tinyName"] : "" ?></span>
        </div>
    </div>

    <div class="form-group">
        <label for="selectTravelbook"></label>
        <select class="custom-select" aria-label="Galeries" id="selectTravelbook" name="selectTravelbook" required>
            <option disabled selected>Choisissez le carnet de voyage</option>

            <?php foreach ($travelNameForSelect as $value) { ?>
                <option value="<?= $value["travelbook_ID"] ?>"><?= $value["travelbookName"] ?></option>
            <?php } ?>
        </select>
        <div>
            <span class="textError"><?= isset($errorMessages["selectTravelbook"]) ? $errorMessages["selectTravelbook"] : "" ?></span>
        </div>
    </div>

    <button class="btn btnConnexion mx-auto w-50 mt-3" type="submit" name="addTinyTravel">Ajouter</button>
    <div class="mt-1 d-flex justify-content-center">
        <a type="button" href="../vues/adminHome.php" class="btn btn-secondary mr-3 mt-3">retour</a>
    </div>

</form>