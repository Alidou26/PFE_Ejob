<?php
require('BaseDeDonnees.php');

session_start();

if(!isset($_GET['id_categorie'])){
    header('location: index.php');
}
else{
    include('affichaCategorieAction.php');
}

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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/colors/blue.css">

</head>
<body class="gray">

<!-- Wrapper -->
<div id="wrapper">

<?php include('navbar.php') ?>

<!-- Page Content
================================================== -->
<div class="full-page-container">

	
	<!-- Full Page Content -->
	<div class="full-page-content-container" data-simplebar>
		<div class="full-page-content-inner">

			<h3 class="page-title"><?= $categorie['nom_categorie'] ?></h3>

			<div class="listings-container grid-layout margin-top-35">

            <?php  foreach($resultats as $annonce) { ?>
				
				<!-- Job Listing -->
				<a href="annonces.php?id_annonce=<?=$annonce['id_annonce'] ?>" class="job-listing">

					<!-- Job Listing Details -->
					<div class="job-listing-details">
						<!-- Logo -->
						<div class="job-listing-company-logo">
							<img src="<?=$annonce['photo_e'] ?>" alt="">
						</div>

						<!-- Details -->
						<div class="job-listing-description">
							<h4 class="job-listing-company"><?=$annonce['nom_e'] ?></h4>
							<h3 class="job-listing-title"><?=$annonce['titre'] ?></h3>
						</div>
					</div>

					<!-- Job Listing Footer -->
					<div class="job-listing-footer">
						<ul>
							<li><i class="icon-material-outline-location-on"></i><?=$annonce['nom_localisation'] ?></li>
							<li><i class="icon-material-outline-business-center"></i> <?=$annonce['type'] ?></li>
							<li><i class="icon-material-outline-account-balance-wallet"></i> <?=$annonce['salaire'] ?></li>
							<li><i class="icon-material-outline-access-time"></i> <?=$annonce['date_fin'] ?></li>
						</ul>
					</div>
				</a>	

                <?php } ?>



			</div>



<?php include('footer2.php'); ?>

		</div>
	</div>
	<!-- Full Page Content / End -->

</div>


</div>
<!-- Wrapper / End -->

<?php include('popup.php') ?>

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




<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script> 
$(".alert-inscription-danger").hide();
$(".alert-inscription-success").hide();
$(".alert-warning").hide();
</script>
<script src="ajax.js"></script>

</body>
</html>