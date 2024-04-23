<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>W+F Münster | Installationsseite</title>
</head>
<body>
    <?php
    $id = mysqli_connect("localhost", "root", "") or die("Kein MySQL gefunden/gestartet!");

    // Datenbank "schwimmwebseite" erstellen und verwenden
    mysqli_query($id, "CREATE DATABASE IF NOT EXISTS schwimmwebseite");
    mysqli_query($id, "USE schwimmwebseite");

    // Tabelle "Wassergewöhnung"
    $erfolg1 = mysqli_query($id, "CREATE TABLE IF NOT EXISTS wassergewöhnung (
        TeilnehmerID INT PRIMARY KEY AUTO_INCREMENT,
        Variante VARCHAR(4),
        kind_vorname VARCHAR(50),
        kind_nachname VARCHAR(50),
        eltern_Vorname VARCHAR(50),
        eltern_nachname VARCHAR(50),
        Email VARCHAR(50),
        Telefonnummer VARCHAR(20),
        Besonderheiten TEXT
    )");

    // Tabelle "Seepferdchenkurs"
    $erfolg2 = mysqli_query($id, "CREATE TABLE IF NOT EXISTS seepferdchenkurs (
        TeilnehmerID INT PRIMARY KEY AUTO_INCREMENT,
        Variante VARCHAR(4),
        kind_vorname VARCHAR(50),
        kind_nachname VARCHAR(50),
        eltern_vorname VARCHAR(50),
        eltern_nachname VARCHAR(50),
        Email VARCHAR(50),
        Telefonnummer VARCHAR(20),
        Besonderheiten TEXT
    )");

    // Tabelle "Bronzekurs"
    $erfolg3 = mysqli_query($id, "CREATE TABLE IF NOT EXISTS bronzekurs (
        TeilnehmerID INT PRIMARY KEY AUTO_INCREMENT,
        Variante VARCHAR(4),
        kind_vorname VARCHAR(50),
        kind_nachname VARCHAR(50),
        eltern_vorname VARCHAR(50),
        eltern_nachname VARCHAR(50),
        Email VARCHAR(50),
        Telefonnummer VARCHAR(20),
        Besonderheiten TEXT
    )");

    // Tabelle "Silberkurs"
    $erfolg4 = mysqli_query($id, "CREATE TABLE IF NOT EXISTS silberkurs (
        TeilnehmerID INT PRIMARY KEY AUTO_INCREMENT,
        Variante VARCHAR(4),
        kind_vorname VARCHAR(50),
        kind_nachname VARCHAR(50),
        eltern_vorname VARCHAR(50),
        eltern_nachname VARCHAR(50),
        Email VARCHAR(50),
        Telefonnummer VARCHAR(20),
        Besonderheiten TEXT
    )");

    // Tabelle "Goldkurs"
    $erfolg5 = mysqli_query($id, "CREATE TABLE IF NOT EXISTS goldkurs (
        TeilnehmerID INT PRIMARY KEY AUTO_INCREMENT,
        Variante VARCHAR(4),
        kind_vorname VARCHAR(50),
        kind_nachname VARCHAR(50),
        eltern_vorname VARCHAR(50),
        eltern_nachname VARCHAR(50),
        Email VARCHAR(50),
        Telefonnummer VARCHAR(20),
        Besonderheiten TEXT
    )");

    // Tabelle "Technikkurs"
    $erfolg6 = mysqli_query($id, "CREATE TABLE IF NOT EXISTS technikkurs (
        TeilnehmerID INT PRIMARY KEY AUTO_INCREMENT,
        Variante VARCHAR(4),
        kind_vorname VARCHAR(50),
        kind_nachname VARCHAR(50),
        eltern_vorname VARCHAR(50),
        eltern_nachname VARCHAR(50),
        Email VARCHAR(50),
        Telefonnummer VARCHAR(20),
        Besonderheiten TEXT
    )");

    // Tabelle "Leistungsschwimmkurs"
    $erfolg7 = mysqli_query($id, "CREATE TABLE IF NOT EXISTS leistungsschwimmkurs (
        TeilnehmerID INT PRIMARY KEY AUTO_INCREMENT,
        Variante VARCHAR(4),
        kind_vorname VARCHAR(50),
        kind_nachname VARCHAR(50),
        eltern_vorname VARCHAR(50),
        eltern_nachname VARCHAR(50),
        Email VARCHAR(50),
        Telefonnummer VARCHAR(20),
        Besonderheiten TEXT
    )");

    // Tabelle "Erwachsenenkurs"
    $erfolg8 = mysqli_query($id, "CREATE TABLE IF NOT EXISTS erwachsenenkurs (
        TeilnehmerID INT PRIMARY KEY AUTO_INCREMENT,
        Variante VARCHAR(4),
        kind_vorname VARCHAR(50),
        kind_nachname VARCHAR(50),
        eltern_vorname VARCHAR(50),
        eltern_nachname VARCHAR(50),
        Email VARCHAR(50),
        Telefonnummer VARCHAR(20),
        Besonderheiten TEXT
    )");


// Wenn die DB erfolgreich installiert werden konnte, dann soll man auf die Seite install_success.html  weitergeleitet werden
    if ($erfolg1 === TRUE && $erfolg2 === TRUE && $erfolg3 === TRUE && $erfolg4 === TRUE && $erfolg5 === TRUE && $erfolg6 === TRUE && $erfolg7 === TRUE && $erfolg8 === TRUE) {
      header("Location: install_success.html");
      exit();
    } else {
      header("Location: install_failure.html");
      exit();
// Wenn die DB nicht erfolgreich installiert werden konnte, dann soll man auf die Seite install_failure.html  weitergeleitet werden
    }
    ?>
</body>
</html>
