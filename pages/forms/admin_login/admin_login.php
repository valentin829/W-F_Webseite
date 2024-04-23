<?php
session_start();

$login_failure_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Daten aus dem Anmeldeformular abrufen
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];

    // Überprüfen, ob das Passwort 'hallo_herr_müller' und die E-Mail 'admin@web.de' entspricht
    if ($passwort == "hallo_herr_müller" && $email == "admin@web.de") {
        // E-Mail und Passwort stimmen überein, daher Login erfolgreich
        $_SESSION['username'] = $email; // Nutzt die E-Mail als Benutzernamen in der Session
        $_SESSION['role'] = 'Admin'; // Setzt die Benutzerrolle auf "Trainer"
        header("Location: ../../../home.php");
        exit();
    } else {
        $login_failure_message = "Passwort oder Email-Adresse inkorrekt, Anmeldung fehlgeschlagen.";
    }
}
?>


<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W+F Münster | Admin-Login</title>
    <link rel="icon" type="image/jpg" href="../../../assets/img/logo.jpg">
    <link rel="stylesheet" href="../../../assets/css/login.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="../../../assets/img/logo.jpg" alt="Vereinslogo">
                <h1>Wasser + Freizeit Münster</h1>
            </div>
            <ul class="nav-links">
                <li><a href="../../../home.php">Startseite</a></li>
                <li><a href="../../../pages/calendar/kalender.php">Termine</a></li>
                <li><a href="../../../pages/forms/weiterleitungsseite.php">Anmeldung</a></li>
                <li><a href="../../../pages/overview/unseretrainer.php">Unsere Trainer</a></li>
                <li><a href="../../../pages/map/karte.html">Unser Schwimmbad</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Login</h1>
        <form method="post" action="admin_login.php">
            <label for="email">Zugang:</label>
            <input type="email" name="email" required><br><br>
            
            <label for="passwort">Passwort:</label>
            <input type="password" name="passwort" required><br><br>
            
            <input type="submit" value="Anmelden">
        </form>
        
        <?php
        if (!empty($login_failure_message)) {
            echo "<p class='login_failure'>$login_failure_message</p>";
        }
        // Fehlermeldung, wenn Passwort oder Zugang inkorrekt ist/sind
        ?>
    </main>
    <footer>
        <div class="footer-content">
            <p>&copy; Valentin Horstmann</p>
            <ul class="social-links">
                <li><a href="https://www.facebook.com/"><img src="../../../assets/img/facebook.png" alt="Facebook"></a></li>
                <li><a href="https://www.twitter.com/"><img src="../../../assets/img/twitter.png" alt="Twitter"></a></li>
                <li><a href="https://www.instagram.com/"><img src="../../../assets/img/instagram.png" alt="Instagram"></a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
