
<style type="text/css">
	.forum-searchbar{margin-bottom:20px;}
.forum-searchbar input[type=search]{display:inline-block;width:213px;margin:0;padding:5px 10px;border:1px solid #46A2D9;border-right:0;outline:none;border-top-left-radius:2px;border-bottom-left-radius:2px;}
.forum-searchbar button[type=submit]{display:inline-block;margin:0 0 0 -5px;padding:5px 10px;background:#fff;border:1px solid #46A2D9;border-left:0;border-top-right-radius:2px;border-bottom-right-radius:2px;}

</style>
<div class="container" style="margin-top: 20px;">
	<div class="row">
		<div class="col-md-12">
		<form onsubmit="return false;" id="forumsearch" class="forum-searchbar">
				<input type="search" name="" id ="system-search" placeholder="Rechercher un quizz" >
				<button type="submit">
					<i class="fa fa-search" style="color: black" aria-hidden="true"></i>
				</button>
			</form>
			</div>
			<?php 
			while($groupe_etudiant = $groupe_etudiants->fetch()){
				$groupe = $bdd->prepare("SELECT * FROM groupe where id = ?");
				$groupe->execute([$groupe_etudiant->id_groupe]);
				$groupe = $groupe->fetch();
				$groupe_themes = $bdd->prepare("SELECT * FROM groupe_theme where id_groupe = ?");
				$groupe_themes->execute([$groupe->id]);
				
				if($groupe_themes->rowCount() <= 0 ){
					
					require 'views/NoQuizz.view.php';
					die();	
				}
				while($groupe_theme = $groupe_themes->fetch()){
						$theme = $bdd->prepare("SELECT * FROM theme where id = ?");
						$theme->execute([$groupe_theme->id_theme]);
						$theme = $theme->fetch();

						$nbquestions = $bdd->prepare("SELECT id from question where id_theme = ?");
						$nbquestions->execute([$theme->id]);
						$nbquestions = $nbquestions->rowCount();

						$passer = $bdd->prepare("SELECT * from quizz_passer where id_etudiant = ? and id_theme = ?");
						$passer->execute([$_SESSION["etudiant"]->id,$theme->id]);
						$passer = $passer->rowCount();

						if($passer <= 0){
							$professeur = $bdd->prepare("SELECT * from professeur where id = ?");
							$professeur->execute([$theme->id_prof]);
							$professeur = $professeur->fetch();

			 ?>
			 <div class="col-md-4" style="margin-bottom: 10px;">
			<div> Bonjour, <?= $_SESSION["etudiant"]->nom_elv; ?> <?= $_SESSION["etudiant"]->prenom_elv ?>, vous êtes inscrit au groupe <?= $groupe->nom ?> sous le thème <?= $theme->nom; ?> dans la matière <?= $professeur->responsable_matière ?>
			</div>
			<div>
			vous avez <?= $nbquestions ?> questions, chaque reponse juste est noté sur 1 point.
			</div>
			<br/>
			<div>
			<form method="post" action="<?= $base ?>/CommencerQuizzSession.php">	
				<input type="hidden" name="id_theme" value="<?=$theme->id?>">
				<input type="hidden" name="id_groupe" value="<?=$groupe->id?>">
				<?php if($groupe_theme->status > 0){?>
				<input type="submit" name="start" value="Commencer l'evaluation" class="btn btn-success">
				<?php } else{ ?>
						<div class='text-danger ' style="font-weight: bold"><i class="fa fa-lock"></i> Evaluation desactivé, une activation par le responsable est nécessaire   </div>
					<?php } ?>

			</form>
			</div>
				<hr/>
				</div>

			<?php }
				
			}
			 }?>

	
	
</div>
</body>
</html