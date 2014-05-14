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
		include ("menu_empl.php");
		$vConn = fConnect();?>
			<div class="container">
				<br>
				<form class="form-horizontal" method="post" action="ajouter_facture.php">
				<fieldset>
					<div class="form-group">
					  <label class="col-md-4 control-label" for="proprietaire">Type de facture</label>  
					  <div class="col-md-4">
						<select class="form-control" name="type" onChange="this.form.submit()">
							<option value="0">
							<option value="prestation">Prestation</option>
							<option value="produit">Produit</option>
						</select>
					  </div>
					</div>
				</fieldset>
				</form>
				
				<?php 
				if(isset($_POST['type'])){
					$type = $_POST['type'];
				}
				
				if(!empty($type) && $type == 'prestation'){
					?>
					<form class="form-horizontal" method="post" action="recap_facture.php">
					<fieldset>

					<!-- Form Name -->
					<legend>Création d'une nouvelle facture</legend>

					<!-- Recherche animal -->
					
					<?php 
						$vSql = "SELECT nomanimal, nomrace FROM animal";
						$vQuery = pg_query($vConn, $vSql); ?>
						<div class="form-group">
						  <label class="col-md-4 control-label" for="animal">Animal</label>  
						  <div class="col-md-4">
							<select class="form-control" name="animal">
								<option value="0">
								<?php
									while( $vResult = pg_fetch_array($vQuery) )
									{?>
										<option value="<?php echo $vResult['nomanimal']; ?>"><?php echo $vResult['nomanimal']; echo " | "; echo $vResult['nomrace']; ?></option>
									<?php }
								?>
							</select>
						  </div>
						</div>

					<!-- A faire : Différents type de prestation -->
					<?php 
						$vSql = "SELECT nomprestation FROM prestation";
						$vQuery = pg_query($vConn, $vSql); ?>
						<div class="form-group">
						  <label class="col-md-4 control-label" for="animal">Prestation</label>  
						  <div class="col-md-4">
							<select class="form-control" name="prestation">
								<option value="0">
								<?php
									while( $vResult = pg_fetch_array($vQuery) )
									{?>
										<option value="<?php echo $vResult['nomprestation']; ?>"><?php echo $vResult['nomprestation'];?></option>
									<?php }
								?>
							</select>
						  </div>
						</div>
					
					<div class="form-group">
						  <label class="col-md-4 control-label" for="animal">Moyen de paiement</label>  
						  <div class="col-md-4">
							<select class="form-control" name="paiement">
								<option value="0">
								<option value="cheque">Cheque</option>
								<option value="cb">Carte Bleue</option>
								<option value="liquide">Liquide</option>
							</select>
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
						<input type="submit" value="Ajout Facture" class="btn btn-primary">
					  </div>
					</div>
					
					</fieldset>
					</form>
			<?php }
			elseif (!empty($type) && $type == 'produit'){?>		
			
			<form class="form-horizontal" method="post" action="recap_facture.php">
				<fieldset>

				<!-- Form Name -->
				<legend>Création d'une nouvelle facture</legend>

				<!-- Recherche proprio -->
				<?php 
					$vSql = "SELECT idproprietaire, nomproprietaire, prenomproprietaire FROM proprietaire";
					$vQuery = pg_query($vConn, $vSql); ?>
				<div class="form-group">
				  <label class="col-md-4 control-label" for="client">Client</label>  
				  <div class="col-md-4">
					<select class="form-control" name="client">
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
				
				<?php 
					$vSql = "SELECT nomproduit FROM produit";
					$vQuery = pg_query($vConn, $vSql); ?>
					<div class="form-group">
					  <label class="col-md-4 control-label" for="animal">Produit</label>  
					  <div class="col-md-4">
						<select class="form-control" name="produit">
							<option value="0">
							<?php
								while( $vResult = pg_fetch_array($vQuery) )
								{?>
									<option value="<?php echo $vResult['nomproduit']; ?>"><?php echo $vResult['nomproduit'];?></option>
								<?php }
							?>
						</select>
					  </div>
					</div>
			
				<div class="form-group">
					  <label class="col-md-4 control-label" for="animal">Moyen de paiement</label>  
					  <div class="col-md-4">
						<select class="form-control" name="paiement">
							<option value="0">
							<option value="cheque">Cheque</option>
							<option value="cb">Carte Bleue</option>
							<option value="liquide">Liquide</option>
						</select>
					  </div>
				</div>
				
				<!-- Date de naissance -->
				  <input id="date" name="date" type="hidden" placeholder="" class="form-control input-md">
				
				<!-- Button -->
				<div class="form-group">
				  <label class="col-md-4 control-label" for=""></label>
				  <div class="col-md-4">
					<input type="submit" value="Ajout Facture" class="btn btn-primary">
				  </div>
				</div>
				
				</fieldset>
			</form>

			<?php } ?>
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
