<?php

require('BaseDeDonnees.php');
session_start();
require('functions.php');

$poste=getPost();
?>




<!doctype html>
<html lang="en">
<head>

<!-- Basic Page Needs
================================================== -->
<title>EjobBook</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">


<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="EjobBook/css/style.css">

    <!-- Fonts -->
<link href='https://cdn.jsdelivr.net/npm/boxicons@1.9.2/css/boxicons.min.css' rel='stylesheet'>
<!-- CSS
================================================== -->
<link href="EjobBook/css1/style.css" rel="stylesheet">
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
                            <li><a href="mesdomaines.php"><i class="icon-material-outline-language"></i>Mes domaines</a></li>
                            <li><a href="mesformations.php"><i class="icon-material-outline-school"></i>Mes Formations</a></li>
                            <li><a href="mesexperiences.php"><i class="icon-material-outline-reorder"></i>Mes Expériences</a></li>
                            <li><a href="generercv.php"><i class="icon-material-outline-speaker-notes"></i>Générer CV</a></li>

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
	<div class="dashboard-content-container" data-simplebar >
		<div class="dashboard-content-inner" style="margin-left:10%;" >
			<div class="row" >
                <div class="col-xl-10">
                    <ul class="list-unstyled" >
                  
                        <li class="media post-form w-shadow" style="border-radius:15px;">
                       
                            <div class="media-body">
                            <form method="post"  id="poste">
                                <div class="form-group post-input">
                                    <textarea  name="texte" class="form-control" id="postForm" rows="2" placeholder="Voulez-vous publier une annonce, <?=$_SESSION['pseudo'] ?> ?"></textarea>
                                </div>

                                <div class="row post-form-group">
                                    <div class="col-md-9">

                                    <button type="button" class="btn btn-link post-form-btn btn-sm">
                           <div class="d-flex justify-content-center">
                           <label class="form-label text-white m-1" for="customFile2"> <i class='bx bx-images'></i> <span>Photo</span></label>
                           <input type="file" name="photoVideo" class="form-control d-none" id="customFile2" />
        
                         </div>
                            </button>

                                        <button type="button" class="btn btn-link post-form-btn btn-sm">
                                           
                                        </button>

                                    </div>
                                    <div class="col-md-3 text-right" style="padding-right:50px; align-items: center;">
                                        <button type="submit" class="btn btn-primary btn-sm  status" form="poste">publier</button>
                                    </div>

                                </div>
                                </form>
                            </div>
                            
                        </li>
                    
                    </ul>
                </div>


             

                    <?php foreach($poste as $pos){
                         $likes = getLikes($pos['id_poste']);
                         $comments = getComments($pos['id_poste']);
                                    ?>
				<div class="col-xl-10">
    
					<div class="post-block" style="border-radius:15px;">
                   
						<div class="d-flex justify-content-between">
							<div class="d-flex mb-3">
								<div class="mr-2">
									<a href="profilU.php?id_utilisateur=<?=$pos['uid'] ?>" class="text-dark"><img src="<?=$pos['photo']?>" alt="User" class="author-img"></a>
								</div>
								<div>
									<h5 class="mb-0"><a href="profilU.php?id_utilisateur=<?=$pos['uid'] ?>" class="text-dark"><?=$pos['nom']?> <?=$pos['prenom']?></a></h5>
									<p class="mb-0 text-muted"><?=$pos['date_poste']?></p>
								</div>
							</div>

                            <?php if($pos['uid'] == $_SESSION['id_utilisateur']){ ?>
							<div class="post-block__user-options">
								<a href="#!" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
										aria-expanded="false">
											<i class="fa fa-ellipsis-v" aria-hidden="true" id="option<?=$pos['id_poste']?>"></i>
								</a>
                        
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
									<a class="dropdown-item text-danger" href="actions.php?deletepost=<?=$pos['id_poste']?>"><i class="fa fa-trash mr-1"></i>Supprimer</a>
								</div>
							</div>
                            <?php } ?>


						</div>
						<div class="post-block__content mb-2">
							<p><?=$pos['texte']?></p>
							<?php if(!empty($pos['image_poste'])){ ?>
							<img src="<?=$pos['image_poste']?>">
							 <?php } ?>
						</div>
                        <?php
                        if(checkLikeStatus($pos['id_poste'])){
            $like_btn_display='none';
              $unlike_btn_display='';
                }else{
        $like_btn_display='';
         $unlike_btn_display='none';  
             }
                   ?>

						<div class="mb-3">
							<div class="d-flex justify-content-between mb-2">

								<div class="d-flex">

                                <i class="bi bi-heart-fill unlike_btn text-danger" style="display:<?=$unlike_btn_display?>" data-post-id='<?=$pos['id_poste']?>'></i>
                               
                                 <i class="bi bi-heart like_btn" style="display:<?=$like_btn_display?>" data-post-id='<?=$pos['id_poste']?>'></i>
                                 
                                 <div> 

                              <span class="p-1 mx-2" data-bs-toggle="modal" data-bs-target="#likes<?=$pos['id_poste']?>"><span id="likecount<?=$pos['id_poste']?>"><?=$likes?></span> likes</span>
                 
                                 </div>
                                    
                               <a class="text-dark mr-2 boutton" > <i class='bx bx-message-rounded mr-2 com_btn'  data-aff="show-comments<?=$pos['id_poste']?>"  data-cache="hide-comments<?=$pos['id_poste']?>" ></i><span data-bs-target="#postview<?=$pos['id_poste']?>"> <?=count($comments)?> Commentaire</span></a>
                               </div>
                            
							
							</div>
						</div>
						<hr>
						<div class="post-block__comments">
							<!-- Comment Input -->
							<div class="input-group p-2 border-top">
                            <input type="text" class="form-control rounded-0 border-0 comment-input<?=$pos['id_poste']?>"   placeholder="faire un commentaire.." aria-describedby="button-addon2">
								<div class="input-group-append">
                                <button class="btn btn-outline-primary rounded-0 border-0 add-comment" data-page='jobbook' data-input="comment-input<?=$pos['id_poste']?>" data-cs="comment-section<?=$pos['id_poste']?>" data-post-id="<?=$pos['id_poste']?>" type="button" id="button-addon2">Poste</button>
                               </div>

								</div>
								
							</div>
                          

                        
                              
							<div class="border-top pt-3 hide-comments<?=$pos['id_poste']?>"  style="display: none;">
                           
								<div class="row bootstrap snippets">
                               
									<div class="col-md-12">
										<div class="comment-wrapper">
											<div class="panel panel-info">
												<div class="panel-body">
												<ul class="media-list comment-section<?=$pos['id_poste']?>">

                                                     <?php if(count($comments)<1){ ?>
                                                   <p class="p-3 text-center my-2 nce">Pas de commentaire</p>
                                                    <?php }?>

                                                    <?php foreach($comments as $coms){?>
														<li class="media">
															<a href="profilU.php?id_utilisateur=<?=$coms->id_utilisateur ?>" class="pull-left">
																<img src="<?=$coms->photo?>" alt="" class="img-circle">
															</a>
															<div class="media-body">
																<div class="d-flex justify-content-between align-items-center w-100">
																	<strong class="text-gray-dark"><a href="profilU.php?id_utilisateur=<?=$coms->id_utilisateur ?>" class="fs-8"><?=$coms->nom?> <?=$coms->pseudo?></a></strong>
																	<a href="profilU.php?id_utilisateur=<?=$coms->id_utilisateur ?>"><i class='bx bx-dots-horizontal-rounded'></i></a>
																</div>
																<span class="d-block comment-created-time"><?=$coms->date_creation?></span>
																<p class="fs-8 pt-2"> <?=$coms->commentaires?></p>
																
															</div>
														</li>
                                                        <?php }?>

													</ul>
												</div>
											</div>
										</div>
					
									</div>
								</div>
                             
							</div>
                           
						</div>
                      
                      
						</div>
                        <?php } ?>
					</div>
                   
				</div>

              
			</div>
       

         <?php include("footer2.php"); ?>
		</div>
        
	</div>
	<!-- Dashboard Content / End -->

