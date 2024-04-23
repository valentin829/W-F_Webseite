<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weitere Informationen</title>
    <link rel="icon" href="../../assets/img/logo.jpg">
    <link rel="stylesheet" href="../../assets/css/weitere_informationen.css">
</head>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="../../assets/img/logo.jpg" alt="Vereinslogo">
                <h1>Wasser + Freizeit Münster</h1>
            </div>
            <ul class="nav-links">
                <li><a href="../../home.php">Startseite</a></li>
                <li><a href="../../pages/calendar/kalender.php">Termine</a></li>
                <li><a href="../../pages/forms/weiterleitungsseite.php">Anmeldung</a></li>
                <li><a href="../../pages/overview/unseretrainer.php">Unsere Trainer</a></li>
                <li><a href="../../pages/map/karte.html">Unser Schwimmbad</a></li>
            </ul>
        </nav>
    </header>
<body>
    <div class="container">
        <h1>Weitere Informationen</h1>

        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "schwimmwebseite";

        // Verbindung zur Datenbank herstellen
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Überprüfen, ob die Verbindung erfolgreich war
        if ($conn->connect_error) {
            die("Verbindung fehlgeschlagen: " . $conn->connect_error);
        }

        // Die ID wirld als GET-Parameter übergeben (weitere_informationen.php?id=123)
        $person_id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

        $sql = "SELECT * FROM mitglieder_db WHERE mitgliedID = $person_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Ergebnisse ausgeben
            $row = $result->fetch_assoc();
            echo "<p><span class='informationen'>Vorname des Kindes:</span> " . $row["kind_vorname"] . "</p>";
            echo "<p><span class='informationen'>Nachname des Kindes:</span> " . $row["kind_nachname"] . "</p>";
            echo "<p><span class='informationen'>Vorname eines Elternteils:</span> " . $row["eltern_vorname"] . "</p>";
            echo "<p><span class='informationen'>Nachname eines Elternteils:</span> " . $row["eltern_nachname"] . "</p>";
            echo "<p><span class='informationen'>E-Mail des Elternteils:</span> " . $row["Email"] . "</p>";
            echo "<p><span class='informationen'>Aktueller Schwimmkurs (wenn vorhanden):</span> " . $row["Schwimmkurs"] . "</p>";
            echo "<p class='historie'><span class='informationen'>Historie:</span> <br> " . $row["Historie"] . "</p>";
            
            
        } else {
            echo "Keine Informationen gefunden.";
        }

        // Verbindung schließen
        $conn->close();
        ?>
    </div>
    <footer>
        <div class="footer-content">
            <p>&copy; Valentin Horstmann</p>
            <ul class="social-links">
                <li><a href="https://www.facebook.com/"><img src="../../assets/img/facebook.png" alt="Facebook"></a></li>
                <li><a href="https://www.twitter.com/"><img src="../../assets/img/twitter.png" alt="Twitter"></a></li>
                <li><a href="https://www.instagram.com/"><img src="../../assets/img/instagram.png" alt="Instagram"></a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
