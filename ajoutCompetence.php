<?php

session_start();

require('BaseDeDonnees.php');

if(!empty($_POST['competence'])){

    $comp=strtoupper(htmlspecialchars($_POST['competence']));

    $req=$bd->prepare("INSERT INTO `competences`(`nom_competence`,`id_utilisateur`) values (?,?) ");

    $req->execute(array($comp,$_SESSION['id_utilisateur']));

    header('location: mesdomaines.php');
}

else{
    header('location: index.php');
}

?>