<?php 
 $server = "Localhost";
 $username = "id18607675_contact_us_message_form";
 $password = "Hecking.me@19&";
 $dbname = "id18607675 _contactus";
 
 
 $conn = mysqli_connect($server, $username, $password, $dbname);

 if(!$conn){
     die("Connection Failed:".mysqli_connect_error());
    
  }




  
 



?>







<?php
//get data from form  

$name = $_POST['name'];
$email= $_POST['email'];
$message= $_POST['message'];

$to = "support@hecking.me";

$subject = "Mail From website";
$txt ="Name = ". $name . "\r\n  Email = " . $email . "\r\n Message =" . $message;
$headers = "From: noreply@hecking.me" . "\r\n" .
"CC: gideon.p@hecking.me";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location: index.html");
?>