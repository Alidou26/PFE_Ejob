<?php

if(isset($_GET['categorie']) && isset($_GET['recherche'])){

    $categorie=$_GET['categorie'];
    $recherche=$_GET['recherche'];

    if($categorie=='competence'){

        $req=$bd->query("SELECT * FROM `utilisateurs` `U`,`competences` `C` where `U`.`id_utilisateur`=`C`.`id_utilisateur` 
        and  `C`.`nom_competence` like '%".$recherche."%'");

        $resultats=$req->fetchAll();

    }
    else if($categorie=='experience'){
        $req=$bd->query("SELECT * FROM `utilisateurs` `U`,`experience` `E` where `U`.`id_utilisateur`=`E`.`id_utilisateur` 
        and  (`E`.`poste` like '%".$recherche."%' or `E`.`tache` like '%".$recherche."%' )");

       $resultats=$req->fetchAll();

    }
    else if($categorie=='formation'){
        $req=$bd->query("SELECT * FROM `utilisateurs` `U`,`formations` `F` where `U`.`id_utilisateur`=`F`.`id_utilisateur` 
        and  `F`.`filiere` like '%".$recherche."%'");

       $resultats=$req->fetchAll();

    }
    else{
        $req=$bd->query("SELECT * FROM `utilisateurs` `U`,`formations` `F` where `U`.`id_utilisateur`=`F`.`id_utilisateur` 
        and  `F`.`nom_ecole` like '%".$recherche."%'");

       $resultats=$req->fetchAll();

    }

}


?>