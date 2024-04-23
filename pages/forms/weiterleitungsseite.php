<?php
session_start();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W+F Münster | Weiterleitungsseite</title>
    <link rel="icon" type="image/jpg" href="../../assets/img/logo.jpg">
    <link rel="stylesheet" href="../../assets/css/weiterleitungsseite.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="../../assets/img/logo.jpg" alt="Vereinslogo">
                <h1>Wasser + Freizeit Münster</h1>
            </div>
            <ul class="nav-links">
                <li><a href="../../home.php">Zur Startseite</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="hero">
            <h1>Willkommen zur Übersichtsseite zu den verschiedenen Anmelde- und Registrierungsseiten</h1>
            <h3>Hier die Seiten:</h3>
            <?php
                if (isset($_SESSION['username']) && isset($_SESSION['role'])) {
                    if ($_SESSION['role'] == 'Admin') {
                        // Admin-spezifische Navigationslinks
                        echo '<a href="../forms/registration/jetzt_registrieren.php" class="cta-button">als Trainer registrieren</a>';
                        echo '<a href="../forms/kids_registration/anmeldenkinder.php" class="cta-button">für die Kinderschwimmausbildung anmelden</a>';
                        echo '<a href="../forms/adult_registration/anmeldenerwachsene.php" class="cta-button">Anmeldung für weitere Kurse</a>';
                    } elseif ($_SESSION['role'] == 'Trainer') {
                        // Trainer-spezifische Navigationslinks
                        echo '<a href="../forms/kids_registration/anmeldenkinder.php" class="cta-button">für die Kinderschwimmausbildung anmelden</a>';
                        echo '<a href="../forms/adult_registration/anmeldenerwachsene.php" class="cta-button">Anmeldung für weitere Kurse</a>';
                    }
                } else {
                    // Standard-Navigationslinks für nicht eingeloggte Benutzer
                    echo '<a href="../forms/registration/jetzt_registrieren.php" class="cta-button">als Trainer registrieren</a>';
                    echo '<a href="../forms/login/login.php" class="cta-button">als Trainer anmelden</a>';
                    echo '<a href="../forms/kids_registration/anmeldenkinder.php" class="cta-button">für die Kinderschwimmausbildung anmelden</a>';
                    echo '<a href="../forms/adult_registration/anmeldenerwachsene.php" class="cta-button">Anmeldung für weitere Kurse</a>';
                }
            ?>
        </section>
    </main>
</body>
</html>