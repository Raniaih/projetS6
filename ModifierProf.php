<?php
$title = "Editer un professeur";
	require 'inc/bdd.php';
	require 'views/header.php';
	if(isset($_SESSION["admin"]) && isset($_GET["id"]) && !empty($_GET["id"])){
		$id = intval($_GET["id"]);
		$professeur = $bdd->prepare("SELECT * FROM professeur where id = ?");
		$professeur->execute([$id]);
		$professeur = $professeur->fetch();
		if($professeur){
			if(isset($_POST["Valider"]) && !empty($_POST)){
			$nom = $_POST["nom"];
			$prenom = $_POST["prenom"];
			$email = $_POST["email"];
			$resp = $_POST["resp"];
			$pwd1 = $_POST["password1"];
			$pwd2 = $_POST["password2"];
			if($pwd2 == $pwd1){
				try {
					$upd = $bdd->prepare("update  Professeur set email = ?, motdepasse=?, nom_prof=?, prenom_prof = ?, responsable_matière = ? where id = ? ");
				$upd->execute([$email,$pwd1,$nom,$prenom,$resp,$id]);
				if($upd){
					header("location:/Quizz/Professeurs.php");
				}
				} catch (Exception $e) {
					$_SESSION["flash"]["danger"] = "Un professeur existe déjà avec l'email ".$email." !";
				}
				
			}
		}
			?>

			<div class="container" style="margin-top: 20px">
	<div class="row">
		<div class="col-md-12">
			<?php if(isset($_SESSION["flash"])){
					
					foreach ($_SESSION["flash"] as $type => $message){

                ?>
                <div class="alert alert-<?=$type?>" role="alert">
                	<?= $message ?>
                	
                </div>
			<?php	}
				unset($_SESSION["flash"]);
			 } ?>
	<fieldset >
	<b><legend>Editer le professeur : <?= $professeur->nom_prof?> <?= $professeur->prenom_prof ?></legend></b>
	<hr/>
	<form method="post">
		<div class="row">
			<div class="col-md-2">
				<label>Nom : </label>
			</div>
			<div class="col-md-4">
				<input type="text" name="nom" value = "<?=$professeur->nom_prof ?>"class="form-control">
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2">
				<label>Prenom : </label>
			</div>
			<div class="col-md-4">
				<input type="text" name="prenom" value = "<?=$professeur->prenom_prof ?>" class="form-control">
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2">
				<label>Email : </label>
			</div>
			<div class="col-md-4">
				<input type="text" name="email" value = "<?=$professeur->email ?>" class="form-control">
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2">
				<label>Responsable de la matière : </label>
			</div>
			<div class="col-md-4">
				<input type="text" name="resp" value = "<?=$professeur->responsable_matière ?>" class="form-control">
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2">
				<label>Mot de passe : </label>
			</div>
			<div class="col-md-4">
				<input type="password" name="password1" value = "<?=$professeur->motdepasse ?>" class="form-control">
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2">
				<label>Confirmer le mot de passe : </label>
			</div>
			<div class="col-md-4">
				<input type="password" name="password2" value = "<?=$professeur->motdepasse ?>" class="form-control">
			</div>
		</div>
		<hr/>
		<div class="row">
			<input type="submit" name="Valider" class="btn btn-success">
		</div>
	</form>
	</fieldset>
		</div>
	</div>
	
</div>
			<?php  
		}
	}
	?>