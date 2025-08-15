<?php

session_start();

require('BaseDeDonnees.php');

if(isset($_GET['id_competence'])){

    // verifier que l'id de competence est celui de l'utilisateur connecte

    $req1=$bd->prepare('SELECT * FROM `competences` where `id_competence`= ? ');
    $req1->execute(array($_GET['id_competence']));

    $competence=$req1->fetch();

    //si c'est le cas ,la suppression  est effectuee
    if($competence['id_utilisateur'] == $_SESSION['id_utilisateur']){
       
        $supprime=$bd->prepare("DELETE FROM `competences` WHERE `id_competence`= ? ");
        $supprime->execute(array($_GET['id_competence']));

        header('location:mesdomaines.php');


    }
    else{
        header('location:index.php');
    }

}


?>