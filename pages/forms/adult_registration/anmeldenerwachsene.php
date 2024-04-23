<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "schwimmwebseite";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Überprüfen der Verbindung
    if ($conn->connect_error) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
    }

    // Daten aus dem Formular abrufen
    $eltern_vorname = mysqli_real_escape_string($conn, $_POST['eltern_vorname']);
    $eltern_nachname = mysqli_real_escape_string($conn, $_POST['eltern_nachname']);
    $schwimmkurs = mysqli_real_escape_string($conn, $_POST['schwimmkurs']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $telefonnummer = mysqli_real_escape_string($conn, $_POST['telefonnummer']);
    $besonderheit = isset($_POST['besonderheiten']) ? mysqli_real_escape_string($conn, $_POST['besonderheiten']) : "";
    $variante = mysqli_real_escape_string($conn, $_POST['variante']);

    // SQL-Befehl zum Einfügen der Daten in die spezifische Kurs-Tabelle
    $sql_kurs = "INSERT INTO `" . $schwimmkurs . "` (variante, eltern_vorname, eltern_nachname, email, telefonnummer, besonderheiten)
    VALUES ('$variante', '$eltern_vorname', '$eltern_nachname', '$email', '$telefonnummer' , '$besonderheit')";

    $result_kurs = $conn->query($sql_kurs);

    if ($result_kurs === TRUE) {
        header('Location: erfolgreich_angemeldet.html');
        exit();
    } else {
        echo ("Ein Fehler ist aufgetreten, versuchen Sie es erneut ");
        exit();
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
    <title>W+F Münster | Kurs Anmeldung</title>
    <link rel="stylesheet" href="../../../assets/css/anmeldenerwachsene.css">
    <link rel="icon" type="image/jpg" href="../../../assets/img/logo.jpg">
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
        <h1>Bitte im folgende Text, alle Lücken füllen:</h1>
        <form method="post" action="anmeldenerwachsene.php">
            <div class="lückentext">
                <p>
                    Ich <input type="text" name="eltern_vorname" placeholder="Ihren Vornamen hier eingeben..." required> <input type="text" name="eltern_nachname" placeholder="Ihren Nachnamen hier eingeben..." required>, möchte 
                    mich zum
                    <select id="schwimmkurs" name="schwimmkurs" required>
                        <option class="kurs-option" value="technikkurs_warteliste">Technikkurs</option>
                        <option class="kurs-option" value="leistungsschwimmkurs_warteliste">Leistungsschwimmkurs</option>
                        <option class="kurs-option" value="erwachsenenkurs_warteliste">Erwachsenenkurs</option>
                    </select>

                    <select id="variante" name="variante" required>
                        <option class="kurs-option" value="A">Kurs A </option> <br>
                        <option class="kurs-option" value="B">Kurs B </option>
                    </select> 
                    
                    anmelden.
                    Meine E-Mail-Adresse lautet: <input type="email" name="email" placeholder="E-Mail Adresse hier eingeben..." required> und meine Telefonnummer lautet: <input type="tel" name="telefonnummer" placeholder="Telefon Nummer hier eingeben..." required>.
                    <br>
                </p>
                
                <p class="besonderheiten">
                        Falls Sie Besonderheiten (Allergien, Verletzungen, Behinderungen, etc.) haben, dann füllen Sie bitte folgendes Feld aus, wenn nicht, einfach frei lassen. <br> <br>
                        Ich habe folgende Besonderheiten: <br>
                        <input type="text" name="besonderheiten" placeholder="z.B. - Asthma">
                </p>

                <div class="submit-button">
                        <input type="submit" value="Absenden">
                </div>
            </div>
        </form>
            
        <div class="weiterleiten">
            <h3>Sie wollen zuerst mehr über die Kurse erfahren ? Dann klicken sie <a href="kursübersicht.html">hier</a>, um auf die Übersichtsseite der Kurse zu kommen.</h3>
        </div>
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
