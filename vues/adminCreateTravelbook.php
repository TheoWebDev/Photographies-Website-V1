<?php

require_once "../controllers/controller_adminCreateTravelbook.php";

?>

<!doctype html>
<html lang="fr">
<head>
	
<title>ADMIN_New_Travelbook</title>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,600;1,300&display=swap">
</head>
<body class="adminPage">

<nav class="navbar navbar-expand-lg navbar-dark d-none d-sm-block d-sm-none d-md-block">
    
    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNav">
        <ul class="navbar-nav text-uppercase pl-5">
            <li class="nav-item">
                <a class="colorBlack" href="/index.php">accueil visiteur</a>
            </li>
            <li class="nav-item">
                <a class="colorBlack" href="/vues/adminHome.php">tableau de bord</a>
            </li>
        </ul>
    </div>
</nav>

<div class="row dropdown bgnav d-flex d-sm-noned-none d-sm-block d-md-none fixed-top justify-content-between">
    <img class="col-3 logoAccueil" src="">
    <button class="btn col-3" type="button" data-toggle="dropdown">
    <i class="fa col-3 fa-bars fa-2x"></i>
    </button>
    <div class="dropdown-menu text-uppercase">
        <a class="dropdown-item" href="/index.php">accueil visiteur</a>
        <a class="dropdown-item" href="/vues/adminHome.php">tableau de bord</a>
    </div>
</div>

      
<?php
   // Mise en place d'une condition pour ne plus afficher le formulaire quand la patient a bien été enregistré
   if (!$addNewTravelbookInBase) { ?>

   <?php
      // Mise en place d'un include pour la mise en place du formulaire
      include "include/form-createTravelbook.php";
   } else { ?>
      <!-- si le patient a bien été enregistré nous indiquons l'utilisateur via un message patient enregistré -->
      <div>
         <p class="h4 mt-5 text-center text-info"><?= $errorMessages['addNewTravelbook'] ?? '' ?></p>
         <p class="h4 mt-5 text-center text-info">Votre récit <span class="font-weight-bold"><?= $_POST['titleTravelbook'] ?></span> a bien été publié !</p>
         <div class="mt-5 d-flex justify-content-center">
            <a type="button" href="adminHome.php" class="btn btn-secondary mr-1">tableau de bord</a>
            <a type="button" href="" class="btn btn-primary ml-1">voir le récit</a>
         </div>
      </div>

   <?php } ?>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script src="https://cdn.tiny.cloud/1/jswndz58pw1fu4q6x370udxkqakihvixcaojrqv9bsw36rr1/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="../assets/js/test.js"></script>
<script>
    tinymce.init({
    selector: 'editor',
    plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media image mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent',
    toolbar_mode: 'floating',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',});
</script>
</body>
</html>