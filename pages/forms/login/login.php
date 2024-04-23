<?php
session_start();

$login_failure_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "schwimmwebseite";

    // Verbindung zur Datenbank herstellen und überprüfen
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
    }

    // Vorbereiten der SQL-Anweisung mit Platzhaltern für die Werte
    $sql = "SELECT * FROM trainerliste WHERE email = ? AND passwort = ?";
    
    // Vorbereiten der Anweisung
    $stmt = $conn->prepare($sql);
    
    // Binden der Parameter und Überprüfen auf Fehler. Der erste Parameter ist "s" für string, wird wiederholt für jeden Wert.
    $stmt->bind_param("ss", $email, $passwort);
    
    // Daten aus dem Anmeldeformular abrufen
    $email = $_POST['email'];
    $passwort = $_POST['passwort']; // Zusätzlichen Parameter für das Passwort hinzufügen

    // Ausführen der vorbereiteten Anweisung
    $stmt->execute();
    
    // Speichern des Ergebnisses
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Nutzer gefunden, daher Login erfolgreich
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['email'];
        $_SESSION['trainer_id'] = $row['TrainerID'];
        $_SESSION['role'] = 'Trainer';
        header("Location: ../../../home.php");
        exit();
    } else {
        $login_failure_message = "Passwort oder Email-Adresse inkorrekt, Anmeldung fehlgeschlagen.";
    }

    // Verbindung zur Datenbank schließen
    $conn->close();
}
?>





<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W+F Münster | Trainer-Login</title>
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
        <form method="post" action="login.php">
            <label for="email">Email-Adresse:</label>
            <input type="email" name="email" required><br><br>
            
            <label for="passwort">Passwort:</label>
            <input type="password" name="passwort" required><br><br>
            
            <input type="submit" value="Anmelden">
        </form>

        <br>
        <h4>Bist du noch nicht registriert ? <a href="../registration/jetzt_registrieren.php">Registrier dich hier </a></h4>
        <h4>Admin ? <a href="../admin_login/admin_login.php">Admin-Login</a></h4>
        <?php
        if (!empty($login_failure_message)) {
            echo "<p class='login_failure'>$login_failure_message</p>";
        }
        // Fehlermeldung, wenn Passwort oder Email inkorrekt ist/sind
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
