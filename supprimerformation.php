<?php

session_start();

require('BaseDeDonnees.php');

if(isset($_GET['id_formation'])){

    // verifier que l'id de formation est celui de l'utilisateur connecte

    $req1=$bd->prepare('SELECT * FROM `formations` where `id_formation`= ? ');
    $req1->execute(array($_GET['id_formation']));

    $formation=$req1->fetch();

    //si c'est le cas ,la suppression  est effectuee
    if($formation['id_utilisateur'] == $_SESSION['id_utilisateur']){
       
        $supprime=$bd->prepare("DELETE FROM `formations` WHERE `id_formation`= ? ");
        $supprime->execute(array($_GET['id_formation']));

        header('location:mesformations.php');


    }
    else{
        header('location:index.php');
    }

}


?>