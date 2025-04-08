<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //This is Get form data
    $firstName = trim($_POST['first-name']);
    $lastName = trim($_POST['last-name']);
    $email = trim($_POST['email']);
    $reason = $_POST['reason'];
    $message = trim($_POST['message']);
    
    //Validate required fields
    if (empty($firstName) || empty($lastName) || empty($email) || empty($reason) || empty($message)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Please enter a valid email address.";
    } else {
        // this is Set the email recipient
        $to = "thetumilesmafu@gmail.com";
        $subject = "New Contact Form Submission";
        
        // Compose the email content
        $emailContent = "First Name: $firstName\n";
        $emailContent .= "Last Name: $lastName\n";
        $emailContent .= "Email: $email\n";
        $emailContent .= "Reason for Contact: $reason\n";
        $emailContent .= "Message:\n$message\n";
        
        // Set the email headers
        $headers = "From: $email" . "\r\n" .
                   "Reply-To: $email" . "\r\n" .
                   "X-Mailer: PHP/" . phpversion();
        
        // Send the email
        if (mail($to, $subject, $emailContent, $headers)) {
            $successMessage = "Thank you for contacting us! We will get back to you shortly.";
        } else {
            $error = "Oops! Something went wrong and we couldn't send your message. Please try again later.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>
<body>
    <section class="contact">
        <h1>Contact Us</h1>
        <hr class="underline-hr">
        <p>We would love to hear from you! Please fill out the form below and we will get in touch with you shortly.</p>
        
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        
        <?php if (isset($successMessage)): ?>
            <p style="color: green;"><?php echo $successMessage; ?></p>
        <?php endif; ?>
        
        <form action="assets/Js/contact.php" method="POST">
            <label for="first-name">First Name:</label>
            <input type="text" name="first-name" id="first-name" class="contact-field" value="<?php echo $firstName ?? ''; ?>" required>

            <label for="last-name">Last Name:</label>
            <input type="text" name="last-name" id="last-name" class="contact-field" value="<?php echo $lastName ?? ''; ?>" required>

            <label for="email">Email Address:</label>
            <input type="email" name="email" id="email" class="contact-field" value="<?php echo $email ?? ''; ?>" required>

            <label for="reason">Reason for Contact:</label>
            <select name="reason" id="reason" class="contact-field" required>
                <option value="general" <?php if (isset($reason) && $reason == 'general') echo 'selected'; ?>>General Inquiry</option>
                <option value="support" <?php if (isset($reason) && $reason == 'support') echo 'selected'; ?>>Support</option>
                <option value="feedback" <?php if (isset($reason) && $reason == 'feedback') echo 'selected'; ?>>Feedback</option>
            </select>

            <label for="message">Message:</label>
            <textarea name="message" id="message" class="contact-field" required><?php echo $message ?? ''; ?></textarea>

            <button type="submit" id="contact-button">Submit</button>
        </form>
    </section>
</body>
</html>
