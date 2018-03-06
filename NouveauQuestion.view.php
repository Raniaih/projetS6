
<div class="container" style="margin-top: 10px">
	<div class="row">
		<div class="col-md-7">
			<legend> Nouvelle Question pour le thème <?=$theme->nom?> </legend>
			<form method="post">
				<div class="row">
					<div class="col-md-3">
						<label style="vertical-align: middle;">Question</label>
					</div>
					<div class="col-md-8">
						<textarea cols="50" rows="10" name ="question" class="form-control"></textarea>
					</div>
				</div>
				<div class="row">
					<input type="submit" name="submit" class="btn btn-success">
				</div>
			</form>
		</div>
	</div>
</div>

</body>
</html>