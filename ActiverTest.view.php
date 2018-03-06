
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<legend>Activer ou Désactiver un Quizz</legend>
			<form method="post">
				<div class="row">
					<div class="col-md-2"><label>Theme : </label></div>
					<div class="col-md-4">
						<select name="quizz" class="form-control">
								<?php while($gt = $groupe_theme->fetch()){ 
									$theme  = $bdd->prepare("SELECT * FROM theme where id = ?");
									$theme->execute([$gt->id_theme]);
									$theme = $theme->fetch();
				
									 ?>
									 	<option value="<?= $theme->id ?>"><?=$theme->nom?></option>
									<?php } ?>

						</select>
					</div>
					<div class="col-md-2">
						<input type="submit" name="valider" value="Activer/Desactivé" class="btn btn-success">
					</div>

				</div>
			</form>
		</div>
		<legend>Liste des quizz </legend>
		<table class="table table-striped table-bordered table-hover">
				<thead class="bg-primary text-white" style="text-align: center;">
					<tr scope="row">
						<th>Thème</th>
						<th> Status </th>
						
					</tr>
				</thead>
				<tbody>
					<?php 
					$groupe_theme = $bdd->prepare("SELECT * FROM groupe_theme where id_groupe = ?");
					$groupe_theme->execute([$id_groupe]);
					while($gt = $groupe_theme->fetch()){ 
							$theme  = $bdd->prepare("SELECT * FROM theme where id = ?");
							$theme->execute([$gt->id_theme]);
							$theme = $theme->fetch();
								$status = "off";
								if($gt->status == 1){
									$status = "on";
								}
							 ?>
								<tr>
									<td><?= $theme->nom; ?> </td>
									<?php if($status == "off"){
										echo '<td class="text-danger">'.$status."</td>";
									}
										else{
										echo '<td class="text-success">'.$status."</td>";
												}
									?>

								</tr>
							<?php } ?>
				</tbody>
			</table>
	</div>
</div>
</body>
</html>