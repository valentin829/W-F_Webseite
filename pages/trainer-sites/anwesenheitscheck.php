<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Datenbankverbindung herstellen
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbPassword = '';
    $dbName = 'schwimmwebseite';

    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    // Überprüfen, ob die Verbindung erfolgreich hergestellt wurde
    if ($conn->connect_error) {
        die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
    }

    // Daten aus dem Formular sicher abrufen
    $childName = mysqli_real_escape_string($conn, $_POST['child_name']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $course = mysqli_real_escape_string($conn, $_POST['course']);
    $isPresent = isset($_POST['present']) ? 1 : 0;

    // Validierung der Daten
    if (empty($childName) || empty($date) || empty($course)) {
        echo "Bitte alle erforderlichen Informationen eingeben.";
    } else {
        // SQL-Abfrage zum Einfügen der Daten
        $sql = "INSERT INTO attendance (child_name, date, course, is_present) VALUES ('$childName', '$date', '$course', $isPresent)";

        if ($conn->query($sql) === TRUE) {
            header("Location: anwesenheitscheck.html");
        } else {
            echo "Fehler beim Hinzufügen des Eintrags: " . $conn->error;
        }
    }

    $conn->close();
}
?>

