<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form inputs
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Email details
    $to = 'coleblunt.dev@gmail.com'; // Replace with your email address
    $subject = 'New Contact Form Submission';
    $body = "Name: $name\nEmail: $email\nPhone: $phone\nSubject: $subject\nMessage: $message";

    // Send email
    $success = mail($to, $subject, $body);

    // Check if email sent successfully
    if ($success) {
        $response = ['status' => 'success', 'message' => 'Email sent successfully!'];
    } else {
        $response = ['status' => 'error', 'message' => 'Failed to send email. Please try again.'];
    }

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>