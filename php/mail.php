<?php
//get data from form  
$name = $_POST['name'];
$email= $_POST['emailadress'];
$message= $_POST['message'];

$to = "hecking.me.96@gmail.com";

$subject = "Mail From website";
$txt ="Name = ". $name . "\r\n Email = " . $email . "\r\n Message = " . $message;
$headers = "From: Contact-Us@hecking.me" . "\r\n" .
"CC: ";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:/thankyou.html");
?>