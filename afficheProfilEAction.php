<?php

$id_entreprise=$_GET['id_entreprise'];

$req1=$bd->prepare("SELECT * FROM `entreprises` WHERE `id_entreprise`= ? ");
$req1->execute(array($id_entreprise));

if($req1->rowcount() > 0){

    //entreprise
    $entreprise=$req1->fetch();

    //moyenne
    $req2=$bd->prepare("SELECT AVG(`note`) as `moyenne` from `avis_entreprises` where `id_entreprise`=? ");
    $req2->execute(array($id_entreprise));

    $moyenne=$req2->fetch();

    //commentaire
    $req3=$bd->prepare("SELECT * FROM `avis_entreprises`,`utilisateurs` where `avis_entreprises`.`id_utilisateur`=`utilisateurs`.`id_utilisateur` and `id_entreprise`=? ");
    $req3->execute(array($id_entreprise));

    $commentaires=$req3->fetchAll();

    //Annonces
    $req4=$bd->prepare("SELECT * FROM `annonces`,`localisations` where `annonces`.`id_localisation`=`localisations`.`id_localisation` and `id_entreprise`=? ");
    $req4->execute(array($id_entreprise));

    $annonces=$req4->fetchAll();


}

else{
    header('location: index.php');
}



?>