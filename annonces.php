<?php
require('BaseDeDonnees.php');

session_start();

if(!isset($_GET['id_annonce'])){
    header('location: index.php');
}
else{
    include('afficheAnnonceAction.php');
}



?>



<!doctype html>
<html lang="en">
<head>

<!-- Basic Page Needs
================================================== -->
<title>Annonces</title>
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

<?php include('navbar.php') ?>



<!-- Titlebar
================================================== -->
<div class="single-page-header" data-background-image="<?=$annonce['photo_e'] ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="single-page-header-inner">
					<div class="left-side">
						<div class="header-image"><a href="profilE.php?id_entreprise=<?=$annonce['id_entreprise'] ?>"><img src="<?=$annonce['photo_e'] ?>" alt=""></a></div>
						<div class="header-details">
							<h3><?= $annonce['titre'] ?></h3>
							
							<ul>
								<li><a href="profilE.php?id_entreprise=<?=$annonce['id_entreprise']?>"><i class="icon-material-outline-business"></i><?=$annonce['sigle_e'] ?></a></li>
								<li><div class="star-rating" data-rating="<?=$rate['total'] ?>"></div></li>
								<li><img class="flag" src="images/flags/<?=$annonce['pays_e'] ?>.svg" alt=""><?=$annonce['pays_e'] ?></li>
							</ul>
						</div>
					</div>
					<div class="right-side">
						<div class="salary-box">
							<div class="salary-type">Salaire</div>
							<div class="salary-amount"><?=$annonce['salaire'] ?> MAD</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Page Content
================================================== -->
<div class="container">
	<div class="row">
		
		<!-- Content -->
		<div class="col-xl-8 col-lg-8 content-right-offset">

			<div class="single-page-section">
				<h3 class="margin-bottom-25">Description</h3>
				<p><?= $annonce['description'] ?></p>

			</div>

			<div class="single-page-section">
				<h3 class="margin-bottom-30">Localisation</h3>
				<div id="single-job-map-container">
				<iframe src = "https://maps.google.com/maps?q=<?=$annonce['latitude']?>,<?=$annonce['longitude']?>&hl=es;z=14&amp;output=embed" style="width:100%;height:25rem;"></iframe>
				</div>
			</div>

			<div class="single-page-section">
				<h3 class="margin-bottom-25">Annonces Similaire</h3>

				<!-- Listings Container -->
				<div class="listings-container grid-layout">

                <?php foreach($similaires as $similaire ){ ?>

						<!-- Job Listing -->
						<a href="annonces.php?id_annonce=<?=$similaire['id_annonce'] ?>" class="job-listing">

							<!-- Job Listing Details -->
							<div class="job-listing-details">
								<!-- Logo -->
								<div class="job-listing-company-logo">
									<img src="<?=$similaire['photo_e']?>" alt="">
								</div>

								<!-- Details -->
								<div class="job-listing-description">
									<h4 class="job-listing-company"><?=$similaire['nom_e']?></h4>
									<h3 class="job-listing-title"><?=$similaire['titre']?></h3>
								</div>
							</div>

							<!-- Job Listing Footer -->
							<div class="job-listing-footer">
								<ul>
									<li><i class="icon-material-outline-location-on"></i><?=$similaire['nom_localisation']?></li>
									<li><i class="icon-material-outline-business-center"></i><?=$similaire['type']?></li>
									<li><i class="icon-material-outline-account-balance-wallet"></i><?=$similaire['salaire']?>MAD</li>
									<li><i class="icon-material-outline-access-time"></i><?=$similaire['date_fin']?></li>
								</ul>
							</div>
						</a>

                        <?php } ?>

						
					</div>
					<!-- Listings Container / End -->

				</div>
		</div>
		

		<!-- Sidebar -->
		<div class="col-xl-4 col-lg-4">
			<div class="sidebar-container">

                 <?php if(!isset($_SESSION['entreprise_connecte'])){ 
                    
                    if(isset($_SESSION['utilisateur_connecte'])){

                        if($verif->rowcount() > 0){

                    
                    ?>
                    <a href="" class="apply-now-button popup-with-zoom-anim">Déja Candidaté</a>

                    <?php } else { 
                        
                        if($annonce['date_fin'] > date('Y-m-d')){
                        
                        ?>

				<a href="candidatureAction.php?id_annonce=<?=$_GET['id_annonce']?>" class="apply-now-button">Candidater<i class="icon-material-outline-arrow-right-alt"></i></a>

                <?php } }  } else { ?>

                    <a href="#sign-in-dialog" class="apply-now-button popup-with-zoom-anim">Candidater<i class="icon-material-outline-arrow-right-alt"></i></a>

					
                <?php }  } ?>
				<!-- Sidebar Widget -->
				<div class="sidebar-widget">
					<div class="job-overview">
						<div class="job-overview-headline">Détails</div>
						<div class="job-overview-inner">
							<ul>
								<li>
									<i class="icon-material-outline-location-on"></i>
									<span>Localisation</span>
									<h5><?=$annonce['nom_localisation'] ?></h5>
								</li>
								<li>
									<i class="icon-material-outline-business-center"></i>
									<span>Type</span>
									<h5><?=$annonce['type'] ?></h5>
								</li>
								<li>
									<i class="icon-material-outline-local-atm"></i>
									<span>Salaire</span>
									<h5><?=$annonce['salaire'] ?></h5>
								</li>
								<li>
									<i class="icon-material-outline-access-time"></i>
									<span>Dernier Délai</span>
									<h5><?=$annonce['date_fin'] ?></h5>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>


<?php include('footer.php') ?>


<script src="https://maps.googleapis.com/maps/api/js?key=&libraries=places"></script>
<script src="js/infobox.min.js"></script>
<script src="js/markerclusterer.js"></script>
<script src="js/maps.js"></script>

</body>
</html>