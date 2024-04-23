<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 1 - Vorname und Nachname</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Schritt 1: Vorname und Nachname</h2>
        <form method="post">
            <label for="vorname">Vorname:</label><br>
            <input type="text" id="vorname" name="vorname"><br>
            <span class="error"><?php echo isset($errors["vorname"]) ? $errors["vorname"] : ""; ?></span><br>
            <label for="nachname">Nachname:</label><br>
            <input type="text" id="nachname" name="nachname"><br>
            <span class="error"><?php echo isset($errors["nachname"]) ? $errors["nachname"] : ""; ?></span><br>
            <input type="submit" value="Weiter">
        </form>
    </div>
</body>
</html>
