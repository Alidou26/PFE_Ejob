<?php

session_start();

include("../../BaseDeDonnees.php");

$req1=$bd->query("SELECT * FROM `formations` where `id_utilisateur`={$_SESSION['id_utilisateur']}");
$formations=$req1->fetchAll();

$req2=$bd->query("SELECT * FROM `experience` where `id_utilisateur`={$_SESSION['id_utilisateur']}");
$experiences=$req2->fetchAll();

$req3=$bd->query("SELECT * FROM `competences` where `id_utilisateur`={$_SESSION['id_utilisateur']}");
$competences=$req3->fetchAll();

?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
  <meta name="viewport" content="width=device-width"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<div class="resume-wrapper">
	<section class="profile section-padding">
		<div class="container">
			<div class="picture-resume-wrapper">
        <div class="picture-resume">
        <span><img src="../../<?= $_SESSION['photo'] ?>" alt="" /></span>
        <svg version="1.1" viewBox="0 0 350 350">
  
  <defs>
    <filter id="goo">
      <feGaussianBlur in="SourceGraphic" stdDeviation="8" result="blur" />
      <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 21 -9" result="cm" />
    </filter>
  </defs>
  
  
<g filter="url(#goo)" >  
  
  <circle id="main_circle" class="st0" cx="171.5" cy="175.6" r="130"/>
  
  <circle id="circle" class="bubble0 st1" cx="171.5" cy="175.6" r="122.7"/>
  <circle id="circle" class="bubble1 st1" cx="171.5" cy="175.6" r="122.7"/>
  <circle id="circle" class="bubble2 st1" cx="171.5" cy="175.6" r="122.7"/>
  <circle id="circle" class="bubble3 st1" cx="171.5" cy="175.6" r="122.7"/>
  <circle id="circle" class="bubble4 st1" cx="171.5" cy="175.6" r="122.7"/>
  <circle id="circle" class="bubble5 st1" cx="171.5" cy="175.6" r="122.7"/>
  <circle id="circle" class="bubble6 st1" cx="171.5" cy="175.6" r="122.7"/>
  <circle id="circle" class="bubble7 st1" cx="171.5" cy="175.6" r="122.7"/>
  <circle id="circle" class="bubble8 st1" cx="171.5" cy="175.6" r="122.7"/>
  <circle id="circle" class="bubble9 st1" cx="171.5" cy="175.6" r="122.7"/>
  <circle id="circle" class="bubble10 st1" cx="171.5" cy="175.6" r="122.7"/>

</g>  
</svg>
      </div>
         <div class="clearfix"></div>
 </div>
      <div class="name-wrapper">
        <h1><?= $_SESSION['nom'] ?> <br/><?= $_SESSION['prenom'] ?></h1>
      </div>
      <div class="clearfix"></div>
      <div class="contact-info clearfix">
      	<ul class="list-titles">
      		<li>Téléphone</li>
      		<li>Email</li>
      	</ul>
        <ul class="list-content ">
        	<li><?= $_SESSION['telephone'] ?></li> 
        	<li><?= $_SESSION['email'] ?></li> 
        </ul>
      </div>
      <div class="contact-presentation">
      	<p><?= $_SESSION['presentation'] ?></p>
      </div>
      <div class="contact-social">
      	<ul class="list-titles">
      		<li>Twitter</li>
      		<li>Facebook</li>
            <li>LinkedIn</li>
      	</ul>
        <ul class="list-content"> 
      		<li><a href=""><?= $_SESSION['nom'] ?>_twitter</a></li> 
      		<li><a href=""><?= $_SESSION['prenom'] ?>_facebook</a></li> 
      		<li><a href=""><?= $_SESSION['nom'] ?>_linkedin</a></li> 
      	</ul>
      </div>
		</div>
	</section>
  
  <section class="experience section-padding">
  	<div class="container">
  		<h3 class="experience-title">Experiences</h3>
      
      <div class="experience-wrapper">
      <?php foreach($experiences as $experience){ 
        $dd=explode("-",$experience['date_debut']);
        $df=explode("-",$experience['date_fin']) ?>
      	<div class="company-wrapper clearfix">
      		<div class="experience-title"><?=$experience['nom_organisme'] ?></div>
          <div class="time"><?=$dd[0] ?> - <?=$dd[0] ?></div>
      	</div>
        
        <div class="job-wrapper clearfix">
        	<div class="experience-title"><?=$experience['poste'] ?></div>
          <div class="company-description">
          	<p><?=$experience['tache'] ?></p>
          </div>
        </div>
        
     <?php } ?>
        
      </div>
      
      <div class="section-wrapper clearfix">
      	<h3 class="section-title">Competences</h3>  
        	<ul>

            <?php foreach($competences as $competence){ ?>
        		<li class="skill-percentage"><?= $competence['nom_competence'] ?></li>
            <?php } ?>
            
        	</ul>
        
      </div>
      
      <div class="section-wrapper clearfix">
        <h3 class="section-title">Formations</h3>
        <div class="experience-wrapper">
      <?php foreach($formations as $formation){  ?>
     
        
        <div class="job-wrapper clearfix">
        	<div class="experience-title"><?=$formation['nom_ecole'] ?></div>
          <div class="company-description">
          	<p><?=$formation['date_debut']."-".$formation['date_fin'] ?></p>
          </div>
        </div>
        
     <?php } ?>
        
      </div>
      </div>
      
  	</div>
  </section>
  
  <div class="clearfix"></div>
</div>
<!-- partial -->
  <script src='//cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js'></script><script  src="./script.js"></script>
  <script>
    window.onlaod=window.print();
</script>

</body>
</html>
