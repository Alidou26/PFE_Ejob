<?php

session_start();

require('BaseDeDonnees.php');

if(!empty($_POST['pseudo_recepteur'])){

$pseudo_envoyeur=$_SESSION['pseudo'];
$pseudo_recepteur=htmlspecialchars($_POST['pseudo_recepteur']);

if(isset($_SESSION['entreprise_connecte'])){

$requ=$bd->query("SELECT * FROM `utilisateurs` WHERE `pseudo`='$pseudo_recepteur' ");
$infoU=$requ->fetch();
$photo=$infoU['photo'];
$photoP=$_SESSION['photo_e'];

}

else{

$requ=$bd->query("SELECT * FROM `entreprises` WHERE `pseudo`='$pseudo_recepteur' ");
$infoU=$requ->fetch();
$photo=$infoU['photo_e'];
$photoP=$_SESSION['photo'];

}

//recuperer les messages qui concernent les deux utilisateurs en question

$recupMessage=$bd->prepare('SELECT * FROM `messages`  WHERE ( `pseudo_envoyeur` = ? AND pseudo_recepteur= ?)
OR (`pseudo_envoyeur`= ? AND `pseudo_recepteur`= ?) ');

$recupMessage->execute(array($pseudo_envoyeur,$pseudo_recepteur,$pseudo_recepteur,$pseudo_envoyeur));

//verifier s'ils se sont deja envoyes un message

If($recupMessage->rowcount() > 0){

    while($message=$recupMessage->fetch()){

        if($message['pseudo_envoyeur'] == $pseudo_envoyeur){

       echo '
       <div class="message-bubble me">
       <div class="message-bubble-inner">
         <div class="message-avatar"><img src="../'.$photoP.'" alt="" /></div>
         <div class="message-text"><p>'.$message['message'].'</p></div>
       </div>
       <div class="clearfix"></div>
     </div>
   ';

        }
        else{

            echo'
            <div class="message-bubble">
            <div class="message-bubble-inner">
              <div class="message-avatar"><img src="../'.$photo.'" alt="" /></div>
              <div class="message-text"><p>'.$message['message'].'</p></div>
            </div>
            <div class="clearfix"></div>
          </div>
            ';


        }
    }

}

else {
     echo '

         <p style="color:white;">Aucun Message</p>
    
     
     ';
}


}


?>