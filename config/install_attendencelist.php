<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>W+F Münster | Installationsseite</title>
</head>
<body>
    <?php
    $conn = mysqli_connect("localhost", "root", "");

    if (!$conn) {
        die("Keine Verbindung zur MySQL-Datenbank möglich: " . mysqli_connect_error());
    }

    $dbName = "schwimmwebseite";

    // Zur Datenbank wechseln
    mysqli_select_db($conn, $dbName);

    // Tabelle für die Anwesenheitsliste erstellen
    $createTableQuery = "CREATE TABLE IF NOT EXISTS attendance (
        id INT AUTO_INCREMENT PRIMARY KEY,
        child_name VARCHAR(255) NOT NULL,
        date DATE NOT NULL,
        course VARCHAR(255) NOT NULL,
        is_present BOOLEAN NOT NULL
    )";

// Wenn die DB erfolgreich installiert werden konnte, dann soll man auf die Seite install_success.html  weitergeleitet werden
    if (mysqli_query($conn, $createTableQuery)) {
        header("Location: install_success.html");
    } else {
        header("Location: install_failure.html");
// Wenn die DB nicht erfolgreich installiert werden konnte, dann soll man auf die Seite install_failure.html  weitergeleitet werden
    }

    mysqli_close($conn);
    ?>
</body>
</html>
