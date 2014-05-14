<?php
	session_start();
?>
	
<!DOCTYPE html>
<html lang="en">
	<?php include ("head.php"); ?>
	
	<body>
	<?php
	$id = 0;
	if (empty($_SESSION['fonction']) OR empty($_SESSION['login'])):
		header('Location: index.php');
	elseif ($_SESSION['fonction'] == 'veterinaire'):
		header('Location: index.php');
	elseif ($_SESSION['fonction'] == 'employe'):
		include ("menu_empl.php");?>
			<div class="container">
				<br>
				<form class="form-horizontal" method="post" action="recap_client.php">
				<fieldset>

				<!-- Form Name -->
				<legend>Ajout d'un nouveau client</legend>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="nom">Nom</label>  
				  <div class="col-md-4">
				  <input id="nom" name="nom" type="text" placeholder="" class="form-control input-md" required="">
					
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="prenom">Prénom</label>  
				  <div class="col-md-4">
				  <input id="prenom" name="prenom" type="text" placeholder="" class="form-control input-md" required="">
					
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="telephone">Téléphone</label>  
				  <div class="col-md-4">
				  <input id="telephone" name="telephone" type="tel" placeholder="" class="form-control input-md" required="">
					
				  </div>
				</div>

				<!-- Textarea -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="adresse">Adresse complète</label>
				  <div class="col-md-4">                     
					<textarea class="form-control" id="adresse" name="adresse"></textarea>
				  </div>
				</div>
				
				<!-- Button -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for=""></label>
				  <div class="col-md-4">
					<input type="submit" value="Ajout" class="btn btn-primary">
				  </div>
				</div>

				</fieldset>
				</form>
		<hr>
		<footer class="row">
			<div class="col-lg-12">
			  Projet NF17 - UTC
			</div>
		</footer>
	</div>
	<?php endif; ?>
  </body>	
</html>
