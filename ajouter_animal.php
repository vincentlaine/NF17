<?php
	session_start();
?>
	
<!DOCTYPE html>
<html lang="en">
	<?php include ("head.php"); 
	include("connect.php");?>
	
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
				<form class="form-horizontal" method="post" action="recap_animal.php">
				<fieldset>

				<!-- Form Name -->
				<legend>Ajout d'un nouvel animal</legend>

				<!-- Recherche proprio -->
				<?php 
					$vConn = fConnect();
					$vSql = "SELECT idproprietaire, nomproprietaire, prenomproprietaire FROM proprietaire";
					$vQuery = pg_query($vConn, $vSql); ?>
				<div class="form-group">
				  <label class="col-md-4 control-label" for="proprietaire">Propriétaire</label>  
				  <div class="col-md-4">
					<select class="form-control" name="idproprietaire">
						<option value="0">
						<?php
							while( $vResult = pg_fetch_array($vQuery) )
							{?>
								<option value="<?php echo $vResult['idproprietaire']; ?>"><?php echo $vResult['prenomproprietaire']; echo " "; echo $vResult['nomproprietaire']; ?></option>
							<?php }
						?>
					</select>
				  </div>
				</div>
				
				<!-- Text input-->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="nom">Nom</label>  
				  <div class="col-md-4">
				  <input id="nom" name="nom" type="text" placeholder="" class="form-control input-md" required="">
					
				  </div>
				</div>

				<div class="form-group">
				  <label class="col-md-4 control-label" for="race">Race</label>  
				  <div class="col-md-4">
				  <select class="form-control" name="race">
				  <option value="0">
					<?php
					$vSql2 = "SELECT nomrace FROM race";
					$vQuery2 = pg_query($vConn, $vSql2);
						while( $vResult2 = pg_fetch_array($vQuery2) )
						{?>
							<option value="<?php echo $vResult2['nomrace']; ?>"><?php echo $vResult2['nomrace'];?></option>
						<?php }
					?>
					</select>
					
				  </div>
				</div>

				<!-- Multiple Radios (inline) -->
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
				
				<!-- Poids -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="poids">Poids</label>  
				  <div class="col-md-4">
				  <input id="poids" name="poids" type="integer" placeholder="" class="form-control input-md">
				  </div>
				</div>
				
				<!-- Taille -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="taille">Taille</label>  
				  <div class="col-md-4">
				  <input id="taille" name="taille" type="integer" placeholder="" class="form-control input-md">
				  </div>
				</div>
				
				<!-- code identification -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="code">Code d'identification</label>  
				  <div class="col-md-4">
				  <input id="code" name="code" type="integer" placeholder="" class="form-control input-md">
				  </div>
				</div>
				
				<!-- Date de naissance -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for="date">Date de naissance</label>  
				  <div class="col-md-4">
				  <input id="date" name="date" type="date" placeholder="" class="form-control input-md">
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
	<?php endif; 
	pg_close($vConn);?>
  </body>	
</html>
