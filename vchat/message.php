<?php
require('../BaseDeDonnees.php');

session_start();

include 'core/init.php';

$userOBJ->updateSession();

 $user = $userOBJ->userData();
 if(isset($_GET['pseudo']) && !empty($_GET['pseudo'])){
   
    $profileData = $userOBJ->getUserByUsername($_GET['pseudo']);
   
    $user = $userOBJ->userData();
   
    if(!$profileData){
        $userOBJ->redirect('../index.php');
    }else 
    if($profileData->pseudo === $user->pseudo ){
        $userOBJ->redirect('../index.php');
    }
   
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="../css/style.css">
<link rel="stylesheet" href="../css/colors/blue.css">
<link rel='stylesheet' type='text/css' media='screen' href='styles/popup.css'>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
       const conn = new WebSocket('ws://localhost:8080/?token=<?php echo $userOBJ->sessionID;?>');
    </script>

</head>
<body class="gray">

<!-- Wrapper -->
<div id="wrapper">

<?php include('../notifications.php'); ?>

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
					<a href="../index.php"><img src="../logo.png" alt="" style="height:100%;width:100%;"></a>
				</div>

				<!-- Main Navigation -->
				<nav id="navigation">
					<ul id="responsive">

						<li><a href="../index.php">Home</a></li>

						<li><a href="../index.php#NouvellesOffres">Nouvelles offres</a></li>

						<li><a href="../index.php#AvisSurEjob">Avis sur Ejob</a></li>

						<?php if(isset($_SESSION['utilisateur_connecte'])){ ?>

                        <li><a href="../ejobBook.php">EjobBook</a></li>

                        <?php } ?>

						<li><a href="../index.php#Stats">Stats</a></li>

						<li><a href="../contact/contact.php">Nous Contacter</a></li>

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
							<a href="#"><div class="user-avatar status-online"><img src="../<?=$_SESSION['photo'] ?>" alt="" style="width:6rem;height:3rem;"></div></a>
						</div>

						<!-- Dropdown -->
						<div class="header-notifications-dropdown">

							<!-- User Status -->
							<div class="user-status">

								<!-- User Name / Avatar -->
								<div class="user-details">
									<div class="user-avatar status-online"><img src="../<?=$_SESSION['photo'] ?>" alt="" style="width:6rem;height:3rem;"></div>
									<div class="user-name">
										<?=$_SESSION['nom'].' '.$_SESSION['prenom'] ?>  <span>Utilisateur</span>
									</div>
								</div>
								
								<!-- User Status Switcher -->
								<div class="status-switch" id="snackbar-user-status">
									<label class="user-online current-status">En ligne</label>
									<a href="../deconnexionAction.php"><label class="user-invisible">Déconnexion</label></a>
									<!-- Status Indicator -->
									<span class="status-indicator" aria-hidden="true"></span>
								</div>	
						</div>
						
						<ul class="user-menu-small-nav">
							<li><a href="../dashboardU.php"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
							<li><a href="../parametreU.php"><i class="icon-material-outline-settings"></i> Paramètre</a></li>
							<li><a href="../deconnexionAction.php"><i class="icon-material-outline-power-settings-new"></i> Déconnexion</a></li>
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
							<a href="#"><div class="user-avatar status-online"><img src="../<?=$_SESSION['photo_e'] ?>" alt=""></div></a>
						</div>

						<!-- Dropdown -->
						<div class="header-notifications-dropdown">

							<!-- User Status -->
							<div class="user-status">

								<!-- User Name / Avatar -->
								<div class="user-details">
									<div class="user-avatar status-online"><img src="../<?=$_SESSION['photo_e'] ?>" alt=""></div>
									<div class="user-name">
										<?=$_SESSION['nom_e'].'-'.$_SESSION['sigle_e'] ?>  <span>Recruteur</span>
									</div>
								</div>
								
								<!-- User Status Switcher -->
								<div class="status-switch" id="snackbar-user-status">
									<label class="user-online current-status">En ligne</label>
									<a href="../deconnexionAction.php"><label class="user-invisible">Déconnexion</label></a>
									<!-- Status Indicator -->
									<span class="status-indicator" aria-hidden="true"></span>
								</div>	
						</div>
						
						<ul class="user-menu-small-nav">
							<li><a href="../dashboardE.php"><i class="icon-material-outline-dashboard"></i> Dashboard</a></li>
							<li><a href="../parametreE.php"><i class="icon-material-outline-settings"></i> Paramètre</a></li>
							<li><a href="../deconnexionAction.php"><i class="icon-material-outline-power-settings-new"></i> Déconnexion</a></li>
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


<?php if(isset($_SESSION['utilisateur_connecte'])){ ?>


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
							<li><a href="../dashboardU.php"><i class="icon-material-outline-dashboard"></i>Dashboard</a></li>
							<li class="active"><a href="#"><i class="icon-material-outline-question-answer"></i> Messages</a></li>
							<li><a href="../mescandidatures.php"><i class="icon-material-outline-business-center"></i>Mes Candidatures</a></li>
						</ul>
						<!-- <i class="icon-material-outline-business-center"></i> -->
						<ul data-submenu-title="Mon Profil">
                            <?php if($_SESSION['verifie']=="NON"){ ?>
							<li><a href="../CompleterProfil.php"><i class="icon-material-outline-assignment"></i>Completer Mon Profil</a></li>
                            <?php } else{ ?>
                            <li><a href="../CompleterProfil.php"><i class="icon-material-outline-assignment"></i>Modifier Mon Profil</a></li>
                            <?php } ?>
                            <li><a href="../mesdomaines.php"><i class="icon-material-outline-language"></i>Mes domaines</a></li>
                            <li><a href="../mesexperiences.php"><i class="icon-material-outline-school"></i>Mes Formations</a></li>
                            <li><a href="../mesexperiences.php"><i class="icon-material-outline-reorder"></i>Mes Expériences</a></li>
                            <li><a href="../generercv.php"><i class="icon-material-outline-speaker-notes"></i>Générer CV</a></li>

						</ul>

						<ul data-submenu-title="EJob">
							<li><a href="#small-dialog" class="popup-with-zoom-anim"><i class="icon-line-awesome-commenting-o"></i>Ajouter un Avis sur EJob</a></li>
						</ul>

						<ul data-submenu-title="Mon Compte">
							<li><a href="../parametreU.php"><i class="icon-material-outline-settings"></i>Paramètre</a></li>
							<li><a href="../deconnexionAction.php"><i class="icon-material-outline-power-settings-new"></i>Déconnexion</a></li>
						</ul>
						
					</div>
				</div>
				<!-- Navigation / End -->

			</div>
		</div>
	</div>
	<!-- Dashboard Sidebar / End -->

    <?php } else{ ?>



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
							<li><a href="../dashboardE.php"><i class="icon-material-outline-dashboard"></i>Dashboard</a></li>
							<li class="active"><a href="#"><i class="icon-material-outline-question-answer"></i> Messages</a></li>
							<li><a href="../mesoffres.php"><i class="icon-material-outline-business-center"></i>Mes Offres</a></li>
                            <li><a href="../poster.php"><i class="icon-material-outline-add"></i>Poster une Annonce</a></li>
						</ul>

                        <ul data-submenu-title="EJob">
						<li ><a href="../rechercheProfil.php"><i class="icon-line-awesome-users"></i>Rechercher des Profils</a></li>
							<li><a href="#small-dialog" class="popup-with-zoom-anim"><i class="icon-line-awesome-commenting-o"></i>Ajouter un Avis sur EJob</a></li>
						</ul>

						<ul data-submenu-title="Mon Compte">
							<li><a href="../parametreE.php"><i class="icon-material-outline-settings"></i>Paramètre</a></li>
							<li><a href="../deconnexionAction.php"><i class="icon-material-outline-power-settings-new"></i>Déconnexion</a></li>
						</ul>
						
					</div>
				</div>
				<!-- Navigation / End -->

			</div>
		</div>
	</div>
	<!-- Dashboard Sidebar / End -->



    <?php } ?>


	<!-- Dashboard Content
	================================================== -->
	<div class="dashboard-content-container" data-simplebar>
		<div class="dashboard-content-inner" >
			
			<!-- Dashboard Headline -->
			<div class="dashboard-headline">
				<h3>Messages</h3>

				<!-- Breadcrumbs -->
				<nav id="breadcrumbs" class="dark">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Dashboard</a></li>
						<li>Messages</li>
					</ul>
				</nav>
			</div>
	
				<div class="messages-container margin-top-0">

					<div class="messages-container-inner">

						<!-- Messages -->
						<div class="messages-inbox">
							<div class="messages-headline">
							<div class="input-with-icon">
										<input id="autocomplete-input" type="text" placeholder="Message" disabled>
									<i class="icon-brand-rocketchat"></i>
								</div>
							</div>

							<ul>

							<?php include('../AfficheMessageRecu2.php'); ?>

							</ul>
						</div>
						<!-- Messages / End -->

						<!-- Message Content -->
						<div class="message-content" >

							<div class="messages-headline">
								<h4><?= $profileData->pseudo ?></h4>
								<a href="#" class="message-action">      
      <button class="chat-attachment-btn" id="hangupBtn" style="display:none;" onclick="cacheBalise('hangupBtn','callBtn');">
      <i class="fa-solid fa-video-slash" style="color:red;font-size:1.3rem;"></i>
      </button>
	  <?php if(isset($_SESSION['entreprise_connecte'])){ ?>
      <button class="chat-attachment-btn" data-user="<?php echo $profileData->id_utilisateur;?>" id="callBtn" style="display:block;" onclick="cacheBalise('callBtn','hangupBtn');cacheBalise('messages','deo');">
      <i class="fa-solid fa-video" style="color:green;font-size:1.5rem;"></i>
       </button>
	   <?php }else{ ?>
		<button class="chat-attachment-btn" data-user="<?php echo $profileData->id_entreprise;?>" id="callBtn" style="display:none;" onclick="cacheBalise('callBtn','hangupBtn');cacheBalise('messages','deo');">
      <i class="fa-solid fa-video" style="color:green;font-size:1.5rem;"></i>
       </button>
		<?php } ?>
      </a>
							</div>
							

              <div class="chat-wrapper" style="display:none;" id="deo">
  <div class="order-2 h-full" id="video">
          <video id="remoteVideo" class="h-full object-cover" style="height:15rem;width:100%;margin:auto;"></video>

          <video id="localVideo" class="vid-2 Z-1 right-0 bottom" style="height:15rem;width:100%;margin:auto;" ></video>

      </div>
      </div>

							<!-- Message Content Inner -->
							<div class="message-content-inner" id="messages">
									

									
							</div>
							<!-- Message Content Inner / End -->
							
							<!-- Reply Area -->
							<form id="message__form">
							<div class="message-reply">
								<input type="hidden" name="pseudo_recepteur" id="pseudo_recepteur" value="<?= $_GET['pseudo'] ?>">
								<input type="hidden" name="pseudo_envoyeur" value="<?= $_SESSION['pseudo'] ?>">
								<textarea cols="1" name="message" rows="1" placeholder="Votre Message..." data-autoresize></textarea>
								<button type="submit" class="button ripple-effect">Envoyer</button>
							</div>
							</form>

						</div>
						<!-- Message Content -->

					</div>
			</div>
			<!-- Messages Container / End -->



			
          <?php include('../footer2.php') ?>

		</div>
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->

</div>
<!-- Wrapper / End -->

      <!-- popup -->
      <div id="callBox" class="box hidden">
<div class="popup" id="success">
      <div class="popup-content">
        <div class="imgbox">
          <img src="" alt="" class="img" id="profileImage" style="width:9rem;height:9rem;">
        </div>
        <div class="title">
            <div id="username"><h3>Appel Video!</h3></div>
        </div>

        
          <button id="answerBtn" class="s_button" onclick="cacheBalise('messages','deo');">Accepter</button>
        
      
          <button id="declineBtn" class="e_button">Refuser</button>
        
      </div>
    </div>
    </div>
<!-- popup -->


<?php include('../PopUpAvisEjob.php');  ?>




<script>

function cacheBalise(id,af){
    let div=document.querySelector("#"+id);
    div.style.display='none';
    let div1=document.querySelector("#"+af);
    div1.style.display='block';
}


      </script>


<!-- Scripts
================================================== -->
<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../js/jquery-migrate-3.0.0.min.js"></script>
<script src="../js/mmenu.min.js"></script>
<script src="../js/tippy.all.min.js"></script>
<script src="../js/simplebar.min.js"></script>
<script src="../js/bootstrap-slider.min.js"></script>
<script src="../js/bootstrap-select.min.js"></script>
<script src="../js/snackbar.js"></script>
<script src="../js/clipboard.min.js"></script>
<!-- <script src="../js/counterup.min.js"></script> -->
<script src="../js/magnific-popup.min.js"></script>
<script src="../js/slick.min.js"></script>
<script src="../js/custom.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="js/ajaxMessage.js"></script>
<script src="js/afficheConversation.js"></script>

  <script  src="https://webrtc.github.io/adapter/adapter-latest.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/main.js"></script>

</body>
</html>