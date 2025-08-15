<?php

include('BaseDeDonnees.php');

if(isset($_GET['id_agenda'])){

    $req=$bd->prepare("DELETE FROM `agenda` where `id_agenda`= ? ");
    $req->execute(array($_GET['id_agenda']));

    header('Location: ' . $_SERVER['HTTP_REFERER']);

}

?>