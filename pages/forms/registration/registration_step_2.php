<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step 2 - Wohnort, Email, Telefonnummer</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Schritt 2: Wohnort, Email, Telefonnummer</h2>
        <form method="post">
            <label for="wohnort">Wohnort:</label><br>
            <input type="text" id="wohnort" name="wohnort"><br>
            <span class="error"><?php echo isset($errors["wohnort"]) ? $errors["wohnort"] : ""; ?></span><br>
            <!-- Überprüft ob das Feld nicht leer ist -->
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br>
            <span class="error"><?php echo isset($errors["email"]) ? $errors["email"] : ""; ?></span><br>
            <!-- Überprüft ob das Feld nicht leer ist -->
            <label for="telefonnummer">Telefonnummer:</label><br>
            <input type="tel" id="telefonnummer" name="telefonnummer"><br>
            <span class="error"><?php echo isset($errors["telefonnummer"]) ? $errors["telefonnummer"] : ""; ?></span><br>
            <!-- Überprüft ob das Feld nicht leer ist -->
            <input type="submit" value="Weiter">
        </form>
    </div>
</body>
</html>
