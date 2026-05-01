

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Response - Shri Sai Krupa</title>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: #050816;
            color: #fff;
            text-align: center;
            padding: 50px;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.03);
            padding: 40px;
            border-radius: 32px;
            border: 1px solid rgba(255,255,255,0.05);
        }
        a {
            color: #f59e0b;
            text-decoration: none;
            font-weight: 600;
        }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <?php echo $response; ?>
        <p><a href="SHRISAI.html">← Back to Home</a></p>
    </div>
</body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $name = trim(htmlspecialchars($_POST['name']));
    $email = trim(htmlspecialchars($_POST['email']));
    $phone = trim(htmlspecialchars($_POST['phone']));
    $message = trim(htmlspecialchars($_POST['message']));

    // Validate inputs
    $errors = [];
    if (empty($name)) $errors[] = "Name is required.";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "Valid email is required.";
    if (empty($phone)) $errors[] = "Phone is required.";
    if (empty($message)) $errors[] = "Message is required.";

    if (empty($errors)) {
        // Email details
        $to = "devashishsanjaysharma@gmail.com";
        $subject = "New Inquiry from Shri Sai Krupa Website";
        $body = "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message";
        $headers = "From: $email\r\nReply-To: $email";

        // Send email
        if (mail($to, $subject, $body, $headers)) {
            $response = "<h2 style='color: #f59e0b;'>Thank you for your message! We will get back to you soon.</h2>";
        } else {
            $response = "<h2 style='color: #ff6b6b;'>Sorry, there was an error sending your message. Please try again.</h2>";
        }
    } else {
        $response = "<h2 style='color: #ff6b6b;'>Please correct the following errors:</h2><ul>";
        foreach ($errors as $error) {
            $response .= "<li>$error</li>";
        }
        $response .= "</ul>";
    }
} else {
    $response = "<h2 style='color: #ff6b6b;'>Invalid request.</h2>";
}
?>
</html>