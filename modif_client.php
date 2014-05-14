<?php
	session_start();
?>
	
<!DOCTYPE html>
<html lang="en">
	<?php include ("head.php"); ?>
	
	<body>
	<?php
	if (empty($_SESSION['fonction']) OR empty($_SESSION['login'])):
		header('Location: index.php');
	elseif ($_SESSION['fonction'] == 'veterinaire'):
		header('Location: index.php');
	elseif ($_SESSION['fonction'] == 'employe'):
		include ("menu_empl.php");
		if (!empty($_POST['idproprietaire'])){
			$id = $_POST['idproprietaire'];
			include "connect.php";
			$vConn = fConnect();
			$vSql = "SELECT * FROM proprietaire WHERE idproprietaire = '$id'";
			$vQuery = pg_query($vConn, $vSql);
			$vResult = pg_fetch_array($vQuery);?>
			
			<div class="container">
				<br>
				<form class="form-horizontal" method="post" action="recap_modif_client.php">
				<fieldset>

				<!-- Form Name -->
				<legend>Modification d'un client</legend>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="nom">Nom</label>  
				  <div class="col-md-4">
				  <input id="nom" name="nom" type="text" value="<?php echo($vResult['nomproprietaire']);?>" class="form-control input-md" required="">
					
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="prenom">Prénom</label>  
				  <div class="col-md-4">
				  <input id="prenom" name="prenom" type="text" value="<?php echo($vResult['prenomproprietaire']);?>" class="form-control input-md" required="">
					
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="telephone">Téléphone</label>  
				  <div class="col-md-4">
				  <input id="telephone" name="telephone" type="tel" value="<?php echo($vResult['telephoneproprietaire']);?>" class="form-control input-md" required="">
					
				  </div>
				</div>

				<!-- Textarea -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="adresse">Adresse complète</label>
				  <div class="col-md-4">                     
					<textarea class="form-control" id="adresse" name="adresse"><?php echo($vResult['adresseproprietaire']);?></textarea>
				  </div>
				</div>
				
				<!-- idproprietaire -->
				<input type="hidden" name="idproprietaire" value="<?php echo $vResult['idproprietaire'];?>">
				
				<!-- Button -->
				<div class="form-group">
					<label class="col-md-4 control-label" for=""></label>
					  <div class="col-md-2">
						<input type="submit" value="Modifier" class="btn btn-success btn-block">
					  </div>
					  <div class="col-md-2">
						<a class="btn btn-danger btn-block" href="gerer_client.php" role="button">Retour</a>
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
	<?php } endif;
	pg_close($vConn);?>
  </body>	
</html>
