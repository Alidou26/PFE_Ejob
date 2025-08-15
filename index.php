<?php 
session_start();
require("BaseDeDonnees.php");

include('affichageIndex.php');

include('notifications.php'); 

?>

<!doctype html>
<html lang="en">
<head>

<!-- Basic Page Needs
================================================== -->
<title>EJOB</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/blue.css">
</head>
<body>

<!-- Wrapper -->
<div id="wrapper">

<!-- Header Container
================================================== -->
<header id="header-container" class="fullwidth">

	<!-- Header -->
	<div id="header">
		<div class="container">
			
			<!-- Left Side Content -->
			<div class="left-side">
				
				<!-- Logo -->
				<div id="logo">
					<a href="index.php"><img src="logo.png" alt="" style="height:100%;width:100%;"></a>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation">
					<ul id="responsive">

						<li><a href="#" class="current">Home</a></li>

						<li><a href="#NouvellesOffres">Nouvelles offres</a></li>

						<li><a href="#AvisSurEjob">Avis sur Ejob</a></li>

						<?php if(isset($_SESSION['utilisateur_connecte'])){ ?>

						<li><a href="ejobBook.php">EjobBook</a></li>

						<?php } ?>

						<li><a href="#Stats">Stats</a></li>

						<li><a href="contact/contact.php">Nous Contacter</a></li>

					</ul>
				</nav>
				<div class="clearfix"></div>
				<!-- Main Navigation / End -->
				
			</div>
			<!-- Left Side Content / End -->

<?php if(isset($_SESSION['utilisateur_connecte']) || isset($_SESSION['entreprise_connecte']) ){ ?>

			<!-- Right Side Content / End -->
			<div class="right-side">

				<!--  User Notifications -->
				<div class="header-widget hide-on-mobile">
					
					<!-- Notifications -->
					<div class="header-notifications">

						<!-- Trigger -->
						<div class="header-notifications-trigger">
							<a href="#"><i class="icon-feather-bell"></i><span><?=$totalN['total'] ?></span></a>
						</div>

						<!-- Dropdown -->
						<div class="header-notifications-dropdown">

							<div class="header-notifications-headline">
								<h4>Notifications</h4>
							</div>

							<div class="header-notifications-content">
								<div class="header-notifications-scroll" data-simplebar>
									<ul>
									<?php foreach ($notifications as $notif) { ?>
										<!-- Notification -->
										<li class="notifications-not-read">
											<?= $notif['notif'] ?>
										</li>
										<?php } ?>
									</ul>
								</div>
							</div>

						</div>

					</div>
					
				

				</div>
				<!--  User Notifications / End -->

				<?php if(isset($_SESSION['utilisateur_connecte'])){ ?>

				<!-- User Menu -->
				<div class="header-widget">

					<!-- Messages -->
					<div class="header-notifications user-menu">
						<div class="header-notifications-trigger">
							<a href="#"><div class="user-avatar status-online"><img src="<?=$_SESSION['photo'] ?>" alt="" style="width:6rem;height:3rem;"></div></a>
						</div>

						<!-- Dropdown -->
						<div class="header-notifications-dropdown">

							<!-- User Status -->
							<div class="user-status">

								<!-- User Name / Avatar -->
								<div class="user-details">
									<div class="user-avatar status-online"><img src="<?=$_SESSION['photo'] ?>" alt="" style="width:6rem;height:3rem;"></div>
									<div class="user-name">
										<?=$_SESSION['nom'].' '.$_SESSION['prenom'] ?>  <span>Utilisateur</span>
									</div>
								</div>
								
								<!-- User Status Switcher -->
								<div class="status-switch" id="snackbar-user-status">
								<label class="user-online current-status">En ligne</label>
								<a href="deconnexionAction.php"><label class="user-invisible">Déconnexion</label></a>
									<!-- Status Indicator -->
									<span class="status-indicator" aria-hidden="true"></span>
								</div>	
						</div>
						
						<ul class="user-menu-small-nav">
							<li><a href="dashboardU.php"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
							<li><a href="parametreU.php"><i class="icon-material-outline-settings"></i> Paramètre</a></li>
							<li><a href="deconnexionAction.php"><i class="icon-material-outline-power-settings-new"></i> Déconnexion</a></li>
						</ul>

						</div>
					</div>

				</div>
				<!-- User Menu / End -->

				<?php }else{ ?>

				<!-- User Menu -->
				<div class="header-widget">

					<!-- Messages -->
					<div class="header-notifications user-menu">
						<div class="header-notifications-trigger">
							<a href="#"><div class="user-avatar status-online"><img src="<?=$_SESSION['photo_e'] ?>" alt=""></div></a>
						</div>

						<!-- Dropdown -->
						<div class="header-notifications-dropdown">

							<!-- User Status -->
							<div class="user-status">

								<!-- User Name / Avatar -->
								<div class="user-details">
									<div class="user-avatar status-online"><img src="<?=$_SESSION['photo_e'] ?>" alt=""></div>
									<div class="user-name">
										<?=$_SESSION['nom_e'].'-'.$_SESSION['sigle_e'] ?>  <span>Recruteur</span>
									</div>
								</div>
								
								<!-- User Status Switcher -->
								<div class="status-switch" id="snackbar-user-status">
								<label class="user-online current-status">En ligne</label>
								<a href="deconnexionAction.php"><label class="user-invisible">Déconnexion</label></a>
									<!-- Status Indicator -->
									<span class="status-indicator" aria-hidden="true"></span>
								</div>	
						</div>
						
						<ul class="user-menu-small-nav">
							<li><a href="dashboardE.php"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
							<li><a href="parametreE.php"><i class="icon-material-outline-settings"></i> Paramètre</a></li>
							<li><a href="deconnexionAction.php"><i class="icon-material-outline-power-settings-new"></i>Déconnexion</a></li>
						</ul>

						</div>
					</div>

				</div>
				<!-- User Menu / End -->

				<?php } ?>

				<!-- Mobile Navigation Button -->
				<span class="mmenu-trigger">
					<button class="hamburger hamburger--collapse" type="button">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</span>

			</div>
			<!-- Right Side Content / End -->

            <?php } else{  ?>


                			<!-- Right Side Content / End -->
			<div class="right-side">

<div class="header-widget">
    <a href="#sign-in-dialog" class="popup-with-zoom-anim log-in-button"><i class="icon-feather-log-in"></i> <span>Connexion / Inscription</span></a>
</div>

<!-- Mobile Navigation Button -->
<span class="mmenu-trigger">
    <button class="hamburger hamburger--collapse" type="button">
        <span class="hamburger-box">
            <span class="hamburger-inner"></span>
        </span>
    </button>
</span>

</div>
<!-- Right Side Content / End -->

<?php } ?>

		</div>
	</div>
	<!-- Header / End -->

