<?php
	$title = "Integrer un groupe";
	require '../views/header.php';
	require '../inc/bdd.php';
	
	if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_SESSION["etudiant"])){
		$id = intval($_GET["id"]);
		
		$groupe = $bdd->prepare("SELECT * FROM groupe where id = ?");
		$groupe->execute([$id]);
		$groupe = $groupe->fetch();
		if($groupe){
			if(isset($_POST["submit"]) && !empty($_POST)){
				$code = $_POST["code"];
				if($groupe->code == $code){
					$ins = $bdd->prepare("INSERT INTO etudiant_groupe set id_groupe =?, id_etudiant = ?");
					$ins->execute([$id,$_SESSION["etudiant"]->id]);
					if($ins){
					header("location:/Quizz/Groupes.php");
				}
	}
	else{

		$_SESSION["flash"]["danger"] = "code invalide";
	}
}?>
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
				<legend>Code d'accès au groupe <?=$groupe->nom?></legend>
				<form method="post">
					<div class="row">
						<div class="col-md-2"><label>Code d'accès</label></div>
						<div class="col-md-3"><input type="password" name="code" class="form-control"></div>
						<div class="col-md-2"><input type="submit" name="submit" class="btn btn-success"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
}
else{
		header("location:/Quizz/index.php");
	}
}