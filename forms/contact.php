<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate and sanitize input
  $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
  $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

  // Email details
  $to = 'manankoyawala.dev@gmail.com';
  $email_subject = "New message from: $name";
  $email_body = "You have received a new message from the contact form on your website.\n\n".
                "Here are the details:\n".
                "Name: $name\n".
                "Email: $email\n".
                "Subject: $subject\n".
                "Message:\n$message";

  $headers = "From: $email\n";
  $headers .= "Reply-To: $email";

  // Send email
  if (mail($to, $email_subject, $email_body, $headers)) {
    echo 'Your message has been sent. Thank you!';
  } else {
    echo 'There was an error sending your message. Please try again later.';
  }
} else {
  echo 'Invalid request';
}
?>
