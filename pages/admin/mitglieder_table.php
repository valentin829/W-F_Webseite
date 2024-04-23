<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="../../assets/img/logo.jpg">
    <title>W+F Münster | Mitglieder DB</title>
    <link rel="stylesheet" href="../../assets/css/mitglieder_db.css">
</head>
<body>
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
    <main>
        <section class="participants">
            
            <h2>Mitglieder DB</h2>

            <table id="teilnehmer-tabelle">

                <tr>
                    <th>Mitglied ID</th>
                    <th>Kind-Vorname</th>
                    <th>Kind-Nachname</th>
                    <th>Elternteil-Vorname</th>
                    <th>Elternteil-Nachname</th>
                    <th>E-Mail Adresse</th>
                    <th>Aktueller Schwimmkurs</th>
                    <th>Historie</th>
                </tr>
                <?php
                // Verbindung zur MySQL-Datenbank herstellen
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "schwimmwebseite";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Überprüfung auf Verbindungsfehler
                if ($conn->connect_error) {
                    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
                }

                // SQL-Abfrage, um die Mitgliederliste aus der Datenbank abzurufen
                $sql = "SELECT mitgliedID, kind_vorname, kind_nachname, eltern_vorname, eltern_nachname, email, schwimmkurs, historie FROM mitglieder_db ORDER BY MitgliedID ASC";
                $result = $conn->query($sql);

                // Überprüfung, ob Teilnehmer gefunden wurden
                if ($result->num_rows > 0) {
                    // Durchlaufen der Ergebnisdatensätze und Anzeigen in der Tabelle
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['mitgliedID']}</td>";
                        echo "<td>{$row['kind_vorname']}</td>";
                        echo "<td>{$row['kind_nachname']}</td>";
                        echo "<td>{$row['eltern_vorname']}</td>";
                        echo "<td>{$row['eltern_nachname']}</td>";
                        echo "<td>{$row['email']}</td>";
                        echo "<td>{$row['schwimmkurs']}</td>";
                        echo "<td>{$row['historie']}</td>";
                        echo "</tr>";
                    }
                } else {
                    // Meldung, falls kein mitglied gefunden wurden
                    echo "Keine Mitglieder gefunden.";
                }

                // Verbindung zur Datenbank schließen
                $conn->close();
                ?>
            </table>

        </section>
    </main>

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
