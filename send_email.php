<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get POST data
    $name = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';

    echo $name;
    echo $phone;
    // Validate form fields
    if (empty($name)) {
        $errors[] = 'Name is empty';
    }

    if (empty($phone)) {
        $errors[] = 'Phone is empty';
    } 

    // If no errors, send phone
    if (empty($errors)) {
        // Recipient phone address (replace with your own)
        $recipient = "alberto.aguilar.serna@gmail.com";

        // Additional headers
        $headers = "From: $name <$phone>";

        // Send phone
        if (mail($recipient, $message, $headers)) {
            echo "phone sent successfully!";
        } else {
            echo "Failed to send phone. Please try again later.";
        }
    } else {
        // Display errors
        echo "The form contains the following errors:<br>";
        foreach ($errors as $error) {
            echo "- $error<br>";
        }
    }
} else {
    // Not a POST request, display a 403 forbidden error
    header("HTTP/1.1 403 Forbidden");
    echo "You are not allowed to access this page.";
}
?>