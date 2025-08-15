<?php
require('BaseDeDonnees.php');

session_start();

include('afficheCompetences.php');
include('afficheCategories.php');
include('afficheMesPreferences.php');
?>

<!doctype html>
<html lang="en">
<head>

<!-- Basic Page Needs
================================================== -->
<title>E-job</title>
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
					<span class="trigger-title">Dashboard Navigation</span>
				</a>
				
				<!-- Navigation -->
				<div class="dashboard-nav">
					<div class="dashboard-nav-inner">

						<ul data-submenu-title="Start">
							<li><a href="dashboardU.php"><i class="icon-material-outline-dashboard"></i>Dashboard</a></li>
							<li><a href="messages.php"><i class="icon-material-outline-question-answer"></i> Messages</a></li>
							<li><a href="mescandidatures.php"><i class="icon-material-outline-business-center"></i>Mes Candidatures</a></li>
						</ul>
						<!-- <i class="icon-material-outline-business-center"></i> -->
						<ul data-submenu-title="Mon Profil">
                            <?php if($_SESSION['verifie']=="NON"){ ?>
							<li><a href="CompleterProfil.php"><i class="icon-material-outline-assignment"></i>Completer Mon Profil</a></li>
                            <?php } else{ ?>
                            <li><a href="CompleterProfil.php"><i class="icon-material-outline-assignment"></i>Modifier Mon Profil</a></li>
                            <?php } ?>
                            <li class="active"><a href="#"><i class="icon-material-outline-language"></i>Mes domaines</a></li>
                            <li><a href="mesexperiences.php"><i class="icon-material-outline-school"></i>Mes Formations</a></li>
                            <li><a href="mesexperiences.php"><i class="icon-material-outline-reorder"></i>Mes Expériences</a></li>
                            <li><a href="generercv.php"><i class="icon-material-outline-speaker-notes"></i>Générer CV</a></li>

						</ul>

						<ul data-submenu-title="EJob">
							<li><a href="#small-dialog" class="popup-with-zoom-anim"><i class="icon-line-awesome-commenting-o"></i>Ajouter un Avis sur EJob</a></li>
						</ul>

						<ul data-submenu-title="Mon Compte">
							<li><a href="parametreU.php"><i class="icon-material-outline-settings"></i>Paramètre</a></li>
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
				<h3>Mes Domaines</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="dashboardU.php">Dashboard</a></li>
						<li>Mes Domaines</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">

				<!-- Dashboard Box -->
				<div class="col-xl-12" >
					<div class="dashboard-box" >

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-feather-star"></i>Mes Compétences </h3>
						</div>

						<div class="content col-xl-10" style="margin:auto;">
							<ul class="dashboard-box-list">
                                <li>

				 <div class="sidebar-widget">
					<div class="task-tags">
                        <?php foreach($competences as $competence){ ?>
						<a href="supprimerCompetence.php?id_competence=<?=$competence['id_competence'] ?>" title="Supprimer"><span><?=$competence['nom_competence'] ?></span></a>
                        <?php } ?>

					</div>
				</div>
                </li>
                            </ul>
						</div>

                        <div class="content col-xl-10">
							<ul class="dashboard-box-list">
                            <li>
                            <div class="keyword-input-container">
                            <form action="ajoutCompetence.php" method="post">
							<input type="text" name="competence" class="keyword-input with-border" placeholder="exemple: PHP"/>
							<button type="submit" class="keyword-input-button ripple-effect"><i class="icon-material-outline-add"></i></button>
                            </form>
							</div>

                            </li></ul>
						</div>
                        


                        
					</div>
				</div>
                

                								<!-- Dashboard Box -->
				<div class="col-xl-12" >
					<div class="dashboard-box" >

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-line-awesome-heart"></i>Mes Préférences </h3>
						</div>

						<div class="content col-xl-10" style="margin:auto;">
							<ul class="dashboard-box-list">
                                <li>

				 <div class="sidebar-widget">
					<div class="task-tags">
                        <?php foreach($prefs as $pref){ ?>
						<a href="supprimerPreference.php?id_categorie=<?=$pref['id_categorie'] ?>" title="Supprimer"><span><?=$pref['nom_categorie'] ?></span></a>
                        <?php } ?>

					</div>
				</div>
                </li>
                            </ul>
						</div>

                        <div class="content col-xl-10">
							<ul class="dashboard-box-list">
                            <li>
                            <div class="keyword-input-container">
                            <form action="ajoutPreference.php" method="post" id="preference">
							<select name="preference">
                                <option value="">Choisissez vos domaines de préférences</option>
                                <?php foreach($categories as $categorie){ ?>
                                <option value="<?=$categorie['id_categorie'] ?>"><?=$categorie['nom_categorie'] ?></option>
                                <?php } ?>
                            </select>
                            </form>
                            <div class="keyword-input-container">
							<input type="text" name="competence" class="keyword-input with-border" disabled/>
							<button type="submit" class="keyword-input-button ripple-effect" form="preference"><i class="icon-material-outline-add"></i></button>
							</div>

                            </li>
                        </ul>
						</div>
                        


                        
					</div>
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

<?php include('PopUpAvisEjob.php');  ?>





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



<script src="formations.js"></script>

</body>
</html>