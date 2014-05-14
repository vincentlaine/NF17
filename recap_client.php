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
		include "connect.php";
		
		$vNom = $_POST['nom'];
		$vPrenom = $_POST['prenom'];
		$vTelephone = $_POST['telephone'];
		$vAdresse = $_POST['adresse'];
		
		$vConn = fConnect();
		$vSql1 = "INSERT INTO proprietaire (nomproprietaire, prenomproprietaire, telephoneproprietaire, adresseproprietaire)
			VALUES('$vNom', '$vPrenom', $vTelephone, '$vAdresse')";
		$vQuery1=pg_query($vConn, $vSql1);
		
		$vSql2 = "SELECT * FROM proprietaire WHERE nomproprietaire = '$vNom' AND prenomproprietaire = '$vPrenom' AND telephoneproprietaire = '$vTelephone';";
		$vQuery2=pg_query($vConn, $vSql2);
		$vResult2 = pg_fetch_array($vQuery2);
		
		if(!$vResult2):?>
			<div class="container">
				<br>
				<div class="alert alert-danger">
					<strong>Echec !</strong> Le rajout du client à la base de donnée à échoué.
				</div>
				<footer class="row">
					<div class="col-lg-12">
					  Projet NF17 - UTC
					</div>
				</footer>
			</div><?php
		else:?>
			<div class="container">
				<br>
				<div class="alert alert-success">
					<strong>Success !</strong> Ajout du client réussi.
				</div>
				<div class="jumbotron">
					<?php echo"<h2>$vResult2[prenomproprietaire] $vResult2[nomproprietaire]</h2>";
					echo"<p>Téléphone : $vResult2[telephoneproprietaire]<br>";
					echo"Adresse : $vResult2[adresseproprietaire]</p>";?>
				</div>
				
				<hr>
				<footer class="row">
					<div class="col-lg-12">
					  Projet NF17 - UTC
					</div>
				</footer>
			</div>
		
	<?php endif; endif; 
	pg_close($vConn);?>
  </body>	
</html>
