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
		include "connect.php";?>
		
		<div class="container">
			<div class="page-header">
				<h2>Rechercher un client</h2>
				<p>
					<?php 
					$vConn = fConnect();
					$vSql = "SELECT idproprietaire, nomproprietaire, prenomproprietaire FROM proprietaire";
					$vQuery = pg_query($vConn, $vSql); ?>

					<div class="row">
					<div class="col-md-4">
					<select class="form-control" name="client" onchange="document.location.href = 'gerer_client.php?idproprietaire='+this.options[this.selectedIndex].value;">
					<option value="0">
					<?php
						while( $vResult = pg_fetch_array($vQuery) )
						{
							if( !empty($_GET['idproprietaire']) && $_GET['idproprietaire'] == $vResult['idproprietaire'] ){ $selected = "selected='selected'"; } // Si l'id = celui traité on séléctionne l'option.
							else { $selected = ""; } // sinon on ne séléctione pas cette option.
							echo "<option value='".$vResult['idproprietaire']."' ".$selected.">".$vResult['prenomproprietaire']," ", $vResult['nomproprietaire']."</option>"; // on affiche l'option.
						}
					?>
					</select>
					</div>
					</div>
				</p>
			</div>
			<div class="row">
				<?php
					if(empty($_GET['idproprietaire']) ){}
					else// si l'id existe et est non null
					{
						$vSql = "SELECT * FROM proprietaire WHERE idproprietaire='".pg_escape_string($_GET['idproprietaire'])."'";
						$vQuery = pg_query($vConn, $vSql); // Recherche des donné liées à l'id.
						$vResult = pg_fetch_array($vQuery); // récupération des infos.?>
						<div class="col-sm-4">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h3 class="panel-title">Informations sur le client</h3>
								</div>
								<div class="panel-body">
									<strong>Nom</strong> : <?php echo $vResult['nomproprietaire'];?><br>
									<strong>Prenom :</strong> <?php echo $vResult['prenomproprietaire'];?><br>
									<strong>Téléphone :</strong> <?php echo $vResult['telephoneproprietaire'];?><br>
									<strong>Adresse :</strong> <?php echo $vResult['adresseproprietaire'];?>
								</div>
							</div>
							<form class="form-horizontal" method="post" action="modif_client.php">
								<fieldset>
								<div class="form-group">
									<div class="col-md-4">       
										<input type="hidden" name="idproprietaire" value="<?php echo $vResult['idproprietaire'];?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-4 control-label" for=""></label>
									<div class="col-md-4">
										<input type="submit" id="idpropietaire" value="Modifier" class="btn btn-primary">
									</div>
								</div>
								</fieldset>
							</form>
						</div>
						
						<?php $vSql2 = "SELECT idproprietaire, nomanimal, nomrace FROM animal WHERE idproprietaire='".pg_escape_string($_GET['idproprietaire'])."'";
						$vQuery2 = pg_query($vConn, $vSql2); // Recherche des données liées à l'id.;?>
						
						<div class="col-sm-4">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h3 class="panel-title">Animaux du client</h3>
								</div>
								<div class="panel-body">
									<?php
									while($vResult2 = pg_fetch_array($vQuery2)){ ?>
										<form class="form-horizontal" method="get" action="gerer_animal.php">
											<input type="hidden" name="idproprietaire" value="<?php echo $vResult2['idproprietaire'];?>">
											<input type="hidden" name="nomanimal" value="<?php echo $vResult2['nomanimal'];?>">
											<input type="hidden" name="nomrace" value="<?php echo $vResult2['nomrace'];?>">
											<input class="btn btn-default btn-block" type="submit" value="<?php echo ($vResult2['nomanimal']) ?>">
										</form>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="col-sm-4">
							<div class="panel panel-primary">
								<div class="panel-heading">
									<h3 class="panel-title">Factures du client</h3>
								</div>
								<div class="panel-body">

								</div>
							</div>
						</div>
					<?php
					}
				?>
		</div>
			
			<!-- bas de page -->
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
