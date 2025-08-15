<?php
require('BaseDeDonnees.php');

session_start();

include('dashboardEAction.php');

?>

<!doctype html>
<html lang="en">
<head>

<!-- Basic Page Needs
================================================== -->
<title>Ejob</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/blue.css">

</head>
<body class="gray">

<!-- Wrapper -->
<div id="wrapper">

<?php include('navbar.php') ?>

<!-- Dashboard Container -->
<div class="dashboard-container">

	<!-- Dashboard Sidebar
	================================================== -->
	<div class="dashboard-sidebar">
		<div class="dashboard-sidebar-inner" data-simplebar>
			<div class="dashboard-nav-container">

				<!-- Responsive Navigation Trigger -->
				<a href="#" class="dashboard-responsive-nav-trigger">
					<span class="hamburger hamburger--collapse" >
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</span>
					<span class="trigger-title"></span>
				</a>
				
				<!-- Navigation -->
				<div class="dashboard-nav">
					<div class="dashboard-nav-inner">

						<ul data-submenu-title="Start">
							<li class="active"><a href="#"><i class="icon-material-outline-dashboard"></i>Dashboard</a></li>
							<li><a href="messages.php"><i class="icon-material-outline-question-answer"></i> Messages</a></li>
							<li><a href="mesoffres.php"><i class="icon-material-outline-business-center"></i>Mes Offres</a></li>
                            <li><a href="poster.php"><i class="icon-material-outline-add"></i>Poster une Annonce</a></li>
							<li ><a href="rechercheProfil.php"><i class="icon-line-awesome-users"></i>Rechercher des Profils</a></li>
						</ul>


						<ul data-submenu-title="Mon Compte">
							<li><a href="parametreE.php"><i class="icon-material-outline-settings"></i>Paramètre</a></li>
							<li><a href="deconnexionAction.php"><i class="icon-material-outline-power-settings-new"></i>Déconnexion</a></li>
						</ul>
						
					</div>
				</div>
				<!-- Navigation / End -->

			</div>
		</div>
	</div>
	<!-- Dashboard Sidebar / End -->


	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>SALUT, <?php echo $_SESSION['nom_e'] ?></h3>
				<span>Nous Sommes Ravie de vous Revoir!</span>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Acceuil</a></li>
						<li>Dashboard</li>
					</ul>
				</nav>
			</div>
	
			<!-- Fun Facts Container -->
			<div class="fun-facts-container">
				<div class="fun-fact" data-fun-fact-color="#36bd78">
					<div class="fun-fact-text">
						<span>Total Candidature</span>
						<h4><?= $nombreC ?></h4>
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-gavel"></i></div>
				</div>
				<div class="fun-fact" data-fun-fact-color="#b81b7f">
					<div class="fun-fact-text">
						<span>Total Offre</span>
						<h4><?=$totalA['total'] ?></h4>
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-business-center"></i></div>
				</div>
				<div class="fun-fact" data-fun-fact-color="#efa80f">
					<div class="fun-fact-text">
						<span>Total Avis</span>
						<h4><?= $Ent['totalA'] ?></h4>
					</div>
					<div class="fun-fact-icon"><i class="icon-material-outline-rate-review"></i></div>
				</div>


				<!-- Last one has to be hidden below 1600px, sorry :( -->
				<div class="fun-fact" data-fun-fact-color="#2a41e6">
					<div class="fun-fact-text">
						<span>Moyenne des Notes</span>
						<h4><?= round($totM,2) ?></h4>
					</div>
					<div class="fun-fact-icon"><i class="icon-feather-trending-up"></i></div>
				</div>
			</div>
			
			<!-- Row -->
			<div class="row">

	
				<div class="col-xl-12">

					<!-- Dashboard Box -->
					<!-- If you want adjust height of two boxes 
						 add to the lower box 'main-box-in-row' 
						 and 'child-box-in-row' to the higher box -->
					<div class="dashboard-box child-box-in-row"> 
						<div class="headline">
							<h3><i class="icon-material-outline-note-add"></i> Mes Rappels</h3>
						</div>	

						<div class="content with-padding">

                     
                           <?php foreach($agendas as $agenda){ ?>

							<!-- Note -->
							<div class="dashboard-note">
								<p><?= $agenda['texte']?></p>
								<div class="note-footer">
									<span class="note-priority <?= $agenda['priorite']?>"><?= $agenda['priorite']?></span>
									<div class="note-buttons">
										<a href="supprimerAgenda.php?id_agenda=<?=$agenda['id_agenda'] ?>" title="Supprimer" data-tippy-placement="top"><i class="icon-feather-trash-2"></i></a>
									</div>
								</div>
							</div>
							
                           <?php } ?>

						</div>
							<div class="add-note-button">
								<a href="#small-dialog" class="popup-with-zoom-anim button full-width button-sliding-icon">Ajouter un Rappel <i class="icon-material-outline-arrow-right-alt"></i></a>
							</div>
					</div>
					<!-- Dashboard Box / End -->
				</div>
			</div>
			<!-- Row / End -->



<?php include('footer2.php') ?>

		</div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->

</div>
<!-- Wrapper / End -->

<?php include('popupAgenda.php');  ?>



<!-- Scripts
================================================== -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.0.min.js"></script>
<script src="js/mmenu.min.js"></script>
<script src="js/tippy.all.min.js"></script>
<script src="js/simplebar.min.js"></script>
<script src="js/bootstrap-slider.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/snackbar.js"></script>
<script src="js/clipboard.min.js"></script>
<script src="js/counterup.min.js"></script>
<script src="js/magnific-popup.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>