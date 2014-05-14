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
		
		$vProprietaire = $_POST['idproprietaire'];
		$vNom = $_POST['nom'];
		$vRace = $_POST['race'];
		$vSexe = $_POST['sexe'];
		$vPoids = $_POST['poids'];
		$vCode = $_POST['code'];
		$vTaille = $_POST['taille'];
		$vDate = $_POST['date'];
		
		$vConn = fConnect();
		$vSql1 = "INSERT INTO animal (idproprietaire, nomanimal, nomrace, poidsanimal, genreanimal, codeidentificationanimal, datenaissanceanimal, tailleanimal)
			VALUES('$vProprietaire', '$vNom', '$vRace', '$vPoids', '$vSexe', '$vCode', '$vDate', '$vTaille')";
		$vQuery1=pg_query($vConn, $vSql1);
		
		$vSql2 = "SELECT * FROM animal WHERE idproprietaire = '$vProprietaire' AND nomanimal = '$vNom' AND nomrace = '$vRace';";
		$vQuery2=pg_query($vConn, $vSql2);
		$vResult2 = pg_fetch_array($vQuery2);
		
		$vSql3 = "SELECT * FROM proprietaire WHERE idproprietaire = '$vProprietaire'";
		$vQuery3=pg_query($vConn, $vSql3);
		$vResult3 = pg_fetch_array($vQuery3);
		
		if(!$vResult2):?>
			<div class="container">
				<br>
				<div class="alert alert-danger">
					<strong>Echec !</strong> Le rajout de l'animal à la base de donnée à échoué.
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
					<strong>Success !</strong> Ajout de l'animal réussi.
				</div>
				<div class="jumbotron">
					<?php 
					echo"<h2>Nom : $vResult2[nomanimal]</h2>";
					echo"<h2>Propriétaire : $vResult3[prenomproprietaire] $vResult3[nomproprietaire]</h2>";
					echo"<p>Race : $vResult2[nomrace]<br>";
					echo"Sexe : $vResult2[genreanimal]<br>";
					echo"Poids : $vResult2[poidsanimal]<br>";
					echo"Code : $vResult2[codeidentificationanimal]<br>";
					echo"Taille : $vResult2[tailleanimal]<br>";
					echo"Date de naissance : $vResult2[datenaissanceanimal]</p>";?>
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
