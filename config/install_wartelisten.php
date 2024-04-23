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

    // Tabelle "Wassergewöhnung Warteliste"
    $erfolg1 = mysqli_query($id, "CREATE TABLE IF NOT EXISTS wassergewöhnung_warteliste (
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

    // Tabelle "Seepferdchenkurs Warteliste"
    $erfolg2 = mysqli_query($id, "CREATE TABLE IF NOT EXISTS seepferdchenkurs_warteliste (
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

    // Tabelle "Bronzekurs Warteliste"
    $erfolg3 = mysqli_query($id, "CREATE TABLE IF NOT EXISTS bronzekurs_warteliste (
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

    // Tabelle "Silberkurs Warteliste"
    $erfolg4 = mysqli_query($id, "CREATE TABLE IF NOT EXISTS silberkurs_warteliste (
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

    // Tabelle "Goldkurs Warteliste"
    $erfolg5 = mysqli_query($id, "CREATE TABLE IF NOT EXISTS goldkurs_warteliste (
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

    // Tabelle "Technikkurs Warteliste"
    $erfolg6 = mysqli_query($id, "CREATE TABLE IF NOT EXISTS technikkurs_warteliste (
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

    // Tabelle "Leistungsschwimmkurs Warteliste"
    $erfolg7 = mysqli_query($id, "CREATE TABLE IF NOT EXISTS leistungsschwimmkurs_warteliste (
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

    // Tabelle "Erwachsenenkurs Warteliste"
    $erfolg8 = mysqli_query($id, "CREATE TABLE IF NOT EXISTS erwachsenenkurs_warteliste (
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
