<?php
// contact.php - WYSYŁANIE FORMULARZA KONTAKTOWEGO Z DANYMI Z KALKULATORÓW 
// + WYSYŁANIE POTWIERDZENIA I ZAKRESU CENOWEGO USŁUGI


// reaguje tylko na wysłanie formularza
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // podstawowe czyszczenie danych z formularza
    $name    = trim(strip_tags($_POST['name'] ?? ''));
    $email   = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $message = trim(htmlspecialchars($_POST['message'] ?? ''));
    $lang    = ($_POST['lang'] ?? 'pl');
    $lang    = ($lang === 'en') ? 'en' : 'pl';

    // pobranie quotes z kalkulatorów
    $quotesRaw = $_POST['quotes'] ?? '';
    $quotes = [];

    if ($quotesRaw) {
        $decoded = json_decode($quotesRaw, true);
        if (is_array($decoded)) {
            $quotes = $decoded;
        }
    }

    // generowanie zakresu cenowego na podstawie wypelnionego kalkulatora
    function generateEstimates(array $quotes, string $lang): string {
        if (empty($quotes)) {
            return ($lang === 'en')
                ? "No pricing calculators were selected."
                : "Nie wybrano żadnych kalkulatorów wyceny.";
        }

            $serviceNames = [
        'domy_szkieletowe' => [
            'pl' => 'Domy szkieletowe',
            'en' => 'Timber houses'
        ],
        'elewacje' => [
            'pl' => 'Elewacje',
            'en' => 'Facades'
        ],
        'tarasy' => [
            'pl' => 'Tarasy',
            'en' => 'Terraces'
        ],
        'sauny' => [
            'pl' => 'Sauny',
            'en' => 'Saunas'
        ],
        'ogrodzenie' => [
            'pl' => 'Ogrodzenia',
            'en' => 'Fences'
        ],
        'projekty_3d' => [
            'pl' => 'Projekty 3D',
            'en' => '3D Projects'
        ]
    ];


        $lines = [];
        $currency = ($lang === 'en') ? 'PLN' : 'zł';

        foreach ($quotes as $key => $item) {

            // nazwa usługi zależna od języka
            $serviceName = $serviceNames[$key][$lang] ?? $key;

            switch ($key) {
                case 'domy_szkieletowe':
                    $lines[] = "$serviceName: 280 000 – 420 000 $currency";
                    break;

                case 'elewacje':
                    $lines[] = "$serviceName: 180 – 320 $currency / m²";
                    break;

                case 'tarasy':
                    $lines[] = "$serviceName: 450 – 900 $currency / m²";
                    break;

                case 'sauny':
                    $lines[] = "$serviceName: 18 000 – 45 000 $currency";
                    break;

                case 'ogrodzenie':
                    $lines[] = "$serviceName: 320 – 650 $currency / mb";
                    break;

                case 'projekty_3d':
                    $lines[] = "$serviceName: 2 000 – 6 000 $currency";
                    break;
            }
        }


        $header = ($lang === 'en')
            ? "Estimated price range:\n"
            : "Orientacyjny zakres cenowy:\n";

        return $header . implode("\n", $lines);
    }

    // mail do firmy
    $to = "mbq.kontakt@gmail.com";
    $from = "no-reply@mbq.com.pl";

    $subject = ($lang === 'en')
        ? "Message from MBQ website"
        : "Wiadomość z formularza MBQ";

    $estimateText = generateEstimates($quotes, $lang);

    $body = "Imię/Nazwisko: $name\n"
          . "Email: $email\n\n"
          . "Wiadomość:\n$message\n\n"
          . "-------------------------\n"
          . $estimateText;

    $headers  = "From: $from\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

    
    // mail potwierdzający do klienta
    $confirm_subject = ($lang === 'en')
        ? "MBQ — message received"
        : "MBQ — potwierdzenie otrzymania wiadomości";

    if ($lang === 'en') {
$confirm_message = <<<HTML
<p>Hello <strong>{$name}</strong>,</p>
<p>We have received your message and will respond as soon as possible.</p>

<p><strong>Your message:</strong></p>
<blockquote>{$message}</blockquote>

<hr>

<p><strong>Estimated price range:</strong></p>
<pre>{$estimateText}</pre>

<p>MBQ Michał Blandzi</p>
HTML;
    } else {
$confirm_message = <<<HTML
<p>Cześć <strong>{$name}</strong>,</p>
<p>Otrzymaliśmy Twoją wiadomość i odpowiemy najszybciej jak to możliwe.</p>

<p><strong>Treść Twojej wiadomości:</strong></p>
<blockquote>{$message}</blockquote>

<hr>

<p><strong>Orientacyjny zakres cenowy:</strong></p>
<pre>{$estimateText}</pre>

<p>MBQ Michał Blandzi</p>
HTML;
    }

    $confirm_headers  = "From: $from\r\n";
    $confirm_headers .= "Reply-To: $from\r\n";
    $confirm_headers .= "Content-Type: text/html; charset=utf-8\r\n";

    
    // wysyłka maili
    $sent1 = mail($to, $subject, $body, $headers);
    $sent2 = mail($email, $confirm_subject, $confirm_message, $confirm_headers);

    // komunikat koścowy
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