</header>
<div class="clearfix"></div>
<!-- Header Container / End -->



<!-- Intro Banner
================================================== -->
<!-- add class "disable-gradient" to enable consistent background overlay -->
<div class="intro-banner" data-background-image="chercher-un-emploi.jpg">
	<div class="container">
		
		<!-- Intro Headline -->
		<div class="row">
			<div class="col-md-12">
				<div class="banner-headline">
					<h3>
						<strong>Engagez des experts ou soyez embauché pour n'importe quel travail, à tout moment.</strong>
						<br>
						<span>Des milliers de petites entreprises utilisent<strong class="color"> EJob</strong> pour concrétiser leurs idées.</span>
					</h3>
				</div>
			</div>
		</div>
		
		<!-- Search Bar -->
		<div class="row" id="rechercheOffre">
			<div class="col-md-12">

				<form method="Get" action="recherche.php" id="recherche">

				<div class="intro-banner-search-form margin-top-95">

					<!-- Search Field -->
					<div class="intro-search-field">
					
					<label class="field-title ripple-effect"><i class="icon-material-outline-location-on"></i>Lieu ?</label>
					<select class="selectpicker default" name="lieu">
						    <option value="0" selected>Toutes les villes</option>
                            <?php foreach($localisations as $lieu){ ?>
							<option value="<?=$lieu['id_localisation'] ?>"><?=$lieu['nom_localisation'] ?></option>
							<?php } ?>
						</select>
					</div>

					<!-- Search Field -->
					<div class="intro-search-field">
						<label for ="intro-keywords" class="field-title ripple-effect">De Quoi Avez Vous Besoin ?</label>
						<input id="intro-keywords" type="text" placeholder="exemple: data science" name="mot">
					</div>

					<!-- Search Field -->
					<div class="intro-search-field">
					<select class="selectpicker default" name="categorie">
						    <option value="0" selected>Toutes les catégories</option>
							<?php foreach($categories as $categorie){ ?>
							<option value="<?=$categorie['id_categorie'] ?>"><?=$categorie['nom_categorie'] ?></option>
							<?php } ?>
						</select>
					</div>
					</form>

					<!-- Button -->
					<div class="intro-search-button">
						<button type="submit" class="button ripple-effect" form="recherche">Rechercher</button>	
					</div>
					
				</div>
			</div>
		</div>
		<!-- Stats -->
		<div class="row">
			<div class="col-md-12">
				<ul class="intro-stats margin-top-45 hide-under-992px">
					<li>
						<strong class="counter"><?= $totalA['total'] ?></strong>
						<span>Nombre d'Offres</span>
					</li>
					<li>
						<strong class="counter"><?= $totalE['total'] ?></strong>
						<span>Nombre de Recruteurs</span>
					</li>
					<li>
						<strong class="counter"><?= $totalU['total'] ?></strong>
						<span>Nombre d'utilisateurs</span>
					</li>
				</ul>
			</div>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<!-- Popular Job Categories -->
