<?php

// Import PHPMailer classes
// These must be at the top of the script
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


//get variables from the form
$firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
$lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
$phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
$email = filter_var($_POST['mail'], FILTER_SANITIZE_STRING);
$msg = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
$gender = $_POST['gender'];
$name = $lastName . ' ' . $firstName;


//Check for empty fields
if(empty($_POST['firstName'])){
    header("location: contact_form");
    exit();
}

if(empty($_POST['lastName'])){
    header("location: contact_form");
    exit();
}

if(empty($_POST['mail'])){
    header("location: contact_form");
    exit();
}

if(empty($_POST['message'])){
    header("location: contact_form");
    exit();
}

if(empty($_POST['gender'])){
    header("location: contact_form");
    exit();
}

if(empty($_POST['phone'])){
    $phone = 'nicht angegeben';
}


//these if statment ensures that the mail is only send when the honeypot (field called "trap") is empty
if(empty($_POST['trap'])){

//Initialize a new mail    
$mail = new PHPMailer(true);
try {
    $mail->isSendmail();
    $mail->CharSet = 'UTF-8';

//Recipients
    $mail->setFrom('info@salzmann-versicherungne.ch', 'Salzmann-Versicherungen');
    $mail->addAddress('rolf.salzmann@allianz-suisse.ch'); //reciever
    $mail->addReplyTo($email, $name);   //reply to whoever filled the form

//Message to send
$txt1 = '<h2>' . $gender . ' ' . $lastName . ' hat eine Kontakt anfrage gesendet</h2>
        <p>Nachricht:</p>
        <p>' . $msg . '</p><br>
        <p>Sie können auf diese email antworten oder ' . $gender . ' ' . $lastName . ' mit den folgenden Kontakt daten erreichen:</p><br>
        Nachname: ' . $lastName .'<br>
        Vorname: ' . $firstName .'<br>
        E-mail: ' . $email .'<br>
        Tel: ' . $phone;

//set email to HTML, set the Subject, add a body with and without HTML.
    $mail->isHTML(true);                  
    $mail->Subject = 'Kontaktanfrage';  
    $mail->Body    = $txt1;                 //message from above
    $mail->AltBody = strip_tags($txt1);     //strips message from all html text, making it plain text

    $mail->send();
    header('Location: success');         //succsess message or redirect to a success page
    exit();
    

//error message
} catch (Exception $e) {
    echo        'Die Nachricht konnte nicht gesendet werden. Bitte überprüfen Sie ihre angaben und versuchen Sie es erneut. <br><br>
                Sollte der Fehler weiterhin bestehen bleiben senden Sie uns bitte folgenden Fehlertext per Email an rolf.salzmann@allianz-suisse.ch: <br><br>' , $mail->ErrorInfo;
}
}