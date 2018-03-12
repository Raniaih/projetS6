<?php $title = "Editer un etudiant";
	require 'inc/bdd.php';
	require 'views/header.php';
	if(isset($_SESSION["admin"]) && isset($_GET["id"]) && !empty($_GET["id"])){
		$id = intval($_GET["id"]);
		$etudiant = $bdd->prepare("SELECT * FROM etudiant where id = ?");
		$etudiant->execute([$id]);
		$etudiant = $etudiant->fetch();
		if($etudiant){
			if(isset($_POST["Valider"]) && !empty($_POST)){
			$nom = $_POST["nom"];
			$prenom = $_POST["prenom"];
			$email = $_POST["email"];
			$pwd1 = $_POST["password1"];
			$pwd2 = $_POST["password2"];
			$sexe = $_POST["sexe"];
			$nationalite = $_POST["nationalite"];
			$dn = $_POST["dn"];
			$niv = $_POST["niv"];
			$cin = $_POST["cin"];
			$cne  = $_POST["cne"];


			if($pwd2 == $pwd1){
				try {
					$upd = $bdd->prepare("update Etudiant set cin = ?, cne = ?, nom_elv = ?, prenom_elv = ?, date_naissance = ?, nationalite = ?, sexe = ?, nivetude = ?, email = ?, motdepasse = ? where id = ? ");
					$upd->execute([$cin,$cne,$nom,$prenom,$dn,$nationalite,$sexe,$niv,$email,$pwd2,$etudiant->id]);
					if($upd){
						$_SESSION["flash"]["success"] = "Modification éffectué par success";
						sleep(3);
						header("Location:/Quizz/Etudiants.php");
					}
				} catch (Exception $e) {
					$_SESSION["flash"]["danger"] = "Un etudiant existe déjà avec l'email ".$email." !";
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
	<fieldset>
	<LEGEND>Editer l'etudiant : <?= $etudiant->nom_elv ?> <?= $etudiant->prenom_elv?></LEGEND>
	<hr/>
	<form method="post">
		<div class="row">
			<div class="col-md-2">
				<label>CNE : </label>
			</div>
			<div class="col-md-4">
				<input type="number" name="cne" value="<?=$etudiant->cne?>" class="form-control">
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2">
				<label>CIN : </label>
			</div>
			<div class="col-md-4">
				<input type="text" name="cin" value="<?=$etudiant->cin?>" class="form-control">
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2">
				<label>Nom : </label>
			</div>
			<div class="col-md-4">
				<input type="text" value="<?=$etudiant->nom_elv?>" name="nom" class="form-control">
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2">
				<label>Prenom : </label>
			</div>
			<div class="col-md-4">
				<input type="text" name="prenom" value="<?=$etudiant->prenom_elv?>" class="form-control">
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2">
				<label>Date de naissance: </label>
			</div>
			<div class="col-md-4">
				<input type="date" name="dn" value="<?=$etudiant->date_naissance?>"class="form-control">
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2">
				<label>Email : </label>
			</div>
			<div class="col-md-4">
				<input type="text" name="email" value="<?=$etudiant->email?>" class="form-control">
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2">
				<label>Nationalité : </label>
			</div>
			<div class="col-md-4">
				<input type="text" name="nationalite" value="<?=$etudiant->nationalite?>"class="form-control">
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2">
				<label>Sexe : </label>
			</div>
			<div class="col-md-4">
				<select name="sexe" class="form-control">
					<?php if($etudiant->sexe == "Masculin"){
						?>
						<option value="Masculin" selected="selected">Masuclin</option>
					<option value="Feminin" >Feminin</option>
					<?php }else{ ?>
					<option value="Masculin">Masuclin</option>
					<option value="Feminin" selected="selected">Feminin</option>
					<?php } ?>
				</select>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2">
				<label>Niveau d'étude : </label>
			</div>
			<div class="col-md-4">
				<textarea name="niv" class="form-control" cols="30" rows="5"><?=$etudiant->nivetude?></textarea>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2">
				<label>Mot de passe : </label>
			</div>
			<div class="col-md-4">
				<input type="password" name="password1" value="<?= $etudiant->motdepasse?>" class="form-control">
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2">
				<label>Confirmer le mot de passe : </label>
			</div>
			<div class="col-md-4">
				<input type="password" name="password2" value="<?= $etudiant->motdepasse?>"  class="form-control">
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