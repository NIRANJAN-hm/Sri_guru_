<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace with the email address that should receive website enquiries
  $receiving_email_address = 'sriguruconsultancy05@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = isset($_POST['name']) ? $_POST['name'] : 'Website Visitor';
  $contact->from_email = isset($_POST['email']) ? $_POST['email'] : $receiving_email_address;
  $contact->subject = isset($_POST['subject']) && $_POST['subject'] !== '' ? $_POST['subject'] : 'New Website Enquiry';

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  if (isset($_POST['name'])) {
    $contact->add_message( $_POST['name'], 'Name');
  }

  if (isset($_POST['email'])) {
    $contact->add_message( $_POST['email'], 'Email');
  }

  if (isset($_POST['phone'])) {
    $contact->add_message( $_POST['phone'], 'Phone');
  }

  if (isset($_POST['message'])) {
    $contact->add_message( $_POST['message'], 'Message', 10);
  }

  echo $contact->send();
?>
