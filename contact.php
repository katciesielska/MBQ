<?php
// contact.php - Send email and display confirmation

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize form input
    $name    = trim(strip_tags($_POST['name'] ?? ''));
    $email   = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $message = trim(htmlspecialchars($_POST['message'] ?? ''));
    $lang    = ($_POST['lang'] ?? 'pl');
    $lang    = ($lang === 'en') ? 'en' : 'pl';

    // Email to MBQ
    $to = "mbq.kontakt@gmail.com";
    $from = "no-reply@mbq.com.pl";

    $subject = ($lang === 'en')
        ? "Message from MBQ website"
        : "Wiadomość z formularza MBQ";

    $body = "Imię/Nazwisko: $name\nEmail: $email\n\nWiadomość:\n$message";

    $headers  = "From: $from\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // Confirmation email to client
    $confirm_subject = ($lang === 'en')
        ? "MBQ — message received"
        : "MBQ — potwierdzenie otrzymania wiadomości";

    $confirm_message = ($lang === 'en')
        ? "<p>Hello <strong>$name</strong>,</p>
           <p>We have received your message and will respond as soon as possible.</p>
           <p><strong>Your message:</strong></p>
           <blockquote>$message</blockquote>
           <p>MBQ Michał Blandzi</p>"
        : "<p>Cześć <strong>$name</strong>,</p>
           <p>Otrzymaliśmy Twoją wiadomość i odpowiemy najszybciej jak to możliwe.</p>
           <p><strong>Treść Twojej wiadomości:</strong></p>
           <blockquote>$message</blockquote>
           <p>MBQ Michał Blandzi</p>";

    $confirm_headers  = "From: $from\r\n";
    $confirm_headers .= "Reply-To: $from\r\n";
    $confirm_headers .= "Content-Type: text/html; charset=utf-8\r\n";

    // Send both emails
    $sent1 = mail($to, $subject, $body, $headers);
    $sent2 = mail($email, $confirm_subject, $confirm_message, $confirm_headers);

    // Response page
    $msg = ($lang === 'en')
        ? "Thank you, $name! Your message has been sent."
        : "Dziękujemy, $name! Twoja wiadomość została wysłana.";

    $back_btn = ($lang === 'en') ? "Back to website" : "Powrót na stronę";
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="utf-8">
    <title>MBQ - <?= $msg ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 20px;
        }
        .message-container {
            max-width: 600px;
            margin: 60px auto;
            padding: 30px;
            border-radius: 10px;
            background: #f7f9fc;
            text-align: center;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.12);
        }
        h2 {
            color: #2a8dd8;
            margin: 0 0 10px 0;
        }
        p {
            margin: 10px 0 20px 0;
            color: #333;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 18px;
            background: #2a8dd8;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-weight: bold;
        }
        a:hover {
            background: #2377b8;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <h2><?= $msg ?></h2>
        <p><?= ($lang === 'en') ? 'Automatic redirect in 5 seconds.' : 'Za 5 sekund nastąpi automatyczny powrót.' ?></p>
        <a href="index.php"><?= $back_btn ?></a>
    </div>
    
    <script>
        setTimeout(function() {
            window.location.href = 'index.php';
        }, 5000);
    </script>
</body>
</html>
<?php
}
?>
