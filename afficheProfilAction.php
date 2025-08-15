<?php

//utilisateur
$id_utilisateur=$_GET['id_utilisateur'];

$req1=$bd->prepare("SELECT * FROM `utilisateurs` WHERE `id_utilisateur`= ? ");

$req1->execute(array($id_utilisateur));

if($req1->rowcount() > 0){

$utilisateur=$req1->fetch();

//experience
$req2=$bd->prepare("SELECT * FROM `experience` WHERE `id_utilisateur`= ? ");

$req2->execute(array($id_utilisateur));

$experiences=$req2->fetchAll();

//formations
$req3=$bd->prepare("SELECT * FROM `formations` WHERE `id_utilisateur`= ? ");

$req3->execute(array($id_utilisateur));

$formations=$req3->fetchAll();

//competences
$req4=$bd->prepare("SELECT * FROM `competences` WHERE `id_utilisateur`= ? ");

$req4->execute(array($id_utilisateur));

$competences=$req4->fetchAll();

}

else{
    header('location: index.php');
}





?>