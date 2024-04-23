<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suchleiste</title>
    <link rel="icon" href="../../../assets/img/logo.jpg">
    <link rel="stylesheet" href="../../../assets/css/search.css">
</head>
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
<body>

<main>
    <h1>Suchergebnisse:</h1>


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

// Suchanfrage verarbeiten
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_query = $_POST["search_query"];

    $sql = "SELECT * FROM mitglieder_db WHERE kind_vorname LIKE '%$search_query%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Ergebnisse ausgeben
        while ($row = $result->fetch_assoc()) {
            echo "<div class='karteikarte'>";
            echo "<h2>" . $row["kind_vorname"] . " " . $row["kind_nachname"] . "</h2>";
            echo "<div class='details'>";
            echo "<p><span class='informationen'>Email:</span> " . $row["Email"] . "</p>";
            echo "<p><span class='informationen'>Schwimmkurs:</span> " . $row["Schwimmkurs"] . "</p>";
            echo "<div class='actions'>";
            
            // Überprüft, ob die ID vorhanden ist, bevor es den Link hinzufügen
            if (isset($row["MitgliedID"])) {
                echo "<a href='weitere_informationen.php?id=" . $row["MitgliedID"] . "'>Weitere Informationen</a>";
            } else {
                echo "Keine ID vorhanden.";
            }

            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "<div class='no_results'>";
        echo "Es wurden keine Ergebnisse gefunden.";
        echo "<br>";
        echo "Bitte überprüfen Sie die korrekte Schreibweise des Namens.";
        echo "</div>";
    }    
}

// Verbindung schließen
$conn->close();
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