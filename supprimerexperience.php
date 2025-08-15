<?php

session_start();

require('BaseDeDonnees.php');

if(isset($_GET['id_experience'])){

    // verifier que l'id de experience est celui de l'utilisateur connecte

    $req1=$bd->prepare('SELECT * FROM `experience` where `id_experience`= ? ');
    $req1->execute(array($_GET['id_experience']));

    $experience=$req1->fetch();

    //si c'est le cas ,la suppression  est effectuee
    if($experience['id_utilisateur'] == $_SESSION['id_utilisateur']){
       
        $supprime=$bd->prepare("DELETE FROM `experience` WHERE `id_experience`= ? ");
        $supprime->execute(array($_GET['id_experience']));

        header('location:mesexperiences.php');


    }
    else{
        header('location:index.php');
    }

}


?>