<?php
session_start();

$valid_steps = array(1, 2, 3); // Array der gültigen Schritte

$step = isset($_GET["step"]) ? $_GET["step"] : 1;

if (!in_array($step, $valid_steps)) {
    // Ungültiger Schritt, Benutzer zurück zum ersten Schritt leiten
    header("Location: registration.php?step=1&error=invalid_step");
    exit();
}

if ($step == 1) {
    // Erster Schritt: Vorname, Nachname
    $errors = array();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["vorname"])) {
            $errors["vorname"] = "Vorname ist erforderlich";
        }
        if (empty($_POST["nachname"])) {
            $errors["nachname"] = "Nachname ist erforderlich";
        }

        if (empty($errors)) {
            $_SESSION["vorname"] = $_POST["vorname"];
            $_SESSION["nachname"] = $_POST["nachname"];
            header("Location: registration.php?step=2");
            exit();
        }
    }
} elseif ($step == 2) {
    // Zweiter Schritt: Wohnort, Email, Telefonnummer
    $errors = array();

    if (empty($_SESSION["vorname"]) || empty($_SESSION["nachname"])) {
        header("Location: registration.php?step=1");
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["wohnort"])) {
            $errors["wohnort"] = "Wohnort ist erforderlich";
        }
        if (empty($_POST["email"])) {
            $errors["email"] = "Email ist erforderlich";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $errors["email"] = "Ungültige Email-Adresse";
        }
        if (empty($_POST["telefonnummer"])) {
            $errors["telefonnummer"] = "Telefonnummer ist erforderlich";
        }

        if (empty($errors)) {
            $_SESSION["wohnort"] = $_POST["wohnort"];
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["telefonnummer"] = $_POST["telefonnummer"];
            header("Location: registration.php?step=3");
            exit();
        }
    }
} elseif ($step == 3) {
    // Dritter Schritt: Warum möchten Sie Trainer werden und Passwort erstellen
    $errors = array();

    if (empty($_SESSION["vorname"]) || empty($_SESSION["nachname"]) || empty($_SESSION["wohnort"]) || empty($_SESSION["email"]) || empty($_SESSION["telefonnummer"])) {
        header("Location: registration.php?step=1");
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION["warum_trainer"] = $_POST["warum_trainer"];
        $passwort = $_POST["passwort"];
        $passwort_confirm = $_POST["passwort_confirm"];

        // Passwortüberprüfung
        if (empty($passwort)) {
            $errors["passwort"] = "Passwort ist erforderlich";
        } elseif (strlen($passwort) < 8) {
            $errors["passwort"] = "Passwort muss mindestens 8 Zeichen lang sein";
        } elseif (!preg_match('/[A-Z]/', $passwort) || !preg_match('/[a-z]/', $passwort) || !preg_match('/[0-9]/', $passwort)) {
            $errors["passwort"] = "Passwort muss mindestens einen Großbuchstaben, einen Kleinbuchstaben und eine Zahl enthalten";
        } elseif ($passwort != $passwort_confirm) {
            $errors["passwort_confirm"] = "Passwörter stimmen nicht überein";
        }

        if (empty($errors)) {
            $_SESSION["passwort_confirm"] = $passwort_confirm;

            // Daten in die Datenbank eintragen
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "schwimmwebseite";

            $conn = new mysqli($servername, $username, $password, $dbname);
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $vorname = $_SESSION["vorname"];
            $nachname = $_SESSION["nachname"];
            $wohnort = $_SESSION["wohnort"];
            $email = $_SESSION["email"];
            $telefonnummer = $_SESSION["telefonnummer"];
            $warum_trainer = $_SESSION["warum_trainer"];
            $passwort_confirm = $_SESSION["passwort"];
            

            
            $sql = "INSERT INTO trainerliste (vorname, nachname, wohnort, email, telefonnummer, warum_trainer, passwort)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss", $vorname, $nachname, $wohnort, $email, $telefonnummer, $warum_trainer, $passwort);
            
            if ($stmt->execute()) {
                // Datenbankeintrag erfolgreich, leere die Session
                session_unset();
                session_destroy();
                header("Location: registration_success.html");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $stmt->error;
            }
            
            $conn->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>W+F Münster | Trainer-Registration</title>
    <link rel="icon" type="image/jpg" href="../../../assets/img/logo.jpg">
    <link rel="stylesheet" href="../../../assets/css/registration.css">
</head>
<body>
    <div class="progress-bar">
        <div class="step <?php echo ($step >= 1) ? 'completed' : ''; ?>"></div>
        <div class="step <?php echo ($step >= 2) ? 'completed' : ''; ?>"></div>
        <div class="step <?php echo ($step >= 3) ? 'completed' : ''; ?>"></div>
    </div>

    <?php include("registration_step_$step.php"); ?>
</body>
</html>

            