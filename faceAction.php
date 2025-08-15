<?php
require('BaseDeDonnees.php');

session_start();

$reponse="";

if(isset($_SESSION['utilisateur_connecte']) || isset($_SESSION['entreprise_connecte']) ){

    if(isset($_SESSION['utilisateur_connecte'])){

    $requete=$bd->prepare("UPDATE `utilisateurs` set `face_id`= ? where `id_utilisateur`= ? ");
    $requete->execute(array($_POST['face_id'],$_SESSION['id_utilisateur']));

    //on met a jour son status dans la base de donnee
    
    $changeStatus=$bd->prepare('UPDATE `utilisateurs` SET `status`= ? WHERE `id_utilisateur`= ? ');
    $changeStatus->execute(array('CONNECTE',$_SESSION['id_utilisateur']));
    
    //modifier la variable session pour le face id
    $_SESSION['face_id']=$_POST['face_id'];

    $_SESSION=array();

    session_destroy();

    $reponse=0;
    }
    else{
        $requete=$bd->prepare("UPDATE `entreprises` set `face_id`= ? where `id_entreprise`= ? ");
        $requete->execute(array($_POST['face_id'],$_SESSION['id_entreprise']));

    //on met a jour son status dans la base de donnee
    
    $changeStatus=$bd->prepare('UPDATE `entreprises` SET `status`= ? WHERE `id_entreprise`= ? ');
    $changeStatus->execute(array('CONNECTE',$_SESSION['id_entreprise']));
        
        //modifier la variable session pour le face id
        $_SESSION['face_id']=$_POST['face_id'];

        $_SESSION=array();

        session_destroy();

        $reponse=0;
    }
}
else{
$reponse=-1;

}

echo json_encode($reponse);



?>