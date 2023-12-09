<?php
// send_sms.php

if (isset($_GET['license_number']) && isset($_GET['contact'])) {
    $licenseNumber = $_GET['license_number'];
    $contact = $_GET['contact'];

    // Twilio credentials
    $accountSid = 'ACfb717baddf889ed0b95f298c9f484e72';
    $authToken = '8047fc0b66d98142d9da5ffb3d7af4bb';
    $twilioNumber = '09912212264';

    // Recipient's phone number
    $toNumber = $contact;

    // Your Twilio phone number (this must be a Twilio phone number)
    $fromNumber = $twilioNumber;

    // Message to be sent
    $message = "Your appointment for license number $licenseNumber has been accepted.";

    // Send SMS using Twilio
    require_once 'path/to/twilio-php/autoload.php'; // Adjust the path to the Twilio PHP library

    // Initialize Twilio
    $twilio = new Twilio\Rest\Client($accountSid, $authToken);

    // Send SMS
    $twilio->messages->create(
        $toNumber,
        [
            'from' => $fromNumber,
            'body' => $message,
        ]
    );

    // Log success or handle any further logic
    error_log("SMS sent successfully.");
}
?>
