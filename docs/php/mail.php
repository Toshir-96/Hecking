<?php 
 $server = "sql100.epizy.com";
 $username = "epiz_31262177";
 $password = "2w0GNz76JTIV8yR";
 $dbname = "epiz_31262177_ContactUs";
 
 
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

$to = "hecking.me.96@gmail.com";

$subject = "Mail From website";
$txt ="Name = ". $name . "\r\n  Email = " . $email . "\r\n Message =" . $message;
$headers = "From: noreply@hecking.me" . "\r\n" .
"CC: gideon.p@hecking.me";
if($email!=NULL){
    mail($to,$subject,$txt,$headers);
}
//redirect
header("Location:thankyou.html");
?>