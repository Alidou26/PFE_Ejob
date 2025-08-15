<?php

include("BaseDeDonnees.php");

if(isset($_GET['id_annonce'])){

$req=$bd->prepare("DELETE FROM `annonces` where `id_annonce`= ? ");
$req->execute(array($_GET['id_annonce']));

header('location: mesoffres.php ');

}
else{
header('location: index.php ');
}



?>