<div class="container" style="margin-top: 10px;">
	<div class="row">
		<div class="col-md-12">
	<legend>La liste des etudiants</legend>
	<table class="table table-striped table-bordered table-hover">
				<thead class="bg-primary text-white">
					<tr scope="row">
						<th scope="col">CIN</th>
						<th scope="col">CNE</th>
						<th scope="col">Nom</th>
						<th scope="col">Prenom</th>
						<th scope="col">Date de naissance</th>
						<th scope="col">Nationalite</th>
						<th scope="col">Sexe</th>
						<th scope="col">Niveau d'étude</th>
						<th scope="col">Email</th>
						<th scope="col">Tests</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($etudiant = $etudiants->fetch()){
							$date = date("d/m/Y",strtotime($etudiant->date_naissance));
					 ?>
					 <tr scope="row">
					 	<td><?= $etudiant->cin ?></td>
					 	<td><?=$etudiant->cne ?></td>
					 	<td><?=$etudiant->nom_elv ?></td>
					 	<td><?=$etudiant->prenom_elv ?></td>
					 	<td><?= $date?></td>
					 	<td><?=$etudiant->nationalite ?></td>
					 	<td><?=$etudiant->sexe?></td>
					 	<td><?=$etudiant->nivetude ?></td>
					 	<td><?=$etudiant->email ?></td>
					 	<td><a href="<?= $base?>/Consulter.php?id=<?=$etudiant->id?>">Consulter </a> </td>
					 </tr>
					<?php  } ?>
				</tbody>
			</table>
</div>
</div>
</div>
</body>
</html>