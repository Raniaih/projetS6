
<div class="container" style="margin-top: 10px">
	<div class="row">
		<div class="col-md-9">
			<legend>Vos resultats : </legend>
			<table class="table table-striped table-bordered table-hover">
				<thead class="bg-primary text-white text-center">
					<tr scope="row">
						<th scope="col">Thème </th>
						<th scope="col">Matière </th>
						<th scope="col">Score </th>
						<th scope="col">Status </th>
					</tr>
				</thead>
				<tbody class="text-center">
					<?php while($resultat = $resultats->fetch()){ 
							$theme = $bdd->prepare("SELECT * from theme where id= ?");
							$theme->execute([$resultat->id_theme]);
							$theme = $theme->fetch();

							$questions = $bdd->prepare("SELECT * FROM question where id_theme = ?");
						 $questions->execute([$theme->id]);
						 $nbreponses = 0;
						 while($question = $questions->fetch()){
						 	
						 	$reponsenb =  $bdd->prepare("SELECT * from reponses where correct = 1 and id_question = ?");
							$reponsenb->execute([$question->id]);
							while($reponsen = $reponsenb->fetch()){
							
							if($reponsen->correct == 1){
								$nbreponses = $nbreponses + 1;

							 }
							}
							}
							
							$professeur = $bdd->prepare("SELECT * FROM professeur where id = ?");
							$professeur->execute([$theme->id_prof]);
							$professeur = $professeur->fetch();
							
						?>

							<tr>
								<td><?= $theme->nom ?></td>
								<td><?=$professeur->responsable_matière?></td>
								<?php if($resultat->score >= ($nbreponses/2)){ ?>
								<td class="text-success">
									
									<?= $resultat->score?> sur <?=$nbreponses?>
								</td>
								<td class="text-success">
									
									Réussi
								</td>
								<?php }else{	?>
									<td class="text-danger">
									
									<?= $resultat->score?> sur <?=$nbreponses?>
	
								</td>
								<td class="text-danger">
									
									Echoué
								</td>
								<?php } ?>
							</tr>
						<?php } ?>
				</tbody>
			</table>
			</table>
		</div>

	</div>
	

</div>
</body>
</html>