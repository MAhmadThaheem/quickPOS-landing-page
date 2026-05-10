<?php
// process_contact.php
// Jira: [POS-502] Contact Form Backend Validation & Redirect

session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST['submit_contact'])) {
    header("Location: index.php");
    exit();
}

$name    = htmlspecialchars(trim($_POST['name']    ?? ''));
$email   = htmlspecialchars(trim($_POST['email']   ?? ''));
$subject = htmlspecialchars(trim($_POST['subject'] ?? ''));
$message = htmlspecialchars(trim($_POST['message'] ?? ''));

// Validate
if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    $_SESSION['form_error'] = "Please fill in all required fields.";
    header("Location: index.php#contact");
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['form_error'] = "Please provide a valid email address.";
    header("Location: index.php#contact");
    exit();
}

// Success
header("Location: thankyou.html");
exit();