<div class="section margin-top-65 margin-bottom-30" id="categories">
	<div class="container">
		<div class="row">

			<!-- Section Headline -->
			<div class="col-xl-12">
				<div class="section-headline centered margin-top-0 margin-bottom-45">
					<h3>Les Catégories Populaires</h3>
				</div>
			</div>

			
				<?php if($Cpopulaires != null){
					foreach($Cpopulaires as $Cpopulaire){ ?>

              <div class="col-xl-3 col-md-6"> 
             <!-- Photo Box -->
				<a href="categories.php?id_categorie=<?=$Cpopulaire['id_categorie'] ?>" class="photo-box small" data-background-image="<?=$Cpopulaire['photo_categorie'] ?>">
					<div class="photo-box-content">
						<h3><?=$Cpopulaire['nom_categorie'] ?></h3>
						<span><?=$Cpopulaire['total'] ?></span>
					</div>
				</a>
					</div>

				<?php }
				} else {    
					foreach($CpopulairesD as $CpopulaireD){ ?>

					<div class="col-xl-3 col-md-6">

									<!-- Photo Box -->
				<a href="categories.php?id_categorie=<?=$CpopulaireD['id_categorie'] ?>" class="photo-box small" data-background-image="<?=$CpopulaireD['photo_categorie'] ?>">
					<div class="photo-box-content">
						<h3><?=$CpopulaireD['nom_categorie'] ?></h3>
						<span>0</span>
					</div>
				</a>
				</div>

				<?php }
			                  } ?>


			

		</div>
	</div>
</div>
<!-- Features Cities / End -->

<!-- Features Jobs -->
<div class="section gray margin-top-45 padding-top-65 padding-bottom-75" id="NouvellesOffres">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				
				<!-- Section Headline -->
				<div class="section-headline margin-top-0 margin-bottom-35">
					<h3>Nouvelles Offres</h3>
				</div>
				
				<!-- Jobs Container -->
				<div class="listings-container compact-list-layout margin-top-35">

				<?php if($Nannonces != null){
					foreach($Nannonces as $Nannonce){ ?>
					
					<!-- Job Listing -->
					<a href="annonces.php?id_annonce=<?=$Nannonce['id_annonce'] ?>" class="job-listing with-apply-button">

						<!-- Job Listing Details -->
						<div class="job-listing-details">

							<!-- Logo -->
							<div class="job-listing-company-logo">
								<img src="<?=$Nannonce['photo_e'] ?>" alt="">
							</div>

							<!-- Details -->
							<div class="job-listing-description">
								<h3 class="job-listing-title"><?=$Nannonce['titre'] ?></h3>

								<!-- Job Listing Footer -->
								<div class="job-listing-footer">
									<ul>
										<li><i class="icon-material-outline-business"></i><?=$Nannonce['sigle_e'] ?></li>
										<li><i class="icon-material-outline-location-on"></i><?=$Nannonce['nom_localisation'] ?></li>
										<li><i class="icon-material-outline-business-center"></i><?=$Nannonce['type'] ?></li>
										<li><i class="icon-material-outline-access-time"></i><?=$Nannonce['date_annonce'] ?></li>
									</ul>
								</div>
							</div>

							<!-- Apply Button -->
							<span class="list-apply-button ripple-effect">Voir Plus</span>
						</div>
					</a>	

					<?php } } ?>

				</div>
				<!-- Jobs Container / End -->

			</div>
		</div>
	</div>