</div>
<!-- Dashboard Container / End -->

</div>
<!-- Wrapper / End -->





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

<script>

$(".com_btn").click(function () {
    
    var id= $(this).data('cache');
    $('.' + id).toggle('slow');
});
  

$("#poste").on('submit', function(e){
    e.preventDefault();
   
    $.ajax({
        type: 'POST',
        url: 'ajax.php?addpost',
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData:false,
      
        success: function(reponse){  
			window.location.href='ejobBook.php';
        }
        });

//  window.location.href='ejobBook.php';

       
});


</script>




<script>


$(".followbtn").click(function () {
    var user_id_v = $(this).data('userId');
    var button = this;
    $(button).attr('disabled', true);

    $.ajax({
        url: 'ajax.php?follow',
        method: 'post',
        dataType: 'json',
        data: { user_id: user_id_v },
        success: function (response) {
            console.log(response);
            if (response.status) {
                $(button).data('userId', 0);
                $(button).html('<i class="bi bi-check-circle-fill"></i> Suivie')
            } else {
                $(button).attr('disabled', false);

                alert('something is wrong,try again after some time');
            }
        }
    });
});







$(".like_btn").click(function () {
    var post_id_v = $(this).data('postId');
    var button = this;
    $(button).attr('disabled', true);
    $.ajax({
        url: 'ajax.php?like',
        method: 'post',
        dataType: 'json',
        data: { post_id: post_id_v },
        success: function (response) {
            console.log(response);
            if (response.status) {

                $(button).attr('disabled', false);
                $(button).hide()
                $(button).siblings('.unlike_btn').show();
                $('#likecount' + post_id_v).text($('#likecount' + post_id_v).text() - (-1));
                //location.reload();

            } else {
                $(button).attr('disabled', false);

                alert('something is wrong,try again after some time');

            }


        }
    });
});




