<?php

session_start();

require('BaseDeDonnees.php');

if(!empty($_POST['preference'])){

    $pref=htmlspecialchars($_POST['preference']);

    $verif=$bd->prepare("SELECT * FROM `preferences` where `id_categorie`= ? and `id_utilisateur`=? ");
    $verif->execute(array($pref,$_SESSION['id_utilisateur']));

    if($verif->rowcount() <= 0){

    $req=$bd->prepare("INSERT INTO `preferences`(`id_categorie`,`id_utilisateur`) values (?,?) ");

    $req->execute(array($pref,$_SESSION['id_utilisateur']));

    }

    header('location: mesdomaines.php');
}

else{
   
    header('location: mesdomaines.php');
}

?>