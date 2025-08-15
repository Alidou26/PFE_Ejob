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
<html lang="en">
<head>
    <link rel="stylesheet" href="stylecv.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

  <div class="resume">
     <div class="resume_left">
       <div class="resume_profile">
         <img src="../../<?= $_SESSION['photo'] ?>">
       </div>
       <div class="resume_content">
         <div class="resume_item resume_info">
           <div class="title">
             <p class="bold"><?=$_SESSION['nom']." ".$_SESSION['prenom'] ?></p>
             <p class="regular">A la Recherche d'un emploi</p>
           </div>
           <ul>
             <li>
               <div class="icon">
                 <i class="fas fa-mobile-alt"></i>
               </div>
               <div class="data">
               <?=$_SESSION['telephone'] ?>
               </div>
             </li>
             <li>
               <div class="icon">
                 <i class="fas fa-envelope"></i>
               </div>
               <div class="data">
               <?=$_SESSION['email'] ?>
               </div>
             </li>
           </ul>
         </div>
         <div class="resume_item resume_skills">
           <div class="title">
             <p class="bold">COMPETENCES</p>
           </div>
           <ul>
            <?php foreach($competences as $competence){ ?>
             <li>
               <div class="skill_name">
                 <?= $competence['nom_competence'] ?>
               </div>
               <div class="skill_progress">
                 <span style="width: 80%;"></span>
               </div>
               <div class="skill_per">80%</div>
             </li>

             <?php } ?>
           
           </ul>
         </div>
         <div class="resume_item resume_social">
           <div class="title">
             <p class="bold">Réseaux Sociaux</p>
           </div>
           <ul>
             <li>
               <div class="icon">
                 <i class="fab fa-facebook-square"></i>
               </div>
               <div class="data">
                 <p class="semi-bold">Facebook</p>
                 <p><?= $_SESSION['pseudo'] ?>@facebook</p>
               </div>
             </li>
             <li>
               <div class="icon">
                 <i class="fab fa-twitter-square"></i>
               </div>
               <div class="data">
                 <p class="semi-bold">Twitter</p>
                 <p><?= $_SESSION['nom'] ?>@twitter</p>
               </div>
             </li>
             <li>
               <div class="icon">
                 <i class="fab fa-youtube"></i>
               </div>
               <div class="data">
                 <p class="semi-bold">Youtube</p>
                 <p><?= $_SESSION['prenom'] ?>@youtube</p>
               </div>
             </li>
             <li>
               <div class="icon">
                 <i class="fab fa-linkedin"></i>
               </div>
               <div class="data">
                 <p class="semi-bold">Linkedin</p>
                 <p><?= $_SESSION['nom']."_".$_SESSION['prenom'] ?>@linkedin</p>
               </div>
             </li>
           </ul>
         </div>
       </div>
    </div>
    <div class="resume_right">
      <div class="resume_item resume_about">
          <div class="title">
             <p class="bold">A propos de Moi</p>
           </div>
          <p><?= $_SESSION['presentation'] ?></p>
      </div>
      <div class="resume_item resume_work">
          <div class="title">
             <p class="bold">Mes Experiences</p>
           </div>
          <ul>
            <?php foreach($experiences as $experience){ ?>
              <li>
                  <div class="date"><?=$experience['date_debut'] ?> - <?=$experience['date_fin'] ?></div> 
                  <div class="info">
                       <p class="semi-bold"><?=$experience['nom_organisme'] ?></p> 
                    <p><?=$experience['tache'] ?></p>
                  </div>
              </li>

              <?php } ?>
       
          </ul>
      </div>
      <div class="resume_item resume_education">
        <div class="title">
             <p class="bold">MES FORMATIONS</p>
           </div>
        <ul>
            <?php foreach($formations as $formation){ ?>
              <li>
                  <div class="date"><?=$formation['date_debut'] ?> - <?=$formation['date_fin'] ?></div> 
                  <div class="info">
                       <p class="semi-bold"><?=$formation['nom_ecole'] ?></p> 
                    <p><?=$formation['filiere'] ?></p>
                  </div>
              </li>
              <?php } ?>
   
          </ul>
      </div>
     
    </div>
  </div>
</body>

<script>
    window.onlaod=window.print();
</script>
</html>