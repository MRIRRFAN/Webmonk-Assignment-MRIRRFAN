<?php
   if (isset($_POST['submit'])) {
      $firstName = $_POST['firstName'];
      $lastName = $_POST['lastName'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $gender = $_POST['gender'];
      $country = $_POST['country'];
      $info = $_POST['info'];

      $to = "info@webmonk.solutions";
      $subject = "New Contact Form Submission";
      $message = "Name: $firstName $lastName\n";
      $message .= "Email: $email\n";
      $message .= "Phone: $phone\n";
      $message .= "Gender: $gender\n";
      $message .= "Country: $country\n";
      $message .= "Additional Info: $info\n";
      $headers = "From: $email\r\n";
      $headers .= "Reply-To: $email\r\n";

      mail($to, $subject, $message, $headers);
      header("Location: thank-you.html");
   }
?>