</div>
<!-- Featured Jobs / End -->



<!-- Highest Rated Freelancers -->
<div class="section padding-top-65 padding-bottom-70 full-width-carousel-fix" id="mieux_note">
	<div class="container">
		<div class="row">

			<div class="col-xl-12">
				<!-- Section Headline -->
				<div class="section-headline margin-top-0 margin-bottom-25">
					<h3>Les Entreprises les mieux notés</h3>
				</div>
			</div>

			<div class="col-xl-12">
				<div class="default-slick-carousel freelancers-container freelancers-grid-layout">

				<?php if($Epopulaires != null){
					foreach($Epopulaires as $Epopulaire){ ?>

					<!--Freelancer -->
					<div class="freelancer">

						<!-- Overview -->
						<div class="freelancer-overview">
							<div class="freelancer-overview-inner">
								
								<!-- Avatar -->
								<div class="freelancer-avatar">
									<a href="profilE.php?id_entreprise=<?=$Epopulaire['id_entreprise'] ?>"><img src="<?=$Epopulaire['photo_e'] ?>" alt="" style="height:6.5rem;"></a>
								</div>

								<!-- Name -->
								<div class="freelancer-name">
									<h4><a href="profilE.php?id_entreprise=<?=$Epopulaire['id_entreprise'] ?>"><?=$Epopulaire['nom_e'] ?> <img class="flag" src="images/flags/<?=$Epopulaire['pays_e'] ?>.svg" alt="" title="<?=$Epopulaire['pays_e'] ?>" data-tippy-placement="top"></a></h4>
									<span><?=$Epopulaire['email_e'] ?></span>
								</div>

								<!-- Rating -->
								<div class="freelancer-rating">
									<div class="star-rating" data-rating="<?=$Epopulaire['total'] ?>"></div>
								</div>
							</div>
						</div>
						
						<!-- Details -->
						<div class="freelancer-details">
							<div class="freelancer-details-list">
								<ul>
									<li>Employés<strong><?=$Epopulaire['nombre_employe'] ?></strong></li>
									<li>Crée le <strong><?=$Epopulaire['date_de_creation'] ?></strong></li>
								</ul>
							</div>
							<a href="profilE.php?id_entreprise=<?=$Epopulaire['id_entreprise'] ?>" class="button button-sliding-icon ripple-effect">Voir Plus<i class="icon-material-outline-arrow-right-alt"></i></a>
						</div>
					</div>
					<!-- Freelancer / End -->

					<?php }
				}
					else{ 
						foreach($EpopulairesD as $EpopulaireD){
						?>

					<!--Freelancer -->
					<div class="freelancer">

						<!-- Overview -->
						<div class="freelancer-overview">
							<div class="freelancer-overview-inner">
								
								<!-- Avatar -->
								<div class="freelancer-avatar">
									<a href="profilE.php?id_entreprise=<?=$EpopulaireD['id_entreprise'] ?>"><img src="<?=$EpopulaireD['photo_e'] ?>" alt=""></a>
								</div>

								<!-- Name -->
								<div class="freelancer-name">
									<h4><a href="profilE.php?id_entreprise=<?=$EpopulaireD['id_entreprise'] ?>"><?=$EpopulaireD['nom_e'] ?> <img class="flag" src="images/flags/<?=$EpopulaireD['pays_e'] ?>.svg" alt="" title="<?=$EpopulaireD['pays_e'] ?>" data-tippy-placement="top"></a></h4>
									<span><?=$EpopulaireD['email_e'] ?></span>
								</div>

								<!-- Rating -->
								<div class="freelancer-rating">
									<div class="star-rating" data-rating="0"></div>
								</div>
							</div>
						</div>
						
						<!-- Details -->
						<div class="freelancer-details">
							<div class="freelancer-details-list">
								<ul>
									<li>Employés<strong><?=$EpopulaireD['nombre_employe'] ?></strong></li>
									<li>Crée le <strong><?=$EpopulaireD['date_de_creation'] ?></strong></li>
								</ul>
							</div>
							<a href="profilE.php?id_entreprise=<?=$EpopulaireD['id_entreprise'] ?>" class="button button-sliding-icon ripple-effect">Voir Plus<i class="icon-material-outline-arrow-right-alt"></i></a>
						</div>
					</div>
					<!-- Freelancer / End -->

                    <?php } } ?>


				</div>
			</div>

		</div>
	</div>
