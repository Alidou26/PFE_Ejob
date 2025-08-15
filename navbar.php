<?php include('notifications.php'); ?>

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

						<li><a href="index.php">Home</a></li>

						<li><a href="index.php#NouvellesOffres">Nouvelles offres</a></li>

						<li><a href="index.php#AvisSurEjob">Avis sur Ejob</a></li>

						<?php if(isset($_SESSION['utilisateur_connecte'])){ ?>

                        <li><a href="ejobBook.php">EjobBook</a></li>

                        <?php } ?>

						<li><a href="index.php#Stats">Stats</a></li>

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
							<li><a href="deconnexionAction.php"><i class="icon-material-outline-power-settings-new"></i> Déconnexion</a></li>
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