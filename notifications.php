<?php

include("BaseDeDonnees.php");

if(isset($_SESSION['utilisateur_connecte']) || isset($_SESSION['entreprise_connecte'])){


    $req=$bd->query('SELECT * FROM `notifications` where `pseudo`="'.$_SESSION['pseudo'].'"');
    $notifications=$req->fetchAll();

    $req2=$bd->query('SELECT COUNT(*) as `total` FROM `notifications` where `lecture`=0 and `pseudo`="'.$_SESSION['pseudo'].'"');
    $totalN=$req2->fetch();

    if(isset($_GET['id_notif'])){
 
        $bd->prepare("UPDATE `notifications` set `lecture`=1 where `id_notification`=? ")->execute(array($_GET['id_notif']));
    }

}


?>