</div>
<!-- Highest Rated Freelancers / End-->


<!-- Testimonials -->
<div class="section gray padding-top-65 padding-bottom-55">
	
	<div class="container">
		<div class="row">
			<div class="col-xl-12" id="AvisSurEjob">
				<!-- Section Headline -->
				<div class="section-headline centered margin-top-0 margin-bottom-5">
					<h3>Avis Sur EJob</h3>
				</div>
			</div>
		</div>
	</div>

	<!-- Categories Carousel -->
	<div class="fullwidth-carousel-container margin-top-20">
		<div class="testimonial-carousel testimonials">

		<?php foreach($Aviss as $Avis){ 
			
			if($Avis['type']=="Utilisateur"){
				$req=$bd->prepare("SELECT `photo`,`id_utilisateur` from `utilisateurs` where `pseudo`= ? ");
				$req->execute(array($Avis['pseudo']));
				$res=$req->fetch();
				$photo=$res['photo'];
				$id=$res['id_utilisateur'];

				?>

				<!-- Item -->
				<div class="fw-carousel-review"><a href="profilU.php?id_utilisateur=<?=$id ?>">
					<div class="testimonial-box">
						<div class="testimonial-avatar">
							<img src="<?=$photo ?>" alt="">
						</div>
						<div class="testimonial-author">
							<h4><?=$Avis['designation'] ?></h4>
							 <span><?=$Avis['type'] ?></span>
						</div>
						<div class="testimonial"><?=$Avis['avis'] ?></div>
					</div></a>
				</div>

				<?php
			}
			else {
				$req=$bd->prepare("SELECT `photo_e`,`id_entreprise` from `entreprises` where `pseudo`= ? ");
				$req->execute(array($Avis['pseudo']));
				$res=$req->fetch();
				$photo=$res['photo_e'];
				$id=$res['id_entreprise'];

				?>

				

				<!-- Item -->
				<div class="fw-carousel-review"><a href="profilE.php?id_entreprise=<?=$id ?>">
					<div class="testimonial-box">
						<div class="testimonial-avatar">
							<img src="<?=$photo ?>" alt="">
						</div>
						<div class="testimonial-author">
							<h4><?=$Avis['designation'] ?></h4>
							 <span><?=$Avis['type'] ?></span>
						</div>
						<div class="testimonial"><?=$Avis['avis'] ?></div>
					</div></a>
				</div>

				<?php
			}
			
			
			

			 } ?>

		</div>
	</div>
	<!-- Categories Carousel / End -->

</div>
<!-- Testimonials / End -->

<!-- Counters -->
<div class="section padding-top-70 padding-bottom-75" id="Stats">
	<div class="container">
		<div class="row">

			<div class="col-xl-12">
				<div class="counters-container">
					
					<!-- Counter -->
					<div class="single-counter">
						<i class="icon-line-awesome-suitcase"></i>
						<div class="counter-inner">
							<h3><span class="counter"><?=$totalA['total'] ?></span></h3>
							<span class="counter-title">Nombre d'Offres</span>
						</div>
					</div>

					<!-- Counter -->
					<div class="single-counter">
						<i class="icon-line-awesome-legal"></i>
						<div class="counter-inner">
							<h3><span class="counter"><?=$nombreC['total'] ?></span></h3>
							<span class="counter-title">Nombre de Candidature</span>
						</div>
					</div>

					<!-- Counter -->
					<div class="single-counter">
						<i class="icon-line-awesome-user"></i>
						<div class="counter-inner">
							<h3><span class="counter"><?=$totalU['total'] + $totalE['total'] ?></span></h3>
							<span class="counter-title">Membre Total</span>
						</div>
					</div>

					<!-- Counter -->
					<div class="single-counter">
						<i class="icon-line-awesome-trophy"></i>
						<div class="counter-inner">
							<h3><span class="counter"><?=$satisfaction ?></span>%</h3>
							<span class="counter-title">Satisfaction</span>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
<!-- Counters / End -->


<?php include('footer.php') ?>


</body>
</html>