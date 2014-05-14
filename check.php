<!DOCTYPE html>
<html lang="en">
	<?php include ("head.php"); ?>
 
<body>
	<?php 
		include "connect.php";
		include "menu_ext.php";
		// Hachage du mot de passe, à faire ensuite
		$vPassword = $_POST['password'];
		$vLogin = $_POST['login'];

		// Vérification des identifiants
		$vConn = fConnect();
		$vSql = "SELECT idemploye FROM employe WHERE loginemploye = '$vLogin' AND passemploye = '$vPassword';";
		
		$vQuery=pg_query($vConn, $vSql);
		$vResult = pg_fetch_array($vQuery);


		if (!$vResult) //Si login/mdp faux on le redirige vers la page de connexion
		{
			$vSql = "SELECT idveterinaire FROM veterinaire WHERE loginveterinaire = '$vLogin' AND passveterinaire = '$vPassword';";
			$vQuery=pg_query($vConn, $vSql);
			$vResult = pg_fetch_array($vQuery);
			if (!$vResult){?>
				<div class="container">
					<br>
					<div class="alert alert-danger">
						<strong>Erreur !</strong> Mauvais login ou mot de passe ! Veuillez réessayer.
					</div>
					<footer class="row">
						<div class="col-lg-12">
						  Projet NF17 - UTC
						</div>
					</footer>
				</div><?php
				header("Refresh: 3; url=index.php");
			}
			else{
				session_start();
				$_SESSION['fonction'] = 'veterinaire'; //On récupère employé ou vétérinaire pour savoir à quel type de service ils ont accès
				$_SESSION['login'] = $vLogin;?>
				<div class="container">
					<br>
					<div class="alert alert-success">
						<strong>Success !</strong> Connexion réussie, redirection en cours.
					</div>
					<footer class="row">
						<div class="col-lg-12">
						  Projet NF17 - UTC
						</div>
					</footer>
				</div><?php
				header("Refresh: 2; url=index.php");
			}
		}
		else //Si login/mdp ok on lance une session pour qu'ils aient accès aux modules
		{
			session_start();
			$_SESSION['fonction'] = 'employe'; //On récupère employé ou vétérinaire pour savoir à quel type de service ils ont accès
			$_SESSION['login'] = $vLogin;?>
			<div class="container">
				<br>
				<div class="alert alert-success">
					<strong>Success !</strong> Connexion réussie, redirection en cours.
				</div>
				<footer class="row">
					<div class="col-lg-12">
					  Projet NF17 - UTC
					</div>
				</footer>
			</div><?php
			header("Refresh: 2; url=index.php");
		}
	?>
	
</body>
