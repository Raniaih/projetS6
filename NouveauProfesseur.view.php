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
	<LEGEND>Nouveau Professeur</LEGEND>
	<form method="post">
		<div class="row">
			<div class="col-md-2">
				<label>Nom : </label>
			</div>
			<div class="col-md-4">
				<input type="text" name="nom" class="form-control">
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2">
				<label>Prenom : </label>
			</div>
			<div class="col-md-4">
				<input type="text" name="prenom" class="form-control">
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2">
				<label>Email : </label>
			</div>
			<div class="col-md-4">
				<input type="text" name="email" class="form-control">
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2">
				<label>Responsable de la matière : </label>
			</div>
			<div class="col-md-4">
				<input type="text" name="resp" class="form-control">
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2">
				<label>Mot de passe : </label>
			</div>
			<div class="col-md-4">
				<input type="password" name="password1" class="form-control">
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-md-2">
				<label>Confirmer le mot de passe : </label>
			</div>
			<div class="col-md-4">
				<input type="password" name="password2" class="form-control">
			</div>
		</div>
		<div class="row">
			<input type="submit" name="Valider" class="btn btn-success">
		</div>
	</form>
	</fieldset>
		</div>
	</div>
	
</div>