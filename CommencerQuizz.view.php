
<div class="container-fluide" style="margin-top: 10px;">
	
		<div class="col-md-8">
			<h4><?=$pagecourante; ?>. <?= $question->question ?></h4>
		</div>
		<hr/>
		<div style="margin-left: 20px;">
		
		<form method="post">
			<?php  
			$nbreponsec = $bdd->prepare("SELECT * from reponses where correct =1 and id_question = ?");
			$nbreponsec->execute([$question->id]);
			if($nbreponsec->rowCount() > 1){
				$ok = "ok";
			
				}
			while($reponse = $reponses->fetch()){?>
					
					<?php 
						
						
						$reponses_etudiant = $bdd->prepare("SELECT * from reponses_etudiant where id_etudiant=? and id_reponse = ?");
						$reponses_etudiant->execute([$_SESSION["etudiant"]->id,$reponse->id]);
						$reponses_etudiant = $reponses_etudiant->fetch();
						if($reponses_etudiant ){
								if(isset($ok)){
									?>
									<input type="checkbox" name="reponseQ<?=$pagecourante?>[]"id="<?= $reponse->reponse ?>" value="<?= $reponse->reponse ?>" checked="checked"><label for="<?= $reponse->reponse ?>"><?= $reponse->reponse ?></label><br/>
									<?php
								}else {
							?>
							<input type="radio" name="reponseQ<?=$pagecourante?>[]"id="<?= $reponse->reponse ?>" value="<?= $reponse->reponse ?>" checked="checked"><label for="<?= $reponse->reponse ?>"><?= $reponse->reponse ?></label><br/>
						<?php }
					}else{
							if(isset($ok)){
					 ?>
							<input type="checkbox" name="reponseQ<?=$pagecourante?>[]"id="<?= $reponse->reponse ?>" value="<?= $reponse->reponse ?>"><label for="<?= $reponse->reponse ?>"><?= $reponse->reponse ?></label><br/>
			<?php }
			else{?>
				<input type="radio" name="reponseQ<?=$pagecourante?>[]"id="<?= $reponse->reponse ?>" value="<?= $reponse->reponse ?>"><label for="<?= $reponse->reponse ?>"><?= $reponse->reponse ?></label><br/>
				
				<?php
			} }} 
				$precedent = $pagecourante - 1;
				if($precedent == 0){ 
					$precedent = 1;
				} 
			?>

			<input type="hidden" name="id" value="<?= $reponse->id ?>">
			<a href="<?= $base ?>/CommencerQuizz.php?page=<?=$precedent?>" class="btn btn-light"> Precedent </a>
			<?php if($pagecourante == $pagesTotal){ ?>

				<input type="submit" name="submit" class="btn btn-light" value="Submit"> 
			<?php } else{?>
			<input type="submit" name="suivant"  class="btn btn-light"  value="Suivant"> 
			<?php } ?>
		 </form>
</div>
<div>
	
</div>
</div>
</body>
</html>