<?php
$to      = 'roshannizar8@gmail.com';
$subject = 'Test Email from PHP';
$message = 'This is a test email sent using PHP mail() function.';
$headers = 'From: your-email@example.com' . '\r\n' .
'Reply-To: roshannizar8@gmail.com' . '\r\n' .
'X-Mailer: PHP/' . phpversion();

if ( mail( $to, $subject, $message, $headers ) ) {
    echo 'Email sent successfully.';
} else {
    echo 'Failed to send email.';
}
?>