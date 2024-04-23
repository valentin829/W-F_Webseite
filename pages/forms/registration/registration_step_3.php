<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schritt 3 - Warum Trainer werden?</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Schritt 3: Warum möchten Sie Trainer werden?</h2>
        <form method="post">
            <label for="warum_trainer">Warum möchten Sie Trainer werden?</label><br>
            <textarea id="warum_trainer" name="warum_trainer" rows="4" cols="50"></textarea><br>
            <span class="error"><?php echo isset($errors["warum_trainer"]) ? $errors["warum_trainer"] : ""; ?></span><br>
            <label for="passwort">Passwort:</label><br>
            <input type="password" id="passwort" name="passwort"><br>
            <span class="error"><?php echo isset($errors["passwort"]) ? $errors["passwort"] : ""; ?></span><br>
            <label for="passwort_confirm">Passwort bestätigen:</label><br>
            <input type="password" id="passwort_confirm" name="passwort_confirm"><br>
            <span class="error"><?php echo isset($errors["passwort_confirm"]) ? $errors["passwort_confirm"] : ""; ?></span><br>
            <input type="submit" value="Absenden">
        </form>

        <div class="password-requirements">
            <h4>Ihr Passwort muss folgende Anforderungen erfüllen:<h4>
            <ul>
                <li>
                    <p>Passwort muss mindestens 8 Zeichen lang sein</p>
                </li>

                <li>
                    <p>Passwort muss mindestens einen Großbuchstaben, einen Kleinbuchstaben und eine Zahl enthalten</p>
                </li>
            </ul> 
        </div>
    </div>
</body>
</html>
