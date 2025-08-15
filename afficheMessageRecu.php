<?php 

if(isset($_SESSION['utilisateur_connecte'])){

$req=$bd->query("SELECT distinct `pseudo_envoyeur` FROM `messages` where `pseudo_recepteur`='".$_SESSION['pseudo']."'");


if($req->rowcount() > 0){
    $resultats=$req->fetchAll();
    foreach($resultats as $resultat){
    $req1=$bd->query("SELECT * from `messages` where (`pseudo_envoyeur`='".$_SESSION['pseudo']."' and `pseudo_recepteur`='".
    $resultat['pseudo_envoyeur']."') or (`pseudo_envoyeur`='".$resultat['pseudo_envoyeur']."' and `pseudo_recepteur`='".
    $_SESSION['pseudo']."') ORDER BY `date_envoi` desc limit 1 ");
    $dernierMessage=$req1->fetch();

    $req2=$bd->query("SELECT * FROM `entreprises` where `pseudo`='".$resultat['pseudo_envoyeur']."'");
    $recruteur=$req2->fetch();

    if($recruteur['status']=='CONNECTE'){
        $status='status-online';
    }
    else{
        $status='status-offline';
    }

   echo' <li>
<a href="vchat/message.php?pseudo='.$recruteur['pseudo'].'">
    <div class="message-avatar"><i class="status-icon '.$status.'"></i><img src="'.$recruteur['photo_e'].'" alt="" /></div>

    <div class="message-by">
        <div class="message-by-headline">
            <h5>'.$recruteur['nom_e'].'</h5>
            <span>'.$dernierMessage['date_envoi'].'</span>
        </div>
        <p>'.$dernierMessage['message'].'</p>
    </div>
</a>
</li>
';


    }
}
else{

  echo '  <li>
<a href="#">
        <p>Aucun Message Recu des Recruteurs</p>
</a>
</li>
';

}


}
else{


    $req=$bd->query("SELECT distinct `pseudo_recepteur` FROM `messages` where `pseudo_envoyeur`='".$_SESSION['pseudo']."'");


if($req->rowcount() > 0){
    $resultats=$req->fetchAll();
    foreach($resultats as $resultat){
    $req1=$bd->query("SELECT * from `messages` where (`pseudo_envoyeur`='".$_SESSION['pseudo']."' and `pseudo_recepteur`='".
    $resultat['pseudo_recepteur']."') or (`pseudo_envoyeur`='".$resultat['pseudo_recepteur']."' and `pseudo_recepteur`='".
    $_SESSION['pseudo']."') ORDER BY `date_envoi` desc limit 1 ");
    $dernierMessage=$req1->fetch();

    $req2=$bd->query("SELECT * FROM `utilisateurs` where `pseudo`='".$resultat['pseudo_recepteur']."'");
    $recruteur=$req2->fetch();

    if($recruteur['status']=='CONNECTE'){
        $status='status-online';
    }
    else{
        $status='status-offline';
    }

   echo' <li>
<a href="vchat/message.php?pseudo='.$recruteur['pseudo'].'">
    <div class="message-avatar"><i class="status-icon '.$status.'"></i><img src="'.$recruteur['photo'].'" alt="" /></div>

    <div class="message-by">
        <div class="message-by-headline">
            <h5>'.$recruteur['pseudo'].'</h5>
            <span>'.$dernierMessage['date_envoi'].'</span>
        </div>
        <p>'.$dernierMessage['message'].'</p>
    </div>
</a>
</li>
';


    }
}
else{

  echo '  <li>
<a href="#">
        <p>Aucun Message </p>
</a>
</li>
';

}

}






?>