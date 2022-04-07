<?php
include 'connect.php';

$job_title 		= $_POST['job_title'];
$first_name 	= $_POST['first_name'];
$last_name 		= $_POST['last_name'];
$email 			= $_POST['email'];
$phone 			= $_POST['phone'];
$country_list 	= $_POST['country_list'];
$city_list 		= $_POST['city_list'];
$gender 		= $_POST['gender'];
$address 		= $_POST['address'];
$position_list 	= $_POST['position_list'];
$add_info 		= $_POST['add_info'];
$upload 		= $_FILES['file_upload']['name'];
$upload_tmp		= $_FILES['file_upload']['tmp_name'];
$upload_size	= $_FILES['file_upload']['size'];
// etc


/**
 * For mail fuction
 */
$to = 'hecking.me.96@gmail.com'; // change here
$subject = 'Job Application'; // change here
$from = 'noreply@hecking.me'; // change here

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Create email headers
$headers .= 'From: ' . $from . "\r\n" .
	'Reply-To: ' . $from . "\r\n" .
	'X-Mailer: PHP/' . phpversion();

// Compose a simple HTML email message
$message = '<html><body>';
$message .= '<p>register for ' . $job_title . '</p>';
$message .= '<p>Name ' . $first_name . '</p>';
$message .= '<p>Last Name: ' . $last_name . '</p>';
$message .= '<p>Email: ' . $email . '</p>';
$message .= '<p>Phone: ' . $phone . '</p>';
$message .= '<p>Country: ' . $country_list . '</p>';
$message .= '<p>City: ' . $city_list . '</p>';
$message .= '<p>Gender: ' . $gender . '</p>';
$message .= '<p>Address: ' . $address . '</p>';
$message .= '<p>Position: ' . $position_list . '</p>';
$message .= '<p>Additional Info: ' . $add_info . '</p>';
$message .= '</body></html>';

// Sending email
if (isset($_REQUEST['submit'])) {

	//data insert
	extract($_REQUEST);

	if ($obj->Insert($job_title, $first_name, $last_name, $email, $phone, $country_list, $city_list, $gender, $address, $position_list, $add_info, $upload, $upload_tmp, $upload_size, "job_application")) {

		//mail
		if (mail($to, $subject, $message, $headers)) {
			header('location:/form_submitted/formsubmitted.html');
		} else {
			echo 'Unable to send request. Please try again.';
		}
		// echo 'Data inserted';
		header('location:view.php');
	}
}
