<?php
require('BaseDeDonnees.php');

session_start();

include('affichePostJob.php');

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
							<li><a href="dashboardE.php"><i class="icon-material-outline-dashboard"></i>Dashboard</a></li>
							<li><a href="messages.php"><i class="icon-material-outline-question-answer"></i> Messages</a></li>
							<li><a href="mesoffres.php"><i class="icon-material-outline-business-center"></i>Mes Offres</a></li>
                            <li class="active"><a href="#"><i class="icon-material-outline-add"></i>Poster une Annonce</a></li>
						</ul>

                        <ul data-submenu-title="EJob">
						<li ><a href="rechercheProfil.php"><i class="icon-line-awesome-users"></i>Rechercher des Profils</a></li>
							<li><a href="#small-dialog" class="popup-with-zoom-anim"><i class="icon-line-awesome-commenting-o"></i>Ajouter un Avis sur EJob</a></li>
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
				<h3>Poster une Annonce</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="dashboardE.php">Dashboard</a></li>
						<li>Poster une Annonce</li>
					</ul>
				</nav>
			</div>
	
			<!-- Row -->
			<div class="row">


				<!-- Dashboard Box -->
				<div class="col-xl-12">
					<div class="dashboard-box margin-top-0">

						<!-- Headline -->
						<div class="headline">
							<h3><i class="icon-feather-folder-plus"></i> Job</h3>
						</div>

						<?php if(!isset($_GET['id_annonce'])){ ?>

                        <form method="post" action="AjouterJob.php" id="posterJob">

						<div class="content with-padding padding-bottom-10">
							<div class="row">

                            

								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Titre</h5>
										<input type="text" class="with-border" name="titre" required>
									</div>
								</div>

								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Type</h5>
										<select class="selectpicker with-border" data-size="7" title="Type" name="type" required>
											<option value="Pleins Temps">Pleins Temps</option>
                                            <option value="Temps Partiel">Temps Partiel</option>
                                            <option value="Temporaire">Temporaire</option>
                                            <option value="Stage">Stage</option>
                                            <option value="Autres">Autres</option>
										</select>
									</div>
								</div>

								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Catégorie</h5>
										<select class="selectpicker with-border" data-size="7" title="Catégorie" name="categorie" required>
                                            <?php foreach($categories as $categorie){ ?>
											<option value="<?=$categorie['id_categorie'] ?>"><?=$categorie['nom_categorie'] ?></option>
                                            <?php } ?>
										</select>
									</div>
								</div>

								<div class="col-xl-4">
									<div class="submit-field">
										<h5>Salaire</h5>
												<div class="input-with-icon">
													<input class="with-border" type="number" name="salaire" min="0.0" placeholder="Salaire" required>
													<i class="currency">MAD</i>
												</div>
									</div>
								</div>

                                <div class="col-xl-4">
									<div class="submit-field">
										<h5>Localisation</h5>
										<select class="selectpicker with-border" data-size="7" title="Localisation" name="localisation" required>
                                        <?php foreach($localisations as $localisation){ ?>
											<option value="<?=$localisation['id_localisation'] ?>"><?=$localisation['nom_localisation'] ?></option>
                                            <?php } ?>
										</select>
									</div>
								</div>

                                <div class="col-xl-4">
									<div class="submit-field">
										<h5>Date de Fin </h5>
                                        <input type="date" name="date_fin" min="<?=date('Y-m-d')?>" required>
									</div>
								</div>

								<div class="col-xl-12">
									<div class="submit-field">
										<h5>Description</h5>
										<textarea cols="30" rows="5" class="with-border" name="description" required></textarea>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

                </form>

				<div class="col-xl-12">
                <button class="button ripple-effect big margin-top-30" type="submit" form="posterJob"><i class="icon-feather-plus"></i>Poster</button>
				</div>

				<?php } else { ?>


					<form method="post" action="ModifierJob.php" id="modifJob">

<div class="content with-padding padding-bottom-10">
	<div class="row">

	

		<div class="col-xl-4">
			<div class="submit-field">
				<h5>Titre</h5>
				<input type="text" class="with-border" name="titre" required value="<?=$info['titre'] ?>">
			</div>
		</div>

		<div class="col-xl-4">
			<div class="submit-field">
				<h5>Type</h5>
				<select class="selectpicker with-border" data-size="7" title="Type" name="type" required>
					<option value="<?=$info['type'] ?>" selected><?=$info['type'] ?></option>
					<option value="Pleins Temps">Pleins Temps</option>
					<option value="Temps Partiel">Temps Partiel</option>
					<option value="Temporaire">Temporaire</option>
					<option value="Stage">Stage</option>
					<option value="Autres">Autres</option>
				</select>
			</div>
		</div>

		<div class="col-xl-4">
			<div class="submit-field">
				<h5>Catégorie</h5>
				<select class="selectpicker with-border" data-size="7" title="Catégorie" name="categorie" required>
					<option value="<?= $info['id_categorie'] ?>" selected></option>
					<?php foreach($categories as $categorie){ ?>
					<option value="<?=$categorie['id_categorie'] ?>"><?=$categorie['nom_categorie'] ?></option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class="col-xl-4">
			<div class="submit-field">
				<h5>Salaire</h5>
						<div class="input-with-icon">
							<input class="with-border" type="number" name="salaire" min="0.0" placeholder="Salaire" required value="<?=$info['salaire'] ?>">
							<i class="currency">MAD</i>
						</div>
			</div>
		</div>

		<div class="col-xl-4">
			<div class="submit-field">
				<h5>Localisation</h5>
				<select class="selectpicker with-border" data-size="7" title="Localisation" name="localisation" required>
					<option value="<?= $info['id_localisation'] ?>" selected></option>
				<?php foreach($localisations as $localisation){ ?>
					<option value="<?=$localisation['id_localisation'] ?>"><?=$localisation['nom_localisation'] ?></option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class="col-xl-4">
			<div class="submit-field">
				<h5>Date de Fin </h5>
				<input type="date" name="date_fin" min="<?=date('Y-m-d')?>" required value="<?=$info['date_fin'] ?>">
			</div>
		</div>

		<input type="hidden" name="id_annonce" value="<?= $_GET['id_annonce'] ?>">

		<div class="col-xl-12">
			<div class="submit-field">
				<h5>Description</h5>
				<textarea cols="30" rows="5" class="with-border" name="description" required><?=$info['description'] ?></textarea>
			</div>
		</div>

	</div>
</div>
</div>
</div>

</form>

<div class="col-xl-12">
<button class="button ripple-effect big margin-top-30" type="submit" form="modifJob">Modifier</button>
</div>


					<?php } ?>

				
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

<!-- Snackbar // documentation: https://www.polonel.com/snackbar/ -->
<script>
// Snackbar for user status switcher
$('#snackbar-user-status label').click(function() { 
	Snackbar.show({
		text: 'Your status has been changed!',
		pos: 'bottom-center',
		showAction: false,
		actionText: "Dismiss",
		duration: 3000,
		textColor: '#fff',
		backgroundColor: '#383838'
	}); 
}); 
</script>


<script>

$(".error").hide();
$(".success").hide();
$("#msg_pass").hide();
</script>

<script src="parametreE.js"></script>


<!-- Google API -->
<script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places&callback=initAutocomplete"></script>


</body>
</html>