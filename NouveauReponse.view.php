
<div class="container" style="margin-top: 10px">
	<div class="row">
		<div class="col-md-12">
				<legend><div>Nouvelle reponse pour la question</div></legend>
				<b> <?=$question->question?></b>
				<form style="margin-top: 5px" method="post">
					<div class="row">
						<div class="col-md-2">
							<label>Reponse </label>
						</div>
						<div class="col-md-4">
							<input type="text" name="reponse" class="form-control">
						</div>

					</div>
					<div class="row">
						<div class="col-md-2">
							<label>Correct </label>
						</div>
						<div class="col-md-2">
							<input type="checkbox" name="correct">
						</div>
					</div>
					<div class="row">
						<div class="col-md-2"><input type="submit" name="submit" class="btn btn-success"></div>
						<div class="col-md-2"><a href="NouveauQuestion.php?id=<?=$question->id_theme?>" class="btn btn-success"> Terminer </a></div>
					</div>
				</form>
				<div class="row">
					
				</div>
		</div>
	</div>
</div>
</body> </html>