<?php
	session_start();
?>
	
<!DOCTYPE html>
<html lang="en">
	<?php include ("head.php"); ?>

  <body>
	<?php 
	if (empty($_SESSION['fonction']) OR empty($_SESSION['login'])):
		include ("menu_ext.php");?>

	<div class="container">
		<form class="form-horizontal" method="post" action="check.php"> <!--Création du formulaire de connexion -->
			<fieldset>
				<!-- Form Name -->
				<legend><br>Connexion</legend>
				<!-- Text input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="login">login</label>  
					<div class="col-md-4">
						<input id="login" name="login" type="text" placeholder="" class="form-control input-md" required="">
					</div>
				</div>
				<!-- Password input-->
				<div class="form-group">
					<label class="col-md-4 control-label" for="password">password</label>
					<div class="col-md-4">
						<input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">
					</div>
				</div>
				<!-- Button -->
				<div class="form-group">
					<label class="col-md-4 control-label" for=""></label>
					<div class="col-md-4">
						<input type="submit" value="connexion" class="btn btn-primary">
					</div>
				</div>
			</fieldset>
		</form>
		
	<?php
	elseif ($_SESSION['fonction'] == 'employe'):
		include ("menu_empl.php");?>
		
	<br>
	<div class="container">
		<div class="jumbotron">
			<h1>Bienvenue !</h1>
			<p>Vous êtes connectés en tant que <?php $login = $_SESSION['login']; echo"$login";  ?>. Bonne journée.</p>
		</div>
	<?php elseif ($_SESSION['fonction'] == 'veterinaire'):
		include ("menu_veto.php");?>
		
	<br>
	<div class="container">
		<div class="jumbotron">
			<h1>Bienvenue !</h1>
			<p>Vous êtes connectés en tant que <?php $login = $_SESSION['login']; echo"$login";  ?>. Bonne journée.</p>
		</div>
	<?php endif; ?>
	  
	  <hr>
	  <footer class="row">
		<div class="col-lg-12">
		  Projet NF17 - UTC
		</div>
	  </footer>
	</div><!-- /.container -->
  </body>
</html>
