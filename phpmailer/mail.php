<?php

    require "vendor/autoload.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


function envoiMail($exp,$dest,$sujet,$message){


    try {

         //***********************CONFIGURATION DU SERVEUR SMTP */
         $mail = new PHPMailer();
         $mail->isSMTP();
         $mail->Host = 'sandbox.smtp.mailtrap.io';
         $mail->SMTPAuth = true;
         $mail->Port = 2525;
         $mail->Username = '7748e1b1b98eae';
         $mail->Password = 'f5279b548d3e69';
        
        $mail->setFrom($exp,$exp);
        $mail->addAddress($dest);  
        $mail->addReplyTo($exp,$exp);          

    
        //Content
        $mail->isHTML(true);                                  
        $mail->Subject = $sujet;
        $mail->Body    = $message;


        $mail->send();
       
 
    } catch (Exception $e) {
        echo "Erreur: {$mail->ErrorInfo}";
    }




}


   


