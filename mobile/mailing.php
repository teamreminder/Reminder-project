<?php
$db=Db::getInstance();
$requete = "SELECT *
            FROM rappel";
$result=$bdd->query($requete);
foreach ($result as $value)
{
  $date_rappel=$value['date_rappel'];
}
// echo date('Y-m-d H')."<br>";
// echo substr($date_rappel, 0, -6);
 if (date('Y-m-d H')==substr($date_rappel, 0, -6)) {
   $name = "delpech";
   $email_address = "charles.delpech@hotmail.com";
   $phone = "0621007166";
   $message = "reminder";

   // Create the email and send the message
   $to = 'Charlesdelpech1@Gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
   $email_subject = "Website Contact Form:  $name";
   $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
   $headers = "From: Charlesdelpech1@gmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
   $headers .= "Reply-To: $email_address";
   mail($to,$email_subject,$email_body,$headers);
   return true;
 }else {
   echo " pas ok ok";
 }
 
?>
