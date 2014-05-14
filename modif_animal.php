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
			$nom = $_POST['nomanimal'];
			$race = $_POST['nomrace'];
			include "connect.php";
			$vConn = fConnect();
			$vSql = "SELECT * FROM animal WHERE idproprietaire = '$id' AND nomanimal = '$nom' AND nomrace = '$race'";
			$vQuery = pg_query($vConn, $vSql);
			$vResult = pg_fetch_array($vQuery);?>
			
			<div class="container">
				<br>
				<form class="form-horizontal" method="post" action="recap_modif_client.php">
				<fieldset>

				<!-- Form Name -->
				<legend>Modification d'un animal</legend>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="proprietaire">Propriétaire</label>  
				  <div class="col-md-4">
					<select class="form-control" name="idproprietaire" value="<?php echo($vResult['idproprietaire']);?>">
						<option value="0">
						<?php
							$vSql2 = "SELECT idproprietaire, nomproprietaire, prenomproprietaire FROM proprietaire";
							$vQuery2 = pg_query($vConn, $vSql2);
							while( $vResult2 = pg_fetch_array($vQuery2) )
							{?>
								<option value="<?php echo $vResult2['idproprietaire']; ?>"><?php echo $vResult2['prenomproprietaire']; echo " "; echo $vResult2['nomproprietaire']; ?></option>
							<?php }
						?>
					</select>
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="nom">Nom</label>  
				  <div class="col-md-4">
				  <input id="nom" name="nom" type="text"value="<?php echo($vResult['nomanimal']);?>" class="form-control input-md" required="">
					
				  </div>
				</div>

				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="race">Race</label>  
				  <div class="col-md-4">
				  <select class="form-control" name="race">
				  <option value="0">
					<?php
					$vSql3 = "SELECT nomrace FROM race";
					$vQuery3 = pg_query($vConn, $vSql3);
						while( $vResult3 = pg_fetch_array($vQuery3) )
						{?>
							<option value="<?php echo $vResult3['nomrace']; ?>"><?php echo $vResult3['nomrace'];?></option>
						<?php }
					?>
					</select>
					
				  </div>
				</div>

				<!-- Textarea -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="radios">Sexe</label>
				  <div class="col-md-4"> 
					<label class="radio-inline" for="radios-0">
					  <input type="radio" name="sexe" id="radios-0" value="M" checked="checked">
					  M
					</label> 
					<label class="radio-inline" for="radios-1">
					  <input type="radio" name="sexe" id="radios-1" value="F">
					  F
					</label>
				  </div>
				</div>
				
				<!-- idproprietaire -->
				<input type="hidden" name="idproprietaire" value="<?php echo $vResult['idproprietaire'];?>">
				
				<div class="form-group">
				  <label class="col-md-4 control-label" for="poids">Poids</label>  
				  <div class="col-md-4">
				  <input id="poids" name="poids" type="integer" value="<?php echo($vResult['poidsanimal']);?>" class="form-control input-md">
				  </div>
				</div>
				
				<!-- Taille -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="taille">Taille</label>  
				  <div class="col-md-4">
				  <input id="taille" name="taille" type="integer" value="<?php echo($vResult['tailleanimal']);?>" class="form-control input-md">
				  </div>
				</div>
				
				<!-- code identification -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="code">Code d'identification</label>  
				  <div class="col-md-4">
				  <input id="code" name="code" type="integer" value="<?php echo($vResult['codeidentificationanimal']);?>" class="form-control input-md">
				  </div>
				</div>
				
				<!-- Date de naissance -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="date">Date de naissance</label>  
				  <div class="col-md-4">
				  <input id="date" name="date" type="date" value="<?php echo($vResult['datenaissanceanimal']);?>" class="form-control input-md">
				  </div>
				</div>
				
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
