<?php

// Define some constants
define( "RECIPIENT_NAME", "John Doe" );
define( "RECIPIENT_EMAIL", "demo@demo.com" );

// Read the form values
$success = false;
$company_name = isset( $_POST['company_name'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['company_name'] ) : "";
$company_location = isset( $_POST['company_location'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['company_location'] ) : "";
$text_url = isset( $_POST['text_url'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['text_url'] ) : "";
$gender = isset( $_POST['gender'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['gender'] ) : "";
$doc_file = isset( $_POST['doc_file'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['doc_file'] ) : "";
$development = isset( $_POST['development'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['development'] ) : "";
$design = isset( $_POST['design'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['design'] ) : "";
$f_develop = isset( $_POST['f_develop'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['f_develop'] ) : "";
$specs_1 = isset( $_POST['specs_1'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['specs_1'] ) : "";
$specs_2 = isset( $_POST['specs_2'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['specs_2'] ) : "";
$j_position = isset( $_POST['j_position'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['j_position'] ) : "";
$salary = isset( $_POST['salary'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['salary'] ) : "";
$experience = isset( $_POST['experience'] ) ? preg_replace( "/[^\s\S\.\-\_\@a-zA-Z0-9]/", "", $_POST['experience'] ) : "";
$some_word = isset( $_POST['some_word'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['some_word'] ) : "";

// If all values exist, send the email
if ( $company_name && $company_location && $gender && $message) {
  $recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
  $headers = "From: " . $company_name . "";
  $msgBody = " Location: ". $company_location . " URL: ". $text_url . " Gender: ". $gender . " File: " . $doc_file . " Experience: " . $development . $design . $f_develop . " Speciality: " . $specs_1 . $specs_2 . " Some Word: ". $some_word . " Position: ". $j_position . " Salary: ". $salary . " Experience: ". $experience ."";
  $success = mail( $recipient, $headers, $msgBody );

  //Set Location After Successsfull Submission
  header('Location: index.html?message=Successfull');
}

else{
	//Set Location After Unsuccesssfull Submission
  	header('Location: index.html?message=Failed');	
}

?>