<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
	<div class="navbar-header">
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	  </button>
	  <a class="navbar-brand" href="index.php">Clinique vétérinaire</a>
	</div>
	<div class="collapse navbar-collapse">
	  <ul class="nav navbar-nav">
		<li class="dropdown"> 
			<a data-toggle="dropdown" href="#">Clients<b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a href="ajouter_client.php">Ajouter un client</a></li>
				<li><a href="gerer_client.php">Gérer un client</a></li>
			</ul>
		</li>

		<li class="dropdown"> 
			<a data-toggle="dropdown" href="#">Animaux<b class="caret"></b></a>
			<ul class="dropdown-menu">
			  <li><a href="ajouter_animal.php">Ajouter un animal</a></li>
			  <li><a href="gerer_animal.php">Gérer un animal</a></li>
					<!-- <ul class="dropdown-menu">
						<li class="dropdown-submenu">
							<a href="#">Gérer ses ordonnances</a>
							<ul class="dropdown-menu">
								<li><a href="#"> Créer une ordonnance</a></li>
								<li><a href="#"> Historique des ordonnances</a></li>
							</ul>
						</li>
						<li class="dropdown-submenu">
							<a href="#">Gérer ses factures</a>
							<ul class="dropdown-menu">
								<li><a href="#"> Créer une facture</a></li>
								<li><a href="#"> Historique des factures</a></li>
							</ul>
						</li>
					</ul> -->
			</ul>
		</li>

		<li class="dropdown"> 
			<a data-toggle="dropdown" href="#">Factures<b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a href="ajouter_facture.php">Créer une facture</a></li>
				<li><a href="#">Modifier une facture</a></li>
				<li><a href="#">Imprimer une facture</a></li>
				<li><a href="#">Historique des factures</a></li>
				<li><a href="#">Statistiques</a></li>
			</ul>
		</li>

		<li class="dropdown"> 
			<a data-toggle="dropdown" href="#">Rendez-vous<b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a href="#">Créer un rendez-vous</a></li>
				<li><a href="#">Gérer un rendez-vous</a></li>
				<li><a href="#">Historique des rendez-vous</a></li>
			</ul>
		</li>

		<li class="dropdown"> 
			<a data-toggle="dropdown" href="#">Ressources<b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a href="#">Gérer les produits</a></li>
				<li><a href="#">Gérer les médicaments</a></li>
				<li><a href="#">Gérer les prestations</a></li>
			</ul>
		</li>
	  </ul>
	  <form class="navbar-form navbar-right" action="deco.php">
		<button class="btn btn-danger">Déconnexion</button>
	  </form>
	</div><!--/.nav-collapse -->
  </div>
</div>