$(".unlike_btn").click(function () {
    var post_id_v = $(this).data('postId');
    var button = this;
    $(button).attr('disabled', true);
    $.ajax({
        url: 'ajax.php?unlike',
        method: 'post',
        dataType: 'json',
        data: { post_id: post_id_v },
        success: function (response) {

            if (response.status) {

                $(button).attr('disabled', false);
                $(button).hide()
                $(button).siblings('.like_btn').show();
                // location.reload();
                $('#likecount' + post_id_v).text($('#likecount' + post_id_v).text() - 1);

            } else {
                $(button).attr('disabled', false);

                alert('something is wrong,try again after some time');


            }



        }
    });
});





//for adding comment
$(".add-comment").click(function () {
    var button = this;
	var input = $(this).data('input');// pour le boutton input

	var comment_v = $('.'+ input).val();
    if (comment_v == '') {
        return 0;
    }
    var post_id_v = $(this).data('postId');
    var cs = $(this).data('cs');
    var page = $(this).data('page');


    $(button).attr('disabled', true);
    $(button).siblings('.'+ input).attr('disabled', true);
    $.ajax({
        url: 'ajax.php?addcomment',
        method: 'post',
        dataType: 'json',
        data: { post_id: post_id_v, comment: comment_v },
        success: function (response) {
            console.log(response);
            if (response.status) {

                $(button).attr('disabled', false);
                $(button).siblings('.'+ input).attr('disabled', false);
                $('.'+ input).val(' ');
                $("."+ cs).prepend(response.comment);

                $('.nce').hide();
                if (page == 'ejobbook') {
                    location.reload();
                }

            } else {
                $(button).attr('disabled', false);
                $(button).siblings('.'+ input).attr('disabled', false);

                alert('something is wrong,try again after some time');


            }



        }
    });
});




    </script>









<script src="css/js/app.js"></script>
<script src="css/js/components/components.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="css/js/jquery-3.6.0.min.js"></script>
    <script src="css/js/jquery.timeago.js"></script>




</body>
</html>

