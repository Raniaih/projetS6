<?php
$title = "Attribuer un thème a un groupe";
	require 'inc/bdd.php';
	require 'views/header.php';
	if(isset($_SESSION["prof"]) && isset($_GET["id"]) && !empty($_GET["id"])){
		$id_theme = intval($_GET["id"]);
		$theme = $bdd->prepare("SELECT * FROM theme where id = ?");
		$theme->execute([$id_theme]);
		$theme = $theme->fetch();
		if($theme){
			$groupes = $bdd->prepare("SELECT * FROM groupe where id_prof=?");
			$groupes->execute([$_SESSION["prof"]->id]);
			if(isset($_POST["submit"]) && !empty($_POST)){
				$groupe_id = $_POST["groupe"];
				$checkgroupe = $bdd->prepare("SELECT * FROM groupe_theme where id_theme = ? and id_groupe = ?");
				$checkgroupe->execute([$id_theme,$groupe_id]);
				$checkgroupe = $checkgroupe->fetch();
				if($checkgroupe){
						$_SESSION["flash"]["danger"] = "Thème déjà attribué a ce groupe ";
				}
				else{
				$ins = $bdd->prepare("INSERT INTO groupe_theme SET status = 0, id_groupe = ?, id_theme = ? ");
				$ins->execute([$groupe_id,$id_theme]);
				if($ins){
					header("location:/Quizz/ListeQuizz.php");
				}
			}
			}
	?>
	<div class="container" style="margin-top: 10px;">
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
				<legend>Attribué le thème <?= $theme->nom ?> à un groupe  </legend>
			</div>
		</div>
		<form method="post">
			<div class="row">
				<div class="col-md-2"><label>Groupe :</label></div>
				<div class="col-md-3">
					<select class="form-control custom-select" name="groupe">
						<?php
							while($groupe = $groupes->fetch()){
						?>
							<option value="<?=$groupe->id ?>"><?=$groupe->nom ?></option>
						<?php } ?>
					</select>

				</div>
				<div class="col-md-2"><input type="submit" name="submit" class="btn btn-success"></div>
			</div>
		</form>
		
	</div>
	<?php } 
}?>
