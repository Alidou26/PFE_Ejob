<?php

session_start();

require("BaseDeDonnees.php");

if(isset($_GET['id_annonce'])){

    $req=$bd->prepare("INSERT INTO `postulation`(`id_utilisateur`,`id_annonce`) values(?,?) ");

    $req->execute(array($_SESSION['id_utilisateur'],$_GET['id_annonce']));

    $req2=$bd->query("SELECT * FROM `annonces` `A`,`entreprises` `E` where `A`.`id_entreprise`=`E`.`id_entreprise` 
    and `A`.`id_annonce`=".$_GET['id_annonce']);

    $infosE=$req2->fetch();

    $req4=$bd->query("SELECT MAX(`id_notification`) as `notif` from `notifications`");
    $res=$req4->fetch();
    $idnotif=$res['notif']+1;

    $notif='<a href="offre.php?id_annonce='.$_GET['id_annonce'].'&id_notif='.$idnotif.'">
    <span class="notification-icon"><i class=" icon-material-outline-gavel"></i></span>
    <span class="notification-text">
        <strong>l\'utilisateur '.$_SESSION['nom']." ".$_SESSION['prenom'].'</strong> a candidaté a <span class="color">'.$infosE['titre'].'</span>
    </span>
</a>';
    

    $bd->prepare("INSERT INTO `notifications`(`pseudo`,`notif`) values(?,?)")->execute(array($infosE['pseudo'],$notif));

    header('location:annonces.php?id_annonce='.$_GET['id_annonce']);
}


?>