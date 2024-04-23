<?php
session_start();

// Überprüfen, ob der Benutzer angemeldet ist
if (isset($_SESSION['username'])) {
    // Benutzersitzung löschen
    session_destroy();
    
    // Benutzer zur erfolgreichen Abmeldung weiterleiten
    header("Location: logout_success.html");
    exit();
} else {
    // Falls der Benutzer nicht angemeldet ist oder ein Fehler aufgetreten ist, zur Seite mit Abmeldung nicht erfolgreich weiterleiten
    header("Location: logout_failure.html");
    exit();
}
?>