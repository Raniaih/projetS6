<?php session_start();
 $base = "/Quizz" ?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
		<!-- CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<!-- JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?= $base?>/index.php">PAULVAQUIZZ</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item" id="home">
        <a class="nav-link" href="<?= $base?>/index.php">Accueil <span class="sr-only">(current)</span></a>
      </li>
     	<?php if(!isset($_SESSION["etudiant"]) && !isset($_SESSION["prof"])){

     		?>
     		<li class="nav-item" id = "conexion">
       			 <a class="nav-link" href="<?= $base?>/Connexion.php">Connexion <span class="sr-only">(current)</span></a>
     		 </li>
     		 </ul>
          </div>
</nav>

     		<?php
     	} else if(isset($_SESSION["etudiant"])){ 
     		?>

     			<li class="nav-item" id = "participer">
       			 <a class="nav-link" href="<?= $base?>/Groupes.php">Integrer un groupe <span class="sr-only">(current)</span></a>
     		 </li>
     		 <li class="nav-item " id = "test">
       			 <a class="nav-link " href="<?= $base?>/quizz.php">Commencer le quizz <span class="sr-only">(current)</span></a>
     		 </li>
          <li class="nav-item " id = "results">
             <a class="nav-link " href="<?= $base?>/Resultats.php">Resultats <span class="sr-only">(current)</span></a>
         </li>
     			<li class="nav-item" id = "Deconnexion">
       			 <a class="nav-link" href="<?= $base?>/Deconnexion.php">Deconnexion <span class="sr-only">(current)</span></a>
     		 </li>
         </ul>
          </div>
</nav>
<div class="float-right">
           Session ouvert etudiant : <?= $_SESSION["etudiant"]->nom_elv ?> <?= $_SESSION["etudiant"]->prenom_elv?>
         </div>

     <?php	} else if($_SESSION["prof"]){
      ?>
      <li class="nav-item" id = "participer">
             <a class="nav-link" href="<?= $base?>/NouveauGroupe.php">Créer un groupe <span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item" id = "participer">
             <a class="nav-link" href="<?= $base?>/NouveauQuizz.php">Créer un quizz<span class="sr-only">(current)</span></a>
             <li class="nav-item" id = "participer">
             <a class="nav-link" href="<?= $base?>/Etudiants.php">Etudiants <span class="sr-only">(current)</span></a>
         </li>
         <li class="nav-item" id = "participer">
             <a class="nav-link" href="<?= $base?>/ListeQuizz.php">Quizz <span class="sr-only">(current)</span></a>
         </li>
          <li class="nav-item" id = "participer">
             <a class="nav-link" href="<?= $base?>/ListeGroupe.php">Groupes <span class="sr-only">(current)</span></a>
         </li>
             <li class="nav-item" id = "participer">
             <a class="nav-link" href="<?= $base?>/Deconnexion.php">Deconnexion <span class="sr-only">(current)</span></a>
         </li>

         </ul>
          </div>
</nav>
    
         <div class="float-right">
           Session ouvert professeur : <?= $_SESSION["prof"]->nom_prof ?> <?= $_SESSION["prof"]->prenom_prof ?>
         </div>
         

      <?php
     } ?>
    
 
