
<div class="container" style="margin-top: 30px;">
		<div class="row">
			<div class="col-md-7">
				<?php if(isset($_SESSION["flash"])){
					
					foreach ($_SESSION["flash"] as $type => $message){

                ?>
                <div class="alert alert-<?=$type?>" role="alert">
                	<?= $message ?>
                	
                </div>
			<?php	}
				unset($_SESSION["flash"]);
			 } ?>
				<form method="post" >
					<div class="row">
						<div class="col-md-3">
							<label for="identifiant">Identifiant : </label>
						</div>
						<div class="col-md-7">
							<input type="text" name="identifiant" id="identifiant" class="form-control" value="<?php if(isset($identi)){echo $identi; } ?>">
						</div>

					</div>
						<hr/>
					<div class="row">
						<div class="col-md-3">
							<label for="motdepasse">Mot de passe : </label>
						</div>
						<div class="col-md-7">
							<input type="password" name="motdepasse" id="motdepasse" class="form-control">
						</div>

					</div>
					<br/>
					<input type="submit" name="submit" class="btn btn-success ">
				</form>

			</div>
		</div>
	</div>
</body>
</html>
