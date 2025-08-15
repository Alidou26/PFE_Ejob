<?php

session_start();

require('BaseDeDonnees.php');

if(isset($_GET['id_categorie'])){
       
        $supprime=$bd->prepare("DELETE FROM `preferences` WHERE `id_categorie`= ? and `id_utilisateur`=? ");
        $supprime->execute(array($_GET['id_categorie'],$_SESSION['id_utilisateur']));

        header('location:mesdomaines.php');

}

else{
    header('location:mesdomaines.php');
}


?>