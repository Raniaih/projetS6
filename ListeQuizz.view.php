<style type="text/css">
		.scrollable{
		height: 250px;
		overflow-y: auto;
	}
	.forum-searchbar{margin-bottom:20px;}
.forum-searchbar input[type=search]{display:inline-block;width:213px;margin:0;padding:5px 10px;border:1px solid #46A2D9;border-right:0;outline:none;border-top-left-radius:2px;border-bottom-left-radius:2px;}
.forum-searchbar button[type=submit]{display:inline-block;margin:0 0 0 -5px;padding:5px 10px;background:#fff;border:1px solid #46A2D9;border-left:0;border-top-right-radius:2px;border-bottom-right-radius:2px;}

</style>

<div class="container" style="margin-top: 10px;">
	<div class="row">
		<div class="col-md-12">
			
			<form onsubmit="return false;" id="forumsearch" class="forum-searchbar">
				<input type="search" name="" id ="system-search" placeholder="Rechercher un quizz" >
				<button type="submit">
					<i class="fa fa-search" style="color: black" aria-hidden="true"></i>
				</button>

			</form>
			<table class="table table-striped table-bordered table-hover" id="table-list-search">
				<thead class="bg-primary text-white">
					<tr scope="row">
						<th scope="col" style="text-align: justify; vertical-align: middle;">
							<center>Thèmes</center>
						</th>
						<th scope="col" style="text-align: center; vertical-align: middle;">
							Questions
						</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					
					<?php  while($theme = $themes->fetch()){ ?>
						<tr scope ="row">
							<td style="text-align: center; vertical-align: middle;"> <?= $theme->nom ?></td>
							<td> 
									<div class="scrollable">
								<table class="table ">
									 
									<?php 
										$questions = $bdd->prepare("SELECT * FROM question where id_theme = ?");
										$questions->execute([$theme->id]);
										while($question = $questions->fetch()){
									 ?>
									<tr>

										<td style="text-align: justify;vertical-align: middle;"><?= $question->question?> </td>
										<td>
											<?php 
												$reponses = $bdd->prepare("SELECT * FROM reponses where id_question = ?");
												$reponses->execute([$question->id]);
												while($reponse = $reponses->fetch()){
													if($reponse->correct == 1){
											 ?>	
											 	<div class="text-success" >  - <?=$reponse->reponse ?></div>
											 <?php }
											 	else{
											  ?>
											  <div class="text-danger">  - <?=$reponse->reponse ?></div>
											  <?php } } ?>
										 </td>
										
									</tr>
									<?php } ?>
								
							</table>
						</div> 
					</td>
							<td style="text-align: center;vertical-align: middle;">
							 
							 <a href="AttribuerTheme.php?id=<?=$theme->id ?>" class="btn btn-success form-control">Attribuer à un groupe </a><br/><br/>
							 
							 <a href="DetailsQuizz.php?id=<?=$theme->id?>" class="btn btn-success form-control">
							 	Plus de details
							 </a>


							</td>
						</tr>

						<?php } ?>
				</tbody>

			</table>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?= $base ?>/js/SearchTable.js"></script>
</body>
</html>