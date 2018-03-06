<?php
$title = "Nouveau Groupe";
	require 'inc/bdd.php';
	require 'views/header.php';
	if(isset($_SESSION["prof"])){
		if(isset($_POST["submit"]) && !empty($_POST)){
			$groupe  = $_POST["groupe"];
			$code = $_POST["code"];
			$ins  = $bdd->prepare("INSERT INTO groupe set nom = ?,code=?,id_prof=?");
			$ins->execute([$groupe,$code,$_SESSION["prof"]->id]);
			if($ins){
				header("Location:/Quizz/ListeGroupe.php");
			}
		}
		?>
		<div class="container" style="margin-top: 10px">
			<div class="row">
				<div class="col-md-12">
					<legend>Nouveau groupe</legend>
					<form method="post">
						<div class="row">
							<div class="col-md-2"><label>Nom du groupe</label></div>
							<div class="col-md-4"><input type="text" name="groupe" class="form-control"></div>
							</div>
							<div class="row">
								<div class="col-md-2"><label>Code du groupe</label></div>
								<div class="col-md-4"><input type="text" name="code" class="form-control"></div>
							</div>
							<div class="row">
								<div class="col-md-2"><input type="submit" name="submit" class="btn btn-success">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	
	<?php }?>