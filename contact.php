<?php
// contact.php - sender + confirmation email + styled response

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // FORM INPUT
    $name    = trim(strip_tags($_POST['name'] ?? ''));
    $email   = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $message = trim(htmlspecialchars($_POST['message'] ?? ''));
    $lang    = ($_POST['lang'] ?? 'pl');
    $lang    = ($lang === 'en') ? 'en' : 'pl';

    // EMAIL TO MBQ
    $to = "mbq.kontakt@gmail.com";
    $from = "no-reply@mbq.com.pl";

    $subject = ($lang === 'en')
        ? "Message from MBQ website"
        : "Wiadomość z formularza MBQ";

    $body = "Imię/Nazwisko: $name\nEmail: $email\n\nWiadomość:\n$message";

    $headers  = "From: $from\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    // EMAIL TO CLIENT (confirmation)
    $confirm_subject = ($lang === 'en')
        ? "MBQ — message received"
        : "MBQ — potwierdzenie otrzymania wiadomości";

    $confirm_message = ($lang === 'en')
        ? "
        <p>Hello <strong>$name</strong>,</p>
        <p>We have received your message and will respond as soon as possible.</p>
        <p><strong>Your message:</strong></p>
        <blockquote>$message</blockquote>
        <p>MBQ Michał Blandzi</p>
        "
        : "
        <p>Cześć <strong>$name</strong>,</p>
        <p>Otrzymaliśmy Twoją wiadomość i odpowiemy najszybciej jak to możliwe.</p>
        <p><strong>Treść Twojej wiadomości:</strong></p>
        <blockquote>$message</blockquote>
        <p>MBQ Michał Blandzi</p>
        ";

    $confirm_headers  = "From: $from\r\n";
    $confirm_headers .= "Reply-To: $from\r\n";
    $confirm_headers .= "Content-Type: text/html; charset=utf-8\r\n";

    // SEND BOTH EMAILS
    $sent1 = mail($to, $subject, $body, $headers);
    $sent2 = mail($email, $confirm_subject, $confirm_message, $confirm_headers);

    // RESPONSE PAGE
    $msg = ($lang === 'en')
        ? "Thank you, $name! Your message has been sent."
        : "Dziękujemy, $name! Twoja wiadomość została wysłana.";

    $back_btn = ($lang === 'en') ? "Back to website" : "Powrót na stronę";

    echo "
    <div style='
        max-width:600px;
        margin:60px auto;
        padding:30px;
        border-radius:10px;
        background:#f7f9fc;
        font-family:Arial, sans-serif;
        text-align:center;
        box-shadow:0 0 20px rgba(0,0,0,0.12);'>

        <h2 style='color:#2a8dd8;'>$msg</h2>
        <p style='margin-top:10px;'>Za 5 sekund nastąpi automatyczny powrót.</p>

        <a href='index.php' style='
            display:inline-block;
            margin-top:20px;
            padding:10px 18px;
            background:#2a8dd8;
            color:#fff;
            text-decoration:none;
            border-radius:6px;
            font-weight:bold;'>
            $back_btn
        </a>
    </div>

    <script>
        setTimeout(function(){
            window.location.href = 'index.php';
        }, 5000);
    </script>
    ";
}
?>
