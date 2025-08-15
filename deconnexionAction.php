<?php

session_start();

require('BaseDeDonnees.php');

date_default_timezone_set('Africa/Casablanca');

//Enregistre la date de deconnexion comme derniere connexion et changer le status dans la base de donnee

if(isset($_SESSION['utilisateur_connecte'])){
    
    //identification du type de compte 

$derniereConnexion=$bd->prepare('UPDATE `utilisateurs` SET `derniere_connexion`= ? , `status`= ?
 WHERE `id_utilisateur`= ? ');
 $derniereConnexion->execute(array(date('Y-m-d H:i:s'),'DECONNECTE',$_SESSION['id_utilisateur']));

} else 

{
    $derniereConnexion=$bd->prepare('UPDATE `entreprises` SET `derniere_connexion`= ? , `status`= ?
 WHERE `id_entreprise`= ? ');
 $derniereConnexion->execute(array(date('Y-m-d H:i:s'),'DECONNECTE',$_SESSION['id_entreprise']));
}

if(isset($_SESSION['Admin_connecte'])){

    //mettre tous les donnees dans un tableau

$_SESSION=array();

//supprimer la session

session_destroy();

unset($_SESSION);

//redirection vers l'index

header('location: Admin/index.php');

}
else{





//mettre tous les donnees dans un tableau

$_SESSION=array();

//supprimer la session

session_destroy();

unset($_SESSION);

//redirection vers l'index

header('location: index.php');

}





?>